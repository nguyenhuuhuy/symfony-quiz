<?php

namespace ModelBundle\Model\Quiz;

use ModelBundle\Model\QueryBuilderHelperAbstract;

class QuizAnswersGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('qa.id, qa.answer, qa.correct, IDENTITY(qa.question) AS questionId');

        $this->getQueryBuilder()->select($this->getSelectQueryFields())
                                ->from('ModelBundle:QuizAnswers', 'qa')
                                ->where("qa.id != '' ");
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param number|array $id
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setQuestionId($id)
    {
        if ( is_numeric($id) ) {
            $this->getQueryBuilder()->andWhere('qa.question = :questionId ');
            $this->getQueryBuilder()->setParameter('questionId', $id);
        }
        
        if ( is_array($id) ) {
            $this->getQueryBuilder()->andWhere('qa.question IN ( :questionId ) ');
            $this->getQueryBuilder()->setParameter('questionId', $id);
        }
        
        return $this->getQueryBuilder();
    }   
}