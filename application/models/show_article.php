<?php

class Show_article extends CI_Model{

   public function select_data(){
      $this->db->from('post');
      $this->db->order_by("time_post", "desc");
      return $this->db->get();
   }

   function article_by_slug($slug){
      return $this->db->get_where('post',array('slug'=>$slug));
    }

   function update_counter($slug) { 
   $this->db->where('slug', urldecode($slug)); 
   $this->db->select('article_views'); 
   $count = $this->db->get('post')->row(); 
   // then increase by one 
   $this->db->where('slug', urldecode($slug)); 
   $this->db->set('article_views', ($count->article_views + 1)); 
   $this->db->update('post'); 
   }

   function popular(){
      $this->db->select('*');
      $this->db->from('post');
      $this->db->order_by('article_views', 'desc');
      $this->db->limit(3);
      return $this->db->get();
   }

   function view($num, $offset){
      $this->db->order_by("time_post", "desc");
      $query = $this->db->get("post",$num, $offset);
      return $query->result();
   }

   function selectdata($where = ''){
      return $this->db->query("select * from $where;");
   }
}