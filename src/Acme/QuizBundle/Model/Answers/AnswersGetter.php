<?php

namespace Acme\QuizBundle\Model\Answers;

use Acme\QuizBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  05 June 2014
 */
class AnswersGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('qa.id, qa.answer, qa.correct, IDENTITY(qa.question) AS questionId');

        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields())
                                ->add('from', 'Acme\QuizBundle\Entity\QuizAnswers qa ')
                                ->where("qa.id != '' ");
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param number or array $id
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
