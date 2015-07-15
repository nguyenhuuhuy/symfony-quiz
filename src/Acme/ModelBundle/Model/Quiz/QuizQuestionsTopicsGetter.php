<?php

namespace Acme\ModelBundle\Model\Quiz;

use Acme\ModelBundle\Model\Topics\TopicsGetterAbstract;

/**
 * Query builder object to get only topics with questions
 * 
 * @author Andrea Fiori
 * @since  21 October 2014
 */
class QuizQuestionsTopicsGetter extends TopicsGetterAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('DISTINCT(t.id) AS id, t.name, t.parentId, t.status, t.position');

        $this->getQueryBuilder()->select( $this->getSelectQueryFields() )
                                ->from('ModelBundle:QuizQuestionsRelations', 'qqr')
                                ->innerJoin('qqr.topic', 't')
                                ->innerJoin('qqr.question', 'qq')
                                ->where("t.id != '' ");
        
        return $this->getQueryBuilder();
    }
}
