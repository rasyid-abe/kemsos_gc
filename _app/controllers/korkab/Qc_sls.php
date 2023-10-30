<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qc_sls extends Backend_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->dir = base_url('korkab/qc_sls/');
		$this->load->model('auth_model');
		$this->id = $this->session->userdata('user_info');
	}

	function index()
	{
		$this->show();
	}

	function show()
	{
		$data = array();
		$is_pic = $this->user_info['user_group'];
		$is_qc = $this->user_info['user_group'];
		$data['pic'] = in_array('p-i-c', $is_pic) ? 1 : 0;
		$data['qc'] = in_array('q-c', $is_qc) ? 1 : 0;
		$data['cari'] = $this->form_cari();
		$data['base_url'] = $this->dir;
		$data['title'] = 'Approve / Reject Data SLS (M4)';
		$this->template->title($data['title']);
		$this->template->content("korkab/view_qc_sls", $data);
		$this->template->show(THEMES_BACKEND . 'index');
	}

	function get_show_data()
	{
		$is_pic = $this->user_info['user_group'];

		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$order = $this->input->post("order");
		$search = $this->input->post("search");
		$search = $search['value'];

		$col = 0;
		$where = $region = $dir = $order_by = '';
		$input = $this->input->post();

		if ((!in_array('p-i-c', $is_pic) && !in_array('q-c', $is_pic)) || $input['s_fill'] != 0) {

			if ($input['s_prov'] != 0) {
				if ($input['s_prov'] != 0 && $input['s_regi'] == 0 && $input['s_dist'] == 0 && $input['s_vill'] == 0) {
					$region = $input['s_prov'];
				} elseif ($input['s_regi'] != 0 && $input['s_dist'] == 0 && $input['s_vill'] == 0) {
					$region = $input['s_prov'] . $input['s_regi'];
				} elseif ($input['s_dist'] != 0 && $input['s_vill'] == 0) {
					$region = $input['s_prov'] . $input['s_regi'] . $input['s_dist'];
				} elseif ($input['s_vill'] != 0) {
					$region = $input['s_prov'] . $input['s_regi'] . $input['s_dist'] . $input['s_vill'];
				}

				$where .= "bps_full_code like '" . $region . "%' AND ";
			}

			if (!empty($order)) {
				foreach ($order as $o) {
					$col = $o['column'];
					$dir = $o['dir'];
				}
			}

			if ($dir != "asc" && $dir != "desc") {
				$dir = "desc";
			}

			$valid_columns = array(
				0 => 'stereotype',
				1 => 'province_name',
				2 => 'regency_name',
				3 => 'district_name',
				4 => 'village_name',
				5 => 'nama_sls',
				6 => 'nama_petugas',
				7 => 'lastupdate_on'
			);

			if (!isset($valid_columns[$col])) {
				$order = null;
			} else {
				$order = $valid_columns[$col];
			}

			if ($order != null) {
				$order_by = $order . ' ' . $dir;
			}

			$sql = "
				EXEC dbo.stp_daftar_semua_data_m4 '" . $region . "', '" . $input['s_stereo'] . "', '" . $input['s_enum'] . "', '" . $input['s_sls'] . "', '" . $start . "', '" . $length . "',0
			";

			$gen_data = $this->db->query($sql);
			$data = array();
			foreach ($gen_data->result() as $rows) {
				$on = date("d-m-Y H:i:s", strtotime($rows->lastupdate_on));
				$status = '<span class="badge badge-pill ' . $rows->css . '">' . $rows->stereotype . '</span>';
				$detail = '<div class="btn-group dropdown mr-1 mb-1">
								<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
								<div class="dropdown-menu">
								<a class="dropdown-item" href="' . base_url("monitoring/detail_sls/get_form_detail/" . enc(['proses_id' => $rows->proses_id])) . '" target="_blank">Detail</a>
								<a class="dropdown-item can_edit_art" href="#" data-toggle="modal" data-target="#large" data-proses-id="' . $rows->proses_id . '" data-backdrop="static" data-keyboard="false">ART Edit</a>
								</div>
							</div>';
				$data[] = array(
					$detail,
					$status,
					$rows->province_name,
					$rows->regency_name,
					$rows->district_name,
					$rows->village_name,
					$rows->nama_sls,
					$rows->nama_petugas,
					$on,
					$rows->proses_id
				);
			}

			$sql_total = "
				EXEC dbo.stp_daftar_semua_data_m4 '" . $region . "', '" . $input['s_stereo'] . "', '" . $input['s_enum'] . "', '" . $input['s_sls'] . "', '" . $start . "', '" . $length . "',1
			";
			$total_data = $this->totalData($sql_total);
			$output = array(
				"draw" => $draw,
				"recordsTotal" => $total_data,
				"recordsFiltered" => $total_data,
				"data" => $data
			);
		} else {
			$output = array(
				"draw" => "",
				"recordsTotal" => 0,
				"recordsFiltered" => 0,
				"data" => ""
			);
		}
		echo json_encode($output);
		exit();
	}

	function act_approve()
	{
		$ids = $this->input->post('ids', true);
		$sukses = $gagal = 0;

		for ($i = 0; $i < count($ids); $i++) {
			$details = [
				'table' => 'dbo.master_data',
				'where' => [
					'proses_id' => $ids[$i]
				],
				'select' => 'proses_id, stereotype, audit_trails'
			];

			$user_ip = client_ip();
			$stereotype = get_data($details)->row('stereotype');
			$audit_trails = json_decode(get_data($details)->row('audit_trails'), true);
			$audit_trails[] = [
				"ip" => $user_ip['ip_address'],
				"on" => date('Y-m-d H:i:s'),
				"act" => "APPROVE",
				"user_id" => $this->user_info['user_id'],
				"username" => $this->user_info['user_username'],
				"column_data" => [
					"proses_id" => $ids[$i],
					"stereotype" => 'C2'
				],
				"is_proxy_access" => $user_ip['is_proxy']
			];

			$upd_data = [
				'stereotype' => 'C2',
				'lastupdate_by' => $this->id['user_id'],
				'lastupdate_on' => date('Y-m-d H:i:s'),
				'audit_trails' => json_encode($audit_trails)
			];

			$this->db->where('proses_id', $ids[$i]);
			$update = $this->db->update('master_data', $upd_data);

			$data_log = [];
			if ($update) {
				$sukses++;
				$data_log['status'] = 'sukses';
			} else {
				$gagal++;
				$data_log['status'] = 'gagal';
			}

			$data_log['proses_id'] = $ids[$i];
			$data_log['description'] = 'Approve dari ' . $stereotype . ' ke C2';
			$data_log['stereotype'] = 'C2';
			$data_log['created_by'] = $this->id['user_id'];
			$data_log['created_on'] =  date('Y-m-d H:i:s');

			$in_log = $this->db->insert('master_data_log', $data_log);
		}

		$result = [
			'status' => true,
			'sukses' => $sukses,
			'gagal' => $gagal,
			'pesan' => $sukses . ' data berhasil diapprove. ' . $gagal . ' data gagal diapprove',
		];

		echo json_encode($result);
	}

	function act_reject()
	{
		$ids = $this->input->post('ids', true);
		$note = $this->input->post('note', true);
		$sukses = $gagal = 0;

		for ($i = 0; $i < count($ids); $i++) {
			$params_get_audit_trail = [
				'table' => 'dbo.master_data',
				'where' => [
					'proses_id' => $ids[$i]
				],
				'select' => 'audit_trails, stereotype, proses_id'
			];

			$user_ip = client_ip();
			$audit_trails = json_decode(get_data($params_get_audit_trail)->row('audit_trails'), true);
			$stereotype = get_data($params_get_audit_trail)->row('stereotype');
			$proses_id = get_data($params_get_audit_trail)->row('proses_id');

			$audit_trails[] = [
				"ip" => $user_ip['ip_address'],
				"on" => date('Y-m-d H:i:s'),
				"act" => "REJECT",
				"user_id" => $this->user_info['user_id'],
				"username" => $this->user_info['user_username'],
				"column_data" => [
					"proses_id" => $ids[$i],
					"stereotype" => "P3a"
				],
				"is_proxy_access" => $user_ip['is_proxy']
			];

			$upd_data = [
				'stereotype' => 'P3a',
				'revoke_note' => $note,
				'lastupdate_by' => $this->id['user_id'],
				'lastupdate_on' => date('Y-m-d H:i:s'),
				'audit_trails' => json_encode($audit_trails)
			];

			$upd_prelist = [
				'row_status' => 'NON-ACTIVE',
				'lastupdate_by' => $this->id['user_id'],
				'lastupdate_on' => date('Y-m-d H:i:s')
			];

			$update = $this->db->update('master_data', $upd_data, array('proses_id' => $ids[$i]));
			$update_prelist = $this->db->update('master_data_detail', $upd_prelist, array('proses_id' => $ids[$i], 'status_edit' => 1, 'row_status' => 'ACTIVE'));

			$params_update_assignment = [
				'table' => 'dbo.ref_assignment',
				'data' => [
					'row_status' => 'DELETED',
					'lastupdate_by' => $this->id['user_id'],
					'lastupdate_on' => date('Y-m-d H:i:s'),
				],
				'where' => [
					'proses_id' => $proses_id,
					'row_status' => 'ACTIVE'
				],
			];

			$task = save_data($params_update_assignment);

			$data_log = [];
			if ($update) {
				$sukses++;
				$data_log['status'] = 'sukses';
			} else {
				$gagal++;
				$data_log['status'] = 'gagal';
			}

			$data_log['proses_id'] = $ids[$i];
			$data_log['description'] = 'Reject dari ' . $stereotype . ' ke P3a';
			$data_log['stereotype'] = 'P3a';
			$data_log['created_by'] = $this->id['user_id'];
			$data_log['created_on'] =  date('Y-m-d H:i:s');

			$in_log = $this->db->insert('master_data_log', $data_log);
		}

		$result = [
			'status' => true,
			'sukses' => $sukses,
			'gagal' => $gagal,
			'pesan' => $sukses . ' data berhasil direject. ' . $gagal . ' data gagal direject',
		];

		echo json_encode($result);
	}

	function get_detail_art()
	{
		$proses_id = $this->input->post('proses_id');
		$query = "
			SELECT * FROM master_data_detail mdd
			WHERE mdd.proses_id = $proses_id
		";
		$data = $this->db->query($query)->result_array();

		echo json_encode($data);
	}

	function act_can_edit()
	{
		$id = $this->input->post('id', true);
		$value = $this->input->post('value', true);

		$this->db->where('detail_id', $id);
		$ins = $this->db->update('master_data_detail', ['status_edit' => $value]);

		if ($ins) {
			$result = [
				'status' => true,
				'pesan' => 'Aksi edit berhasil diperbarui.',
			];
		} else {
			$result = [
				'status' => false,
				'pesan' => 'Aksi edit gagal diperbarui.',
			];
		}

		echo json_encode($result);
	}

	function totalData($sql_total)
	{
		$query = $this->db->query($sql_total);
		$result = $query->row();
		if (isset($result)) return $result->num;
		return 0;
	}

	function form_cari()
	{
		$user_location = $this->get_user_location();
		$jml_negara = count(explode(',', $user_location['country_id']));
		$jml_propinsi = count(explode(',', $user_location['province_id']));
		$jml_kota = count(explode(',', $user_location['regency_id']));
		$jml_kecamatan = count(explode(',', $user_location['district_id']));
		$jml_kelurahan = count(explode(',', $user_location['village_id']));

		$option_propinsi = '<option value="0">Semua Provinsi</option>';
		$option_kelurahan = '<option value="0">Semua Kelurahan</option>';
		$option_kota = '<option value="0">Semua Kota/Kabupaten</option>';
		$option_kecamatan = '<option value="0">Semua Kecamatan</option>';
		$option_kelurahan = '<option value="0">Semua Kelurahan</option>';
		$option_status = '<option value="0">Semua Status</option>';
		$option_hasil_musdes = '<option value="0">Semua Hasil Musdes</option>';
		$option_hasil_verivali = '<option value="0">Semua Hasil Verivali</option>';

		$where_propinsi = [];

		if (!empty($user_location['province_id'])) {
			if ($jml_propinsi > '0') $where_propinsi['province_id ' . (($jml_propinsi >= '2') ? "IN ({$user_location['province_id']}) " : " = {$user_location['province_id']}")] = null;
		}

		$params_propinsi = [
			'table' => 'dbo.administration_regions',
			'select' => 'DISTINCT kode_propinsi, propinsi',
			'where' => $where_propinsi,
			'order_by' => 'propinsi',
		];
		$query_propinsi = get_data($params_propinsi);
		foreach ($query_propinsi->result() as $key => $value) {
			if ($value->propinsi != '') {
				if ($jml_propinsi == '1' && !empty($user_location['province_id'])) {
					$option_propinsi = '<option value="' . $value->kode_propinsi . '" selected>' . $value->propinsi . '</option>';
				} else {
					$option_propinsi .= '<option value="' . $value->kode_propinsi . '">' . $value->propinsi . '</option>';
				}
			}
		}


		if ($jml_propinsi == '1') {
			$where_kota = [];
			if (!empty($user_location['regency_id'])) {
				if ($jml_kota > '0') $where_kota['regency_id ' . (($jml_kota >= '2') ? "IN ({$user_location['regency_id']}) " : " = {$user_location['regency_id']}")] = null;
			} else {
				$where_kota['province_id'] = $user_location['province_id'];
			}
			$params_kota = [
				'table' => 'dbo.administration_regions',
				'select' => 'DISTINCT kode_kabupaten, kabupaten',
				'where' => $where_kota,
				'order_by' => 'kabupaten',
			];
			$query_kota = get_data($params_kota);
			foreach ($query_kota->result() as $key => $value) {
				if ($jml_kota == '1' && !empty($user_location['regency_id'])) {
					$option_kota = '<option value="' . $value->kode_kabupaten . '" selected>' . $value->kabupaten . '</option>';
				} else {
					$option_kota .= '<option value="' . $value->kode_kabupaten . '">' . $value->kabupaten . '</option>';
				}
			}
		}

		if ($jml_kota == '1') {
			$where_kecamatan = [];
			if (!empty($user_location['district_id'])) {
				if ($jml_kecamatan > '0') $where_kecamatan['district_id ' . (($jml_kecamatan >= '2') ? "IN ({$user_location['district_id']}) " : " = {$user_location['district_id']}")] = null;
			} else {
				$where_kecamatan['regency_id'] = $user_location['regency_id'];
			}
			$params_kecamatan = [
				'table' => 'dbo.administration_regions',
				'select' => 'DISTINCT kode_kecamatan, kecamatan',
				'where' => $where_kecamatan,
				'order_by' => 'kecamatan',
			];
			$query_kecamatan = get_data($params_kecamatan);
			foreach ($query_kecamatan->result() as $key => $value) {
				if ($jml_kecamatan == '1' && !empty($user_location['district_id'])) {
					$option_kecamatan = '<option value="' . $value->kode_kecamatan . '" selected>' . $value->kecamatan . '</option>';
				} else {
					$option_kecamatan .= '<option value="' . $value->kode_kecamatan . '">' . $value->kecamatan . '</option>';
				}
			}
		}

		if ($jml_kecamatan == '1') {
			$where_kelurahan = [];
			if (!empty($user_location['village_id'])) {
				if ($jml_kelurahan > '0') $where_kelurahan['village_id ' . (($jml_kelurahan >= '2') ? "IN ({$user_location['village_id']}) " : " = {$user_location['village_id']}")] = null;
			} else {
				$where_kelurahan['district_id'] = $user_location['district_id'];
			}
			$params_kelurahan = [
				'table' => 'dbo.administration_regions',
				'select' => 'DISTINCT village_id, kelurahan',
				'where' => $where_kelurahan,
				'order_by' => 'kelurahan',
			];
			$query_kelurahan = get_data($params_kelurahan);
			foreach ($query_kelurahan->result() as $key => $value) {
				if ($jml_kelurahan == '1' && !empty($user_location['village_id'])) {
					$option_kelurahan = '<option value="' . $value->village_id . '" selected>' . $value->kelurahan . '</option>';
				} else {
					$option_kelurahan .= '<option value="' . $value->village_id . '">' . $value->kelurahan . '</option>';
				}
			}
		}

		$form_cari = '
		<div class="row"">
		<div class="form-group col-md-3">
		<select id="select-propinsi" style="width:100%" name="propinsi" class="select2 form-control" ' . ((($jml_propinsi == '1') && (!empty($user_location['province_id']))) ? 'disabled ' : '') . '>
		' . $option_propinsi . '
		</select>
		</div>
		<div class="form-group col-md-3">
		<select id="select-kabupaten" style="width:100%" name="kabupaten" class="select2 form-control" ' . ((($jml_kota == '1') && (!empty($user_location['regency_id']))) ? 'disabled ' : '') . '>
		' . $option_kota . '
		</select>
		</div>
		<div class="form-group col-md-3">
		<select id="select-kecamatan" style="width:100%" name="kecamatan" class="select2 form-control" ' . ((($jml_kecamatan == '1') && (!empty($user_location['district_id']))) ? 'disabled ' : '') . '>
		' . $option_kecamatan . '
		</select>
		</div>
		<div class="form-group col-md-3">
		<select id="select-kelurahan" style="width:100%" name="kelurahan" class="select2 form-control" >
		' . $option_kelurahan . '
		</select>
		</div>
		</div>


		';
		return $form_cari;
	}

	function get_user_location()
	{
		$user_location = $this->user_info['user_location'];
		$res_loc = '';
		$country_id = '0';
		$province_id = '';
		$regency_id = '';
		$district_id = '';
		$village_id = '';
		if (!empty($user_location)) {
			$count = count($user_location);
			$no = 1;
			foreach ($user_location as $loc) {
				$params_location = [
					'table' => 'dbo.ref_locations',
					'where' => [
						'location_id' => $loc
					]
				];
				$query = get_data($params_location);
				$country_id = $query->row('country_id') . (($no < $count) ? ',' : '');

				$province_id = $query->row('province_id') != '' ? ($no < $count ? $province_id . $query->row('province_id') . ',' : $province_id . $query->row('province_id')) : '';

				$regency_id = $query->row('regency_id') != '' ? ($no < $count ? $regency_id . $query->row('regency_id') . ',' : $regency_id . $query->row('regency_id')) : '';

				$district_id = $query->row('district_id') != '' ? ($no < $count ? $district_id . $query->row('district_id') . ',' : $district_id . $query->row('district_id')) : '';

				$village_id = $query->row('village_id') != '' ? ($no < $count ? $village_id . $query->row('village_id') . ',' : $village_id . $query->row('village_id')) : '';

				$no++;
			}
		}

		$res_loc = [
			'country_id' => $country_id,
			'province_id' => $province_id,
			'regency_id' => $regency_id,
			'district_id' => $district_id,
			'village_id' => $village_id,
		];

		return $res_loc;
	}

	function get_show_location()
	{
		if ($_GET['title'] == "Kabupaten") {
			$select = 'bps_regency_code';
			$params = [
				'table' => 'ref_locations',
				'where' => [
					'bps_province_code' => $_GET['bps_province_code'],
					'stereotype' => $_GET['stereotype']
				],
				'select' => $select . ', regency_name',
			];
		} elseif ($_GET['title'] == "Kecamatan") {
			$select = 'bps_district_code';
			$params = [
				'table' => 'ref_locations',
				'where' => [
					'bps_province_code' => $_GET['bps_province_code'],
					'bps_regency_code' => $_GET['bps_regency_code'],
					'stereotype' => $_GET['stereotype']
				],
				'select' => $select . ', district_name',
			];
		} elseif ($_GET['title'] == "Kelurahan") {
			$select = 'bps_village_code';
			$params = [
				'table' => 'ref_locations',
				'where' => [
					'bps_province_code' => $_GET['bps_province_code'],
					'bps_regency_code' => $_GET['bps_regency_code'],
					'bps_district_code' => $_GET['bps_district_code'],
					'stereotype' => $_GET['stereotype']
				],
				'select' => $select . ', village_name',
			];
		}

		$query = get_data($params);
		$data = [];
		foreach ($query->result_array() as $key => $value) {
			if ($_GET['title'] == "Kabupaten") {
				$data[$value[$select]] = $value['regency_name'];
			}
			if ($_GET['title'] == "Kecamatan") {
				$data[$value[$select]] = $value['district_name'];
			}
			if ($_GET['title'] == "Kelurahan") {
				$data[$value[$select]] = $value['village_name'];
			}
		}
		echo json_encode($data);
	}
}
