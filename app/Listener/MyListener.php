<?php

declare(strict_types=1);

namespace App\Listener;

use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\BootApplication;
use Hyperf\Framework\Event\MainWorkerStart;

#[Listener]
class MyListener implements ListenerInterface
{
    public function __construct(protected ContainerInterface $container)
    {
    }

    public function listen(): array
    {
        return [
            BootApplication::class,
        ];
    }

    public function process(object $event): void
    {
      echo "Workvictorer #{} started.\n";
      echo "Workvictorer #{} started.\n";
      echo "Workvictorer #{} started.\n";
    }
}
