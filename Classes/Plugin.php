<?php
namespace Smichaelsen\SaladBowlUsers;

use Aura\Router\Map;
use Smichaelsen\SaladBowl\Bowl;
use Smichaelsen\SaladBowl\Factory\RouteMatcherFactory;
use Smichaelsen\SaladBowl\Plugin\PluginInterface;
use Smichaelsen\SaladBowl\Service\SignalSlotService;

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
    }
}