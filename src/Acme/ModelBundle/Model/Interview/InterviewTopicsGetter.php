<?php

namespace Acme\ModelBundle\Model\Interview;

use Acme\ModelBundle\Model\Topics\TopicsGetterAbstract;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewTopicsGetter extends TopicsGetterAbstract
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function setMainQuery()
    {
        $this->setSelectQueryFields('DISTINCT(t.id) AS id, t.name, t.parentId, t.status, t.position');

        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields())
                                ->from('ModelBundle:InterviewRelations', 'ir')
                                ->innerJoin('ir.topic', 't')
                                ->innerJoin('ir.question', 'q')
                                ->where("t.id = ir.topic AND q.id = ir.question");
        
        return $this->getQueryBuilder();
    }
}