<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_model extends CI_Model {


    function insert_staff($data)
    {
        $this->db->insert("pegawai",$data);
        return $this->db->insert_id();
    }

    function select_staff()
    {
        $this->db->order_by('pegawai.id','DESC');
        $this->db->select("pegawai.*,departemen.department_name");
        $this->db->from("pegawai");
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byID($id)
    {
        $this->db->where('pegawai.id',$id);
        $this->db->select("pegawai.*,departemen.department_name");
        $this->db->from("pegawai");
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byEmail($email)
    {

        $this->db->where('email',$email);
        $qry=$this->db->get('pegawai');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_staff_byDept($dpt)
    {
        $this->db->where('pegawai.department_id',$dpt);
        $this->db->select("pegawai.*,departemen.department_name");
        $this->db->from("pegawai");
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }


    function delete_staff($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("pegawai");
        $this->db->affected_rows();
    }


    function update_staff($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('pegawai',$data);
        $this->db->affected_rows();
    }









}
