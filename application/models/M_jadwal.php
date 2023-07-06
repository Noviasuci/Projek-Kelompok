<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_jadwal extends CI_Model
{
    public function get_joinjadwal($id)
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->where('tb_jadwal.id_jadwal', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_jadwal($idkls, $idsiswa)
    {
        $array = array('tb_kelas.id_kelas' => $idkls, 'tb_siswa.id_siswa' => $idsiswa);
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_siswa.id_kelas', 'left');
        $this->db->where($array);
        $this->db->order_by('id_jadwal', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_jadwal2($idkls)
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_siswa.id_kelas', 'left');
        $this->db->where('tb_kelas.id_kelas', $idkls);
        $this->db->order_by('id_jadwal', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_jadwal3($idsiswa)
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_siswa.id_kelas', 'left');
        $this->db->where('tb_siswa.id_siswa', $idsiswa);
        $this->db->order_by('id_jadwal', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_jadwal4()
    {
        $this->db->select('*');
        $this->db->from('tb_jadwal');
        $this->db->join('tb_matapelajaran', 'tb_jadwal.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
        $this->db->join('tb_siswa', 'tb_jadwal.id_siswa=tb_siswa.id_siswa');
        $this->db->join('tb_jenis_ujian', 'tb_jadwal.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_siswa.id_kelas', 'left');
        $this->db->order_by('id_jadwal', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
