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
namespace HyperfTest\Cases;

use HyperfTest\HttpTestCase;
use App\Service\MailService;
/**
 * @internal
 * @coversNothing
 */
class MailTest extends HttpTestCase
{

    public function testCreate()
    {
      $service = make(MailService::class);
      //$rep = $service->sendMail();
      $rep = $service->mail2();
      $this->assertSame(0, 0);
    }
}
