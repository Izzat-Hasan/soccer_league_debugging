<?php
  class Teams extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

       $this->teamModel = $this->model('Team');
    }

    public function index(){
      // Get teams
      $teams = $this->teamModel->getTeams();

      $data = [
        'teams' => $teams
      ];

      $this->view('teams/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'name' => trim($_post['name']),
          'color' => trim($_post['color']),
          'name_err' => '',
          'color_err' => ''
        ];

        // Validate data
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter a team name';
        }
        if(empty($data['color'])){
          $data['color_err'] = 'Please enter a color for the team';
        }

        // Make sure no errors
        if(empty($data['name_err']) && empty($data['color_err'])){
          // Validated
          if($this->teamModel->addTeam($data)){
            redirect('teams');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('teams/add', $data);
        }

      } else {
        $data = [
          'name' => '',
          'color' => ''
        ];
  
        $this->view('teams/add', $data);
      }
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'name' => trim($_post['name']),
          'color' => trim($_post['color']),
          'name_err' => '',
          'color_err' => ''
        ];

        // Validate data
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter a team name';
        }
        if(empty($data['color'])){
          $data['color_err'] = 'Please enter a team color';
        }

        // Make sure no errors
        if(empty($data['name_err']) && empty($data['color_err'])){
          // Validated
          if($this->teamModel->updateTeam($data)){
            redirect('teams');          
          } else {
            die('Something went wrong');
          }
          
        } else {
          // Load view with errors
          $this->view('teams/edit', $data);
        }

      } else {
        // Get existing team from model
        $team = $this->teamModel->getTeamById($id);


        $data = [
          'id' => $id,
          'name' => $team->teamName,
          'color' => $team->teamColor
        ];
  
        $this->view('teams/edit', $data);
      }
    }

    public function show($id){
      $team = $this->teamModel->getteamById($id);

      $data = [
        'team' => $team,
      ];

      $this->view('teams/show', $data);
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->teamModel->deleteTeam($id)){
          //flash('post_message', 'Team Removed');
          redirect('teams');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('teams');
      }
    }
  }