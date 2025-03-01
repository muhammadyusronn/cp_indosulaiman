<?php
class KontenController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KontenModel');
        $this->load->model('JenisKontenModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index(){
        $data['title'] = 'Data Konten';
        //$data['konten'] = $this->KontenModel->get_data_join(['jenis_konten'],['jenis_konten.id = konten.jenis_konten']);
        $data['konten'] = $this->KontenModel->get_data_konten();
        $this->render('backend/konten/data-konten', $data);
    }

    public function create(){
        if (isset($_POST['submit'])) {
            $path = './uploads/file-konten';
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
                redirect('konten');
                die();
            }else{
                $data = array('upload_data' => $this->upload->data());
            }
            $this->db->trans_start();
            $this->KontenModel->insert([
                'jenis_konten' => $this->POST('jenis_konten'),
                'judul' => $this->POST('judul'),
                'isi' => $this->POST('isi'),
                'is_published' => $this->POST('is_published'),
                'created_by'=>$this->session->userdata('token')['id_user'],
                'file'=> $data['upload_data']['file_name']
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('konten');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('konten');
            }
        } else {
            $data['title'] = "Tambah konten";
            $data['jenis_konten'] = $this->JenisKontenModel->get();
            $this->render('backend/konten/create-konten', $data);
        }
    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            $this->db->trans_start();
            $datas = [];
                if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                    $directory = 'file-konten';
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
                        redirect('konten');
                        die();
                    }
                    $dataFile = $this->upload->data();
                    $datas = array_merge($datas, ['file' => $dataFile['file_name']]);
                }
                $data = [
                'jenis_konten' => $this->POST('jenis_konten'),
                'judul' => $this->POST('judul'),
                'isi' => $this->POST('isi'),
                'is_published' => $this->POST('is_published'),
                'created_by'=>$this->session->userdata('token')['id_user']
                ];
                $data = array_merge($data, $datas);
            $insert = $this->KontenModel->update($this->POST('id'), $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('konten');
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
                redirect('konten');
            }
        } else {
            $data['title'] = 'Update Konten';
            $data['konten'] = $this->KontenModel->get(['id' => $id]);
            $data['jenis_konten'] = $this->JenisKontenModel->get();
            $this->render('backend/konten/create-konten', $data);
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->KontenModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('konten');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('konten');
        }
    }
}