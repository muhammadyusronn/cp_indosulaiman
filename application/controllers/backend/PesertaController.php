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
        $data['pendidikan_terakhir'] = $this->ObjectModel->get(['object_type' => '1']);
        $data['pendidikan_terakhir'] = $this->ObjectModel->get(['object_type' => '1']);
        $data['sumber_informasi'] = $this->ObjectModel->get(['object_type' => '2']);
        $data['agama'] = $this->ObjectModel->get(['object_type' => '3']);
        $this->render('backend/peserta/edit-peserta', $data);
    }

    public function edit()
    {
        $id = $this->POST('id');

        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules(
            'nik',
            'Nomor Induk Kependudukan',
            'required|min_length[16]|max_length[16]',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'agama',
            'Agama',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'sosial_media',
            'Sosial Media',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'whatsapp',
            'Whatsapp',
            'required|numeric',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'usia',
            'Usia',
            'required|numeric',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'usia',
            'Usia',
            'required|numeric',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'pendidikan_terakhir',
            'Pendidikan Terakhir',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'sumber_informasi',
            'Sumber Informasi',
            'required',
            $this->array_validasi()
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            $this->array_validasi()
        );

        if ($this->form_validation->run() == FALSE) {
            $this->flashmsg(validation_errors(), 'danger');
            redirect('peserta/detail?act=edit&id=' . $id);
            exit;
        } else {
            $this->db->trans_start();
            $updated_data = [
                'nama' => $this->POST('nama'),
                'nik' => $this->POST('nik'),
                'no_hp' => $this->POST('whatsapp'),
                'tempat_lahir' => $this->POST('tempat_lahir'),
                'tanggal_lahir' => $this->POST('tanggal_lahir'),
                'usia' => $this->POST('usia'),
                'tinggi_badan' => $this->POST('tinggi_badan'),
                'pendidikan_terakhir' => $this->POST('pendidikan_terakhir'),
                'sumber_informasi' => $this->POST('sumber_informasi'),
                'alamat' => $this->POST('alamat'),
                'email' => $this->POST('email'),
                'jenis_kelamin' => $this->POST('jenis_kelamin'),
                'agama' => $this->POST('agama'),
                'sosial_media' => $this->POST('sosial_media'),
                'is_verified' => $this->POST('is_verified'),
            ];
            $insert = $this->PesertaModel->update($id, $updated_data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('peserta/detail?act=edit&id=' . $id);
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
                redirect('peserta/detail?act=detail&id=' . $id);
            }
        }
    }

    public function resendemailverification()
    {
        // Validation passed, process the registration (e.g., save to the database)
        $verification_code = $this->generate_verification_code(6);
        $data = $this->GET('nama') . "&" . $this->GET('nik') . "&" . $this->GET('email') . "&" . $verification_code;
        // echo $data;exit;
        $encrypted = $this->encrypt_url($data);
        $message = "
                Halo " . $this->GET('nama') . ", <br/>
                Kode verifikasi registrasi anda adalah <strong>" . $verification_code . "</strong> Mohon lakukan input kode verifikasi dengan benar untuk menyelesaikan proses pendaftaran.
                Anda dapat melakukan verifikasi di link berikut ini <a class='btn btn-xs btn-primary' href='" . base_url('verifikasi?token=' . $encrypted) . "'>VERIFIKASI</a>
                ";
        $this->sendingemailregistration($this->GET('email'), 'Registrasi LPK PT Indo Sulaiman Makmur', $message);

        $this->db->trans_start();
        $this->db->where('nik', $this->GET('nik'));
        $this->db->update('peserta', [
            'kode_verifikasi' => $verification_code,
            'is_verified' => 0,
        ]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $error = $this->db->error(); // Get MySQL error

            log_message('error', 'Database error: ' . print_r($error, true)); // Log error
            echo "Database error: " . $error['message']; // Display error (for debugging)

            $this->flashmsg('Terjadi kesalahan dalam proses registrasi: ' . $error['message'], 'danger');
            redirect('peserta');
        } else {
            $this->flashmsg('Sukses mengirim email', 'success');
            redirect('peserta');
        }
        
    }

    public function uploaddokumen()
    {
        $id = $this->POST('id');
        $act = $this->POST('file_type');
        $nik = $this->POST('nik');
        $arr = [];

        // Check if a file is selected
        if (!empty($_FILES['file_pas_foto']['name'])) {
            $result = $this->do_upload('file_pas_foto', "peserta/" . $nik, "jpg|png|jpeg|pdf");
            if ($result['status'] === 'success') {
                $data["file_pas_foto"] = $result["file_name"];
                $arr = [
                    'file_pas_foto' => $result['file_name'],
                ];
            } else {
                $this->flashmsg('File Pas Foto : ' . $result['message'], 'danger');
                redirect('peserta/detail?act=detail&id=' . $id);
                exit;
            }
        }

        // Check if a file is selected
        if (!empty($_FILES['file_ktp']['name'])) {
            $result = $this->do_upload('file_ktp', "peserta/" . $nik, "jpg|png|jpeg|pdf");
            if ($result['status'] === 'success') {
                $data["file_ktp"] = $result["file_name"];
                $arr = [
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
                $arr = [
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
                $arr = [
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
                $arr = [
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
                $arr = [
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
                $arr = [
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
                $arr = [
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
                $arr = [
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
