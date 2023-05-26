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
namespace App\Controller;
use Elasticsearch\ClientBuilder;
use Hyperf\Guzzle\RingPHP\PoolHandler;
use Swoole\Coroutine;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Metric\Contract\MetricFactoryInterface;
class IndexController extends AbstractController
{

    /**
     * @var UserService
     */
    #[Inject]
    private $userService;
    /**
     * @var MetricFactoryInterface
     */
    #[Inject]
    private $metricFactory;

    public function index()
    {

        $this->userService->createUser();
        $counter = $this->metricFactory->makeCounter('order_created', ['order_type']);
        $counter->with("index")->add(1);

        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        $builder = ClientBuilder::create();
        if (Coroutine::getCid() > 0) {
            $handler = make(PoolHandler::class, [
                'option' => [
                    'max_connections' => 50,
                ],
            ]);
            $builder->setHandler($handler);
        }

        $client = ClientBuilder::create() 
          ->setHosts(['elasticsearch:9200'])
          ->setBasicAuthentication('yourusername', 'yourpassword')
          ->build();
        //$client = $builder->setHosts(['http://172.17.0.8:9200'])->build();
        $info = $client->info();
        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'info '=> $info,
        ];
    }
}
