<?php

namespace Acme\ModelBundle\Model\Interview;

use Acme\ModelBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  08 October 2014
 */
class InterviewGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('ir, t, q');
  
        $this->getQueryBuilder()->select( $this->getSelectQueryFields() )
                                ->from('ModelBundle:InterviewRelations', 'ir')
                                ->join('ir.topic', 't')
                                ->join('ir.question', 'q')
                                ->where("ir.topic = t.id AND ir.question = q.id ");
        
        return $this->getQueryBuilder();
    }
}