<?php
namespace App\Models\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    public static function sendRecoveryEmail($to, $token)
    {
        $mail = new PHPMailer(true);

        try {
         
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'merakitcc10@gmail.com'; 
          $mail->Password = 'mjwc jhfp hggu mwxy'; 
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;
  
          $mail->setFrom('merakitcc10@gmail.com', 'Meraki');
          $mail->addAddress($to);
          $mail->Subject = 'Recuperacao de Senha';
          $mail->Body = 'Olá! Bem vindo ao meraki. Você acaba de receber uma solicitação de alteração de senha.
Caso não tenha sido você, apenas ignore.
Clique no link a seguir para redefinir sua senha: http://localhost:8000/login/reset?token=' . $token;
  
          $mail->send();
            return true;
        } catch (Exception $e) {
            throw new \Exception("Erro ao enviar o e-mail de recuperação. Detalhes: " . $mail->ErrorInfo);
        }
    }
}
