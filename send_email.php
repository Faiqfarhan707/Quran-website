<?php
    require 'vendor/autoload.php';
    // Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $message = htmlspecialchars($_POST['message']);
        $number = htmlspecialchars($_POST['number']);
        if ($name && $email && $message) {
            $to = "info.equranicwisdom@gmail.com";
            $subject = "Contact Us Inquiry";
            $body = '<!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Contact Us Email</title>
                <style>
                    body {
                        font-family: \'Arial\', sans-serif;
                        background-color: #f0f2f5;
                        margin: 0;
                        padding: 20px;
                    }
                    .container {
                        max-width: 600px;
                        background: #ffffff;
                        padding: 25px;
                        border-radius: 12px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        margin: auto;
                        text-align: center;
                    }
                    .header {
                        font-size: 26px;
                        font-weight: bold;
                        color: #007bff;
                        padding-bottom: 10px;
                        border-bottom: 2px solid #ddd;
                    }
                    .content {
                        font-size: 16px;
                        color: #333;
                        line-height: 1.8;
                        margin-top: 20px;
                        text-align: left;
                    }
                    .footer {
                        margin-top: 20px;
                        font-size: 14px;
                        color: #666;
                        border-top: 2px solid #ddd;
                        padding-top: 10px;
                    }
                    .button {
                        display: inline-block;
                        background-color: #007bff;
                        color: #ffffff;
                        padding: 10px 20px;
                        text-decoration: none;
                        border-radius: 5px;
                        margin-top: 20px;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">📩 Contact Us Inquiry</div>
                    <div class="content">
                        <p><strong>Name:</strong> '.$name.'</p>
                        <p><strong>Email:</strong> '.$email.'</p>
                        <p><strong>Phone Number:</strong> '.$number.'</p>
                        <p><strong>Message:</strong></p>
                        <p>'.$message.'</p>
                    </div>
                    <div class="footer">
                        <p>&copy; 2025 E-Quranic Wisdom. All Rights Reserved.</p>
                    </div>
                </div>
            </body>
            </html>';

            $headers = "From: $email";

            $mail = new PHPMailer(true);

            try {
              // SMTP Configuration
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'send8908@gmail.com'; // Your Gmail
                $mail->Password   = 'kohyskyengtvsnak'; // Use App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // Email Details
                $mail->setFrom('send8908@gmail.com', 'Quranic Wisdom');
                $mail->addAddress($to, 'Quranic Wisdom'); 
               
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $body;

                // Send Email
                if ($mail->send()) {
                    $_SESSION['success'] = "Your message has been sent successfully!";
                    header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect to previous page
                    exit();
                } else {
                    $_SESSION['error'] = "Failed to send the email. Please try again.";
                    header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect to previous page
                    exit();
                }
            } catch (Exception $e) {
                // echo "Message could not be sent! Mailer Error: {$mail->ErrorInfo}";
                $_SESSION['success'] = "Failed to send the email. Please try again.";;
                header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect to previous page
                    exit();
            }

        } else {
            $_SESSION['success'] = "Failed to send the email. Please try again.";;
            header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect to previous page
            exit();
        }
    } else {
        $_SESSION['success'] = "Failed to send the email. Please try again.";;
        header("Location: " . $_SERVER['HTTP_REFERER']); // Redirect to previous page
        exit();
    }



?> 
