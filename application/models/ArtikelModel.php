<?php
class ArtikelModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->data['table_name'] = 'artikel';
        $this->data['primary_key'] = 'id';
    }

    public function getRecentsArticle()
    {
        $this->db->limit(5);
        $this->db->where('is_published=1');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->data['table_name']);

        return $query->result();
    }
}
