<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Psr\Http\Message\StreamFactoryInterface;
use Hyperf\HttpMessage\Stream\Factory\StreamFactory;
return [
  StreamFactoryInterface::class => StreamFactory::class,
  Prometheus\Storage\Adapter::class => Hyperf\Metric\Adapter\Prometheus\RedisStorageFactory::class,
];
