<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_model extends CI_Model {

    public function generate_unique_number() {
        $this->db->select('candidate_id');
        $this->db->from('candidate');
        $this->db->like('candidate_id', 'WCE'.date("Ymd"), 'after');
        $this->db->order_by('candidate_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $last_candidate_id = $query->row()->candidate_id;
            $last_number = substr($last_candidate_id, 11);
            return str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);
        } else {
            return '001';
        }
    }

    public function get_all_candidates() {
        $query = $this->db->get('candidate');
        return $query->result_array();
    }
}

