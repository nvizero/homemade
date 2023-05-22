<?php

declare(strict_types=1);

namespace App\Service;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Mailtrap\Config;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\EmailHeader\CustomVariableHeader;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Header\UnstructuredHeader;


class MailService 
{
  public function sendMail()
  {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '6f10064f404e99';                   // SMTP username
        $mail->Password = 'e0bce91a21430b';                   // SMTP password
        //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = '';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 2525;                                   // TCP port to connect to
        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('nvizero@yahoo.com.tw', 'Joe User');     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->SMTPOptions = array(
          'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
          )
        );

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
  }

  public function mail2(){


    // your API token from here https://mailtrap.io/api-tokens
    $apiKey = '96a8faae6293c8e763a77fb8a57fcd7b';
    $mailtrap = new MailtrapClient(new Config($apiKey));

    $email = (new Email())
        ->from(new Address('example@your-domain-here.com', 'Mailtrap Test'))
        ->to(new Address('email@example.com', 'Jon'))
        ->cc('mailtrapqa@example.com')
        ->addCc('staging@example.com')
        ->bcc('mailtrapdev@example.com')
        ->subject('Best practices of building HTML emails')
        ->text('Hey! Learn the best practices of building HTML emails and play with ready-to-go templates. Mailtrap’s Guide on How to Build HTML Email is live on our blog')
        ->html(
            '<html>
            <body>
            <p><br>Hey</br>
            Learn the best practices of building HTML emails and play with ready-to-go templates.</p>
            <p><a href="https://mailtrap.io/blog/build-html-email/">Mailtrap’s Guide on How to Build HTML Email</a> is live on our blog</p>
            <img src="cid:logo">
            </body>
        </html>'
        )
        ->embed(fopen('https://mailtrap.io/wp-content/uploads/2021/04/mailtrap-new-logo.svg', 'r'), 'logo', 'image/svg+xml')
        ;
        
        // Headers
        $email->getHeaders()
        ->addTextHeader('X-Message-Source', 'domain.com')
        ->add(new UnstructuredHeader('X-Mailer', 'Mailtrap PHP Client')) // the same as addTextHeader
        ;
        
        // Custom Variables
        $email->getHeaders()
        ->add(new CustomVariableHeader('user_id', '45982'))
        ->add(new CustomVariableHeader('batch_id', 'PSJ-12'))
        ;
        
        // Category (should be only one)
        $email->getHeaders()
        ->add(new CategoryHeader('Integration Test'))
        ;
        
    try {
        $response = $mailtrap->sending()->emails()->send($email); // Email sending API (real)
        
        var_dump(ResponseHelper::toArray($response)); // body (array)
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    // OR send email to the Mailtrap SANDBOX

    try {
        $response = $mailtrap->sandbox()->emails()->send($email, 1000001); // Required second param -> inbox_id

        var_dump(ResponseHelper::toArray($response)); // body (array)
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

  }
}
