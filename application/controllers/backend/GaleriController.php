<?php
class GaleriController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('GaleriModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Galeri';
        $data['galeri'] = $this->GaleriModel->get();
        $this->render('backend/galeri/data-galeri', $data);
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $path = './uploads/galeri';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $config['upload_path']          = $path;
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->flashmsg('Gagal upload file', 'danger');
                redirect('galeri');
                die();
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            $this->db->trans_start();
            $this->GaleriModel->insert([
                'file' => $data['upload_data']['file_name'],
                'name' => $this->POST('name'),
                'filter' => $this->POST('filter'),
                'created_by' => $this->session->userdata('token')['id_user'],
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('galeri');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('galeri');
            }
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->GaleriModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('galeri');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('galeri');
        }
    }
}
