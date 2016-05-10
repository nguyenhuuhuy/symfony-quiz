<?php

namespace ModelBundle\Model\Topics;

class TopicsGetter extends TopicsGetterAbstract
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setMainQuery()
    {
        $this->setSelectQueryFields('DISTINCT(t.id) AS id, t.name, t.parentId, t.status, t.position');

        $this->getQueryBuilder()->select($this->getSelectQueryFields())
                                ->from('ModelBundle:Topics', 't')
                                ->where("t.id != '' ");
        
        return $this->getQueryBuilder();
    }
}