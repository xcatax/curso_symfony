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

class HomeController extends AbstractController
{
    /**
     * @Route("/principal", name="home")
     */    
    public function index()
    {           
        $titulos = array();
        for ($i = 1; $i <= 20; $i++){
           array_push($titulos,"Titulo");
        } 
     
        return $this->render('home/index.html.twig', ['titulos' => $titulos]);	           
        
        
    }
    
}
