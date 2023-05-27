<?php

declare(strict_types=1);

namespace App\Listener;

use Hyperf\Event\Annotation\Listener;
use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\MainWorkerStart;
use Longman\TelegramBot\Telegram;
#[Listener]
class MyListener implements ListenerInterface
{
    public function __construct(protected ContainerInterface $container)
    {
    }

    public function listen(): array
    {
        return [
            MainWorkerStart::class,
        ];
    }

    public function process(object $event): void
    {
      $key = '1363470980:AAFS9yudcF1lA8jQSoQbqngZ37HZKWVmc3o';
      $chat_id = '687442178';
      $bot_api_key  = $key;
      $bot_username = 'nextav1bot';

      try {
          // Create Telegram API object
          $telegram = new Telegram($bot_api_key, $bot_username);
          \Longman\TelegramBot\Request::initialize($telegram);
          \Longman\TelegramBot\Request::sendMessage([
              'chat_id' => $chat_id,
              'text'    => env("APP_NAME").' - restart '.date("Y-m-d H:i:s").' 😜 ...',
          ]);          
    
      } catch (Longman\TelegramBot\Exception\TelegramException $e) {
          // Silence is golden!
          // log telegram errors
         echo $e->getMessage();
      }
    }
}
