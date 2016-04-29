<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bezeroa;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

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

    /**
     * @Route("/bezerodatuak/{id}", name="bezerodatuak")
     */
    public function bezerodatuakAction($id) {
        $em = $this->getDoctrine()->getManager();

        $repo = $this->getDoctrine()->getRepository('AppBundle:BezeroZigorra');
        $query = $repo->createQueryBuilder('bz')
                        ->where('bz.bezeroa = :id')
                        ->andWhere('bz.zigorraAmaitu <= :fetxa')
                        ->setParameter('id', $id)
                        ->setParameter('fetxa', new \DateTime() )->getQuery();

        $zigorrak=$query->getResult();

        $loc = array();

        foreach ($zigorrak as $z) {

            $l = array (
                'izena' => $z->getBezeroa()->getIzena(),
                'zigorraHasi' => $z->getZigorraHasi(),
                'zigorraAmaitu' => $z->getZigorraAmaitu()
            );

            array_push($loc, $l );

        }
        
           
        $response = new Response();
        $response->setContent(json_encode($loc));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
