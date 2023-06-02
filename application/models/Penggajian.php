<?php 

class Penggajian extends CI_Model{

    public function data($table){
        return $this->db->get($table);
    }

    public function insert($data, $table){
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $where){
        $this->db->update($table, $data, $where);
    }

    public function delete($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>