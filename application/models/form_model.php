<?php
/**
 *
 */
class Form_model extends CI_Model
{
    public function select_data(){
      $this->db->from('data_pendaftaran');
      $this->db->order_by("id_pendaftar", "asc");
      return $this->db->get();
    }

    function select_by_id($id){
      //$this->db->select('*');
      return $this->db->get_where('data_pendaftaran',array('id_pendaftar'=>$id));
    }

    public function insert_data($table, $dat){
      $this->db->insert($table, $dat);
    }

    public function edit_data($id,$data){
      $this->db->where(array('id_pendaftar'=>$id));
      $this->db->update('data_pendaftaran', $data);
    }


}

?>
