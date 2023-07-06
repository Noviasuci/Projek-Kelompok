<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_ujian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'siswa_login') {
			redirect(base_url() . 'auth?alert=belum_login');
		}
	}

	public function soal($id_jadwal)
	{
		$id_jadwal = $this->uri->segment(3);
		$id = $this->db->query('SELECT * FROM tb_jadwal WHERE id_jadwal="' . $id_jadwal . '"  ')->row_array();
		$soal_ujian = $this->db->query('SELECT * FROM tb_soal_ujian WHERE id_matapelajaran="' . $id['id_matapelajaran'] . '" ORDER BY RAND()');
		$where = array('id_jadwal' => $id_jadwal);
		$data2 = array('status_ujian_ujian' => 1);
		$this->m_data->update_data($where, $data2, 'tb_jadwal');
		$time = $id['timer_ujian'];
		$data = array(
			"soal" => $soal_ujian->result(),
			"total_soal" => $soal_ujian->num_rows(),
			"max_time" => $time,
			"id" => $id
		);
		$this->load->view('ujian/v_soalujian', $data);
	}

	public function jawab_aksi()
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$jumlah = $_POST['jumlah_soal'];
		$id_soal = $_POST['soal'];
		$jawaban = $_POST['jawaban'];
		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal[$i];
			$jawaban[$nomor];
			$data[] = array(
				'id_jadwal' => $id_jadwal,
				'id_soal_ujian' => $nomor,
				'jawaban' => $jawaban[$nomor]
			);
		}
		$this->db->insert_batch('tb_jawaban', $data);
		$this->db->select('tb_jawaban.id_jawaban, tb_jawaban.jawaban, tb_soal_ujian.kunci_jawaban');
		$this->db->from('tb_jawaban');
		$this->db->join('tb_soal_ujian', 'tb_jawaban.id_soal_ujian = tb_soal_ujian.id_soal_ujian');
		$this->db->where('id_jadwal', $id_jadwal);

		$cek = $this->db->get();
		$jumlah = $cek->num_rows();

		foreach ($cek->result_array() as $d) {
			$where = $d['id_jawaban'];
			if ($d['jawaban'] == $d['kunci_jawaban']) {
				$data = array(
					'skor' => 1,
				);
				$this->m_data->UpdateNilai($where, $data, 'tb_jawaban');
			} else {
				$data = array(
					'skor' => 0,
				);
				$this->m_data->UpdateNilai($where, $data, 'tb_jawaban');
			}
		}

		$benar = 0;
		$salah = 0;
		$total_nilai = 0;
		$cek2 = $this->db->query('SELECT id_jawaban, jawaban, skor, tb_soal_ujian.kunci_jawaban FROM tb_jawaban join tb_soal_ujian ON tb_jawaban.id_soal_ujian=tb_soal_ujian.id_soal_ujian WHERE id_jadwal="' . $id_jadwal . '"');
		$jumlah = $cek2->num_rows();
		$where = $id_jadwal;
		foreach ($cek2->result_array() as $c) {
			if ($c['jawaban'] == $c['kunci_jawaban']) {
				$benar++;
			} else {
				$salah++;
			}
			$total_nilai += $c['skor'] / $jumlah * 100;
		}
		$data = array(
			'benar' => $benar,
			'salah' => $salah,
			'status_ujian' => 2,
			'status_ujian_ujian' => 2,
			'nilai' => $total_nilai
		);
		$this->m_data->UpdateNilai2($where, $data, 'tb_jadwal');
		redirect(base_url('jadwal_ujian'));
	}


}