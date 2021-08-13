<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_model extends CI_Model {


    function insert_salary($data)
    {
        $this->db->insert("gaji",$data);
        $this->db->affected_rows();
    }

    function select_salary()
    {
        $this->db->order_by('pegawai.id','DESC');
        $this->db->select("gaji.*,pegawai.staff_name,pegawai.pic,departemen.department_name");
        $this->db->from("gaji");
        $this->db->join("pegawai",'pegawai.id=gaji.staff_id');
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_salary_byID($id)
    {
        $this->db->where('gaji.id',$id);
        $this->db->select("gaji.*,pegawai.staff_name,pegawai.city,pegawai.state,pegawai.country,pegawai.mobile,pegawai.email,departemen.department_name");
        $this->db->from("gaji");
        $this->db->join("pegawai",'pegawai.id=gaji.staff_id');
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_salary_byStaffID($staffid)
    {
        $this->db->where('gaji.staff_id',$staffid);
        $this->db->select("gaji.*,pegawai.staff_name,pegawai.city,pegawai.state,pegawai.country,pegawai.mobile,pegawai.email,departemen.department_name");
        $this->db->from("gaji");
        $this->db->join("pegawai",'pegawai.id=gaji.staff_id');
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

    function sum_salary()
    {
        $this->db->select_sum('total');
        $qry = $this->db->get('gaji');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_salary($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("gaji");
        $this->db->affected_rows();
    }


    function update_staff($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('pegawai',$data);
        $this->db->affected_rows();
    }









}
