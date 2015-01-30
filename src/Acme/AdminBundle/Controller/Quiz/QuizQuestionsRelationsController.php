<?php

namespace Acme\AdminBundle\Controller\Quiz;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\ModelBundle\Entity\QuizQuestionsRelations;
use Acme\AdminBundle\Form\QuizQuestionsRelationsType;

/**
 * QuizQuestionsRelations controller.
 *
 * @Route("/admin/quizquestionsrelations")
 */
class QuizQuestionsRelationsController extends Controller
{
    /**
     * Lists all QuizQuestionsRelations entities.
     *
     * @Route("/", name="admin_quizquestionsrelations")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ModelBundle:QuizQuestionsRelations')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new QuizQuestionsRelations entity.
     *
     * @Route("/", name="admin_quizquestionsrelations_create")
     * @Method("POST")
     * @Template("ModelBundle:QuizQuestionsRelations:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new QuizQuestionsRelations();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_quizquestionsrelations_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

        /**
         * Creates a form to create a QuizQuestionsRelations entity.
         *
         * @param QuizQuestionsRelations $entity The entity
         *
         * @return \Symfony\Component\Form\Form The form
         */
        private function createCreateForm(QuizQuestionsRelations $entity)
        {
            $form = $this->createForm(new QuizQuestionsRelationsType(), $entity, array(
                'action' => $this->generateUrl('admin_quizquestionsrelations_create'),
                'method' => 'POST',
            ));

            $form->add('submit', 'submit', array('label' => 'Create'));

            return $form;
        }

    /**
     * Displays a form to create a new QuizQuestionsRelations entity.
     *
     * @Route("/new", name="admin_quizquestionsrelations_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new QuizQuestionsRelations();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a QuizQuestionsRelations entity.
     *
     * @Route("/{id}", name="admin_quizquestionsrelations_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizQuestionsRelations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizQuestionsRelations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing QuizQuestionsRelations entity.
     *
     * @Route("/{id}/edit", name="admin_quizquestionsrelations_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizQuestionsRelations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizQuestionsRelations entity.');
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
     * Creates a form to edit a QuizQuestionsRelations entity.
     * 
     * @param QuizQuestionsRelations $entity The entity
     * 
     * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(QuizQuestionsRelations $entity)
    {
        $form = $this->createForm(new QuizQuestionsRelationsType(), $entity, array(
            'action' => $this->generateUrl('admin_quizquestionsrelations_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing QuizQuestionsRelations entity.
     *
     * @Route("/{id}", name="admin_quizquestionsrelations_update")
     * @Method("PUT")
     * @Template("ModelBundle:QuizQuestionsRelations:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizQuestionsRelations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizQuestionsRelations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_quizquestionsrelations_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a QuizQuestionsRelations entity.
     *
     * @Route("/{id}", name="admin_quizquestionsrelations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ModelBundle:QuizQuestionsRelations')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QuizQuestionsRelations entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_quizquestionsrelations'));
    }

        /**
         * Creates a form to delete a QuizQuestionsRelations entity by id.
         *
         * @param mixed $id The entity id
         *
         * @return \Symfony\Component\Form\Form The form
         */
        private function createDeleteForm($id)
        {
            return $this->createFormBuilder()
                ->setAction($this->generateUrl('admin_quizquestionsrelations_delete', array('id' => $id)))
                ->setMethod('DELETE')
                ->add('submit', 'submit', array('label' => 'Delete'))
                ->getForm()
            ;
        }
}
