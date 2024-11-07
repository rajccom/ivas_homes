<?php

require_once('sendgrid-php/sendgrid-php.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_POST['submit'])) {
        $conn = mysqli_connect("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes"); 
        $sname = strip_tags(addslashes($_POST['sname']));
        $phone = strip_tags(addslashes($_POST['phone']));
        $emails = strip_tags(addslashes($_POST['email']));
        $city = strip_tags(addslashes($_POST['city']));

        // Set a cookie with the timestamp of the contact event
        setcookie('contact_timestamp', time(), time() + 3600); // expire in 1 hour

        // Get UTM parameters from referring URL
        $ref_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        $ref_parts = parse_url($ref_url);
        parse_str($ref_parts['query'], $ref_query);

        $utm_source = isset($ref_query['utm_source']) ? strip_tags(addslashes($ref_query['utm_source'])) : '';
        $utm_medium = isset($ref_query['utm_medium']) ? strip_tags(addslashes($ref_query['utm_medium'])) : '';
        $utm_campaign = isset($ref_query['utm_campaign']) ? strip_tags(addslashes($ref_query['utm_campaign'])) : '';
        $utm_term = isset($ref_query['utm_term']) ? strip_tags(addslashes($ref_query['utm_term'])) : '';
        $utm_content = isset($ref_query['utm_content']) ? strip_tags(addslashes($ref_query['utm_content'])) : '';

        mysqli_query($conn, "INSERT INTO modular_kitchen_leads (sname, phone, email, city, utm_source, utm_medium, utm_campaign, utm_term, utm_content) 
                 VALUES ('$sname', '$phone', '$emails', '$city', '$utm_source', '$utm_medium', '$utm_campaign', '$utm_term', '$utm_content')");

$email = new \SendGrid\Mail\Mail();
$email->setFrom("noreply@ivas.homes", "Contact | Ivas ");
$email->setSubject("Thank You for contacting us | $sname ");
$email->addTo($emails, $name);
// $email->addTo("raj.ccomdigital@gmail.com", "Raj");
//$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<div style=' width:94%; max-width:800px; margin:0 auto; border:1px solid #efefef;'><div style=' width:90%; padding:10px 5%; background:#fff; text-align:left;'><img src='https://staging.ivas.homes/images/logo.png' style='width: '></div><div style='font-size:13px; color:#000; text-align:left; line-height:20px; background:#fff; width: 90%; padding:5%; font-family:Arial, Helvetica, sans-serif;'><p>Dear $sname,</p><p>Thank you for taking the time to fill out the form. We value your interest in our products. Our team will get in touch with you shortly to understand your requirements.</p><br /><p>Regards,<br />Ivas</p></div></div>");

$sendgrid = new \SendGrid('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');


try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}


header("Location: ../thank-you");
}
}
?>