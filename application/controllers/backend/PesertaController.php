<?php
class PesertaController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PesertaModel');
        $this->load->model('ObjectModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Peserta';
        $data['peserta'] = $this->PesertaModel->get_data_peserta();
        $this->render('backend/peserta/data-peserta', $data);
    }

    public function detail()
    {
        $id = $this->GET('id');
        $act = $this->GET('act');

        $data['title'] = 'Detail Peserta';
        $data['act'] = $act;
        $data['peserta'] = $this->PesertaModel->get_data_peserta_by_id($id);
        $this->render('backend/peserta/edit-peserta', $data);
    }

    public function uploaddokumen()
    {
        $id = $this->POST('id');
        $act = $this->POST('file_type');
        $nik = $this->POST('nik');
        $arr = [];
        
        // Check if a file is selected
        if (!empty($_FILES['file_ktp']['name'])) {
            $result = $this->do_upload('file_ktp', "peserta/" . $nik, "jpg|png|jpeg|pdf");
            if ($result['status'] === 'success') {
                $data["file_ktp"] = $result["file_name"];
                $arr=[
                    'file_ktp' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File KTP : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        // Check if a file is selected
        if (!empty($_FILES['file_kk']['name'])) {
            $result = $this->do_upload('file_kk', "peserta/" . $nik, "pdf");
            if ($result['status'] === 'success') {
                $data["file_kk"] = $result["file_name"];
                $arr=[
                    'file_kk' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File KK : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        // Check if a file is selected
        if (!empty($_FILES['file_ijazah_terakhir']['name'])) {
            $result = $this->do_upload('file_ijazah_terakhir', "peserta/" . $nik, "pdf");
            if ($result['status'] === 'success') {
                $data["file_ijazah_terakhir"] = $result["file_name"];
                $arr=[
                    'file_ijazah_terakhir' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File Ijazah Terakhir : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }


        // Check if a file is selected
        if (!empty($_FILES['file_cv']['name'])) {
            $result = $this->do_upload('file_cv', "peserta/" . $nik, "pdf");
            if ($result['status'] === 'success') {
                $data["file_cv"] = $result["file_name"];
                $arr=[
                    'file_cv' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File Ijazah Terakhir : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        // Check if a file is selected
        if (!empty($_FILES['file_skck']['name'])) {
            $result = $this->do_upload('file_skck', "peserta/" . $nik, "pdf");
            if ($result['status'] === 'success') {
                $data["file_skck"] = $result["file_name"];
                $arr=[
                    'file_skck' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File Ijazah Terakhir : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        // Check if a file is selected
        if (!empty($_FILES['file_npwp']['name'])) {
            $result = $this->do_upload('file_npwp', "peserta/" . $nik, "pdf");
            if ($result['status'] === 'success') {
                $data["file_npwp"] = $result["file_name"];
                $arr=[
                    'file_npwp' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File Ijazah Terakhir : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        // Check if a file is selected
        if (!empty($_FILES['file_kis']['name'])) {
            $result = $this->do_upload('file_kis', "peserta/" . $nik, "pdf");
            if ($result['status'] === 'success') {
                $data["file_kis"] = $result["file_name"];
                $arr=[
                    'file_kis' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File Ijazah Terakhir : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        // Check if a file is selected
        if (!empty($_FILES['file_bpjs']['name'])) {
            $result = $this->do_upload('file_bpjs', "peserta/" . $nik, "pdf");
            if ($result['status'] === 'success') {
                $data["file_bpjs"] = $result["file_name"];
                $arr=[
                    'file_bpjs' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File Ijazah Terakhir : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        $this->db->trans_start();
        $this->db->where('id', $id);
        $this->db->update('peserta', $arr);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $error = $this->db->error(); // Get MySQL error

            log_message('error', 'Database error: ' . print_r($error, true)); // Log error
            echo "Database error: " . $error['message']; // Display error (for debugging)

            $this->flashmsg('Terjadi kesalahan dalam proses registrasi: ' . $error['message'], 'danger');
            redirect('peserta/detail?act=detail&id=' . $id);
        } else {
            $this->flashmsg('Berkas berhasil di upload', 'success');
            redirect('peserta/detail?act=detail&id=' . $id);
        }
    }

    public function drop()
    {
        $id = $this->GET('id');

        $this->db->trans_start();
        $delete = $this->PesertaModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('peserta');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('peserta');
        }
    }
}
