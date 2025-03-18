<?php
class MY_Controller extends CI_Controller
{
    function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka, 0, ".", ".");
        return $hasil_rupiah;
    }

    function generate_verification_code($length = 6)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }

    function generate_secure_password($length = 12)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+';
        $password = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $max)];
        }

        return $password;
    }

    function encrypt_url($string)
    {
        $CI = &get_instance();
        $CI->load->library('encryption');
        return strtr(base64_encode($CI->encryption->encrypt($string)), '+/=', '-_,');
    }

    function decrypt_url($encrypted_string)
    {
        $CI = &get_instance();
        $CI->load->library('encryption');
        return $CI->encryption->decrypt(base64_decode(strtr($encrypted_string, '-_,', '+/=')));
    }

    protected function sendingemailregistration($to, $subject, $message)
    {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.indosulaimanmakmur.com'; // Replace with your SMTP server
        $config['smtp_user'] = 'rekrutmen@indosulaimanmakmur.com';  // Your domain email
        $config['smtp_pass'] = 'Asklzxnm1290!@#';        // Use App Password if needed
        $config['smtp_port'] = 587;                   // 465 for SSL, 587 for TLS
        $config['mailtype'] = 'html'; // Ensure email is sent as HTML
        $config['charset'] = 'utf-8'; // Use UTF-8 encoding
        $config['newline'] = "\r\n"; // Required for some SMTP servers
        $config['crlf'] = "\r\n"; // Ensures proper line breaks
        $config['wordwrap'] = TRUE;
        $config['smtp_crypto'] = 'tls'; // Gunakan 'ssl' jika port 465
        $config['smtp_crypto'] = ''; // Coba kosongkan jika tetap error
        $config['smtp_timeout'] = 30;
        $config['smtp_debug'] = 2; // Untuk debugging (opsional)
        $config['validate'] = false; // Nonaktifkan validasi SMTP
        $config['smtp_auto_tls'] = false; // Hindari TLS otomatis
        $config['smtp_ssl_verify_peer'] = false;
        $config['smtp_ssl_verify_peer_name'] = false;
        $config['smtp_ssl_verify_host'] = false;
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->from('rekrutmen@indosulaimanmakmur.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $send = $this->email->send();
        // Send email and return status
        if ($send) {
            return ['status' => true, 'message' => 'Email sent successfully.'];
        } else {
            return ['status' => false, 'message' => $CI->email->print_debugger()];
        }
    }

    public function do_upload($input_field = "", $directory = "", $allowed_types = '', $file_size = 2048, $encrypted_name = TRUE)
    {
        // Define upload directory path
        $path = './uploads/' . $directory;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Define custom error messages
        $error_messages = [
            'upload_no_file_selected'   => 'Mohon untuk upload file {field}.',
            'upload_invalid_filetype'   => 'Tipe file dari {field} tidak diizinkan. Silakan upload file yang valid.',
            'upload_invalid_filesize'   => 'Ukuran file {field} terlalu besar. Maksimum size yang diizinkan {max_size} KB.',
            'upload_file_exceeds_limit' => 'File {field} melebihi ukuran maksimum yang diperbolehkan.',
            'upload_file_partial'       => 'File {field} hanya terupload sebagian.',
            'upload_no_temp_directory'  => 'Direktori sementara untuk menyimpan file {field} tidak tersedia.',
            'upload_unable_to_write_file' => 'Tidak dapat menyimpan file {field} ke disk.',
            'upload_stopped_by_extension' => 'Upload file {field} dihentikan karena ekstensi yang tidak diperbolehkan.',
        ];

        // Set upload configuration
        $config = [
            'upload_path'   => $path,
            'allowed_types' => $allowed_types,
            'max_size'      => $file_size, // 2MB
            'encrypt_name'  => $encrypted_name, // Randomize file name for security
        ];

        // Load the upload library
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($input_field)) {
            // Get default error message
            $default_error = strip_tags($this->upload->display_errors()); // Remove <p> tags

            // Try to match the error with a custom message
            $custom_error = $default_error; // Default to original message
            foreach ($error_messages as $key => $message) {
                if (stripos($default_error, str_replace('_', ' ', $key)) !== false) {
                    $custom_error = str_replace(
                        ['{field}', '{max_size}'],
                        [$input_field, $file_size],
                        $message
                    );
                    break;
                }
            }

            return [
                'status'  => 'error',
                'message' => $custom_error, // Use the custom error message
            ];
        } else {
            $upload_data = $this->upload->data();
            return [
                'status'    => 'success',
                'file_name' => $upload_data['file_name'],
                'file_path' => base_url('upload/' . $directory . '/' . $upload_data['file_name']),
            ];
        }
    }

    protected function text_to_voice($to, $message)
    {
        $userkey = 'gnb6d0';
        $passkey = '18831kyv0o';
        $telepon = $to;
        $message = $message;
        $url = 'https://console.zenziva.net/voice/api/sendvoice/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }
    protected function send_sms($to, $message)
    {
        $userkey = 'gnb6d0';
        $passkey = '18831kyv0o';
        $telepon = $to;
        $message = $message;
        $url = 'https://console.zenziva.net/reguler/api/sendsms/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
    }

    protected function send_wa($to, $name, $url)
    {
        $message = '
                
        Hi ' . $name . ',
        
        I hope you’re well. Thank you for choosing Kopi Andung!
        This an invoice for your order.
        
        You can check the invoice in this link : ' . $url . '
        
        Don’t hesitate to reach out if you have any questions.

        Kind regards,

        Kopi Andung
        ';
        $userkey = 'gnb6d0';
        $passkey = '18831kyv0o';
        $telepon = $to;
        $message = $message;
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        // $this->dump($results);
        // exit;
        return $results;

        curl_close($curlHandle);
    }
    protected function arr_bulan($id)
    {
        $arrNamaBulan = array("01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
        return $arrNamaBulan[$id];
    }
    protected function POST($name)
    {
        return $this->input->post($name);
    }
    protected function GET($name)
    {
        return $this->input->get($name);
    }
    protected function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
    protected function __generate_random_string($length = 5)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string;
    }

    protected function render($view, $data = '')
    {
        $this->load->view('backend/template/header', $data);
        $this->load->view($view, $data);
        $this->load->view('backend/template/footer');
    }
    protected function renders($view, $data = '')
    {
        $this->load->view('backend/layouts/head-login', $data);
        $this->load->view($view, $data);
        $this->load->view('backend/layouts/foot-login');
    }
    protected function renderpage($view, $data = '')
    {
        // $this->dump($data);exit;
        $this->load->view('frontend/layouts/header', $data);
        $this->load->view($view, $data);
        $this->load->view('frontend/layouts/footer');
    }
    protected function flashmsg($msg, $type = 'success', $name = 'msg')
    {
        return $this->session->set_flashdata($name, '<div class="alert alert-' . $type . ' alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    ' . $msg . '
                  </div>');
    }

    protected function multipleUpload($path, $files)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|gif|png|jpeg',
            'overwrite'     => 1,
            'max_size'     => 100000,
        );
        $this->load->library('upload', $config);

        $images = array();
        // $files=$_FILES['foto'];
        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            if ($this->upload->do_upload('images[]')) {
                $uploaded = $this->upload->data();
                array_push($images, $uploaded['file_name']);
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->dump($error);
                exit;
            }
        }

        return $images;
    }

    protected function array_validasi()
    {
        $arr = array(
            'required' => 'Data %s tidak boleh kosong',
            'min_length' => '%s minimal berisi 16 karater',
            'max_length' => '%s maksimal berisi 16 karater',
            'valid_email' => 'Mohon masukan %s yang valid',
            'validate_date' => 'Mohon masukkan %s yang valid',
            'numeric' => 'Mohon masukkan %s yang valid'
        );

        return $arr;
    }
}
