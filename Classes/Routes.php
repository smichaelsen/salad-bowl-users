<?php
namespace Smichaelsen\SaladBowlUsers;

use Aura\Router\Map;
use Smichaelsen\SaladBowl\RoutesClassInterface;
use Smichaelsen\SaladBowlUsers\Controller\ActivationController;

class Routes implements RoutesClassInterface
{

    /**
     * @param Map $map
     * @return void
     */
    public function configure(Map $map)
    {
        $map->get('activate', '/activate/{token}', ActivationController::class);
    }
}