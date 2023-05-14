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
use App\Model\User;
use App\Model\Recommendation;
use Hyperf\Testing\Client;
/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends HttpTestCase
{

    public function testRec()
    {
      $client = make(Client::class);
      $res = $client->get('/');
      print_r([ $res ]);
      $this->assertSame(0, 0);
    }

    //public function testRec()
    //{
    //    $latest = self::getLatest();
    //    $name = "user".rand(1, time()). rand(1, time());
    //    $user = User::create(['name'=>$name ,'aff'=> md5((string)time().rand(11111,99999) ),"invited_by"=>$latest->id ]);
    //    $aff  = self::getAff($user->id);
    //    $rec  = Recommendation::create(['user_id'=>$user->id ,'code'=>$aff->aff, "invited_id"=>$aff->id, 'level'=>1 ]);
    //    self::recommend($user);
    //    $this->assertTrue(true);
    //}
    ////15
    //public function recommend(User $user){
    //  $level = 2;
    //  $old = $user;
    //  while( $level <= 4 && $user->invited_by){
    //    $user = User::find($user->invited_by);
    //    $data = ['user_id'=>$old->id ,'code'=> "", "invited_id"=>$user->invited_by,'level'=>$level ];
    //    Recommendation::create($data);
    //    $level = $level +1;
    //  }
    //}

    //public function getLatest(){
    //  return User::orderBy('id','desc')->first();
    //}

    //public function getAff($id){
    //  return User::whereNotIn('id',[$id])->orderBy('id','desc')->first();
    //}
}
