<?php

namespace Acme\ModelBundle\Model\Quiz;

use Acme\ModelBundle\Model\QueryBuilderHelperAbstract;

/**
 * Select a question following the quiz tags relations table
 * 
 * @author Andrea Fiori
 * @since  04 November 2014
 */
class QuizQuestionsFromTagsGetter extends QueryBuilderHelperAbstract
{
    public function setMainQuery()
    {
        $this->setSelectQueryFields('qtr, q');
        
        $this->getQueryBuilder()->select( $this->getSelectQueryFields() )
                                ->from('ModelBundle:QuizTagsRelations', 'qtr')
                                ->innerJoin('qtr.question', 'q')
                                ->innerJoin('qtr.tag', 'tag')
                                ->where("qtr.tag = tag.id AND qtr.question = q.id");
        
        return $this->getQueryBuilder();
    }
    
    /**
     * @param string $tagName
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTagName($tagName)
    {
        if ($tagName) {
            $this->getQueryBuilder()->andWhere('tag.name = :tagName ');
            $this->getQueryBuilder()->setParameter('tagName', $tagName);
        }
        
        return $this->getQueryBuilder();
    }
}