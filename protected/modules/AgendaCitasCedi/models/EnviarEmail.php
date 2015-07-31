<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::import('application.extensions.phpmailer.JPhpMailer');

class EnviarEmail {
    
    public function enviar(array $from, array $to, $subject, $message){
        
        $mail = new JPhpMailer();
        
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SetFrom($from[0], $from[1]);
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->AddAddress($to[0], $to[1]);
        $mail->Send();
    }
}

?>

