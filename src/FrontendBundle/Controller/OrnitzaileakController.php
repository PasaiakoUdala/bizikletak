<?php

namespace FrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FrontendBundle\Entity\Ornitzaileak;
use FrontendBundle\Form\OrnitzaileakType;

/**
 * Ornitzaileak controller.
 *
 * @Route("/ornitzaileak")
 */
class OrnitzaileakController extends Controller
{
    /**
     * Lists all Ornitzaileak entities.
     *
     * @Route("/", name="ornitzaileak_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ornitzaileaks = $em->getRepository('FrontendBundle:Ornitzaileak')->findAll();

        return $this->render('ornitzaileak/index.html.twig', array(
            'ornitzaileaks' => $ornitzaileaks,
        ));
    }

    /**
     * Creates a new Ornitzaileak entity.
     *
     * @Route("/new", name="ornitzaileak_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ornitzaileak = new Ornitzaileak();
        $form = $this->createForm('FrontendBundle\Form\OrnitzaileakType', $ornitzaileak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ornitzaileak);
            $em->flush();

            return $this->redirectToRoute('ornitzaileak_show', array('id' => $ornitzaileak->getId()));
        }

        return $this->render('ornitzaileak/new.html.twig', array(
            'ornitzaileak' => $ornitzaileak,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Ornitzaileak entity.
     *
     * @Route("/{id}", name="ornitzaileak_show")
     * @Method("GET")
     */
    public function showAction(Ornitzaileak $ornitzaileak)
    {
        $deleteForm = $this->createDeleteForm($ornitzaileak);

        return $this->render('ornitzaileak/show.html.twig', array(
            'ornitzaileak' => $ornitzaileak,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Ornitzaileak entity.
     *
     * @Route("/{id}/edit", name="ornitzaileak_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ornitzaileak $ornitzaileak)
    {
        $deleteForm = $this->createDeleteForm($ornitzaileak);
        $editForm = $this->createForm('FrontendBundle\Form\OrnitzaileakType', $ornitzaileak);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ornitzaileak);
            $em->flush();

            return $this->redirectToRoute('ornitzaileak_edit', array('id' => $ornitzaileak->getId()));
        }

        return $this->render('ornitzaileak/edit.html.twig', array(
            'ornitzaileak' => $ornitzaileak,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ornitzaileak entity.
     *
     * @Route("/{id}", name="ornitzaileak_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ornitzaileak $ornitzaileak)
    {
        $form = $this->createDeleteForm($ornitzaileak);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ornitzaileak);
            $em->flush();
        }

        return $this->redirectToRoute('ornitzaileak_index');
    }

    /**
     * Creates a form to delete a Ornitzaileak entity.
     *
     * @param Ornitzaileak $ornitzaileak The Ornitzaileak entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ornitzaileak $ornitzaileak)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ornitzaileak_delete', array('id' => $ornitzaileak->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
