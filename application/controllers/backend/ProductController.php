<?php
class ProductController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('DetailProductModel');
        $this->load->model('ProductCategoryModel');
        $this->data['token'] = $this->session->userdata('token');
        if (empty($this->data['token'])) {
            $this->flashmsg('Anda harus login dulu!', 'danger');
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Produk';
        $data['kategori_produk'] = $this->ProductCategoryModel->get();
        $data['produk'] = $this->ProductModel->get_data_join(['kategori_produk'],['kategori_produk.id = produk.kategori']);
        // $this->dump($data);exit;
        $this->render('backend/product/data-product', $data);
    }

    public function create()
    {
        
        if (isset($_POST['submit'])) {
            $path = './assets/img/produk';
            // $this->dump($this->multipleUpload($path, $_FILES['foto']));exit;
            
            $this->db->trans_start();
            $this->ProductModel->insert([
                'nama_produk' => $this->POST('nama_produk'),
                'deskripsi_produk' => $this->POST('deskripsi_produk'),
                'harga_normal' => $this->POST('harga_normal'),
                'harga_diskon' => $this->POST('harga_diskon'),
                'kategori' => $this->POST('kategori'),
                'is_deleted' => 0,
            ]);
            $insert_id = $this->db->insert_id();
            $uploaded = $this->multipleUpload($path.'/'.$insert_id, $_FILES['foto']);
            if($uploaded != false){
                for($i=0;$i<count($uploaded);$i++){
                    $this->DetailProductModel->insert([
                        'produk' => $insert_id,
                        'file' => $uploaded[$i]
                    ]);
                }
                
            }else{
                echo 'failed';exit;
            }
            $updated = $this->ProductModel->update($insert_id, ['foto'=> $insert_id.'/'.$uploaded[0]]);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal menambah data', 'danger');
                redirect('product');
            } else {
                $this->flashmsg('Sukses menambah data', 'success');
                redirect('product');
            }
        } else {
            $data['title'] = "Tambah Produk";
            $data['kategori_produk'] = $this->ProductCategoryModel->get();
            $this->render('backend/product/create-product', $data);
        }
    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            // $this->dump($_POST);exit;
            $this->db->trans_start();
            $datas = [];
                if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
                     $path = './assets/img/produk';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $config['upload_path']          = $path;
                    $config['allowed_types']        = 'jpeg|jpg|png';
                    $config['max_size']             = 10000;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('foto')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->flashmsg($error['error'], 'danger');
                        redirect('product');
                        die();
                    }
                    $dataFile = $this->upload->data();
                    $datas = array_merge($datas, ['foto' => $dataFile['file_name']]);
                }
                $data = [
                'nama_produk' => $this->POST('nama_produk'),
                'deskripsi_produk' => $this->POST('deskripsi_produk'),
                'harga_normal' => $this->POST('harga_normal'),
                'harga_diskon' => $this->POST('harga_diskon'),
                'kategori' => $this->POST('kategori'),
                'is_deleted' => 0,
                ];
                $data = array_merge($data, $datas);
             $insert = $this->ProductModel->update($this->POST('id_produk'), $data);
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg('Gagal mengubah data', 'danger');
                redirect('product');
            } else {
                $this->flashmsg('Sukses mengubah data', 'success');
                redirect('product');
            }
        } else {
            $data['title'] = 'Update Produk';
            $data['kategori_produk'] = $this->ProductCategoryModel->get();
            $data['produk'] = $this->ProductModel->get(['id_produk' => $id]);
            $this->render('backend/product/create-product', $data);
        }
    }

    public function destroy($id)
    {
        $this->db->trans_start();
        $delete = $this->ProductModel->delete($id);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $this->flashmsg('Gagal menghapus data', 'danger');
            redirect('product');
        } else {
            $this->flashmsg('Sukses menghapus data', 'success');
            redirect('product');
        }
    }
}