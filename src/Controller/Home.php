<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // Importar la clase AbstractController
use Symfony\Component\HttpFoundation\Response; // Importar la clase Response
use Symfony\Component\Routing\Annotation\Route;  // Importar la clase Route
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;// Importar la clase Request



class Home extends AbstractController
{
    #[Route('/home' , name:'home')] // Añadir la ruta de la clase
    public function home(AuthenticationUtils $authenticationUtils): Response
    {
        $saludo = "Hola mengi";
        $correo = $authenticationUtils->getLastUsername();

        return $this->render('home.html.twig', [
            'saludo' => $saludo,
            'correo' => $correo
        ]);
    }
    #[Route('/' , name:'inicio')] // Añadir la ruta de la clase
    public function inicio(): Response
    {
        $saludo = "Hola mengi";

        return $this->render('inicio.html.twig', [
            'saludo' => $saludo,
        ]);
    }
}


?>