<?php

class Admin_model extends CI_Model
{



    var $table = "data_pendaftaran";
    var $select_column = array(
                               "id_pendaftar","nama_lengkap","binti","noktp","tempat_lahir",
                               "tanggal_lahir","email","jenis_kelamin","status",
                               "kewarganegaraan","alamat","	telepon_rumah","telepon_kantor",
                               "handphone","kelurahan","kecamatan","kabupaten","provinsi",
                               "kode_pos","pend_terakhir","pekerjaan","gol_darah","tinggi_bdn",
                               "berat_bdn","pernah_haji","pernah_umrah","paket","date_reg");

    var $order_column = array(null,
                               "id_pendaftar","nama_lengkap","binti","noktp","tempat_lahir","tanggal_lahir","email",
                               "jenis_kelamin","status","	kewarganegaraan","alamat","	telepon_rumah",
                               "telepon_kantor","handphone","kelurahan","kecamatan","kabupaten","provinsi",
                               "kode_pos","pend_terakhir","pekerjaan","gol_darah","tinggi_bdn",
                               "berat_bdn","pernah_haji","pernah_umrah","paket","date_reg");

    
    var $tabel_post     = 'post';
    var $column_order   = array('category','post_title','slug','date_post','time_post','post_content','author');
    var $column_search  = array('category','post_title','author');
    var $order          = array('category' => 'desc');

    var $tabel_gallery             = 'gallery';
     var $column_order_gallery       = array('title_gallery','description');
     var $column_search_gallery   = array('title_gallery','description');
     var $order_gallery                    = array('title_gallery' => 'desc');

     
     function _get_datatables_query()
     {
          
          $this->db->from($this->tabel_post);

          $i = 0;
     
          foreach ($this->column_search as $item) // loop column 
          {
               if($_POST['search']['value']) // if datatable send POST for search
               {
                    
                    if($i===0) // first loop
                    {
                         $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                         $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                         $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search) - 1 == $i) //last loop
                         $this->db->group_end(); //close bracket
               }
               $i++;
          }
          
          if(isset($_POST['order'])) // here order processing
          {
               $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } 
          else if(isset($this->order))
          {
               $order = $this->order;
               $this->db->order_by(key($order), $order[key($order)]);
          }
     }

     function get_datatables()
     {
          $this->_get_datatables_query();
          if($_POST['length'] != -1)
          $this->db->limit($_POST['length'], $_POST['start']);
          $query = $this->db->get();
          return $query->result();
     }

     function count_filtered()
     {
          $this->_get_datatables_query();
          $query = $this->db->get();
          return $query->num_rows();
     }

     public function count_all()
     {
          $this->db->from($this->tabel_post);
          return $this->db->count_all_results();
     }

    function make_query(){
      $this->db->select($this->select_column);
      $this->db->from($this->table);
      if(isset($_POST["search"]["value"])){
        $this->db->like("nama_lengkap", $_POST["search"]["value"]);
        $this->db->or_like("binti", $_POST["search"]["value"]);
      }
      if(isset($_POST["order"]))
      {
        $this->db->order_by($this->order_column[$_POST['order'][0]['column']],$_POST['order']['0']['dir']);
      }
      else {
        $this->db->order_by("nama_lengkap","ASC");
      }
    }


    function user(){
    return $this->db->query("select * from admin");
    }


    function make_datatables(){
      $this->make_query();
      if($_POST["length"] != -1){
        $this->db->limit($_POST["length"], $_POST["start"]);
      }

      $query = $this->db->get();
      return $query->result();
    }
    function ceck_login($table, $where){
      return $this->db->get_where($table,$where);
    }

    function get_filtered_data(){
      $this->make_query();
      $query = $this->db->get();
      return $query->num_rows();
    }

    function get_all_data(){
      $this->db->select("*");
      $this->db->from($this->table);
      return $this->db->count_all_results();
    }

    function getArticle(){
      $this->db->select("*");
      $this->db->from($this->tabel_post);
      return $this->db->count_all_results();
    }

    
    function dataArtikel($where = 0){
          return $this->db->query("select * from post $where;");
     }

    function get_article_by_slug($slug){
      return $this->db->get_where('post',array('slug'=>$slug));
    }

    function updatedata($tabel,$data,$where){
     return $this->db->update($tabel,$data,$where);
    }

    function deletedata($where, $table){
       return $this->db->delete($table,$where);
    }

    function insert_gallery($table, $data){
      $this->db->insert($table, $data);
    }
     
    function get_query_gallery(){

     
     $this->db->from($this->tabel_gallery);

          $i = 0;
     
          foreach ($this->column_search_gallery as $item) // loop column 
          {
               if($_POST['search']['value']) // if datatable send POST for search
               {
                    
                    if($i===0) // first loop
                    {
                         $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                         $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                         $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_gallery) - 1 == $i) //last loop
                         $this->db->group_end(); //close bracket
               }
               $i++;
          }
          
          if(isset($_POST['order'])) // here order processing
          {
               $this->db->order_by($this->column_order_gallery[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } 
          else if(isset($this->order_gallery))
          {
               $order_gallery = $this->order_gallery;
               $this->db->order_by(key($order_gallery), $order_gallery[key($order_gallery)]);
          }
    }

    function get_datatables_gallery()
     {
          $this->get_query_gallery();
          if($_POST['length'] != -1)
          $this->db->limit($_POST['length'], $_POST['start']);
          $query = $this->db->get();
          return $query->result();
     }

     function count_filtered_gallery()
     {
          $this->get_query_gallery();
          $query = $this->db->get();
          return $query->num_rows();
     }

     public function count_all_gallery()
     {
          $this->db->from($this->tabel_gallery);
          return $this->db->count_all_results();
     }

     public function get_by_id($id)
     {
          $this->db->from($this->tabel_gallery);
          $this->db->where('id_gallery',$id);
          $query = $this->db->get();
          return $query->row();
     }

     public function get_id($id)
     {
          $this->db->from($this->table);
          $this->db->where('id_pendaftar',$id);
          $query = $this->db->get();
          return $query->row();
     }


     public function update($where, $data)
     {
          $this->db->update($this->tabel_gallery, $data, $where);
          return $this->db->affected_rows();
     }

     public function update_data($where, $data)
     {
          $this->db->update($this->table, $data, $where);
          return $this->db->affected_rows();
     }

     public function delete_by_id($id)
     {
          $this->db->where('id_gallery', $id);
          $this->db->delete($this->tabel_gallery);
     }

     public function delete_data_by_id($id)
     {
          $this->db->where('id_pendaftar', $id);
          $this->db->delete($this->table);
     }


     function getGallery(){
      $this->db->select("*");
      $this->db->from($this->tabel_gallery);
      return $this->db->count_all_results();
    }

    function in_article($table, $data){
      $this->db->insert($table, $data);
    }

    function getMenu($where = ''){
    return $this->db->query("select * from menu $where;");
    }

    public function GetParentMenu(){  
    $query  = "SELECT * FROM menu
            WHERE parent_id = '0' AND status = '1'
        ";
    return $this->db->query($query);    
  }

  function insertdata($tabel, $data){
    return $this->db->insert($tabel,$data);
  }

    
}
?>
