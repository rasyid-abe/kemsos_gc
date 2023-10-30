<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_data extends Backend_Controller {

	public function __construct() {
		parent::__construct();
		$this->json = [];
		$this->dir = base_url( 'monitoring/detail_data/' );
		$this->id = $this->session->userdata('user_info');
	}

	function index() {
		redirect( base_url() );
	}	

	function get_form_detail() {	
		$proses_id = $this->uri->segment(4);
		$detail_id = $this->uri->segment(5);
		
		//tab1-profil-ruta
		$sql1 = "
			SELECT 
				mdd.nama_krt, mdd.nik, mdd.art_lain, mdd.nama_sls, mdd.jumlah_art, 
				mdd.nama_prop, mdd.nama_kab, mdd.nama_kec, mdd.nama_desa,
				mdd.yhat, mdd.alamat, mdd.keterangan, mdd.sumber_penerangan, mdd.atap, 
				mdd.lantai, mdd.dinding, mdd.kepemilikan_kendaraan, mdd.kesesuaian_ruta, mdd.hasil_pengamatan,
				md.last_submit, mdd.id_prelist, mdd.bps_full_code, md.proses_id, mdd.detail_id, mdd.lastupdate_on
			FROM master_data md
			LEFT JOIN dbo.master_data_detail AS mdd ON md.proses_id = mdd.proses_id
			WHERE md.proses_id = $proses_id AND mdd.detail_id = $detail_id
		";
		$get_data1 = $this->db->query($sql1)->row_array();

		//tab2-info-petugas-monitoring
		$sql2 = "
			SELECT mdd.detail_id, mdd.keberadaan_ruta, mdd.id_prelist, mdd.nik, mdd.narasumber, md.tanggal_pelaksanaan, usr.user_profile_first_name, acc.user_account_username, mdd.lastupdate_on FROM master_data md
			LEFT JOIN dbo.master_data_detail AS mdd ON md.proses_id = mdd.proses_id
			LEFT JOIN ref_assignment task ON md.proses_id = task.proses_id AND task.row_status != 'DELETED'
			LEFT JOIN core_user_profile usr ON task.user_id = usr.user_profile_id
			LEFT JOIN core_user_account acc ON task.user_id = acc.user_account_id
			WHERE md.proses_id = $proses_id AND mdd.detail_id = $detail_id 
		";
		$get_data2 = $this->db->query($sql2)->row_array();

		//log-data-prelist
		$sql3 = "
			SELECT TOP 150 * FROM master_detail_log
			WHERE detail_id = $detail_id
			ORDER BY log_id DESC
		";		
		$get_data3 = $this->db->query($sql3)->result_array();

		//foto
		$sql4 = "
			SELECT fl.file_name, fl.internal_filename, fl.description, fl.stereotype, fl.status, fl.row_status, fl.created_by, fl.created_on FROM master_data_detail mdd
			LEFT JOIN files fl ON mdd.detail_id = fl.owner_id
			WHERE fl.owner_id = $detail_id AND fl.stereotype IN ('F-ATAP','F-JAMBAN','F-DAPUR','F-DINDING','F-LANTAI','F-RUMAH') AND fl.row_status != 'DELETED'
			ORDER BY fl.created_on DESC
		";		
		$get_data4 = $this->db->query($sql4)->result_array();

		//lokasi
		$sql5 = "
			SELECT TOP 1 fl.latitude, fl.longitude FROM files fl
			WHERE fl.owner_id = $detail_id AND fl.stereotype IN ('F-RUMAH') AND fl.row_status != 'DELETED'
		";		
		$get_data5 = $this->db->query($sql5)->row_array();

		//narasumber
		$getnara = [
			'table' => 'dbo.master_data_detail',
			'where' => [
				'proses_id' => $proses_id,
				'detail_id' => $detail_id,
			],
			'select' => 'narasumber, proses_id'
		];

		$details = get_data($getnara)->row('narasumber');
		$prosess = get_data($getnara)->row('proses_id');

		if ($details == '') { $details = 0; } 
		else $details = $details;

		$sql6 = "
			SELECT nama_krt FROM master_data_detail
			WHERE detail_id = $details AND proses_id = $prosess
		";
		$get_data6 = $this->db->query($sql6)->row_array();

		$data = array();
		$data['prelist_data'] = $get_data1;
		$data['monitoring'] = $get_data2;
		$data['log'] = $get_data3;
		$data['foto'] = $get_data4;
		$data['lokasi'] = $get_data5;
		$data['narasumber'] = $get_data6;
		$data['title'] = 'Detail Data Prelist';
		$this->template->title( $data['title'] );
		$this->template->content( "monitoring/detail_prelist", $data );
		$this->template->show( THEMES_BACKEND . 'index' );		
	}

	function edit_prelist(){		
		$detail_id = $this->input->post('detail_id');
		$proses_id = $this->input->post('proses_id');
		$sumber_penerangan = $this->input->post('sumber_penerangan');
		$atap = $this->input->post('atap');
		$lantai = $this->input->post('lantai');
		$dinding = $this->input->post('dinding');
		$kesesuaian_ruta = $this->input->post('kesesuaian_ruta');
		$hasil_pengamatan = $this->input->post('hasil_pengamatan');
		$keterangan = $this->input->post('keterangan');

		$checkbox1 = $this->input->post('checkbox1');
		$checkbox2 = $this->input->post('checkbox2');
		$checkbox3 = $this->input->post('checkbox3');
		$checkbox4 = $this->input->post('checkbox4');
		$checkbox5 = $this->input->post('checkbox5');

		$kendaraan = $checkbox1 + $checkbox2 + $checkbox3 + $checkbox4 + $checkbox5;
		
		$user_ip = client_ip();
		$upd_data = [
			'sumber_penerangan' => $sumber_penerangan,
			'atap' => $atap,
			'lantai' => $lantai,
			'dinding' => $dinding,
			'kepemilikan_kendaraan' => $kendaraan,
			'kesesuaian_ruta' => $kesesuaian_ruta,
			'hasil_pengamatan' => $hasil_pengamatan,
			'keterangan' => $keterangan,
			'lastupdate_by' => $this->id['user_id'],
			'lastupdate_on' => date('Y-m-d H:i:s')
		];
		
		$this->db->where('detail_id', $detail_id);
		$update = $this->db->update('master_data_detail', $upd_data);

		$data_log = [];
		if ($update) {
			$sukses ++;
			$data_log['status'] = 'sukses';
		} else {
			$gagal++;
			$data_log['status'] = 'gagal';
		}

		$data_log['detail_id'] = $detail_id;
		$data_log['description'] = 'Edit data Prelist';
		$data_log['created_by'] = $this->id['user_id'];
		$data_log['created_on'] =  date('Y-m-d H:i:s');

		$in_log = $this->db->insert('master_detail_log', $data_log);

		$this->session->set_flashdata('tab', 'update_prelist');
		if ($update) {
			$this->session->set_flashdata('status', '1');
			return redirect('monitoring/detail_data/get_form_detail/'. $proses_id .'/' . $detail_id );
		} else {
			$this->session->set_flashdata('status', '2');
			return redirect('monitoring/detail_data/get_form_detail/'. $proses_id .'/' . $detail_id );
		}
	}

}
