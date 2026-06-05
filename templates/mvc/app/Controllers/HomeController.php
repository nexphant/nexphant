<?php

namespace App\Controllers;

use Nexph\Request;
use Nexph\Route;
use Nexph\Get;

#[Route('/')]
class HomeController
{
    #[Get('/')]
    public function index(): string
    {
        return view('home', [
            'title' => 'Welcome to Nexph',
        ]);
    }
}
