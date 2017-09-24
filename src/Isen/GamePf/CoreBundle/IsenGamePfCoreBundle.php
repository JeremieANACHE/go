<?php

namespace Isen\GamePf\CoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Isen\GamePf\CoreBundle\Pass\GameDiscoverPass;

class IsenGamePfCoreBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new GameDiscoverPass());
    }
}
