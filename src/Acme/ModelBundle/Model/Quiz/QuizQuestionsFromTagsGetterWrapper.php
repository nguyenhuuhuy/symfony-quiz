<?php

namespace Acme\ModelBundle\Model\Quiz;

use Acme\ModelBundle\Model\RecordsGetterWrapperAbstract;

/**
 * @author Andrea Fiori
 * @since  04 November 2014
 */
class QuizQuestionsFromTagsGetterWrapper extends RecordsGetterWrapperAbstract
{
    /** @var QuizQuestionsFromTagsGetter **/
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
        $this->objectGetter->setOrderBy( $this->getInput('orderBy', 1) );
        $this->objectGetter->setLimit( $this->getInput('limit', 1) );
        $this->objectGetter->setGroupBy( $this->getInput('groupBy', 1) );
    }
}