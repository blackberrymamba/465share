<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('language'));
        $this->lang->load('main');
		$this->_cleanup();
    }

    public function index()
    {
        null;
    }

    public function do_upload()
    {
        if (!$this->ion_auth->logged_in()) {
            $error = array('error' => 'Not authorized!');
            echo json_encode($error);
            return;
        }
        $this->load->model('Uploads_model');
        $config['max_size'] = 1000000;
        $config['upload_path'] = $this->config->item('upload_path') . $this->ion_auth->user()->row()->id;

        if (!is_writable(dirname($config['upload_path']))) {
            $error = array('error' => dirname($config['upload_path']) . ' is not writable!');
            echo json_encode($error);
            return;
        }

        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        //$config['allowed_types']        = 'gif|jpg|png|zip|rar|sql|pdf';
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('files')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $uniqid = $this->Uploads_model->insert(array(
                'user_id' => $this->ion_auth->user()->row()->id,
                'file_name' => $this->upload->data('client_name'),
                'file_path' => $this->upload->data('full_path')));

            echo json_encode(array('uniqid' => $uniqid, 'url' => base_url("dl/$uniqid")));
        }            
      
    }

    public function download($uniqid)
    {
        $force = $this->input->get('force', true);
        $this->load->model('Uploads_model');
        $data = $this->Uploads_model->get_item($uniqid);

        if (!$data || !file_exists($data->FILE_PATH)) {
            $obj = new stdClass;
            $obj->ERROR = 'File not found or expired!';
            //$obj->FILE_NAME = (isset($data->FILE_NAME) ? $data->FILE_NAME : '' );
            $this->load->view('header');
            $this->load->view('download', $obj);
            $this->load->view('footer');
            return;
        }
        if (isset($force)) {
            $this->custom_force_download($data->FILE_NAME, $data->FILE_PATH);
        } else {
            $this->load->view('header');
            $this->load->view('download', $data);
            $this->load->view('footer');
        }
    }
    private function custom_force_download($name, $path)
    {
        if (is_file($path)) {
            $this->load->helper('file');

            $mime = get_mime_by_extension($path);
            header('Pragma: public'); // required
            header('Expires: 0'); // no cache
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
            header('Cache-Control: private', false);
            header('Content-Type: ' . $mime); // Add the mime type from Code igniter.
            header('Content-Disposition: attachment; filename="' . basename($name) . '"'); // Add the file name
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($path)); // provide file size
            header('Connection: close');
            readfile($path); // push it out
            exit();
        }
    }
    public function getfiles(){
        if (!$this->ion_auth->logged_in()) {
            $error = array('error' => 'Not authorized!');
            echo json_encode($error);
            return;
        }
        $this->load->model('Uploads_model');
        
        $data = $this->Uploads_model->get_items_for_user($this->ion_auth->user()->row()->id);
        echo json_encode($data);
    }
    public function delete($id){
        if (!$this->ion_auth->logged_in()) {
            $error = array('error' => 'Not authorized!');
            echo json_encode($error);
            return;
        }
        $this->load->model('Uploads_model');
        $item = $this->Uploads_model->get_item_by_id($id);
        unlink($item->FILE_PATH);
        $data = $this->Uploads_model->delete_item($id);
        
        echo json_encode(array('result'=>$data));
    }
    private function _cleanup()
    {
        $this->load->model('Uploads_model');
        $data = $this->Uploads_model->get_expired_items($this->config->item('time_to_expire'));
        foreach ($data as $item) {
            $retunlink = unlink($item->FILE_PATH);
            $retdel = $this->Uploads_model->delete_item($item->ID);
        }
    }
}
