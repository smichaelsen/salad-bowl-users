<?php
namespace Smichaelsen\SaladBowlUsers;

use Smichaelsen\SaladBowl\Bowl;
use Smichaelsen\SaladBowl\Plugin\PluginInterface;
use Smichaelsen\SaladBowl\Service\SignalSlotService;

class Plugin implements PluginInterface
{


    public function register(Bowl $bowl)
    {
        $signalSlotService = $bowl->getServiceContainer()->getSingleton(SignalSlotService::class);
    }
}