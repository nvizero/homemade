<?php
namespace App\Listener;

use App\Event\UserRegistered;
use Hyperf\Event\Contract\ListenerInterface;

class UserRegisteredListener implements ListenerInterface
{
    public function listen(): array
    {
        // 返回一個該監聽器要監聽的事件陣列，可以同時監聽多個事件
        return [
            UserRegistered::class,
        ];
    }

    /**
     * @param UserRegistered $event
     */
    public function process(object $event): void
    {
        // 事件觸發後該監聽器要執行的程式碼寫在這裡，比如該示例下的傳送使用者註冊成功簡訊等
        // 直接訪問 $event 的 user 屬性獲得事件觸發時傳遞的引數值
        // $event->user;
        print_r([$event->user]);
        
    }
}
