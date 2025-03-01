<?php

use Fpdf\Fpdf;

class CartController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('KontenModel');
        $this->load->model('PaymentMethodModel');
        $this->load->model('TransactionModel');
        $this->load->model('TransactionDetailModel');
    }

    public function index()
    {
        $data['title'] = 'Cart';
        $data['produk_cart'] = $this->cart->contents();
        $this->renderpage('frontend/cart', $data);
    }

    public function insert_cart()
    {
        if ($this->POST('rowid') != '') {
            $data = array(
                'rowid' => $this->POST('rowid'),
                'qty'   => (int)$this->POST('qty')
            );
            $this->cart->update($data);
            header('Location: ' . base_url('cart-page'));
        } else {
            $data = array(
                'id'     => $this->POST('id_produk'),
                'name'          => $this->POST('nama_produk'),
                'qty'           => (int)$this->POST('qty'),
                'price'         => (int)$this->POST('harga_normal'),
            );
            $this->cart->insert($data);
            header('Location: ' . base_url('menu-page?cat=') . $this->POST('code'));
        }
    }

    public function delete_cart()
    {
        $data = array(
            'rowid'   => $this->input->get('rowid'),
            'qty'     => 0
        );
        $this->cart->update($data);
        $data['title'] = 'Cart';
        $data['produk_cart'] = $this->cart->contents();
        $this->renderpage('frontend/cart', $data);
    }

    public function checkout()
    {
        $data['title'] = 'Checkout';
        $data['produk_cart'] = $this->cart->contents();
        $data['table'] = (isset($this->session->get_userdata()['table'])) ? $this->session->get_userdata()['table'] : '';
        if (count($data['produk_cart']) < 1) {
            header('Location: ' . base_url('cart-page'));
            exit;
        }
        $data['payment_method'] = $this->PaymentMethodModel->get();
        $this->renderpage('frontend/checkout', $data);
    }

    public function transaction()
    {
        $dataSend['title'] = 'Transcation';
        $produk = $this->cart->contents();
        if (count($produk) < 1) {
            header('Location: ' . base_url('cart-page'));
            exit;
        }
        $total = $this->cart->total();

        try {
            $this->db->trans_start();
            $this->TransactionModel->insert([
                'nomor_meja' => $this->POST('table_number'),
                'nomor_hp' => $this->POST('no_telf'),
                'nama_pembeli' => $this->POST('name'),
                'total' => (int)$this->cart->total(),
                'potongan' => 0,
                'metode_bayar' => (int)$this->POST('payment_method'),
                'status' => 1
            ]);
            $insert_id = $this->db->insert_id();
            $dataDetail = [];
            $dataCart = [];
            foreach ($produk as $i) :
                $temp = [
                    'id_transaksi' => $insert_id,
                    'id_produk' => $i['id'],
                    'jumlah' => $i['qty'],
                    'harga' => $i['price'],
                    'status_makanan' => 0,
                ];
                $tempCart = [
                    'rowid'   => $i['rowid'],
                    'qty'     => 0
                ];
                array_push($dataDetail, $temp);
                array_push($dataCart, $tempCart);
            endforeach;
            $this->TransactionDetailModel->insert_multiple($dataDetail);
            $this->db->trans_complete();
        } catch (Exception $e) {
            if ($this->db->trans_status() === FALSE) {
                $this->flashmsg($e->getMessage(), 'danger');
                redirect('checkout-page');
            }
        }

        if ($this->POST('payment_method') == "2") {
            if ($this->db->trans_status() === TRUE) {
                 $this->cart->update($dataCart);
                $this->TransactionModel->update($insert_id,['is_lunas'=>1]);
                $this->send_wa($this->POST('no_telf'), $this->POST('name'), base_url('invoice?id_transaksi=').$insert_id);
                $this->xendit_transaction($total,$this->POST('name'), '+'.$this->POST('no_telf'));
            } else {
                $this->flashmsg('Failed! Please check your data!', 'danger');
                redirect('checkout-page');
            }
        } else {
            if ($this->db->trans_status() === TRUE) {
                $this->cart->update($dataCart);
                $this->flashmsg('Transaction has been created!', 'success');
                $this->load->view('frontend/success');
            } else {
                $this->flashmsg('Failed! Please check your data!', 'danger');
                redirect('checkout-page');
            }
        }
    }

    public function generate_invoice()
    {
        $infoTrx= $this->TransactionModel->get_data_join(['metode_bayar', 'status'], ['transaksi.metode_bayar = metode_bayar.id_metode', 'status.id_status=transaksi.status'], ['id_transaksi' => $this->input->get('id_transaksi')]);
        $products_info = $this->TransactionDetailModel->get_data_join(['produk'], ['detail_transaksi.id_produk = produk.id_produk'], ['id_transaksi' => $this->input->get('id_transaksi')]);
        if(count($infoTrx)<1){
            redirect('/');
        }
        // $this->dump($infoTrx);
        // $this->dump($products_info);
        // exit;
        //customer and invoice details
        $info = [
            "customer" => $infoTrx[0]->nama_pembeli,
            "city" => "Palembang",
            "invoice_no" => "INV-TRX-00".$infoTrx[0]->id_transaksi,
            "invoice_date" =>date("d-m-Y", strtotime($infoTrx[0]->created_date)),
            "total_amt" => $this->rupiah($infoTrx[0]->total),
        ];

        $pdf = new Fpdf('P');
        $pdf->AddPage();
        //Display Company Info
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, "Kopi Andung", 0, 1);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(50, 7, "Palembang,", 0, 1);
        $pdf->Cell(50, 7, "Jl. Kikim I No.9 Blok S, Demang Lebar Daun.", 0, 1);
        $pdf->Cell(50, 7, "Phone : 08123456789", 0, 1);

        //Display INVOICE text
        $pdf->SetY(15);
        $pdf->SetX(-40);
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(50, 10, "INVOICE", 0, 1);

        //Display Horizontal line
        $pdf->Line(0, 48, 210, 48);

        $pdf->SetY(55);
        $pdf->SetX(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, "Bill To: ", 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 7, $info["customer"], 0, 1);

        //Display Invoice no
        $pdf->SetY(55);
        $pdf->SetX(-60);
        $pdf->Cell(50, 7, "Invoice No : " . $info["invoice_no"]);

        //Display Invoice date
        $pdf->SetY(63);
        $pdf->SetX(-60);
        $pdf->Cell(50, 7, "Invoice Date : " . $info["invoice_date"]);

        //Display Table headings
        $pdf->SetY(95);
        $pdf->SetX(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(80, 9, "DESCRIPTION", 1, 0);
        $pdf->Cell(40, 9, "PRICE", 1, 0, "C");
        $pdf->Cell(30, 9, "QTY", 1, 0, "C");
        $pdf->Cell(40, 9, "TOTAL", 1, 1, "C");
        $pdf->SetFont('Arial', '', 12);

        //Display table product rows
        foreach ($products_info as $row) {
            $pdf->Cell(80, 9, $row->nama_produk, "LR", 0);
            $pdf->Cell(40, 9, $this->rupiah($row->harga_normal), "R", 0, "R");
            $pdf->Cell(30, 9, $row->jumlah, "R", 0, "C");
            $pdf->Cell(40, 9, $this->rupiah($row->harga_normal*$row->jumlah), "R", 1, "R");
        }
        //Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $pdf->Cell(80, 9, "", "LR", 0);
            $pdf->Cell(40, 9, "", "R", 0, "R");
            $pdf->Cell(30, 9, "", "R", 0, "C");
            $pdf->Cell(40, 9, "", "R", 1, "R");
        }
        //Display table total row
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(150, 9, "TOTAL", 1, 0, "R");
        $pdf->Cell(40, 9, $info["total_amt"], 1, 1, "R");


        $pdf->SetY(-70);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, "KOPI ANDUNG", 0, 1, "L");
        $pdf->Cell( 0, 10, $pdf->Image('https://kopiandung.id/wp-content/uploads/2022/12/PHOTO-2023-05-09-20-32-41.jpeg', $pdf->GetX(), $pdf->GetY(), 13.78), 0, 1, 'R', false );
        $pdf->Ln(5);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, "Authorized Signature", 0, 1, "L");
        $pdf->SetFont('Arial', '', 9);

        //Display Footer Text
        $pdf->Cell(0, 10, "This is a computer generated invoice", 0, 1, "C");

        
        $pdf->Output();
    }

    private function xendit_transaction($total, $name="Muhammad Yusron Hartoyo",$phone="+6282186427595")
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.xendit.co/v2/invoices',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "external_id": "kopi-andung-invoice-1705134141",
                "amount": ' . $total . ',
                "success_redirect_url": "'.base_url('/').'",
                "payer_email": "kopi-andung@kopiandung.id",
                "description": "Transaction Kopi Andung VA Payments",
                "customer": {
                    "given_names": "'.$name.'",
                    "mobile_number": "'.$phone.'"
                },
                "customer_notification_preference": {
                    "invoice_paid": [
                        "whatsapp"
                    ]
                }

                
                }',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Authorization: Basic eG5kX2RldmVsb3BtZW50X3lLMjZ2VVpUVnkzajN1UkpDR0YyaHB5cG8zV3AzMHNOR3ZoMmU4SUloSVNtUEhBVXE3T29EZFZEemF6bm85ZTo=',
                        'Cookie: incap_ses_7261_2182539=xR6WXnlsa3a9aG8LkUHEZBY/omUAAAAADY5DGkZ/clxjSA2DNGZIGQ==; nlbi_2182539_2037854=OiitKnn2Slt2dOadSdC7FgAAAADsr4X9JJAXpjd9tanSKYhE'
                    ),
                ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);
        // $this->dump($data);exit;
        redirect($data['invoice_url'], 'refresh');
    }
}
