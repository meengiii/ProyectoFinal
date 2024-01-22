<?php
    // src/Controller/MailerController.php
    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Mailer\MailerInterface;
    use Symfony\Component\Mime\Email;
    use Symfony\Component\Routing\Annotation\Route;

    class MailerController extends AbstractController
    {
        #[Route('/enviarCorreo', name: 'enviarCorreo')]
        public function enviarCorreo(MailerInterface $mailer): Response
        {
            $email = (new Email())
                ->from('hello@example.com')
                ->to('mengiibaar@gmail.com')
                ->subject('¡Hora para Symfony Mailer!')
                ->text('¡Enviar correos es divertido de nuevo!')
                ->html('<p>Hola esto es un correo de prueba!</p>');

            $mailer->send($email);

            return new Response('Correo enviado!');
        }
    }