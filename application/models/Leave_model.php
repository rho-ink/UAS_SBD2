<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_model extends CI_Model {


    function insert_leave($data)
    {
        $this->db->insert("absensi",$data);
        return $this->db->insert_id();
    }

    function select_leave()
    {
        $this->db->order_by('absensi.id','DESC');
        $this->db->select("absensi.*,pegawai.pic,pegawai.staff_name,pegawai.city,pegawai.state,pegawai.country,pegawai.mobile,pegawai.email,departemen.department_name");
        $this->db->from("absensi");
        $this->db->join("pegawai",'pegawai.id=absensi.staff_id');
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
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

    function select_leave_byStaffID($staffid)
    {
        $this->db->order_by('absensi.id','DESC');
        $this->db->where('absensi.staff_id',$staffid);
        $this->db->select("absensi.*,pegawai.staff_name,pegawai.city,pegawai.state,pegawai.country,pegawai.mobile,pegawai.email,departemen.department_name");
        $this->db->from("absensi");
        $this->db->join("pegawai",'pegawai.id=absensi.staff_id');
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_leave_forApprove()
    {
        $this->db->where('absensi.status',0);
        $this->db->select("absensi.*,pegawai.pic,pegawai.staff_name,pegawai.city,pegawai.state,pegawai.country,pegawai.mobile,pegawai.email,departemen.department_name");
        $this->db->from("absensi");
        $this->db->join("pegawai",'pegawai.id=absensi.staff_id');
        $this->db->join("departemen",'departemen.id=pegawai.department_id');
        $qry=$this->db->get();
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



    function update_leave($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('absensi',$data);
        $this->db->affected_rows();
    }






}
