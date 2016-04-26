<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Maileguak;
use AppBundle\Form\MaileguakType;

/**
 * Maileguak controller.
 *
 * @Route("/maileguak")
 */
class MaileguakController extends Controller
{

    /**
     *  Mailegu menua
     * 
     * @Route("/", name="maileguak_menu")
     * @Method("GET")     *
     */
    public function menuAction()
    {
        return $this->render('maileguak/menua.html.twig');
    }
    
    /**
     * Lists all Maileguak entities.
     *
     * @Route("/zerrenda", name="maileguak_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $maileguaks = $em->getRepository('AppBundle:Maileguak')->findAll();

        return $this->render('maileguak/index.html.twig', array(
            'maileguaks' => $maileguaks,
        ));
    }

    /**
     * Creates a new Maileguak entity.
     *
     * @Route("/new", name="maileguak_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $maileguak = new Maileguak();
        $form = $this->createForm('AppBundle\Form\MaileguakType', $maileguak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($maileguak);
            $em->flush();

            return $this->redirectToRoute('maileguak_show', array('id' => $maileguak->getId()));
        }

        return $this->render('maileguak/new.html.twig', array(
            'maileguak' => $maileguak,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Maileguak entity.
     *
     * @Route("/{id}", name="maileguak_show")
     * @Method("GET")
     */
    public function showAction(Maileguak $maileguak)
    {
        $deleteForm = $this->createDeleteForm($maileguak);

        return $this->render('maileguak/show.html.twig', array(
            'maileguak' => $maileguak,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Maileguak entity.
     *
     * @Route("/{id}/edit", name="maileguak_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Maileguak $maileguak)
    {
        $deleteForm = $this->createDeleteForm($maileguak);
        $editForm = $this->createForm('AppBundle\Form\MaileguakType', $maileguak);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($maileguak);
            $em->flush();

            return $this->redirectToRoute('maileguak_edit', array('id' => $maileguak->getId()));
        }

        return $this->render('maileguak/edit.html.twig', array(
            'maileguak' => $maileguak,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Maileguak entity.
     *
     * @Route("/{id}", name="maileguak_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Maileguak $maileguak)
    {
        $form = $this->createDeleteForm($maileguak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($maileguak);
            $em->flush();
        }

        return $this->redirectToRoute('maileguak_index');
    }

    /**
     * Creates a form to delete a Maileguak entity.
     *
     * @param Maileguak $maileguak The Maileguak entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Maileguak $maileguak)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('maileguak_delete', array('id' => $maileguak->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
