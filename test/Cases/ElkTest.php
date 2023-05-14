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
use App\Service\BaseService;
/**
 * @internal
 * @coversNothing
 */
class ElkTest extends HttpTestCase
{

    public function testCreate()
    {
      $service = make(BaseService::class);
      $rep= $service->elkCreate();
      $this->assertSame(0, 0);
    }

    public function testSearch()
    {
      $service = make(BaseService::class);
      $rep= $service->elkSearch();
      $this->assertSame(0, 0);

    }

    public function testSearchBulk()
    {
      $service = make(BaseService::class);
      $rep= $service->elkCreateBulk();
      print_r($rep);
      $this->assertSame(0, 0);

    }
}
