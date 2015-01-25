<?php

namespace Acme\AdminBundle\Controller\Quiz;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\ModelBundle\Entity\QuizTagsRelations;
use Acme\AdminBundle\Form\QuizTagsRelationsType;

/**
 * QuizTagsRelations controller.
 *
 * @Route("/admin/quiz/tags/relations")
 */
class QuizTagsRelationsController extends Controller
{
    /**
     * Lists all QuizTagsRelations entities.
     *
     * @Route("/", name="admin_quiz_tags")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ModelBundle:QuizTagsRelations')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Creates a new QuizTagsRelations entity.
     *
     * @Route("/", name="admin_quiz_tags_create")
     * @Method("POST")
     * @Template("AdminBundle:QuizTagsRelations:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new QuizTagsRelations();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_quiz_tags_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

        /**
         * Creates a form to create a QuizTagsRelations entity.
         *
         * @param QuizTagsRelations $entity The entity
         *
         * @return \Symfony\Component\Form\Form The form
         */
        private function createCreateForm(QuizTagsRelations $entity)
        {
            $form = $this->createForm(new QuizTagsRelationsType(), $entity, array(
                'action' => $this->generateUrl('admin_quiz_tags_create'),
                'method' => 'POST',
            ));

            $form->add('submit', 'submit', array('label' => 'Create'));

            return $form;
        }

    /**
     * Displays a form to create a new QuizTagsRelations entity.
     *
     * @Route("/new", name="admin_quiz_tags_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new QuizTagsRelations();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a QuizTagsRelations entity.
     *
     * @Route("/{id}", name="admin_quiz_tags_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizTagsRelations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizTagsRelations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing QuizTagsRelations entity.
     *
     * @Route("/{id}/edit", name="admin_quiz_tags_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizTagsRelations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizTagsRelations entity.');
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
         * Creates a form to edit a QuizTagsRelations entity.
         * 
         * @param QuizTagsRelations $entity The entity
         * 
         * @return \Symfony\Component\Form\Form The form
         */
        private function createEditForm(QuizTagsRelations $entity)
        {
            $form = $this->createForm(new QuizTagsRelationsType(), $entity, array(
                'action' => $this->generateUrl('admin_quiz_tags_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            ));

            $form->add('submit', 'submit', array('label' => 'Update'));

            return $form;
        }

    /**
     * Edits an existing QuizTagsRelations entity.
     *
     * @Route("/{id}", name="admin_quiz_tags_update")
     * @Method("PUT")
     * @Template("AdminBundle:QuizTagsRelations:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizTagsRelations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizTagsRelations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_quiz_tags_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Deletes a QuizTagsRelations entity.
     *
     * @Route("/{id}", name="admin_quiz_tags_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ModelBundle:QuizTagsRelations')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QuizTagsRelations entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_quiz_tags'));
    }

        /**
         * Creates a form to delete a QuizTagsRelations entity by id.
         *
         * @param mixed $id The entity id
         *
         * @return \Symfony\Component\Form\Form The form
         */
        private function createDeleteForm($id)
        {
            return $this->createFormBuilder()
                ->setAction($this->generateUrl('admin_quiz_tags_delete', array('id' => $id)))
                ->setMethod('DELETE')
                ->add('submit', 'submit', array('label' => 'Delete'))
                ->getForm()
            ;
        }
}
