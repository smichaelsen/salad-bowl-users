<?php
namespace Smichaelsen\SaladBowlUsers\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Smichaelsen\SaladBowl\AbstractController;
use Smichaelsen\SaladBowl\ControllerTraits\MessagingEnabledControllerTrait;
use SpendierEs\Website\Entity\WebsiteUser;

class ActivationController extends AbstractController
{

    use MessagingEnabledControllerTrait;

    public function get(ServerRequestInterface $request, ResponseInterface $response)
    {
        $token = $request->getAttribute('token', 'xxx');
        /** @var WebsiteUser $user */
        $user = $this->entityManager->getRepository(WebsiteUser::class)->findOneBy(['activationToken' => $token]);
        if (!$user instanceof WebsiteUser) {
            $this->messageService->enqueue('Beim Aktivieren deines Kontos ging etwas schief. Bitte versuche es noch einmal.', 'message');
        }
        $user->unsetActivationToken();
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $this->messageService->enqueue('Aktivierung erfolgreich! Du kannst dich jetzt einloggen.', 'message');
    }

}