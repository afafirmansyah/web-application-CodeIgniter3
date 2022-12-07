<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export_model extends CI_Model
{

    public function ExportTransactions()
    {
        //$query = "SELECT * FROM `transactions` ORDER BY `id` DESC";
        //return $this->db->query($query)->result_array();
        $this->db->order_by('id', 'DESC');
        $exportTrans = $this->db->get('transactions')->result();
        return $exportTrans;
    }

    public function ExportCleanliness()
    {
        //$query = "SELECT * FROM `Cleanliness` ORDER BY `id` DESC";
        //return $this->db->query($query)->result_array();
        $this->db->order_by('id', 'DESC');
        $exportCleanliness = $this->db->get('cleanliness')->result();
        return $exportCleanliness;
    }
}
