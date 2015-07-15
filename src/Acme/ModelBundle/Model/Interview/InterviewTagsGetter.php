<?php

namespace Acme\ModelBundle\Model\Interview;

use Acme\ModelBundle\Model\QueryBuilderHelperAbstract;

/**
 * @author Andrea Fiori
 * @since  22 October 2014
 */
class InterviewTagsGetter extends QueryBuilderHelperAbstract
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
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

    /**
     * @param int|array $id
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setQuestionId($id)
    {
        if ( is_numeric($id) ) {
            $this->getQueryBuilder()->andWhere('itr.question = :questionId ');
            $this->getQueryBuilder()->setParameter('questionId', $id);
        }

        if ( is_array($id) ) {
            $this->getQueryBuilder()->andWhere('itr.question IN ( :questionId ) ');
            $this->getQueryBuilder()->setParameter('questionId', $id);
        }

        return $this->getQueryBuilder();
    }

    /**
     * @param string $slug
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function setTagSlug($slug)
    {
        if ( isset($slug) ) {
            $this->getQueryBuilder()->andWhere('t.slug = :tagSlug ');
            $this->getQueryBuilder()->setParameter('tagSlug', $slug);
        }

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
}