<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $guneak = $em->getRepository('AppBundle:Guneak')->findAll();

        return $this->render('default/index.html.twig', array('guneak' => $guneak));
    }

    /**
     * @Route("/gunedatuak", name="gunedatuak")
     */
    public function gunedatuakAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $guneak = $em->getRepository('AppBundle:Guneak')->findAll();

        $loc = array();

        foreach ($guneak as $g) {

            $l = array (
                'lat' => $g->getLatitude(),
                'lon' => $g->getLongitude(),
                'title' => $g->getIzena(),
                'html' => "<h3>Ordutegia<//h3><p>" . $g->getOrdutegia() . "<//p>"
            );

            array_push($loc, $l );

        }


        $response = new Response();
        $response->setContent(json_encode($loc));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
