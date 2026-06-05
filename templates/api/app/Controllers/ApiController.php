<?php

namespace App\Controllers;

use Nexph\Request;
use Nexph\Route;
use Nexph\Get;
use Nexph\Post;

#[Route('/api')]
class ApiController
{
    #[Get('/health')]
    public function health(): array
    {
        return [
            'ok' => true,
            'runtime' => 'nexph',
        ];
    }

    #[Post('/echo')]
    public function echo(Request $request): array
    {
        return [
            'data' => $request->json(),
        ];
    }
}
