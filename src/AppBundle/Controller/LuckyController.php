<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {   
        $session = $this->get('session');
        $number = mt_rand(0, 100);

        $session->set('intentos', $session->get('intentos') + 1);
        if($session->get('intentos') % 3 == 0){
            $this->get('session')->getFlashBag()->add(
            'decenaIntentos',
            'Has efectuado ' . $session->get('intentos') . ' intentos!!'
        );
        }
        
        return $this->render('lucky/number.html.twig', array(
            'number' => $number
        ));
    }
}