<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('sendgrid-php/sendgrid-php.php');

function getemailcontent($name) {
    $body = '<div style="width:94%; max-width:800px; margin:0 auto; border:1px solid #efefef;">
    <div style="width:90%; padding:10px 5%; background:#fff; border-bottom:1px solid #efefef; text-align:left;">
        <img src="https://staging.ivas.homes/images/logo.png" width="100" style="width: 100px;">
    </div>
    <div style="padding-left:5%; margin-bottom:50px; margin-top:30px;">
        <p>Dear ' . $name . ',</p>
        <p>Thank you for taking the time to fill out the form. We value your interest in our products. <br>Our team will get in touch with you shortly to understand your requirements.</p>
        <br />
        <p>Regards,<br />IVAS</p>
    </div>
    <div style="font-size:10px; color:#333; text-align:left; line-height:20px; background:#f2f2f2; width: 90%; padding: 5px 5%; font-family:Arial, Helvetica, sans-serif;">&copy; IVAS. All rights reserved.
   </div>
</div>';
    return $body;
}

function sendEmail($m, $sendToEmail) {
    if (!$sendToEmail) {
        return array(
            'logged' => false,
            'mg' => 'Email not sent. Verification conditions not met.'
        );
    }

    $email = new \SendGrid\Mail\Mail();
    $email->setFrom("noreply@ivas.homes", "Contact | Ivas ");
    $email->addTo("raj.ccomdigital@gmail.com", "Raj");

    if (isset($m['email']) && isset($m['sname'])) {
        $email->addTo($m['email'], $m['sname']);
    }

    $body = getemailcontent($m['sname']);

    $email->addContent("text/html", $body);
    $email->setSubject("Thank You!");

    $sendgrid = new \SendGrid('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'); // Replace with your actual SendGrid API key

    try {
        $response = $sendgrid->send($email);
        if ($response->statusCode() == 202) {
            // Email sent successfully
            $data = array(
                'logged' => true,
                'mg' => 'Thank You! We will contact you shortly.',
            );
        } else {
            // Email sending failed
            $data = array(
                'logged' => false,
                'mg' => 'Not sent',
                'othermg' => "SendGrid Error: " . $response->body(),
            );
        }
    } catch (Exception $e) {
        $data = array(
            'logged' => false,
            'mg' => 'Not sent',
            'othermg' => "SendGrid Exception: " . $e->getMessage(),
        );
    }

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Inspect received POST data
    //var_dump($_POST);

    $sname = isset($_POST['sname']) ? addslashes(trim($_POST['sname'])) : '';
    $phone = isset($_POST['phone']) ? addslashes(trim($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';
    $city = isset($_POST['city']) ? addslashes(trim($_POST['city'])) : '';
    $category = isset($_POST['category']) ? addslashes(trim($_POST['category'])) : '';
    $location = isset($_POST['location']) ? addslashes(trim($_POST['location'])) : '';
    $message = isset($_POST['message']) ? addslashes(trim($_POST['message'])) : '';
    $additional_info = isset($_POST['additional_info']) ? json_decode($_POST['additional_info'], true) : array();
    $utm_details = isset($_POST['utm_details']) ? json_decode($_POST['utm_details'], true) : array();


    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data = array('logged' => false, 'mg' => 'Email is not valid');
        // Return the JSON response and exit
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    } else {
        // Add your additional validation conditions here

        $m = array(
            'sname' => $sname,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'category' => $category,
            'location' => $location,
            'message' => $message,
            'additional_info' => $additional_info,
            'utm_details' => $utm_details
        );

        $data = array(
            'logged' => true,
            'mg' => 'Lead received successfully',
            'success' => true
        );

        $sendToEmail = true; // Set to true if all validation conditions are met

        $data = sendEmail($m, $sendToEmail);
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo 'No direct script access allowed. POST data not found!';
}
    

############### Third Party URL ################################
function httpcurlpost($arraym){
            
    $url = $arraym['url'];
    $data =  $arraym['data'];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

//Non curl Method
function httpfilepost($arraym){
    
    $url = $arraym['url'];
    $data =  $arraym['data'];

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    return file_get_contents($url, false, $context);
}
############### Thir PArty URL ################################
?>