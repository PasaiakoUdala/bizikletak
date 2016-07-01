<?php

    namespace AppBundle\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use AppBundle\Entity\Maileguak;
    use AppBundle\Form\MaileguakType;
    use Symfony\Component\HttpFoundation\Response;

    /**
     * Maileguak controller.
     *
     * @Route("/kudeatu/maileguak")
     */
    class MaileguakController extends Controller
    {

        /**
         *  Mailegu menua
         *
         * @Route("/", name="maileguak_menu")
         * @Method("GET")
         */
        public function menuAction ()
        {
            return $this->render( 'maileguak/menua.html.twig' );
        }

        /**
         * MAILEGUA HASI
         *
         * @Route("/hasi", name="maileguak_hasi")
         * @Method({"GET", "POST"})
         */
        public function hasiAction ( Request $request )
        {
            $maileguak = new Maileguak();
            $form = $this->createForm( 'AppBundle\Form\MaileguakHasiType', $maileguak );
            $form->handleRequest( $request );

            if ( $form->isSubmitted() && $form->isValid() ) {

                // begiratu ea bezeroak zigorrik duen
                $repo = $this->getDoctrine()->getRepository( 'AppBundle:BezeroZigorra' );
                $query = $repo->createQueryBuilder( 'bz' )
                    ->where( 'bz.bezeroa = :id' )
                    ->andWhere( 'bz.zigorraAmaitu <= :fetxa' )
                    ->setParameter( 'id', $maileguak->getBezeroa()->getId() )
                    ->setParameter( 'fetxa', new \DateTime() )->getQuery();

                $zigorrak = $query->getResult();

                if ( count( $zigorrak ) > 0 ) {
                    // Zigorrak ditu
                    return $this->render(
                        'maileguak/hasi.html.twig',
                        array (
                            'maileguak' => $maileguak,
                            'zigorrak'  => $zigorrak,
                            'form'      => $form->createView(),
                        )
                    );
                } else {
                    $em = $this->getDoctrine()->getManager();
                    $maileguak->setUpdatedAt( new \DateTime() );
                    $maileguak->getBizikleta()->setAlokatua( true );
                    $maileguak->getBizikleta()->setGunea( null );
                    $maileguak->getBezeroa()->setAlokatua( true );
                    $em->persist( $maileguak );
                    $em->flush();

                    return $this->redirectToRoute( 'maileguak_menu' );
                }

            } else {
                $string = (string)$form->getErrors( true, false );
//            dump($form->getErrors(true, false));
            }

            $em = $this->getDoctrine()->getManager();
            $matxurak = $em->getRepository( 'AppBundle:Matxura' )->findAll();

            return $this->render(
                'maileguak/hasi.html.twig',
                array (
                    'maileguak' => $maileguak,
                    'matxurak'  => $matxurak,
                    'form'      => $form->createView(),
                )
            );
        }

        /**
         * MAILEGUA BILATU
         *
         * @Route("/bilatu", name="maileguak_bilatu")
         * @Method({"GET", "POST"})
         */
        public function bilatuAction ( Request $request )
        {
            if ( $request->isMethod( 'POST' ) ) {
                $bezeroa_id = $request->request->get( 'bezeroa_id' );
                $bizikleta_id = $request->request->get( 'bizikleta_id' );
                $em = $this->getDoctrine()->getManager();

                if ( isset($bezeroa_id) ) {
                    $bezeroa = $em->getRepository( 'AppBundle:Bezeroa' )->findOneById( $bezeroa_id );
                }
                if ( isset($bizikleta_id) ) {
                    $bizikleta = $em->getRepository( 'AppBundle:Bizikleta' )->findOneById( $bizikleta_id );
                }

                $repository = $this->getDoctrine()->getRepository( 'AppBundle:Maileguak' );

                if ( !isset($bezeroa_id) and (!isset($bezeroa_id)) or (($bezeroa_id == "") and ($bizikleta_id == "")) ) {
                    // ez bada ezer zehaztu, guztiak aurkeztu
                    $query = $repository->createQueryBuilder( 'm' )
                        ->Where( 'm.fetxa_amaitu is NULL' )
                        ->getQuery();

                } elseif ( !isset($bizikleta) and (!isset($bezeroa)) ) {
                    $request->getSession()
                        ->getFlashBag()
                        ->add( 'notice', 'Ez da aurkitu mailegurik.!' );

                    return $this->render( 'maileguak/bilatu.html.twig' );
                }

                if ( (isset($bizikleta)) and (isset($bezeroa)) ) {
//                bezeroa eta bizikleta pasa dira
                    $query = $repository->createQueryBuilder( 'm' )
                        ->where( 'm.bezeroa = :bezeroa' )
                        ->andWhere( 'm.bizikleta = :bizikleta' )
                        ->andWhere( 'm.fetxa_amaitu is NULL' )
                        ->setParameter( 'bezeroa', $bezeroa )
                        ->setParameter( 'bizikleta', $bizikleta )
                        ->getQuery();
                } elseif ( isset($bizikleta) ) {
                    $query = $repository->createQueryBuilder( 'm' )
                        ->Where( 'm.bizikleta = :bizikleta' )
                        ->andWhere( 'm.fetxa_amaitu is NULL' )
                        ->setParameter( 'bizikleta', $bizikleta )
                        ->getQuery();
                } elseif ( isset($bezeroa) ) {
                    $query = $repository->createQueryBuilder( 'm' )
                        ->where( 'm.bezeroa = :bezeroa' )
                        ->andWhere( 'm.fetxa_amaitu is NULL' )
                        ->setParameter( 'bezeroa', $bezeroa )
                        ->getQuery();
                }

                $maileguak = $query->getResult();

                return $this->render(
                    'maileguak/bilatu.html.twig',
                    array (
                        'maileguak' => $maileguak,
                    )
                );
            } else {
                return $this->render( 'maileguak/bilatu.html.twig' );
            }
        }


        /**
         * @Route("/bezeroautocomplete", name="bezeroak_bilatu")
         */
        public function autocompleteAction ( Request $request )
        {
            $names = array ();
            $term = trim( strip_tags( $request->get( 'term' ) ) );

            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository( 'AppBundle:Bezeroa' )->createQueryBuilder( 'c' )
                ->where( 'c.izena LIKE :izena' )
                ->orWhere( 'c.nan LIKE :nan' )
                ->setParameter( 'izena', '%'.$term.'%' )
                ->setParameter( 'nan', '%'.$term.'%' )
                ->getQuery()
                ->getResult();

            $names = array ();
            foreach ( $entities as $entity ) {
                $names[] = array (
                    'id'    => $entity->getId(),
                    'izena' => $entity->getIzena(),
                );
            }

            $response = new JsonResponse();
            $response->setData( $names );

            return $response;
        }

        /**
         * @Route("/bizikletaautocomplete", name="bizikletak_bilatu")
         */
        public function autocompletebizikletaAction ( Request $request )
        {
            $names = array ();
            $term = trim( strip_tags( $request->get( 'term' ) ) );

            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository( 'AppBundle:Bizikleta' )->createQueryBuilder( 'c' )
                ->where( 'c.bastidorea LIKE :bastidorea' )
                ->orWhere( 'c.erregistroa LIKE :erregistroa' )
                ->orWhere( 'c.kodea LIKE :kodea' )
                ->setParameter( 'bastidorea', '%'.$term.'%' )
                ->setParameter( 'erregistroa', '%'.$term.'%' )
                ->setParameter( 'kodea', '%'.$term.'%' )
                ->getQuery()
                ->getResult();

            $names = array ();
            foreach ( $entities as $entity ) {
                $names[] = array (
                    'id'    => $entity->getId(),
                    'izena' => $entity->getKodea(),
                );
            }

            $response = new JsonResponse();
            $response->setData( $names );

            return $response;
        }


        /**
         * @Route("/setmatxura/{bizikletaid}/{matxuraid}", name="bizikleta_matxura_set")
         */
        public function setBizikletaMatxuraAction ( Request $request, $bizikletaid, $matxuraid )
        {
            try {
                $em = $this->getDoctrine()->getManager();

                $bizikleta = $em->getRepository( 'AppBundle:Bizikleta' )->find( $bizikletaid );
                $matxura = $em->getRepository( 'AppBundle:Matxura' )->find( $matxuraid );

                $bizikleta->addMatxurak( $matxura );

                $em->persist( $bizikleta );
                $em->flush();

                return new JsonResponse(
                    [
                        'success' => true,
                        'data'    => [],
                    ]
                );
            } catch ( \Exception $exception ) {

                return new JsonResponse(
                    [
                        'success' => false,
                        'code'    => $exception->getCode(),
                        'message' => $exception->getMessage(),
                    ]
                );

            }

        }

        /**
         * @Route("/unsetmatxura/{bizikletaid}/{matxuraid}", name="bizikleta_matxura_unset")
         */
        public function unsetBizikletaMatxuraAction ( Request $request, $bizikletaid, $matxuraid )
        {
            try {
                $em = $this->getDoctrine()->getManager();

                $bizikleta = $em->getRepository( 'AppBundle:Bizikleta' )->find( $bizikletaid );
                $matxura = $em->getRepository( 'AppBundle:Matxura' )->find( $matxuraid );

                $bizikleta->removeMatxurak( $matxura );

                $em->persist( $bizikleta );
                $em->flush();

                return new JsonResponse(
                    [
                        'success' => true,
                        'data'    => [],
                    ]
                );
            } catch ( \Exception $exception ) {

                return new JsonResponse(
                    [
                        'success' => false,
                        'code'    => $exception->getCode(),
                        'message' => $exception->getMessage(),
                    ]
                );

            }

        }


        /**
         * MAILEGUA AMAITU
         *
         * @Route("/amaitu", name="maileguak_amaitu")
         * @Method("POST")
         */
        public function amaituAction ( Request $request )
        {
            $em = $this->getDoctrine()->getManager();
            $id = $request->request->get( 'id' );

            if ( !isset($id) ) {
                $request->getSession()
                    ->getFlashBag()
                    ->add( 'notice', 'Pasatako parametroa ez da zuzena.' );
                $this->redirect( $this->generateUrl( "maileguak_bilatu" ) );
            }

            $maileguak = $em->getRepository( 'AppBundle:Maileguak' )->findOneById( $id );
            $form = $this->createForm( 'AppBundle\Form\MaileguakType', $maileguak );
            $form->handleRequest( $request );

            if ( $form->isSubmitted() && $form->isValid() ) {
                $maileguak->setUpdatedAt( new \DateTime() );
                $maileguak->getBizikleta()->setAlokatua( false );
                $maileguak->getBizikleta()->setGunea( $maileguak->getGuneaamaitu() );
                $maileguak->getBezeroa()->setAlokatua( false );
                $em->persist( $maileguak );
                $em->flush();

                return $this->redirectToRoute( 'maileguak_amaitu_ok' );
            } else {
                $string = (string)$form->getErrors( true, false );
//            dump($form->getErrors(true, false));
            }

            return $this->render(
                'maileguak/amaitu.html.twig',
                array (
                    'maileguak' => $maileguak,
                    'form'      => $form->createView(),
                )
            );
        }


        /**
         * Lists all Maileguak entities.
         *
         * @Route("/amaiera", name="maileguak_amaitu_ok")
         * @Method("GET")
         */
        public function okAction ()
        {
            return $this->render( 'maileguak/ok.html.twig' );
        }


        /**
         * Lists all Maileguak entities.
         *
         * @Route("/", name="maileguak_index")
         * @Method("GET")
         */
        public function indexAction ()
        {
            $em = $this->getDoctrine()->getManager();

            $maileguaks = $em->getRepository( 'AppBundle:Maileguak' )->findAll();

            return $this->render(
                'maileguak/index.html.twig',
                array (
                    'maileguaks' => $maileguaks,
                )
            );
        }

        /**
         * Creates a new Maileguak entity.
         *
         * @Route("/new", name="maileguak_new")
         * @Method({"GET", "POST"})
         */
        public function newAction ( Request $request )
        {
            $maileguak = new Maileguak();
            $form = $this->createForm( 'AppBundle\Form\MaileguakType', $maileguak );
            $form->handleRequest( $request );

            if ( $form->isSubmitted() && $form->isValid() ) {
                $em = $this->getDoctrine()->getManager();
                $em->persist( $maileguak );
                $em->flush();

                return $this->redirectToRoute( 'maileguak_show', array ('id' => $maileguak->getId()) );
            }

            return $this->render(
                'maileguak/new.html.twig',
                array (
                    'maileguak' => $maileguak,
                    'form'      => $form->createView(),
                )
            );
        }

        /**
         * Finds and displays a Maileguak entity.
         *
         * @Route("/{id}", name="maileguak_show")
         * @Method("GET")
         */
        public function showAction ( Maileguak $maileguak )
        {
            $deleteForm = $this->createDeleteForm( $maileguak );

            return $this->render(
                'maileguak/show.html.twig',
                array (
                    'maileguak'   => $maileguak,
                    'delete_form' => $deleteForm->createView(),
                )
            );
        }

        /**
         * Displays a form to edit an existing Maileguak entity.
         *
         * @Route("/{id}/edit", name="maileguak_edit")
         * @Method({"GET", "POST"})
         */
        public function editAction ( Request $request, Maileguak $maileguak )
        {
            $deleteForm = $this->createDeleteForm( $maileguak );
            $editForm = $this->createForm( 'AppBundle\Form\MaileguakType', $maileguak );
            $editForm->handleRequest( $request );

            if ( $editForm->isSubmitted() && $editForm->isValid() ) {
                $em = $this->getDoctrine()->getManager();
                $em->persist( $maileguak );
                $em->flush();

                return $this->redirectToRoute( 'maileguak_edit', array ('id' => $maileguak->getId()) );
            }

            return $this->render(
                'maileguak/edit.html.twig',
                array (
                    'maileguak'   => $maileguak,
                    'edit_form'   => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                )
            );
        }

        /**
         * Deletes a Maileguak entity.
         *
         * @Route("/{id}", name="maileguak_delete")
         * @Method("DELETE")
         */
        public function deleteAction ( Request $request, Maileguak $maileguak )
        {
            $form = $this->createDeleteForm( $maileguak );
            $form->handleRequest( $request );

            if ( $form->isSubmitted() && $form->isValid() ) {
                $em = $this->getDoctrine()->getManager();
                $em->remove( $maileguak );
                $em->flush();
            }

            return $this->redirectToRoute( 'maileguak_index' );
        }

        /**
         * Creates a form to delete a Maileguak entity.
         *
         * @param Maileguak $maileguak The Maileguak entity
         *
         * @return \Symfony\Component\Form\Form The form
         */
        private function createDeleteForm ( Maileguak $maileguak )
        {
            return $this->createFormBuilder()
                ->setAction( $this->generateUrl( 'maileguak_delete', array ('id' => $maileguak->getId()) ) )
                ->setMethod( 'DELETE' )
                ->getForm();
        }
    }
