<?php

namespace Acme\ReqBundle\Model\Interview;

use Acme\ReqBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  08 October 2014
 */
class InterviewGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('ir, t, q');
        
        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields() )
                                ->from('AcmeReqBundle:InterviewRelations', 'ir')
                                ->innerJoin('ir.topic', 't')
                                ->innerJoin('ir.question', 'q')
                                ->where("ir.topic = t.id AND ir.question = q.id ");
        
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