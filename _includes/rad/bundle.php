<?php

use Knp\RadBundle\AppBundle\Bundle;
use Symfony\Component\Config\Definition\Builder\NodeParentInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class App extends Bundle
{
    public function buildConfiguration(NodeParentInterface $rootNode)
    {
        $rootNode
            ->children()
                ->scalarNode('foo')
                    ->defaultValue('bar')
                ->end()
            ->end()
        ;

    }

    public function buildContainer(array $config, ContainerBuilder $container)
    {
        // here $config is the parsed configuration
        $container->setParameter('app.foo', $config['foo']);
    }
}
