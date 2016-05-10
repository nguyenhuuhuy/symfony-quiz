<?php

namespace ModelBundle\Model\Quiz;

use ModelBundle\Model\QueryBuilderHelperAbstract;

/**
 * Select a question following the quiz tags relations table
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
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTagName($tagName)
    {
        if (isset($tagName)) {
            $this->getQueryBuilder()->andWhere('tag.name = :tagName ');
            $this->getQueryBuilder()->setParameter('tagName', $tagName);
        }
        
        return $this->getQueryBuilder();
    }

    /**
     * @param string $slug
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setSlug($slug)
    {
        if (isset($slug)) {
            $this->getQueryBuilder()->andWhere('tag.slug = :slug ');
            $this->getQueryBuilder()->setParameter('slug', $slug);
        }

        return $this->getQueryBuilder();
    }
}
