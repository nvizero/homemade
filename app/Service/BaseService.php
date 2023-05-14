<?php

declare(strict_types=1);

namespace App\Service;
use Elasticsearch\ClientBuilder;
use Hyperf\HttpServer\Annotation\AutoController;



class BaseService 
{

  public function elkCreate(){
    $client = ClientBuilder::create()->setHosts(['172.17.0.8:9200'])->build();
    $params = [
        'index' => 'shakespeare',
        'id'    => '1',
        'body'  => [
            'type' => 'line',
            'line_id' => 4,
            'play_name' => 'Hamletvictor',
            'speech_number' => 1,
            'line_number' => '1.1.1',
            'speaker' => 'BERNARDO',
            'text_entry' => "Who's there?"
        ]
    ];

    $response = $client->index($params);

    return $response;
  }

  /*
   * For search
   */
  public function elkSearch(){
    $client = ClientBuilder::create()->setHosts(['172.17.0.8:9200'])->build();

    $params = [
        'index' => 'shakespeare',
        'body'  => [
                'query' => [
                    'match' => [
                        'play_name' => 'Hamlet'
                    ]
                ]
            ]
    ];

    $response = $client->search($params);

    return $response;
  }
}
