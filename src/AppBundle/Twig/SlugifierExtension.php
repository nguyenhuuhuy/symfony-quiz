<?php

namespace AppBundle\Twig;

use Twig_Extension;
use ModelBundle\Model\Slugifier;

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
        return 'slugifier_extension';
    }
}