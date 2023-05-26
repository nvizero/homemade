<?php

declare(strict_types=1);
namespace App\Service;

use Elasticsearch\ClientBuilder;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Di\Annotation\Inject;
use Psr\EventDispatcher\EventDispatcherInterface;
use App\Event\UserRegistered; 
use Hyperf\Metric\Contract\MetricFactoryInterface;
use App\Model\User;

class UserService 
{
  /**
   * @var EventDispatcherInterface
   */
  #[Inject]
  private $eventDispatcher;
  //create user
  public function createUser()
  {
      $u = new User();
      $u->name = time().'123';
      $u->aff = time();
      $u->invited_by = 123123;
      $u->save();
      $user = $u; 
      $this->eventDispatcher->dispatch(new UserRegistered(['name'=>$user->name,'aff'=>1]));
  }
}
