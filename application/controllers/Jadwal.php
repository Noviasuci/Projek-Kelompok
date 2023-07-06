<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			redirect(base_url('auth'));
		}
		$this->load->model('m_jadwal');
		
	}

	public function index()
	{
		if (isset($_GET['idkls']) and isset($_GET['idsiswa'])) {
			$idkls = $this->input->get('idkls');
			$idsiswa = $this->input->get('idsiswa');
			$data['jadwal'] = $this->m_jadwal->get_jadwal($idkls, $idsiswa)->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['siswa'] = $this->m_data->get_data('tb_siswa')->result();
		} else if (isset($_GET['idkls'])) {
			$idkls = $this->input->get('idkls');
			$data['jadwal'] = $this->m_jadwal->get_jadwal2($idkls)->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['siswa'] = $this->m_data->get_data('tb_siswa')->result();
		} else if (isset($_GET['idsiswa'])) {
			$idsiswa = $this->input->get('idsiswa');
			$data['jadwal'] = $this->m_jadwal->get_jadwal3($idsiswa)->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['siswa'] = $this->m_data->get_data('tb_siswa')->result();
		} else {
			$data['jadwal'] = $this->m_jadwal->get_jadwal4()->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['siswa'] = $this->m_data->get_data('tb_siswa')->result();
		}
		$this->load->view('admin/v_jadwal', $data);
	}

	public function hapus($id)
	{
		$where = array(
			'id_jadwal' => $id
		);
		$this->m_data->delete_data($where, 'tb_jadwal');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data Peserta Ujian berhasil di hapus !</h4></div>');
		redirect(base_url('jadwal'));
	}


	public function edit($id)
	{
		$data['jadwal'] = $this->m_jadwal->get_joinjadwal($id);
		$data['mapel'] = $this->m_data->get_data('tb_matapelajaran')->result();
		$data['siswa'] = $this->m_data->get_data('tb_siswa')->result();
		$data['jenis_ujian'] = $this->m_data->get_data('tb_jenis_ujian')->result();
		$this->load->view('admin/v_jadwal_edit', $data);
	}

	public function update()
	{
		$jadwal 		= $this->input->post('jadwal');
		$mapel 			= $this->input->post('mapel');
		$tanggal		= $this->input->post('tanggal');
		$jam			= $this->input->post('jam');
		$durasi_ujian		= $this->input->post('durasi_ujian');
		$jenis			= $this->input->post('jenis');
		$timer_ujian 		= $durasi_ujian*60;
		$where  = array('id_jadwal' => $this->input->post('id'));

		if ($jadwal == '' || $mapel == '' || $tanggal == '' || $jam == '' || $durasi_ujian == '' || $jenis == '') {
			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> semua field harus diisi semua !</h4></div>');
			redirect(base_url('jadwal'));
		} else {
			$data = array(
				'id_siswa'		=> $jadwal,
				'id_matapelajaran'		=> $mapel,
				'id_jenis_ujian'	=> $jenis,
				'tanggal_ujian'		=> $tanggal,
				'jam_ujian'			=> $jam,
				'durasi_ujian'			=> $durasi_ujian,
				'timer_ujian'			=> $timer_ujian,
				'status_ujian'			=> 1
				
			);

			$this->m_data->update_data($where, $data, 'tb_jadwal');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data berhasil di Update.</h4></div>');
			redirect(base_url('jadwal'));
		}
	}

	
	
}
