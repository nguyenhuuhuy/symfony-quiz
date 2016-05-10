<?php

namespace ModelBundle\Model\Quiz;

use ModelBundle\Model\Topics\TopicsGetterAbstract;

/**
 * Query builder object to get only topics with questions
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
