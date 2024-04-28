<?php

class Admin extends Controller
{
    public function index()
    {
        $this->view('master');
        $this->view('admin/header');
    }
    
    public function usuario()
    {
        $this->view('admin/usuario');

    }
}