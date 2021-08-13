<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {


    function insert_department($data)
    {
        $this->db->insert("departemen",$data);
        return $this->db->insert_id();
    }

    function select_departments()
    {
        $qry=$this->db->get('departemen');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_department_byID($id)
    {

        $this->db->where('id',$id);
        $qry=$this->db->get('departemen');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_department($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("departemen");
        $this->db->affected_rows();
    }



    function update_department($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('departemen',$data);
        $this->db->affected_rows();
    }






}
