<?php
defined("ROOTPATH") OR exit("Acces denied.");
class _404 extends Controller
{
    public function index()
    {
        $this->view('404');
    }
}