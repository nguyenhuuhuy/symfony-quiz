<?php

namespace Acme\ModelBundle\Model\Topics;

use Acme\ModelBundle\Model\Topics\TopicsGetterAbstract;

/**
 * Class TopicsGetter
 *
 * @author Andrea Fiori
 * @since  21 October 2014
 */
class TopicsGetter extends TopicsGetterAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('DISTINCT(t.id) AS id, t.name, t.parentId, t.status, t.position');

        $this->getQueryBuilder()->select($this->getSelectQueryFields())
                                ->from('ModelBundle:Topics', 't')
                                ->where("t.id != '' ");
        
        return $this->getQueryBuilder();
    }
}