<?php

namespace Acme\ReqBundle\Model\Interview;

use Acme\ReqBundle\Model\QueryBuilderHelperAbstract;

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
                                ->from('AcmeReqBundle:InterviewTagsRelations', 'itr')
                                ->innerJoin('itr.question', 'q')
                                ->innerJoin('itr.tag', 't')
                                ->where("itr.tag = t.id AND itr.question = q.id ");
        
        return $this->getQueryBuilder();
    }
}