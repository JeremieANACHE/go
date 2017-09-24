<?php

namespace Isen\GamePf\CoreBundle\Pass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class GameDiscoverPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('isen_game_pf_core.game')) {
            return;
        }

        $definition = $container->findDefinition('isen_game_pf_core.game');
        $taggedServices = $container->findTaggedServiceIds('isen_game_pf_core.game');
        
        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addGame', array(new Reference($id)));
        }
    }
}