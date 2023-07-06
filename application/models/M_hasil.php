<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_hasil extends CI_Model
{
    public function get_jadwal2($id)
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->where('tb_jadwal.id_matapelajaran', $id);
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_jadwal3()
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function cetak($id)
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->where('tb_jadwal.id_jadwal', $id);
        $query = $this->db->get();
        return $query->result();
    }

   
}

