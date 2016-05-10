<?php

namespace ModelBundle\Model\Quiz;

use ModelBundle\Model\RecordsGetterWrapperAbstract;

class QuizQuestionsFromTagsGetterWrapper extends RecordsGetterWrapperAbstract
{
    /**
     * @var QuizQuestionsFromTagsGetter
     */
    protected $objectGetter;
    
    /**
     * @param QuizQuestionsFromTagsGetter $objectGetter
     */
    public function __construct(QuizQuestionsFromTagsGetter $objectGetter)
    {
        $this->objectGetter = $objectGetter;
    }
    
    public function setupQueryBuilder()
    {
        $this->objectGetter->setSelectQueryFields( $this->getInput('fields', 1) );
        $this->objectGetter->setMainQuery();
        $this->objectGetter->setTagName( $this->getInput('tagName', 1) );
        $this->objectGetter->setSlug( $this->getInput('slug', 1) );
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );

        return null;
    }
}