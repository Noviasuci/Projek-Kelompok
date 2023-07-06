<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_ujian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			redirect(base_url('auth'));
		}
		$this->load->model('m_hasil');
		$this->load->library('mypdf');
	}

	public function index()
	{
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['hasil'] = $this->m_hasil->get_jadwal2($id);
			$data['kelas']=$this->m_data->get_data('tb_matapelajaran')->result();
		} else {
			$data['hasil'] = $this->m_hasil->get_jadwal3();
			$data['kelas']=$this->m_data->get_data('tb_matapelajaran')->result();
		}		
		$this->load->view('admin/v_hasil', $data);
	}

	public function print_all()
	{	
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['cetak'] = $this->m_hasil->get_jadwal2($id);
		} else {
			$data['cetak'] = $this->m_hasil->get_jadwal3();
		}
		$this->mypdf->generate('admin/v_cetak', $data, 'Cetak Hasil Ujian ujian', 'A4', 'Landscape');
	}

	public function cetak($id)
	{
		$where = array('id_jadwal' => $id);
		$id = $where['id_jadwal'];
		$data['cetak'] = $this->m_hasil->cetak($id);
		$this->mypdf->generate('admin/v_cetak', $data, 'Cetak Hasil Ujian ujian', 'A4', 'Landscape');
	}
}
