<?php
class RegisterController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ObjectModel');
        $this->load->model('PesertaModel');
    }

    public function index()
    {
        $data['title'] = 'Register';
        $data['active'] = 'register';
        $data['pendidikan_terakhir'] = $this->ObjectModel->get(['object_type' => '1']);
        $data['sumber_informasi'] = $this->ObjectModel->get(['object_type' => '2']);
        $this->renderpage('frontend/register', $data);
    }

    public function submit()
    {
        $this->load->library('form_validation');
        // Set validation rules
        $this->form_validation->set_rules(
            'nik',
            'Nomor Induk Kependudukan',
            'required|min_length[16]|max_length[16]|callback_check_unique_nik',
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
            redirect('register-page');
        } else {
            // Validation passed, process the registration (e.g., save to the database)
            $verification_code = $this->generate_verification_code(6);

            $this->db->trans_start();
            $this->PesertaModel->insert([
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
                'kode_verifikasi' => $verification_code,
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data. Mohon input data dengan benar!', 'danger');
                redirect('register-page');
            } else {

                $message = "
                Halo " . $this->POST('nama') . ", <br/>
                Kode verifikasi registrasi anda adalah <strong>" . $verification_code . "</strong> Mohon lakukan input kode verifikasi dengan benar untuk menyelesaikan proses pendaftaran.
                ";
                $this->sendingemailregistration($this->POST('email'), 'Registrasi LPK PT Indo Sulaiman Makmur', $message);

                $data = $this->POST('nama') . "&" . $this->POST('nik') . "&" . $this->POST('email') . "&" . $verification_code;
                $encrypted = $this->encrypt_url($data);
                $this->flashmsg('Selamat data anda sudah berhasil didaftartkan. Silahkan lakukan konfirmasi dengan cara input kode verifikasi yang diterima dari email!', 'success');
                redirect('verifikasi?token=' . $encrypted);
            }
        }
    }

    public function email_verification()
    {
        $data['title'] = 'Verifikasi Email';
        $data['active'] = 'register';

        $token = $this->GET('token');

        $decrypted = $this->decrypt_url($token);

        $result = explode("&", $decrypted);

        if (count($result) == 4) {
            $data['nama'] = $result[0];
            $data['nik'] = $result[1];
            $data['email'] = $result[2];
            $data['token'] = $token;
            $this->renderpage('frontend/verification', $data);
        } else {
            $this->flashmsg('Verifikasi Registrasi gagal. Mohon kontak admin!', 'danger');
            redirect('register-page');
        }
    }

    public function submit_email_verification()
    {
        $token = $this->POST('token');
        $cond = [
            'nik' => $this->POST('nik'),
            'email' => $this->POST('email'),
            'kode_verifikasi' => $this->POST('kode_verifikasi'),
        ];
        $is_valid = $this->PesertaModel->get($cond);
        if (count($is_valid) == 1) {
            $this->db->trans_start();
            $this->db->where('nik', $this->POST('nik'));
            $this->db->update('peserta', [
                'kode_verifikasi' => $this->POST('kode_verifikasi')
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $error = $this->db->error(); // Get MySQL error

                log_message('error', 'Database error: ' . print_r($error, true)); // Log error
                echo "Database error: " . $error['message']; // Display error (for debugging)

                $this->flashmsg('Terjadi kesalahan dalam proses registrasi: ' . $error['message'], 'danger');
                redirect('verifikasi?token=' . $token);
            } else {
                $this->flashmsg('Selamat proses registrasi berhasil', 'success');
                redirect('login');
            }
        } else {
            $this->flashmsg('Verifikasi gagal! Kode verifikasi yang anda input salah! Mohon cek kode verifikasi yang terakhir kali anda terima di email', 'danger');
            redirect('verifikasi?token=' . $token);
        }
    }

    public function check_unique_nik($nik)
    {
        if ($this->PesertaModel->is_nik_registered($nik)) {
            $this->form_validation->set_message('check_unique_nik', '{field} sudah terdaftar. SIlahkan kontak administrator untuk menyelesaikan pendaftaran');
            return FALSE;
        }
        return TRUE;
    }
}
