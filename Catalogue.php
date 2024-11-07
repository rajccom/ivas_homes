<?php
require("ajax/src/PHPMailer.php");
require("ajax/src/SMTP.php");
require("ajax/src/Exception.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if(isset($_POST['submit']))
  {
     //include "database.php";
     //$conn = mysqli_connect("localhost:3306", "incomrut_root", "9oMF5TnbxYzvtOVL", "incomrut_ivas");
     $conn = mysqli_connect("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
     $sname = strip_tags(addslashes($_POST['sname']));
     $phone = strip_tags(addslashes($_POST['phone']));
     $email = strip_tags(addslashes($_POST['email']));
     $catalog_name = strip_tags(addslashes($_POST["catalog_name"]));
     //$pdf_path = "pdfs/" . strtolower(str_replace(" ", "_", $catalog_name)) . ".pdf";
     $pdf_path = "images/pdfs/" . strtolower(str_replace(" ", "_", $catalog_name)) . ".pdf";
     //$city = strip_tags(addslashes($_POST['city']));
     //$message = strip_tags(addslashes($_POST['message']));
     
    //  // Set a cookie with the timestamp of the contact event
    //  setcookie('contact_timestamp', time(), time()+3600); // expire in 1 hour

    //  // Get UTM parameters from referring URL
    //  $ref_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    //  $ref_parts = parse_url($ref_url);
    //  parse_str($ref_parts['query'], $ref_query);
     
    //  $utm_source = isset($ref_query['utm_source']) ? strip_tags(addslashes($ref_query['utm_source'])) : '';
    //  $utm_medium = isset($ref_query['utm_medium']) ? strip_tags(addslashes($ref_query['utm_medium'])) : '';
    //  $utm_campaign = isset($ref_query['utm_campaign']) ? strip_tags(addslashes($ref_query['utm_campaign'])) : '';
    //  $utm_term = isset($ref_query['utm_term']) ? strip_tags(addslashes($ref_query['utm_term'])) : '';
    //  $utm_content = isset($ref_query['utm_content']) ? strip_tags(addslashes($ref_query['utm_content'])) : '';
             
    mysqli_query($conn, "INSERT INTO lead (sname, phone, email)
             VALUES ('$sname', '$phone', '$email')");
	  
    // mysqli_query($conn, "INSERT INTO leads (sname, phone, email, city, utm_source, utm_medium, utm_campaign, utm_term, utm_content, timestamp) VALUES('" . $_POST['sname'] . "','" . $_POST['phone'] . "','" . $_POST['email'] . "','" . $_POST['city'] . "','" . $_GET['utm_source'] . "','" . $_GET['utm_medium'] . "','" . $_GET['utm_campaign'] . "','" . $_GET['utm_term'] . "','" . $_GET['utm_content'] . "')");

     //echo "hello";exit;

     try {

		    $ntoken = time();
		    $mail = new PHPMailer(true);
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 2;
            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';
            //Set the hostname of the mail server
            $mail->Host = "smtp.office365.com";
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;
            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "noreply@ivas.homes";
            //Password to use for SMTP authentication
            $mail->Password = "Iva10148";

        $mail->smtpConnect(
            array(
                "tls" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );



        /*
        ########################################
        ╔═╗┌┬┐┌─┐┬┬
        ║╣ │││├─┤││  - Settings  Ends here
        ╚═╝┴ ┴┴ ┴┴┴─┘
        ########################################
        */
        //$getemail = $to;$getname=$name;$message = $mge;
        //Set who the message is to be sent from

        $mail->setFrom("noreply@ivas.homes", "Contact | Ivas ");
        //Set an alternative reply-to address
        //$mail->addBCC("raj.ccomdigital@gmail.com","raj");

        //$mail->addAddress("raj.ccomdigital@gmail.com", "raj");
		//$mail->addAddress("neha.ccomdigital@gmail.com", "neha");
	    //$mail->addAddress("admin@rahejaparkwest.com", "Contact | raheja");
		$mail->addAddress($email, $sname);

        //Set the subject line
        //Catalog Download - " . $catalog_name
        $mail->Subject = 'Thank You for Catalogue Download | '. $catalog_name.' ' ;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body


        $mail->Body    = '<div style=" width:94%; max-width:800px; margin:0 auto; border:1px solid #efefef;">
      <div style=" width:90%; padding:10px 5%; background:#fff; text-align:left;"><img src="https://staging.ccomdigital.in/client/ivas/web/images/logo.png" style="width: "></div>
      <div style="font-size:13px; color:#000; text-align:left; line-height:20px; background:#fff; width: 90%; padding:5%; font-family:Arial, Helvetica, sans-serif;">
        <p>Dear '.$sname.',</p>
  		<p>Thank you for taking the time to fill out the form. We value your interest in our products. Our team will get in touch with you shortly to understand your requirements.</p>
  		<br />
		<p>Regards,<br />Ivas Ltd.</p>
   </div>
 </div>';
					
        //Replace the plain text body with one created manually
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        $mail->addAttachment($pdf_path);
        
		//$mail->addAttachment('../staging/images/Raheja_Brochure.pdf');
		//echo '<pre>';print_r($mail);exit;
        //send the message, check for errors
		
	   
        if ($mail->send()) {
          $send = new PHPMailer(true);
          $send->isSMTP();
          //Enable SMTP debugging
          // 0 = off (for production use)
          // 1 = client messages
          // 2 = client and server messages
          $send->SMTPDebug = 2;
          //Ask for HTML-friendly debug output
          $send->Debugoutput = 'html';
          //Set the hostname of the mail server
          $send->Host = "smtp.office365.com";
          // use
          // $mail->Host = gethostbyname('smtp.gmail.com');
          // if your network does not support SMTP over IPv6
          //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
          $send->Port = 587;
          //Set the encryption system to use - ssl (deprecated) or tls
          $send->SMTPSecure = 'tls';
          //Whether to use SMTP authentication
          $send->SMTPAuth = true;
          //Username to use for SMTP authentication - use full email address for gmail
          $send->Username = "noreply@ivas.homes";
          //Password to use for SMTP authentication
          $send->Password = "Iva10148";
  
          $send->smtpConnect(
              array(
                  "tls" => array(
                      "verify_peer" => false,
                      "verify_peer_name" => false,
                      "allow_self_signed" => true
                  )
              )
          );


        /*
        ########################################
        ╔═╗┌┬┐┌─┐┬┬
        ║╣ │││├─┤││  - Settings  Ends here
        ╚═╝┴ ┴┴ ┴┴┴─┘
        ########################################
        */
        //$getemail = $to;$getname=$name;$message = $mge;
        //Set who the message is to be sent from

        $send->setFrom("noreply@ivas.homes", "Contact | Ivas");
        //Set an alternative reply-to address
        //$mail->addBCC("raj.ccomdigital@gmail.com","raj");

        $send->addAddress("raj.ccomdigital@gmail.com", "raj");
		//$send->addAddress("kartik.ccomdigital@gmail.com", "kartik");
	    //$mail->addAddress("admin@rahejaparkwest.com", "Contact | raheja");
		//$mail->addAddress($email, $name);

        //Set the subject line
        $send->Subject = 'New Lead from Catalogue | Admin ' ;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body


        $send->Body    = '<div style=" width:94%; max-width:800px; margin:0 auto; border:1px solid #efefef;">
      <div style=" width:90%; padding:10px 5%; background:#000; text-align:left;"><img src="https://demo.wockhardt.com/ivas/images/logo.png" style="width: "></div>
      <div style="font-size:13px; color:#000; text-align:left; line-height:20px; background:#fff; width: 90%; padding:5%; font-family:Arial, Helvetica, sans-serif;">
      <h2>Get a Quote</h2>
      <br />
      <table width="100%" border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="300">Name</td>
            <td>'.$sname.'</td>
          </tr>
		  <tr>
            <td width="300">Phone </td>
            <td>'.$phone.'</td>
          </tr>
          <tr>
            <td width="300">Email Id</td>
            <td>'.$email.'</td>
          </tr>
          <tr>
            <td width="300">City</td>
            <td>'.$city.'</td>
          </tr>
          <tr>
            <td width="300">City</td>
            <td>'.$message.'</td>
          </tr>
          
        </tbody>
      </table>

      </div>
      <div style="font-size:10px; color:#fff; text-align:left; line-height:20px; background:#034e8e; width: 90%; padding: 5px 5%; font-family:Arial, Helvetica, sans-serif;">&copy; Ivas. All rights reserved.</div>
      </div>';
					
        //Replace the plain text body with one created manually
        $send->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
		//$mail->addAttachment('../staging/images/Raheja_Brochure.pdf');
		//echo '<pre>';print_r($mail);exit;
        //send the message, check for errors

         if (!$send->send()) {

            //echo "Mailer Error: " . $mail->ErrorInfo;
            $data = array('logged'=>false,'mg'=>'Not sent','othermg'=>"Mailer Error: " . $send->ErrorInfo,'token' => $ntoken);
        } else {
            header("Location:thank-you.php");
			 //$data = array('logged'=>true,'mg'=>'Sent','token' => $ntoken);
        }
        } else {
			echo "Mailer Error: " . $send->ErrorInfo;
		}
        
    }
    catch (Exception $e) {
        $data = array("logged" => false, 'message' => $e,);
    }
	echo '<pre>';print_r($data);exit;
    //echo json_encode($data,true);exit;
	}
}
?>