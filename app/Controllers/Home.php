<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['page_title'] = "Main page";
        return view('index', $data);
    }
}
