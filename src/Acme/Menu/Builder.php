<?php

namespace Acme\AdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Class Builder
 */
class Builder extends ContainerAware
{
    /**
     * Set main menu
     * 
     * @param FactoryInterface $factory
     * @param array $options
     *
     * @return \Knp\Menu\MenuItem
     */
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'))
             ->setLinkAttribute('title', 'Back to the home page');

        return $menu;
    }
}
