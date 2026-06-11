<?php

namespace App\Controllers;

use Nexph\Request;
use Nexph\Route;
use Nexph\Get;
use Nexph\View\ViewResponse;

#[Route('/')]
class HomeController
{
    #[Get('/')]
    public function index(): ViewResponse
    {
        return view('home', [
            'title' => 'Welcome to Nexph',
        ]);
    }
}
