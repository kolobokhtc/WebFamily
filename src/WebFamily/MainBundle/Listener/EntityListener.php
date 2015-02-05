<?php

namespace WebFamily\MainBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class EntityListener
{
    private $token_storage;

    public function __construct(TokenStorageInterface $token_storage)
    {
        $this->token_storage = $token_storage;
    }

    public function prePersist(LifeCycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entity->setCreatedBy($this->token_storage->getToken()->getUser());
    }
}
