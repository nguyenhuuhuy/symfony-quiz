<?php

namespace Acme\ModelBundle\Model\Quiz;

use Acme\ModelBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  05 June 2014
 */
class QuizQuestionsGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('qqr, qq, qt');
        
        $this->getQueryBuilder()->select($this->getSelectQueryFields() )
                                ->from('ModelBundle:QuizQuestionsRelations', 'qqr')
                                ->innerJoin('qqr.topic', 'qt')
                                ->innerJoin('qqr.question', 'qq')
                                ->where("qqr.topic = qt.id AND qqr.question = qq.id ");
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param number|array $id
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setQuestionId($id)
    {
        if ( is_numeric($id) ) {
            $this->getQueryBuilder()->andWhere('qq.id = :questionId ');
            $this->getQueryBuilder()->setParameter('questionId', $id);
        }
        
        if ( is_array($id) ) {
            $this->getQueryBuilder()->andWhere('qq.id IN ( :questionId ) ');
            $this->getQueryBuilder()->setParameter('questionId', $id);
        }
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param string $topicName
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTopicName($topicName)
    {
        if ($topicName) {
            $this->getQueryBuilder()->andWhere('qt.name = :topicName ');
            $this->getQueryBuilder()->setParameter('topicName', $topicName);
        }
        
        return $this->getQueryBuilder();
    }
}