<?php

namespace Acme\ReqBundle\Model\Quiz;

use Acme\ReqBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  06 October 2014
 */
class QuizTagsGetter extends QueryBuilderHelperAbstract
{
    /**
     * @return \Doctrine\ORM\QueryBuilder 
     */
    public function setMainQuery()
    {
        $this->setSelectQueryFields('qtr, qst, qt');
        
        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields() )
                                ->from('AcmeReqBundle:QuizTagsRelations', 'qtr')
                                ->innerJoin('qtr.question', 'qst')
                                ->innerJoin('qtr.tag', 'qt')
                                ->where("qtr.question = qst.id AND qt.id = qtr.tag ");
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param number|array $questionId
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setQuestionId($questionId)
    {
        if ( is_numeric($questionId) ) {
            $this->getQueryBuilder()->andWhere('qtr.question = :questionId AND qst.id = :questionId ');
            $this->getQueryBuilder()->setParameter('questionId', $questionId);
        }
        
        if ( is_array($questionId) ) {
            $this->getQueryBuilder()->andWhere('qtr.question IN ( :questionId ) AND qst.id IN ( :questionId ) ');
            $this->getQueryBuilder()->setParameter('questionId', $questionId);
        }
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param int $tagId
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTagId($tagId)
    {
        if ($tagId) {
            $this->getQueryBuilder()->andWhere('qtr.tag = :tagId ');
            $this->getQueryBuilder()->setParameter('tagId', $tagId);
        }
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param string $tagName
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTagName($tagName)
    {
        if ($tagName) {
            $this->getQueryBuilder()->andWhere('qt.name = :tagName ');
            $this->getQueryBuilder()->setParameter('tagName', $tagName);
        }
        
        return $this->getQueryBuilder();
    }
}
