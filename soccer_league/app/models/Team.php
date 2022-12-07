<?php
  class Team {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getTeams(){
      $this->db->query('SELECT * 
                        FROM Team
                        ORDER BY name;
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addTeam($data){
      $this->db->query('INSERT INTO Team (name, color) VALUES(:name, :color)');
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':color', $data['color']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateTeam($data){
      $this->db->query('UPDATE Team SET name = :name, color = :color WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':color', $data['color']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      return true;
    }

    public function getTeamById($id){
      $this->db->query('SELECT 
                        Team.id as id, 
                        Team.name as teamName, 
                        Team.color as teamColor,
                        Coach.firstname as coachFirst,
                        Coach.lastname as coachLast
                        FROM Team LEFT JOIN Coach on Team.id=Coach.teamid
                        WHERE Team.id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteTeam($id){
      $this->db->query('DELETE FROM Team WHERE id = :id');
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