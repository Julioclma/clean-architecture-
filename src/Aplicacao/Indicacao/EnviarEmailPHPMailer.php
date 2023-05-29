<?php

namespace Clean\Arquitetura\Aplicacao\Indicacao;

use Clean\Arquitetura\Dominio\Aluno\Aluno;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EnviarEmailPHPMailer implements EnviaEmailDeIndicacao
{
    private Aluno $alunoIndicado;
    public function __construct(Aluno $alunoIndicado)
    {
        $this->alunoIndicado = $alunoIndicado;
    }

    public function send(): bool
    {
        //Server settings
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'your-email';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'example.com';                     //SMTP username
        $mail->Password   = 'secret';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('your-email', 'Mailer');
        $mail->addAddress($this->to(), $this->subject());     //Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Body    = $this->message();
        return $mail->send();
    }

    public function to(): string
    {
        return $this->alunoIndicado->email();
    }

    public function subject(): string
    {
        return   $this->alunoIndicado->cpf();
    }

    public function message(): string
    {
        return "aluno indicado!";
    }
}
