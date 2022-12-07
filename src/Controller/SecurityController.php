<?php


namespace App\Controller;




use ApiPlatform\Core\Api\IriConverterInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{

    /**
     *@Route("/login",name="app_login", methods={"POST"})
     */
    public function login(Request $request , IriConverterInterface $iriConverter)
    {
        if(!$this->isGranted('IS_AUTHENTICATED_FULLY')){
            return $this->json([
                'error' => 'your request have a bad content type'
            ] , 400);
        }
        return new Response(null,204,[
            'Location' => $iriConverter->getIriFromItem($this->getUser())
        ]);
//        return $this->json([
//            'user' => $this->getUser() ? $this->getUser()->getId():null
//        ]);
    }

    /**
     * @Route("/logout",name="app_logout")
     */
    public function logout(){

    }
}