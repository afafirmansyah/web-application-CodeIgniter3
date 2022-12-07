<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function getCleanliness()
    {
        $query = "SELECT * FROM cleanliness ORDER BY id DESC LIMIT 1;";
        return $this->db->query($query)->row_array();
    }
}
