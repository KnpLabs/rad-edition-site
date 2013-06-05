<?php

namespace App\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $parsedConfig = $this->processConfiguration($configuration, $configs);

        $container->addParameter('app.foo', $parsedConfig['foo']);
    }
}
