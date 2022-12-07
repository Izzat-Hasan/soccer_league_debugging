<?php
Class Coaches extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->coachModel = $this->model('Coach');
    }
    public function index(){
        $coaches = $this->coachModel->getCoaches();
        $data = ['coaches'=> $coaches];
        $this->view('coaches/index', $data);
    }

    public function show($id){
        $coach = $this->coachModel->getCoachById($id);
        $data = [
            'coach' =>$coach,
        ];

        $this->view('coaches/show', $data);
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if($this->coachModel->deleteCoach($id)){
            redirect('coaches');
          } else {
            die('Something went wrong');
          }
        } else {
          redirect('coaches');
        }
      }
      public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize post array
          $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
          $data = [
            'firstname' => trim($_post['firstname']),
            'lastname' => trim($_post['lastname']),
            'email' => trim($_post['email']),
            'email_err' => '',
            'firstname_err' => '',
            'lastname_err' => ''
   
          ];
  
          // Validate data
          if(empty($data['firstname'])){
            $data['firstname_err'] = 'Please enter a first name';
          }
          if(empty($data['lastname'])){
              $data['lastname_err'] = 'Please enter a last name';
            }
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter an email';
          }

  
          // Make sure no errors
          if(empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['email_err'])){
            // Validated
      
            if($this->coachModel->addCoach($data)){
              redirect('coaches');
            } else {
              die('Something went wrong');
            }
          } else {
            // Load view with errors
            $this->view('coaches/add', $data);
          }
  
        } else {
          $data = [
            'firstname' => '',
            'lastname' => '',
            'email' => ''
        
          ];
    
          $this->view('coaches/add', $data);
        }
      }
}
?>