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
            $this->dump($_POST);
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
                'email' => $this->POST('email'),
                'email' => $this->POST('email'),
                'email' => $this->POST('email'),
            ]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data. Mohon input data dengan benar!', 'danger');
                redirect('register-page');
            } else {
                $this->flashmsg('Selamat data anda sudah berhasil didaftartkan. Silahkan tunggu konfirmasi melalu whatsapp oleh admin.', 'success');
				redirect('register-page');
            }
        }
    }

    public function check_unique_nik($nik) {
        if ($this->PesertaModel->is_nik_registered($nik)) {
            $this->form_validation->set_message('check_unique_nik', '{field} sudah terdaftar. SIlahkan kontak administrator untuk menyelesaikan pendaftaran');
            return FALSE;
        }
        return TRUE;
    }
}
