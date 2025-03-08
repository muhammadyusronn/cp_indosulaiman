<?php
class PesertaModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'peserta';
        $this->data['primary_key'] = 'id';
    }

    public function is_nik_registered($nik) {
        $this->db->where('nik', $nik);
        $query = $this->db->get('peserta');
        return $query->num_rows() > 0; // Return true if username exists
    }

    public function get_data_peserta()
    {
        $this->db->select('pst.*, obSI.object_text as sumber_informasi, obPT.object_text as pendidikan_terakhir');
        $this->db->from('peserta pst');
        $this->db->join('object obSI', 'obSI.id = pst.sumber_informasi', 'inner');
        $this->db->join('object obPT', 'obPT.id = pst.pendidikan_terakhir', 'inner');

        $query = $this->db->get();
        $result = $query->result(); // Fetch as an array of objects

        return $result; // Return or use the result

    }
}
