<?php

class Home extends Controller
{
    public function index()
    {
        echo 'esta é a home';

        $test = new Model;
        $test->query("SELECT * FROM usuarios");
    }
}