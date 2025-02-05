<?php

namespace App\Controllers;
use App\CodeIgniter\HTTP\RequestInterface;
use App\CodeIgniter\HTTP\ResponseInterface;
use App\Psr\Log\LoggerInterface;
use App\Models\Okres;
use App\Models\Obce;

class Home extends BaseController
{
    var $okres;
    var $obce;
    var $data = [];
    public function initController( $request, $response, $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
    
        // Preload any models, libraries, etc, here.
        $this->okres = new Okres();
        $this->obce = new Obce();
        $this->data['okres'] = $this->okres->where('kraj', 141)->findAll();
        // E.g.: $this->session = service('session');
    }
    public function index(): string
    {
        $this->data['page_title'] = "Home";
        return view('index', $this->data);
    }
    public function okres($id): string
    {
        $this->data['okres'] = $this->okres->where('kod', $id)->findAll();
        $this->data['page_title'] = $this->data['okres'][0]['nazev'];
        $this->data['obce'] = $this->obce->where('okres', $id)->findAll();
        return view('okres', $this->data);
    }
}
