<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Soccer League',
        'description' => 'This is an application to manage a kids soccer league.'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'We are using this app to learn about PHP coding with databases.'
      ];

      $this->view('pages/about', $data);
    }
  }