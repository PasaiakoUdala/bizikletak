<?php
/**
 * User: iibarguren
 * Date: 29/04/16
 * Time: 8:42
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * BezeroZigorra controller.
 *
 * @Route("/kudeatu/informeak")
 */
class InformeakController extends Controller
{
    /**
     * @Route("/", name="informe_menua")
     */
    public function indexAction(Request $request)
    {

        return $this->render('informeak/index.html.twig');
    }

    /**
     * @Route("/bizikletak", name="informe_bizikletak")
     */
    public function gunedatuakAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $bizikletak = $em->getRepository('AppBundle:Bizikleta')->findAll();
        $guneak = $em->getRepository('AppBundle:Guneak')->findAll();

        $repo = $this->getDoctrine()->getRepository('AppBundle:Bizikleta');
        $query = $repo->createQueryBuilder('b')
            ->select('b, COUNT(maileguak) AS mailegukop')
            ->innerJoin('b.maileguak','maileguak' )
            ->groupBy('b.id')
            ->orderBy('mailegukop','DESC')->getQuery();
        $bizikop=$query->getResult();

        return $this->render('informeak/bizikletak.html.twig', array(
            'bizikletak' => $bizikletak,
            'guneak' => $guneak,
            'bizikop' => $bizikop
        ));
    }

    /**
     * @Route("/maileguak", name="informe_maileguak")
     */
    public function maileguakAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $repo = $this->getDoctrine()->getRepository('AppBundle:Maileguak');
        $query = $repo->createQueryBuilder('m')
            ->select('m, COUNT(maileguak) AS mailegukop')
            ->groupBy('m.guneahasi and m.guneamaitu')
            ->orderBy('mailegukop','DESC')->getQuery();
        $mailegukop=$query->getResult();

        return $this->render('informeak/maileguak.html.twig', array(
            'mailegukop' => $mailegukop
        ));

    }
}