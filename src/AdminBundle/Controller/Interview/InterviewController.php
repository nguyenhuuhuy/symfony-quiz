<?php

namespace AdminBundle\Controller\Interview;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use ModelBundle\Entity\Interview;
use ModelBundle\Model\Interview\InterviewGetter;
use ModelBundle\Model\Interview\InterviewGetterWrapper;
use AdminBundle\Form\InterviewType;

/**
 * Interview controller.
 *
 * @Route("/admin/interview")
 */
class InterviewController extends Controller
{
    /**
     * Lists all Interview entities.
     *
     * @Route("/", name="admin_interview")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $wrapper = new InterviewGetterWrapper( new InterviewGetter( $this->getDoctrine()->getManager()) );
        $wrapper->setInput(array('orderBy' => 'ir.id DESC'));
        $wrapper->setupQueryBuilder();

        $pagination = $this->get('knp_paginator')->paginate(
            $wrapper->getObjectGetter()->getQuery(),
            $this->get('request')->query->get('page', 1),
            8
        );
        
        $records = array();
        foreach($pagination as $paging) {
            $records[] = $paging;
        }
        
        return array(
            'pagination' => $pagination,
            'entities'   => $records
        );
    }

    /**
     * Creates a new Interview entity.
     *
     * @Route("/", name="admin_interview_create")
     * @Method("POST")
     * @Template("ModelBundle:Interview:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Interview();
        $form = $this->createInterviewForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('acme_admin_interview_interview_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

        /**
         * Creates a form to create a Interview entity.
         *
         * @param Interview $entity The entity
         *
         * @return \Symfony\Component\Form\Form The form
         */
        private function createInterviewForm(Interview $entity)
        {
            $form = $this->createForm(new InterviewType(), $entity, array(
                'action' => $this->generateUrl('acme_admin_interview_interview_create'),
                'method' => 'POST',
            ));

            $form->add('submit', 'submit', array('attr' => array('class'=>'btn btn-primary'), 'label' => 'Create'));

            return $form;
        }

    /**
     * Displays a form to create a new Interview entity.
     *
     * @Route("/new", name="admin_interview_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Interview();
        $form   = $this->createInterviewForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Interview entity.
     *
     * @Route("/{id}")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:Interview')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Interview entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Interview entity.
     *
     * @Route("/{id}/edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:Interview')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Interview entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

        /**
         * Creates a form to edit a Interview entity.
         * 
         * @param Interview $entity The entity
         * 
         * @return \Symfony\Component\Form\Form The form
         */
        private function createEditForm(Interview $entity)
        {
            $form = $this->createForm(new InterviewType(), $entity, array(
                'action' => $this->generateUrl('acme_admin_interview_interview_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));

            $form->add('submit', 'submit', array('label' => 'Update'));

            return $form;
        }
    
    /**
     * Edits an existing Interview entity.
     *
     * @Route("/{id}")
     * @Method("PUT")
     * @Template("ModelBundle:Interview:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:Interview')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Interview entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('acme_admin_interview_interview_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Deletes a Interview entity.
     *
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ModelBundle:Interview')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Interview entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('acme_admin_interview_interview_index'));
    }

        /**
         * Creates a form to delete a Interview entity by id.
         *
         * @param mixed $id The entity id
         *
         * @return \Symfony\Component\Form\Form The form
         */
        private function createDeleteForm($id)
        {
            return $this->createFormBuilder()
                        ->setAction($this->generateUrl('acme_admin_interview_interview_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete', 'attr'=>array('class'=>'btn btn-danger')))
                        ->getForm()
            ;
        }
}
