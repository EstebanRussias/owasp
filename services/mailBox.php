<?php
   function fakeMailSend($to, $subject, $content, $filePath = "./public/mails/")
   {
       if (!file_exists($filePath)) {
           mkdir($filePath, 0755, true);
       }
   
       $dateTime = (new DateTime())->format('d/m/Y H:i:s');
       $fileName = 'mailbox.txt';
   
       $emailContent  = "----------" . PHP_EOL;
       $emailContent .= "At: $dateTime" . PHP_EOL;
       $emailContent .= "To: $to" . PHP_EOL;
       $emailContent .= "Subject: $subject" . PHP_EOL;
       $emailContent .= "Content: $content" . PHP_EOL;
   
       if (file_put_contents($filePath . $fileName, $emailContent, FILE_APPEND) === false) {
           // FIXME: error handling
           return false;
       }
   
       return true;
   }
?>