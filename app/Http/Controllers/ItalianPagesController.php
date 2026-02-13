<?php

namespace App\Http\Controllers;

class ItalianPagesController extends Controller
{
    /**
     * Display the web developer Torino page.
     */
    public function webDeveloperTorino()
    {
        return view('it.sviluppatore-web-torino');
    }

    /**
     * Display the Laravel developer Italia page.
     */
    public function laravelDeveloper()
    {
        return view('it.sviluppatore-laravel-italia');
    }

    /**
     * Display the business process automation page.
     */
    public function processAutomation()
    {
        return view('it.automazione-processi-aziendali');
    }

    /**
     * Display the Italian homepage.
     */
    public function home()
    {
        return view('it.home');
    }
}
