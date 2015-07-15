<?php

namespace Acme\ReqBundle\Model\Topics;

use Acme\ReqBundle\Model\Topics\TopicsGetterAbstract;

/**
 * @author Andrea Fiori
 * @since  21 October 2014
 */
class TopicsGetter extends TopicsGetterAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('DISTINCT(t.id) AS id, t.name, t.parentId, t.status, t.position');

        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields())
                                ->from('AcmeReqBundle:Topics', 't')
                                ->where("t.id != '' ");
        
        return $this->getQueryBuilder();
    }
}