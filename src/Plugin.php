<?php
namespace Smichaelsen\SaladBowlUsers;

use Aura\Router\Map;
use Smichaelsen\SaladBowl\Bowl;
use Smichaelsen\SaladBowl\Domain\Factory\EntityManagerFactory;
use Smichaelsen\SaladBowl\Domain\Factory\RouteMatcherFactory;
use Smichaelsen\SaladBowl\Plugin\PluginInterface;
use Smichaelsen\SaladBowl\Service\SignalSlotService;
use Smichaelsen\SaladBowlUsers\Slot\EntityPaths;
use Smichaelsen\SaladBowlUsers\Slot\Routes;

class Plugin implements PluginInterface
{

    public function register(Bowl $bowl)
    {
        $signalSlotService = $bowl->getServiceContainer()->getSingleton(SignalSlotService::class);
        $signalSlotService->register(
            RouteMatcherFactory::SIGNAL_CONFIGURE_MAP,
            function (Map $map) {
                (new Routes())->configure($map);
            }
        );
        $signalSlotService->register(
            EntityManagerFactory::SIGNAL_ENTITY_PATHS,
            function (\ArrayObject $entityPaths) use ($bowl) {
                EntityPaths::add($entityPaths, $bowl->getConfiguration());
            }
        );
    }
}