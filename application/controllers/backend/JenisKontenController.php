<?php
class JenisKontenController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('JenisKontenModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Jenis Konten';
        $data['jenis_konten'] = $this->JenisKontenModel->get();
        $this->render('backend/jenis-konten/data-jenis-konten', $data);
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $this->db->trans_start();
            $this->JenisKontenModel->insert([
                'nama' => $this->POST('nama'),
                'deskripsi' => $this->POST('deskripsi')
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('jenis-konten');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('jenis-konten');
            }
        } else {
            $data['title'] = "Tambah Jenis Konten";
            $this->render('backend/jenis-konten/create-jenis-konten', $data);
        }
    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            $this->db->trans_start();
            $insert = $this->JenisKontenModel->update($this->POST('id'), [
                'nama' => $this->post('nama'),
                'deskripsi' => $this->post('deskripsi')
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('jenis-konten');
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
                redirect('jenis-konten');
            }
        } else {
            $data['title'] = 'Update Jenis Konten';
            $data['jenis_konten'] = $this->JenisKontenModel->get(['id' => $id]);
            $this->render('backend/jenis-konten/create-jenis-konten', $data);
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->JenisKontenModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('jenis-konten');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('jenis-konten');
        }
    }
}
