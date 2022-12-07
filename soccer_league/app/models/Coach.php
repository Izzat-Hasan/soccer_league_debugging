<?php
class Coach{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getCoaches(){
        $this->db->query(
            'SELECT *,
            CONCAT_WS(" ",firstname, lastname) as name
            FROM Coach 
            ORDER BY lastname'
        );
        $result = $this->db->resultSet();
        return $result;

    }

    public function addCoach($data){
        $this->db->query('INSERT INTO COACH(firstname, lastname, email) VALUES(:firstname,:lastname,:email)');

        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function updateCoach($data){
        $this->db->query('UPDATE COACH SET firstname= :firstname, lastname= :lastname, email= :email WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function deleteCoach($id){
        $this->db->query('DELETE FROM Coach WHERE id = :id');

        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    Public function getCoachById($id){
        $this->db->query('SELECT
        Coach.id as id,
        Team.name as teamName,
        Coach.firstname as firstname,
        Coach.lastname as lastname,
        CONCAT_ws(" ", Coach.firstname, Coach.lastname) as name,
        Coach.email as email
        FROM Team RIGHT JOIN Coach ON Team.id = Coach.teamid
        WHERE Coach.id = :id
        ');

    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
    }
}
?>