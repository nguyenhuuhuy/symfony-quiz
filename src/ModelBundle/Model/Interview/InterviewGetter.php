<?php

namespace ModelBundle\Model\Interview;

use ModelBundle\Model\QueryBuilderHelperAbstract;

class InterviewGetter extends QueryBuilderHelperAbstract
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
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

    /**
     * @param int $important
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setImportant($important)
    {
        if ( is_numeric($important) ) {
            $this->getQueryBuilder()->andWhere('q.important = :important ');
            $this->getQueryBuilder()->setParameter('important', $important);
        }

        return $this->getQueryBuilder();
    }

    /**
     * @param $topicSlug
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTopicSlug($topicSlug)
    {
        if ( isset($topicSlug) ) {
            $this->getQueryBuilder()->andWhere('t.slug = :topicslug ');
            $this->getQueryBuilder()->setParameter('topicslug', $topicSlug);
        }

        return $this->getQueryBuilder();
    }
}
