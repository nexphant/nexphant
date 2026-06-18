<?php

namespace App\Controllers;

use Nexphant\Request;
use Nexphant\Route;
use Nexphant\Get;
use Nexphant\View\ViewResponse;

#[Route('/')]
class HomeController
{
    #[Get('/')]
    public function index(): ViewResponse
    {
        return view('home', [
            'title' => 'Nexphant',
        ]);
    }
}
