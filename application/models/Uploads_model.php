<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads_model extends CI_Model {

        public $user_id;
        public $file_name;
        public $file_path;
        public $file_download_id;

        public function insert($data)
        {
				$uniqid = uniqid();
                $this->user_id    = $data['user_id'];
                $this->file_name  = $data['file_name'];
                $this->file_path  = $data['file_path'];
                $this->file_download_id  = $uniqid;

                $this->db->insert('uploads', $this);
				return $uniqid;
        }
        public function get_items_for_user($user_id){
            $dl_url = base_url('dl/');
            $this->db->order_by('ID', 'DESC');
            $query = $this->db->select("ID, FILE_NAME, FILE_DOWNLOAD_ID,
                                        DATE_FORMAT(UPLOADED_TIME,'%W - %e %M %Y') as UPLOADED_TIME,
                                        CONCAT('$dl_url',FILE_DOWNLOAD_ID) as DOWNLOAD_LINK")->get_where('uploads', array('user_id' => $user_id));
            return $query->result_array();
        }
		public function get_item($uniqid){
            $query = $this->db->get_where('uploads', array('file_download_id' => $uniqid));
            return $query->row();
        }
        public function get_item_by_id($id){
            $query = $this->db->get_where('uploads', array('id' => $id));
            return $query->row();
        }
        
        public function get_expired_items($interval){
            $this->db->where("(DATE_ADD(NOW(), INTERVAL -$interval)) > `UPLOADED_TIME`", NULL, FALSE);
            return $this->db->get('uploads')->result();
        }
        public function delete_item($id){
            return $this->db->delete('uploads', array('id' => $id));
        }

}