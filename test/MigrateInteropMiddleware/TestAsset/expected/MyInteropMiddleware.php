<?php

namespace ZendTest\Expressive\Tooling\MigrateInteropMiddleware\TestAsset;

use Interop\Http\Server\RequestHandlerInterface as DelegateInterface;
use Interop\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;

class MyInteropMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate) : \Psr\Http\Message\ResponseInterface
    {
        $response = $delegate->handle($request);

        $another = $request->getAttribute('my-attribute');
        $another->process($request);

        return $response;
    }
}