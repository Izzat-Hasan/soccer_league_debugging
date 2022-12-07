<?php
  class Players extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

       $this->playerModel = $this->model('Player');

    }

    public function index(){
      // Get players
      $players = $this->playerModel->getPlayers();

      $data = [
        'players' => $players
      ];

      $this->view('players/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'firstname' => trim($_post['firstname']),
          'lastname' => trim($_post['lastname']),
          'birthdate' => trim($_post['birthdate']),
          'rating' => trim($_post['rating']),
          'firstname_err' => '',
          'lastname_err' => '',
          'birthdate_err' => '',
          'rating_err' => ''
        ];

        // Validate data
        if(empty($data['firstname'])){
          $data['firstname_err'] = 'Please enter a first name';
        }
        if(empty($data['lastname'])){
            $data['lastname_err'] = 'Please enter a last name';
          }
        if(empty($data['birthdate'])){
          $data['birthdate_err'] = 'Please enter a birthdate';
        }
        if(empty($data['rating'])){
            $data['rating_err'] = 'Please enter a rating';
          }

        // Make sure no errors
        if(empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['birthdate_err'])&& empty($data['rating_err'])){
          // Validated
    
          if($this->playerModel->addPlayer($data)){
            redirect('players');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('players/add', $data);
        }

      } else {
        $data = [
          'firstname' => '',
          'lastname' => '',
          'birthdate' => '',
          'rating' => ''
        ];
  
        $this->view('players/add', $data);
      }
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
             'id' => $id,
            'firstname' => trim($_post['firstname']),
            'lastname' => trim($_post['lastname']),
            'birthdate' => trim($_post['birthdate']),
            'rating' => trim($_post['rating']),
            'firstname_err' => '',
            'lastname_err' => '',
            'birthdate_err' => '',
            'rating_err' => ''
          ];
  

        // Validate data
        if(empty($data['firstname'])){
            $data['firstname_err'] = 'Please enter a first name';
        }
        if(empty($data['lastname'])){
            $data['lastname_err'] = 'Please enter a last name';
        }
        if(empty($data['birthdate'])){
        $data['birthdate_err'] = 'Please enter a birthdate';
        }
        if(empty($data['rating'])){
            $data['rating_err'] = 'Please enter a rating';
        }
  

        // Make sure no errors
        if(empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['birthdate_err'])&& empty($data['rating_err'])){
          // Validated
          if($this->playerModel->updatePlayer($data)){
            redirect('players');          
          } else {
            die('Something went wrong');
          }
          
          
        } else {
          // Load view with errors
          $this->view('players/edit', $data);
        }

      } else {
        // Get existing player from model
        $player = $this->playerModel->getPlayerById($id);


        $data = [
          'id' => $id,
          'firstname' => $player->firstname,
          'lastname' => $player->lastname,
          'birthdate' => $player->birthdate,
          'rating' => $player->rating,
          'teamName' => $player->teamName
        ];
  
        $this->view('players/edit', $data);
      }
    }

    public function show($id){
      $player = $this->playerModel->getPlayerById($id);

      $data = [
        'player' => $player,
      ];

      $this->view('players/show', $data);
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->playerModel->deletePlayer($id)){
          redirect('players');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('players');
      }
    }
  }