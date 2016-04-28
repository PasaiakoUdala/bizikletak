<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\BezeroZigorra;
use AppBundle\Form\BezeroZigorraType;

/**
 * BezeroZigorra controller.
 *
 * @Route("/kudeatu/bezerozigorra")
 */
class BezeroZigorraController extends Controller
{
    /**
     * Lists all BezeroZigorra entities.
     *
     * @Route("/", name="kudeatu_bezerozigorra_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bezeroZigorras = $em->getRepository('AppBundle:BezeroZigorra')->findAll();

        return $this->render('bezerozigorra/index.html.twig', array(
            'bezeroZigorras' => $bezeroZigorras,
        ));
    }

    /**
     * Creates a new BezeroZigorra entity.
     *
     * @Route("/new", name="kudeatu_bezerozigorra_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bezeroZigorra = new BezeroZigorra();
        $form = $this->createForm('AppBundle\Form\BezeroZigorraType', $bezeroZigorra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bezeroZigorra);
            $em->flush();

            return $this->redirectToRoute('kudeatu_bezerozigorra_index');
        }

        return $this->render('bezerozigorra/new.html.twig', array(
            'bezeroZigorra' => $bezeroZigorra,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BezeroZigorra entity.
     *
     * @Route("/{id}", name="kudeatu_bezerozigorra_show")
     * @Method("GET")
     */
    public function showAction(BezeroZigorra $bezeroZigorra)
    {
        $deleteForm = $this->createDeleteForm($bezeroZigorra);

        return $this->render('bezerozigorra/show.html.twig', array(
            'bezeroZigorra' => $bezeroZigorra,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing BezeroZigorra entity.
     *
     * @Route("/{id}/edit", name="kudeatu_bezerozigorra_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BezeroZigorra $bezeroZigorra)
    {
        $deleteForm = $this->createDeleteForm($bezeroZigorra);
        $editForm = $this->createForm('AppBundle\Form\BezeroZigorraType', $bezeroZigorra);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bezeroZigorra);
            $em->flush();

            return $this->redirectToRoute('kudeatu_bezerozigorra_edit', array('id' => $bezeroZigorra->getId()));
        }

        return $this->render('bezerozigorra/edit.html.twig', array(
            'bezeroZigorra' => $bezeroZigorra,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BezeroZigorra entity.
     *
     * @Route("/{id}", name="kudeatu_bezerozigorra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BezeroZigorra $bezeroZigorra)
    {
        $form = $this->createDeleteForm($bezeroZigorra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bezeroZigorra);
            $em->flush();
        }

        return $this->redirectToRoute('kudeatu_bezerozigorra_index');
    }

    /**
     * Creates a form to delete a BezeroZigorra entity.
     *
     * @param BezeroZigorra $bezeroZigorra The BezeroZigorra entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BezeroZigorra $bezeroZigorra)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('kudeatu_bezerozigorra_delete', array('id' => $bezeroZigorra->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
