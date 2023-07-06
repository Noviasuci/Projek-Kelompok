<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_jadwal_ujian extends CI_Model
{
    public function jadwal_ujian($id)
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->where('tb_jadwal.id_jadwal',$id);
        $query = $this->db->get();
        return $query->result();
    }
}
