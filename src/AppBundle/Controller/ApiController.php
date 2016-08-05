<?php
    /**
     * User: iibarguren
     * Date: 4/08/16
     * Time: 9:43
     */

    namespace AppBundle\Controller;

    use AppBundle\Entity\Bezeroa;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Response;

    /**
     *
     * @Route("/api")
     */
    class ApiController extends Controller
    {

        /**
         *
         * @Route("/bezeroa/iraungia", options={"expose"=true}, name="api_bezero_iraungia")
         * @Method("POST")
         * @param Request $request
         * @return JsonResponse
         */
        public function checkBezeroIraungia(Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $id = $request->get('id');

            $bezeroa = $em->getRepository( 'AppBundle:Bezeroa' )->findOneById( $id );

            // null bada ez dago iraungia
            if ( $bezeroa->getIraungitze() == null ) {
                $response = new JsonResponse();
                $response->setData(array(
                    'data' => 0
                ));
            } else {
                $gaur = new \DateTime();
                $iraungi = $bezeroa->getIraungitze();

                if ( $gaur > $iraungi ) {
                    $response = new JsonResponse();
                    $response->setData(array(
                        'data' => 0
                    ));
                } else {
                    $response = new JsonResponse();
                    $response->setData(array(
                        'data' => 1
                    ));
                }
            }

            return $response;
        }
    }