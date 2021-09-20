<?php
    require 'vendor/autoload.php'; 
//static means different way to call our class from somewhere else
    class sendEmail{

        public static function SendMail($to,$subject,$content){
            $key = '';
            //set email object
            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("nikourn@gmail.com", "Nikolaos Kourniotis");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);
            
            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception caught: ' . $e->getMessage() . "/n";
                return false;
            }
        }


    }

?>