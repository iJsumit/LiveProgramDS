<?php
session_start();
include_once '../aidm/conn.php';

$fullname = $_POST['fname'] . ' ' . $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$smonth = $_POST['month'];
$url   = $_POST['back_url'];
// Set session values
$_SESSION['custom_firstname'] = $fname;
$_SESSION['custom_lastname'] = $lname;
$_SESSION['custom_email'] = $email;
$_SESSION['custom_phone'] = $phone;
setcookie("checkout_first_name", $fname, time() + 600, "/");
setcookie("checkout_last_name", $lname, time() + 600, "/");
setcookie("checkout_email", $email, time() + 600, "/");
setcookie("checkout_phone", $phone, time() + 600, "/");
$mx_utm_source = $_POST['mx_utm_source'];
$mx_utm_medium = $_POST['mx_utm_medium'];
$mx_utm_campaign = $_POST['mx_utm_campaign'];
$mx_utm_term = $_POST['mx_utm_term'];
$mx_utm_content = $_POST['mx_utm_content'];

$result1 =  mysqli_query($conn, "INSERT INTO `wp_ai_digital` (`fname`,`lname`, `email`, `phone`) 
VALUES ('$fname','$lname','$email','$phone')") or die(mysqli_error($conn));

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=u$r12655856dd0e79352834b4c9f0d22c35&secretKey=a8e09685f4f7313da323cd56f1604e6a26832757',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '[
{
"Attribute": "FirstName",
"Value": "' . $fname . '"
},
{
"Attribute": "LastName",
"Value": "' . $lname . '"
},
{
"Attribute": "EmailAddress",
"Value": "' . $email . '"
},
{
"Attribute": "Phone",
"Value": "' . $phone . '"
},
{
"Attribute": "Source",
"Value": "Power BI HTML"
},
{
"Attribute": "mx_Course",
"Value": "Power BI"
},
{
"Attribute": "mx_utm_source",
"Value": "' . $mx_utm_source . '"
},
{
"Attribute": "mx_utm_medium",
"Value": "' . $mx_utm_medium . '"
},
{
"Attribute": "mx_utm_campaign",
"Value": "' . $mx_utm_campaign . '"
},
{
"Attribute": "mx_utm_term",
"Value": "' . $mx_utm_term . '"
},
{
"Attribute": "mx_utm_content",
"Value": "' . $mx_utm_content . '"
}
]',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));
$response = curl_exec($curl);
$htt = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//echo $htt;
curl_close($curl);
//var_dump($response);
//exit();
$adate = date("Y-m-d H:i:s");
$result =  mysqli_query($conn, "INSERT INTO wp_levelup (name,email, phone,age,datetime) values ('$fullname','$email','$phone','Live Power bi','$adate')") or die(mysqli_error($conn));

if ($result) {
    $message = 'Hi, We have got a new lead for PowerBI.';
    include '../telegram/index.php';
    echo "<script>window.location='https://www.ijaipuria.com/checkout/?add-to-cart=90020';</script>";
    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    //user mail


    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'support@ijaipuria.com';                 // SMTP username
    $mail->Password = 'iJ@!PuR!@2@23#';                           // SMTP password                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('support@ijaipuria.com', 'Ijaipuria');
    $mail->addAddress($email);     // Add a recipient


    $mail->Subject = 'iJaipuria - AI-Digital Marketing';
    $mail->Body    = '
<body style="width: 100%;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;padding: 0;margin: 0;">
<div class="es-wrapper-color" style="    background-color: #563678;">
<!--[if gte mso 9]>
<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
<v:fill type="tile" color="#eeeeee"></v:fill>
</v:background>
<![endif]-->
<table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;padding: 0;margin: 0;width: 100%;height: 100%;background-image: ;background-repeat: repeat;background-position: center top;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-email-paddings" valign="top" style="padding: 0;margin: 0;">

<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:20px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;width: 100%;table-layout: fixed !important;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-stripe" align="center" style="padding: 0;margin: 0;">
<table class="es-content-body" width="700" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;background-color: #ffffff;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-structure es-p40t es-p35b es-p35r es-p35l" esd-custom-block-id="7685" style="background-color:#fff;padding: 0;margin: 0;padding-bottom: 35px;padding-left: 35px;padding-right: 35px;padding-top: 40px;" bgcolor="#f7f7f7" align="left">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-container-frame" width="530" valign="top" align="center" style="padding: 0;margin: 0;">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-block-text" align="right" style="padding: 0;margin: 0;">
<p style="margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-size: 14px;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;color: #ffffff;"><a style="-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;font-size: 14px;text-decoration: none;color: #ffffff;">
<img src="https://www.ijaipuria.com/wp-content/uploads/2018/10/ijaipuria-beta.png" style="width: 200px;display: block;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a></p>
</td>
</tr>

<tr style="border-collapse: collapse;">
<td class="esd-block-text es-m-txt-l es-p20t" align="left" style="padding: 0;margin: 0;padding-top: 20px;">
<h3 style="font-size: 16px;margin: 0;line-height: 120%;mso-line-height-rule: exactly;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;font-style: normal;font-weight: bold;color: #333333;">Hi&nbsp;' . $fullname . ',
<br></h3>
</td>
</tr>
<tr style="border-collapse: collapse;">
<td class="esd-block-text es-p15t es-p10b" align="left" style="padding: 0;margin: 0;padding-bottom: 14px;padding-top: 15px;">
<p style="font-size: 15px;color: #777777;margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;">Thanks for Enrolling iJaipuria - AI-Powered Ultimate Digital Marketing Programme<br><br>
Here your submission details<br><br>
<b>Name : </b>  ' . $fullname . '<br>
<b>Email : </b>  ' . $email . '<br>
<b>Phone Number : </b>  ' . $phone . '<br>
<b>Location : </b>  ' . $location . '<br>
<b>Age : </b>  ' . $age . '<br>

</p>
</td>
</tr>

<tr style="border-collapse: collapse;">
<td class="esd-block-button es-p25t es-p20b es-p10r es-p10l" align="left" style="font-size:14px;padding: 0;margin: 0;padding-left: 10px;padding-right: 10px;padding-bottom: 20px;padding-top: 25px;">Thank You</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

</tbody>
</table>
</td>
</tr>
<tr style="border-collapse: collapse;">
<td class="esd-stripe" esd-custom-block-id="7684" align="center" style="padding: 0;margin: 0;    background: #563678;">
<table class="es-footer-body" width="700" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;background-color: #ffffff;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-structure es-p35t es-p40b es-p35r es-p35l" align="left" style="    background: #563678;padding: 0;margin: 0;padding-top: 35px;padding-left: 35px;padding-right: 35px;padding-bottom: 40px;">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-container-frame" width="530" valign="top" align="center" style="padding: 0;margin: 0;">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>

<tr style="border-collapse: collapse;">
<td class="esd-block-text es-p35b" align="center" style="padding: 0;margin: 0;padding-bottom: 35px;">
<p style="margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-size: 14px;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;color: #333333;"><strong style="color: #bfb7b7;">Copyright 2018 © Copyright – Jaipuria educational services LLP. All Rights Reserved.</strong></p>
<p style="margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-size: 14px;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;color: #333333;"><strong ><a href="https://www.ijaipuria.com/#" target="_blank" style="color: #f59a00;">Privacy Policy</a> <span style="color:#fff">| </span><a href="https://www.ijaipuria.com/legal-disclaimer/" target="_blank" style="color: #f59a00;">Disclaimer</a> <span style="color:#fff">| </span> <a href="https://www.ijaipuria.com/#" target="_blank" style="color: #f59a00;">Refund Policy</a></strong></p>

</td>
</tr>

</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>



</td>
</tr>
</tbody>
</table>

</div>

</body>
';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();


    //admin mail
    $maill = new PHPMailer;
    $maill->isSMTP();                                      // Set mailer to use SMTP
    $maill->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $maill->SMTPAuth = true;                               // Enable SMTP authentication
    $maill->Username = 'support@ijaipuria.com';                 // SMTP username
    $maill->Password = 'iJ@!PuR!@2@23#';                           // SMTP password                          // SMTP password
    $maill->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $maill->Port = 587;                                    // TCP port to connect to

    $maill->setFrom('support@ijaipuria.com', 'Ijaipuria');
    $maill->addAddress('support@ijaipuria.com');
    $maill->addAddress('surender.chaudhary@gmail.com');
    //$maill->addCC('contact@ijaipuria.com');


    $maill->Subject = 'iJaipuria - AI-Powered Ultimate Digital Marketing Programme';
    $maill->Body    = '
<body style="width: 100%;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;padding: 0;margin: 0;">
<div class="es-wrapper-color" style="    background-color: #563678;">
<!--[if gte mso 9]>
<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
<v:fill type="tile" color="#eeeeee"></v:fill>
</v:background>
<![endif]-->
<table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;padding: 0;margin: 0;width: 100%;height: 100%;background-image: ;background-repeat: repeat;background-position: center top;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-email-paddings" valign="top" style="padding: 0;margin: 0;">

<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="margin-bottom:20px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;width: 100%;table-layout: fixed !important;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-stripe" align="center" style="padding: 0;margin: 0;">
<table class="es-content-body" width="700" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;background-color: #ffffff;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-structure es-p40t es-p35b es-p35r es-p35l" esd-custom-block-id="7685" style="background-color:#fff;padding: 0;margin: 0;padding-bottom: 35px;padding-left: 35px;padding-right: 35px;padding-top: 40px;" bgcolor="#f7f7f7" align="left">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-container-frame" width="530" valign="top" align="center" style="padding: 0;margin: 0;">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-block-text" align="right" style="padding: 0;margin: 0;">
<p style="margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-size: 14px;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;color: #ffffff;"><a style="-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;font-size: 14px;text-decoration: none;color: #ffffff;">
<img src="https://www.ijaipuria.com/wp-content/uploads/2018/10/ijaipuria-beta.png" style="width: 200px;display: block;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a></p>
</td>
</tr>

<tr style="border-collapse: collapse;">
<td class="esd-block-text es-m-txt-l es-p20t" align="left" style="padding: 0;margin: 0;padding-top: 20px;">
<h3 style="font-size: 16px;margin: 0;line-height: 120%;mso-line-height-rule: exactly;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;font-style: normal;font-weight: bold;color: #333333;">Hello&nbsp;Admin,
<br></h3>
</td>
</tr>
<tr style="border-collapse: collapse;">
<td class="esd-block-text es-p15t es-p10b" align="left" style="padding: 0;margin: 0;padding-bottom: 14px;padding-top: 15px;">
<p style="font-size: 15px;color: #777777;margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;">iJaipuria - AI-Powered Ultimate Digital Marketing Programme<br><br>
<b>Name : </b>  ' . $fullname . '<br>
<b>Email : </b>  ' . $email . '<br>
<b>Phone Number : </b>  ' . $phone . '<br>
<b>Location : </b>  ' . $location . '<br>
<b>Age : </b>  ' . $age . '<br>

</p>
</td>
</tr>

<tr style="border-collapse: collapse;">
<td class="esd-block-button es-p25t es-p20b es-p10r es-p10l" align="left" style="font-size:14px;padding: 0;margin: 0;padding-left: 10px;padding-right: 10px;padding-bottom: 20px;padding-top: 25px;">Thank You</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>

</tbody>
</table>
</td>
</tr>
<tr style="border-collapse: collapse;">
<td class="esd-stripe" esd-custom-block-id="7684" align="center" style="padding: 0;margin: 0;    background: #563678;">
<table class="es-footer-body" width="700" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;background-color: #ffffff;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-structure es-p35t es-p40b es-p35r es-p35l" align="left" style="    background: #563678;padding: 0;margin: 0;padding-top: 35px;padding-left: 35px;padding-right: 35px;padding-bottom: 40px;">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>
<tr style="border-collapse: collapse;">
<td class="esd-container-frame" width="530" valign="top" align="center" style="padding: 0;margin: 0;">
<table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;border-collapse: collapse;border-spacing: 0px;">
<tbody>

<tr style="border-collapse: collapse;">
<td class="esd-block-text es-p35b" align="center" style="padding: 0;margin: 0;padding-bottom: 35px;">
<p style="margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-size: 14px;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;color: #333333;"><strong style="color: #bfb7b7;">Copyright 2018 © Copyright – Jaipuria educational services LLP. All Rights Reserved.</strong></p>
<p style="margin: 0;-webkit-text-size-adjust: none;-ms-text-size-adjust: none;mso-line-height-rule: exactly;font-size: 14px;font-family: open sans, helvetica neue, helvetica, arial, sans-serif;line-height: 150%;color: #333333;"><strong ><a href="https://www.ijaipuria.com/#" target="_blank" style="color: #f59a00;">Privacy Policy</a> <span style="color:#fff">| </span><a href="https://www.ijaipuria.com/legal-disclaimer/" target="_blank" style="color: #f59a00;">Disclaimer</a> <span style="color:#fff">| </span> <a href="https://www.ijaipuria.com/#" target="_blank" style="color: #f59a00;">Refund Policy</a></strong></p>

</td>
</tr>

</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>



</td>
</tr>
</tbody>
</table>

</div>

</body>
';
    $maill->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $maill->send();
} else {
    echo "<p class='Error'>Problem in Sending Mail.</p>";
}
