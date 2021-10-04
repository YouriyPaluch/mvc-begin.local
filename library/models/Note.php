<?php


namespace models;

use mysqli;
class Note
{
    protected $_db;
    public function __construct()
    {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if($this->_db->connect_errno !=0){
            die($this->_db->connect_error);//TODO exeption
        }
    }
    public function all(){
        $query = "SELECT * FROM notes;";
        $result = $this->_db->query($query);
        if(!$result){
            die($this->_db->error);//TODO exeption
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function add($note){
        $text = $this->_db->real_escape_string($note);
        $query = "INSERT INTO notes values (null, '$text');";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }
    public function delete($id){
        $query = "DELETE FROM notes WHERE id = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }
    public function update($id, $text){
        $text = $this->_db->real_escape_string($text);
        $query = "UPDATE notes SET text = '$text' WHERE notes.id = $id;";
        if(!$this->_db->query($query)){
            die($this->_db->error);//TODO exeption
        }
    }

}