<?php
namespace App\Event;

class UserRegistered
{
    // 建議這裡定義成 public 屬性，以便監聽器對該屬性的直接使用，或者你提供該屬性的 Getter
    public $user;
    
    public function __construct($user)
    {
        $this->user = $user;    
    }

}
