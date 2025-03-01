<?php
class MY_Controller extends CI_Controller
{
    function rupiah($angka){
        $hasil_rupiah = number_format($angka, 0, ".", ".");
        return $hasil_rupiah;
    }

    protected function sendingemail($to, $subject, $message)
    {
        $config = [
            'mailtype'   => 'text',
            'charset'    => 'iso-8859-1',
            'protocol'   => 'smptp',
            'smptp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user'  => 'testingemailcodeku@gmail.com',
            'smtp_pass'  => '123yusron,./',
            'smtp_port'  => 465

        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('testingemailcodeku@gmail.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $send = $this->email->send();
        if ($send) {
            echo 'success';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function do_upload($directory = null)
    {
        $path = APPPATH . 'upload/' . $directory;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 10000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success', $data);
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

    protected function send_wa($to,$name,$url)
    {
        $message ='
                
        Hi '.$name.',
        
        I hope you’re well. Thank you for choosing Kopi Andung!
        This an invoice for your order.
        
        You can check the invoice in this link : '.$url.'
        
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

    protected function multipleUpload($path,$files){
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
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            if ($this->upload->do_upload('images[]')) {
                $uploaded = $this->upload->data();
                array_push($images, $uploaded['file_name']);
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->dump($error);exit;
            }
        }

        return $images;
        
    }
}
