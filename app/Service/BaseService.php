<?php

declare(strict_types=1);

namespace App\Service;
use Elasticsearch\ClientBuilder;
use Hyperf\HttpServer\Annotation\AutoController;



class BaseService 
{
  public function elkCreateBulk()
  {
    $client = ClientBuilder::create() 
          ->setHosts(['elasticsearch:9200'])
          ->setBasicAuthentication('yourusername', 'yourpassword')
          ->build();
        $params = ['body' => []];
        $params['body'][] = [
            'index' => [
                '_index' => 'movies',
                '_id' => '1',
            ]
        ];
        $params['body'][] = [
            'title' => 'Inception',
            'year' => 2010,
        ];

        // Document 2
        $params['body'][] = [
            'index' => [
                '_index' => 'movies',
                '_id' => '2',
            ]
        ];

        $params['body'][] = [
            'title' => 'The Dark Knight',
            'year' => 2008,
        ];

        // Send the bulk request
        $response = $client->bulk($params);

        return $response;
  }
  public function elkCreate(){
    $client = ClientBuilder::create() 
          ->setHosts(['elasticsearch:9200'])
          ->setBasicAuthentication('yourusername', 'yourpassword')
          ->build();
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

    $client = ClientBuilder::create() 
          ->setHosts(['elasticsearch:9200'])
          ->setBasicAuthentication('yourusername', 'yourpassword')
          ->build();
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
