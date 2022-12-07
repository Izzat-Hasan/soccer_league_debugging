<?php
  class Player {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPlayers(){
      $this->db->query('SELECT *,
                        CONCAT_WS(" ", firstname, lastname) AS name
                        FROM Player
                        ORDER BY lastname;
                        ');

      $results = $this->db->resultSet();

      return $results;
    }


    public function addPlayer($data){
      $this->db->query('INSERT INTO Player (firstname, lastname, birthdate, rating) VALUES(:firstname, :lastname, :birthdate, :rating)');
      // Bind values
      $this->db->bind(':firstname', $data['firstname']);
      $this->db->bind(':lastname', $data['lastname']);
      $this->db->bind(':birthdate', $data['birthdate']);
      $this->db->bind(':rating', $data['rating']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updatePlayer($data){
      $this->db->query('UPDATE Player SET firstname = :firstname, lastname = :lastname, birthdate = :birthdate, rating=:rating WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':firstname', $data['firstname']);
      $this->db->bind(':lastname', $data['lastname']);
      $this->db->bind(':birthdate', $data['birthdate']);
      $this->db->bind(':rating', $data['rating']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      return true;
    }

    public function getPlayerById($id){
      $this->db->query('SELECT firstname, lastname, 
                        Player.id as id, 
                        Team.name as teamName, 
                        CONCAT_WS(" ", Player.firstname, Player.lastname) as name,
                        Player.birthdate as birthdate,
                        Player.rating as rating
                        FROM Team RIGHT JOIN Player on TEAM.id = Player.teamid
                        WHERE Player.id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deletePlayer($id){
      $this->db->query('DELETE FROM Player WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }