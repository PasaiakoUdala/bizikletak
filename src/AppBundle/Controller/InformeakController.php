<?php
/**
 * User: iibarguren
 * Date: 29/04/16
 * Time: 8:42
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Maileguak;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

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
     * @Route("/zerrenda/bizikletak", name="zerrenda_bizikletak")
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
     * @Route("/zerrenda/matxurak", name="zerrenda_matxurak")
     */
    public function matxurakAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $repo = $this->getDoctrine()->getRepository('AppBundle:Bizikleta');
        $query = $repo->createQueryBuilder('b')
            ->innerJoin('b.matxurak','matxurak' )->getQuery();

        $bizikletak=$query->getResult();

        return $this->render('informeak/matxurak.html.twig', array(
            'bizikletak' => $bizikletak
        ));
    }

    /**
     * @Route("/zerrenda/maileguak", name="informe_maileguak")
     */
    public function maileguakAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $guneak = $em->getRepository('AppBundle:Guneak')->findAll();

        $maileguak = new Maileguak();
        $form = $this->createForm(
            'AppBundle\Form\MaileguakFindType',
            $maileguak, array(
            'action' => $this->generateUrl('informe_maileguak'),
            'method' => 'POST',
        ));


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            /** @var  $query \Doctrine\DBAL\Query\QueryBuilder */
            $query = $em->createQuery("
                SELECT m
                  FROM AppBundle:Maileguak m
            ");


            foreach ($data as $key => $value ) {

                $query ->andWhere($query->expr()->eq('i.'.$field, ':i_'.$field))
                    ->setParameter('i_'.$field, $value);
            }

            //dump($query->getSQL());
            $maileguak = $query->getResult();
        } else {
            /** @var  $query \Doctrine\DBAL\Query\QueryBuilder */
            $query = $em->createQuery("
                SELECT m
                  FROM AppBundle:Maileguak m
            ");

            $maileguak = $query->getResult();

        }


        return $this->render('informeak/maileguak.html.twig', array(
            'maileguak' => $maileguak,
            'guneak'    => $guneak,
            'form'      => $form->createView()
        ));

    }

    /**
     * @Route("/zerrenda/bazkideak", name="informe_bezeroak")
     */
    public function bezeroakAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $bezeroak = $em->getRepository('AppBundle:Bezeroa')->findAll();
        //dump($bezeroak);
        return $this->render('informeak/bezeroak.html.twig', array(
            'bezeroak' => $bezeroak
        ));

    }
}