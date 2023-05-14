<?php

declare(strict_types=1);

namespace App\Middleware;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ApiMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $encryptedData = $request->getParsedBody()['data'] ?? null;
        if ($encryptedData) {
            $decryptedData = $this->decrypt($encryptedData); // 假設您已經有了解密的函數 decrypt()
            $request = $request->withAttribute('data', $decryptedData); // 將解密後的數據存儲到請求對象中
        }
        return $handler->handle($request);
    }

    private function decrypt($data) {
        // 在這裡實現解密邏輯
    }
}

