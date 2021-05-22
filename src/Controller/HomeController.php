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
    /**
     * @Route("/principal", name="home")
     */

    public function newUser(Request $request){

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User("Catalina","12345");
       
        // tell Doctrine you want to (eventually) save the User (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return new Response('Saved new product with id '.$user->getId());
    }
}
