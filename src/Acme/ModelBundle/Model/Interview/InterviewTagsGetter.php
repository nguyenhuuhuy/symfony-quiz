<?php

namespace Acme\ModelBundle\Model\Interview;

use Acme\ModelBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewTagsGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('itr, q, t');
        
        $this->getQueryBuilder()->add('select', $this->getSelectQueryFields() )
                                ->from('ModelBundle:InterviewTagsRelations', 'itr')
                                ->innerJoin('itr.question', 'q')
                                ->innerJoin('itr.tag', 't')
                                ->where("itr.tag = t.id AND itr.question = q.id ");
        
        return $this->getQueryBuilder();
    }
}