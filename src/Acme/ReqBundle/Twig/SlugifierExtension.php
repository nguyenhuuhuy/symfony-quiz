<?php

namespace Acme\ReqBundle\Twig;

use Twig_Extension;
use Acme\ReqBundle\Model\Slugifier;

/**
 * @author Andrea Fiori
 * @since  23 October 2014
 */
class SlugifierExtension extends Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('slugify', array($this, 'slugifyFilter')),
            new \Twig_SimpleFilter('deslugify', array($this, 'deslugifyFilter')),
        );
    }

    public function slugifyFilter($string)
    {
        return Slugifier::slugify($string);
    }
    
    public function deslugifyFilter($string)
    {
        return Slugifier::deSlugify($string);
    }

    public function getName()
    {
        return 'acme_extension';
    }
}