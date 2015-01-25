<?php

namespace Acme\AdminBundle\Controller\Quiz;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\ModelBundle\Entity\QuizQuestions;
use Acme\AdminBundle\Form\QuizQuestionsType;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsGetter;
use Acme\ModelBundle\Model\Quiz\QuizQuestionsGetterWrapper;

/**
 * QuizQuestions controller.
 *
 * @Route("/admin/quiz")
 */
class QuizQuestionsController extends Controller
{
    /**
     * Lists all QuizQuestions entities.
     *
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $wrapper = new QuizQuestionsGetterWrapper( new QuizQuestionsGetter($this->getDoctrine()->getManager()) );
        $wrapper->setInput(array('orderBy' => 'qq.id DESC'));
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
     * Creates a new QuizQuestions entity.
     * 
     * @param Request $request
     * 
     * @return array
     * 
     * @Route("/")
     * @Method("POST")
     * @Template("AdminBundle:QuizQuestions:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new QuizQuestions();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('acme_admin_quiz_quizquestions_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a QuizQuestions entity.
     *
     * @param QuizQuestions $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(QuizQuestions $entity)
    {
        $form = $this->createForm(new QuizQuestionsType(), $entity, array(
            'action' => $this->generateUrl('acme_admin_quiz_quizquestions_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new QuizQuestions entity.
     *
     * @Route("/new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new QuizQuestions();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a QuizQuestions entity.
     *
     * @Route("/{id}")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizQuestions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizQuestions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing QuizQuestions entity.
     *
     * @Route("/{id}/edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizQuestions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizQuestions entity.');
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
     * Creates a form to edit a QuizQuestions entity.
     * 
     * @param QuizQuestions $entity The entity
     * 
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(QuizQuestions $entity)
    {
        $form = $this->createForm(new QuizQuestionsType(), $entity, array(
            'action' => $this->generateUrl('acme_admin_quiz_quizquestions_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    /**
     * Edits an existing QuizQuestions entity.
     * 
     * @return array
     *
     * @Route("/{id}")
     * @Method("PUT")
     * @Template("AdminBundle:QuizQuestions:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ModelBundle:QuizQuestions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find QuizQuestions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('acme_admin_quiz_quizquestions_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Deletes a QuizQuestions entity.
     *
     * @param Request $request
     * @param int $id
     * 
     * @return Redirect
     * 
     * @throws NotFoundHttpException
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
            $entity = $em->getRepository('ModelBundle:QuizQuestions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find QuizQuestions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('acme_admin_quiz_quizquestions_index'));
    }

    /**
     * Creates a form to delete a QuizQuestions entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('acme_admin_quiz_quizquestions_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Delete'))
                    ->getForm()
        ;
    }
}
