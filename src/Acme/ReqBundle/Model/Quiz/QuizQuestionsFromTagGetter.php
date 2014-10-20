<?php

namespace Acme\ReqBundle\Model\Quiz;

use Acme\ReqBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  08 October 2014
 */
class QuizQuestionsFromTagGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('qt');
        
        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields() )
                                ->from('AcmeReqBundle:QuizQuestionsRelations', 'qt')
                                ->innerJoin('qqr.topic', 'qt')
                                ->innerJoin('qqr.question', 'qq')
                                ->where("qqr.topic = qt.id AND qqr.question = qq.id ");
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param string $name
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTagName($name)
    {
        if ($name) {
            $this->getQueryBuilder()->andWhere('qt.name = :name ');
            $this->getQueryBuilder()->setParameter('name', $name);
        }
        
        return $this->getQueryBuilder();
    }
}