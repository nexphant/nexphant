<?php

namespace App\Controllers;

use Nexphant\Request;
use Nexphant\Route;
use Nexphant\Get;
use Nexphant\Post;

#[Route('/api')]
class ApiController
{
    #[Get('/health')]
    public function health(): array
    {
        return [
            'ok' => true,
            'runtime' => 'nexphant',
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
