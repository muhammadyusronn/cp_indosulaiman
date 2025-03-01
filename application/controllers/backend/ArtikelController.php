<?php
class ArtikelController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArtikelModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index(){
        $data['title'] = 'Data Artikel';
        $data['artikel'] = $this->ArtikelModel->get();
        $this->render('backend/artikel/data-artikel', $data);
    }

    public function create(){
        if (isset($_POST['submit'])) {
            $path = './uploads/file-artikel';
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
                redirect('artikel');
                die();
            }else{
                $data = array('upload_data' => $this->upload->data());
            }
            $this->db->trans_start();
            $this->ArtikelModel->insert([
                'judul' => $this->POST('judul'),
                'isi' => $this->POST('isi'),
                'is_published' => $this->POST('is_published'),
                'created_by'=>$this->session->userdata('token')['id_user'],
                'file'=> $data['upload_data']['file_name']
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('artikel');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('artikel');
            }
        } else {
            $data['title'] = "Tambah artikel";
            $this->render('backend/artikel/create-artikel', $data);
        }
    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            $this->db->trans_start();
            $datas = [];
                if (is_uploaded_file($_FILES['file_foto']['tmp_name'])) {
                    $directory = 'file-artikel';
                    $path = './uploads/' . $directory;
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $config['upload_path']          = $path;
                    $config['allowed_types']        = 'jpeg|jpg|png';
                    $config['max_size']             = 10000;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file_foto')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->flashmsg('Gagal upload data', 'danger');
                        redirect('artikel');
                        die();
                    }
                    $dataFile = $this->upload->data();
                    $datas = array_merge($datas, ['file' => $dataFile['file_name']]);
                }
                $data = [
                'judul' => $this->POST('judul'),
                'isi' => $this->POST('isi'),
                'jenis_artikel' => $this->POST('jenis_artikel'),
                'is_published' => $this->POST('is_published'),
                'created_by'=>$this->session->userdata('token')['id_user']
                ];
                $data = array_merge($data, $datas);
            $insert = $this->ArtikelModel->update($this->POST('id'), $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('artikel');
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
                redirect('artikel');
            }
        } else {
            $data['title'] = 'Update artikel';
            $data['artikel'] = $this->ArtikelModel->get(['id' => $id]);
            // $this->dump($data);
            // exit;
            $this->render('backend/artikel/create-artikel', $data);
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->ArtikelModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('artikel');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('artikel');
        }
    }
}