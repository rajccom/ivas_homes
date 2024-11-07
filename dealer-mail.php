<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('sendgrid-php/sendgrid-php.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $honeypot = $_POST['honeypot'];
    $isValid = true;

    // Check if the honeypot field is not empty (indicating it's filled by a bot)
    if (!empty($honeypot)) {
        // Bot detected, handle accordingly (e.g., log, block, etc.)
        echo "Form submission failed. Please try again.";
        exit();
    }

    if ($isValid) {
        // Check for other required fields and validate their formats
        $requiredFields = array(
            'sname' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email'
            // Add more fields if needed
        );
    
        foreach ($requiredFields as $fieldName => $fieldLabel) {
            if (empty($_POST[$fieldName])) {
                // Field is empty, display error message
                echo "$fieldLabel should not be empty.";
                exit();
            } else {
                // Validate the format of the field
                if ($fieldName === 'sname' && !ctype_alpha(str_replace(' ', '', $_POST[$fieldName]))) {
                    // Name field should contain only alphabetic characters
                    echo "Invalid $fieldLabel format. Only alphabetic characters are allowed and spaces are not allowed.";
                    exit();
                } elseif ($fieldName === 'phone' && (!ctype_digit($_POST[$fieldName]) || !in_array($_POST[$fieldName][0], ['6', '7', '8', '9']))) {
                    // Phone field should contain only numbers and start with 6, 7, 8, or 9
                    echo "Invalid $fieldLabel format. Please provide a valid phone number starting with 6, 7, 8, or 9.";
                    exit();
                } elseif ($fieldName === 'email') {
                    // Regular expression pattern for validating email
                    $pattern = '/^[a-zA-Z0-9]+(?:[._%+-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
                
                    // Check if the email matches the pattern
                    if (!preg_match($pattern, $_POST[$fieldName])) {
                        // Email field should have a valid email format
                        echo "Invalid $fieldLabel format. Please provide a valid email address.";
                        exit();
                    }
                } elseif ($fieldName === 'city' && !ctype_alpha(str_replace(' ', '', $_POST[$fieldName]))) {
                // Name field should contain only alphabetic characters
                echo "Invalid $fieldLabel format. Only alphabetic characters are allowed and spaces are not allowed.";
                exit();
               } elseif ($fieldName === 'category' && empty($_POST[$fieldName])) {
                // Category field should not be empty
                echo "Please select a category.";
                exit();
            }
            }
         }


        $secretKey = '6LcRyZ4pAAAAAOxB7J_wbBMbjMGjoa4hSnMovhC7';
        $captcha = $_POST['g-recaptcha-response'];

        if(!$captcha){
        echo '<p class="alert alert-warning">Please check the captcha form.</p>';
        exit;             
    }



    function lead_api($request_body, $api_url, $max_retries = 3, $retry_interval = 5) {
        $api_consume_count = 0;
        do {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $api_url,
                CURLOPT_FAILONERROR => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $request_body,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: multipart/form-data', // Adjust the Content-Type header
                    'x-api-secret-key: JF+U+ETXm38uK0VzAaksFNz1uyp9Yu52ZW8ORKAolYZIy7FS1WWHqpgAT7bs3APs1jtM8zWFc6UWEz96JUaJ/BCUB2EMQGafEd3/ayoQdB1495U0FsJy8IkCJpHTN9T4onuES95dEIzS1YrUkSKhcsRPPrp5atu7bSD8q4vy2Gs=',
                    'x-api-key: MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCOYhK8UR5IyTqjSXj5dqEhdGVytn8rv7JMHhxXVcehX943lvF1Q+xZOAYlZ/ucMHTZa0EZpJ37JNm71nezsdYvtg2U3SId1uS6Wq+BSCzV03vPp3w2h78zL9kBSFA7XdYF+AaW+sYMX2YR2X0KK16BekqRDQtx/43fOE2wxLqRvQIDAQAB'
                ),
            ));
            $response = curl_exec($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }
            curl_close($curl);
            $response = json_decode($response, true);
            $response['http_status_code'] = $httpcode;
            // Retry if not successful and below the maximum retry count
            if ($httpcode !== 200 && $api_consume_count < $max_retries) {
                $api_consume_count++;
                sleep($retry_interval); // Sleep for 5 seconds before retrying
            } else {
                $api_consume_count = 0;
                return $response;
            }
        } while ($api_consume_count < $max_retries);
        return $response;
    }
    // Get form data
    $conn = mysqli_connect("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
    //$conn = mysqli_connect("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
    $category = strip_tags(addslashes($_POST['category']));
    $state = strip_tags(addslashes($_POST['states']));
    $city = strip_tags(addslashes($_POST['city']));
    $name = strip_tags(addslashes($_POST['sname']));
    $bname = strip_tags(addslashes($_POST['bname']));
    $emails = strip_tags(addslashes($_POST['email']));
    $phone = strip_tags(addslashes($_POST['phone']));



    setcookie('contact_timestamp', time(), time() + 3600); // expire in 1 hour
    // Get UTM parameters from referring URL
    $ref_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $ref_parts = parse_url($ref_url);
    parse_str($ref_parts['query'], $ref_query);
    $utm_source = isset($ref_query['utm_source']) ? strip_tags(addslashes($ref_query['utm_source'])) : '';
    $utm_medium = isset($ref_query['utm_medium']) ? strip_tags(addslashes($ref_query['utm_medium'])) : '';
    $utm_campaign = isset($ref_query['utm_campaign']) ? strip_tags(addslashes($ref_query['utm_campaign'])) : '';
    $utm_term = isset($ref_query['utm_term']) ? strip_tags(addslashes($ref_query['utm_term'])) : '';


    $unique_id = uniqid();


    $current_timestamp = new DateTime('now', new DateTimeZone('UTC'));
     // Format the timestamp in the required format
     $formatted_timestamp = $current_timestamp->format('Y-m-d\TH:i:s\Z');
     // Construct the request body as a multipart/form-data array
         $request_body = array(
             'enquiry' => '{
                 "unique_id": "'. $unique_id .'",
                 "name": "'. $name .'",
                 "message": "",
                 "contact_info": {
                     "email_id": "'. $emails .'",
                     "mobile_no": "'. $phone .'"
                 },
                 "product_infos": [
                     {
                         "category": "'. $category .'",
                         "sub_category": "",
                         "product_name": ""
                     }
                 ],
                 "address_info": {
                     "city": "'. $city .'",
                     "state": "'. $state .'"
                 },
                 "company_info": {
                     "company_name": "'. $bname .'"
                 },
                 "created_timestamp": "'. $formatted_timestamp .'",
                 "utm_info": {
                     "utm_source": "'. $utm_source .'",
                     "utm_medium": "'. $utm_medium .'",
                     "utm_campaign": "'. $utm_campaign .'",
                     "utm_campaign_id": "",
                     "utm_term": "'. $utm_term .'",
                     "utm_content": ""
                 },
                 "additional_info": {
                     "form_type": "apply_for_dealership"
                 }
             }',
         );
    // Convert the array to JSON format
    $api_url = 'https://api.inframarket.cloud/lead/enquiry/integrations/v1';
 
         // Call the API function with retry mechanism
         $api_response = lead_api($request_body, $api_url, 3, 5);
 
         if ($api_response['http_status_code'] !== 200) {
             // Handle the case when all retries are exhausted and the API call is still not successful
             // For example, log the error or send a notification
             error_log('API call failed after all retries: ' . json_encode($api_response));
             // Optionally, you can also inform the user about the issue
             // For example, redirect them to an error page
             // header("Location: 404");
             exit;
         } 
    // Build the SQL query
    $sql = "INSERT INTO dealer_lead (category, states, city, sname, bname, email, phone) VALUES ('$category', '$state', '$city', '$name', '$bname', '$emails', '$phone')";
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    // Close the database connection
    mysqli_close($conn);

$email = new \SendGrid\Mail\Mail();
$email->setFrom("noreply@ivas.homes", "No-Reply ");
$email->setSubject("Thank You for contacting us | $name ");
$email->addTo($emails, $name);
// $email->addTo("raj.ccomdigital@gmail.com", "Raj");
//$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<div style=' width:94%; max-width:800px; margin:0 auto; border:1px solid #EFEFEF;'><div style=' width:90%; padding:10px 5%; background:#fff; text-align:left;'><img src='https://staging.ivas.homes/images/logo.png' style='width: '></div><div style='font-size:13px; color:#000; text-align:left; line-height:20px; background:#fff; width: 90%; padding:5%; font-family:Arial, Helvetica, sans-serif;'><p>Dear $name ,</p><p>Thank you for taking the time to fill out the form. We value your interest in our products. Our team will get in touch with you shortly to understand your requirements.</p><br /><p>Regards,<br />Ivas</p></div></div>");
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
header("Location: thank-you");
}
else {
    $msg = 'Please fill in all the required fields and complete the captcha challenge.';
}
}
?>