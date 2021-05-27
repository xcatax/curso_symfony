<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

/**
* @Route("/home")
* 
*/

class UserController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(): Response
    {
        return $this->render('login.html.twig');
    }


    /**
     * @Route("/validarLogin", name="validate_login")
     */
    public function validarLogin(Request $request)
    {
        $nombre=$request->request->get("nombre");
        $password=$request->request->get("password");

        $em = $this->getDoctrine()->getManager();

        $findNombre = $em->getRepository(User::class)->findByNombre($nombre);
        $findPassword= $em->getRepository(User::class)->findByPassword($password);

        if(!empty($findNombre) && !empty($findPassword)){
            $respuesta = ["mensaje" => 'El usuario ingreso'];
        }else{
            $respuesta = ["mensaje" => 'Las credenciales ingresadas son incorrectas'];
        }
        return $this->render("respuesta.html.twig", $respuesta);
       
      
    }

}