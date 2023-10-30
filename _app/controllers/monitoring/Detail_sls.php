<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_sls extends Backend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->dir = base_url('monitoring/detail_sls/');
        $this->load->model('auth_model');
        $this->id = $this->session->userdata('user_info');
    }

    function index()
    {
        redirect(base_url());
    }

    function get_form_detail($par = null)
    {
        $this->load->library('encryption');
        $params = (($par != null) ? dec($par) : $par);
        $proses_id = $params['proses_id'];

        // ekonomi-gol-atas
        $sql1 = "
            SELECT 
                md.proses_id, mdd.keberadaan_ruta, mdd.detail_id, mdd.golongan, mdd.id_prelist, 
                mdd.rank_sls, md.nama_prop, md.nama_kab, md.nama_kec, md.nama_desa, mdd.nama_krt, 
                mdd.yhat, mdd.kesesuaian_ruta, mdd.hasil_pengamatan, mdd.narasumber, mdd.lastupdate_on, nmdd.nama_krt name_narasumber 
            FROM master_data md
            LEFT JOIN dbo.master_data_detail AS mdd ON md.proses_id = mdd.proses_id
            LEFT JOIN dbo.master_data_detail AS nmdd on nmdd.detail_id = mdd.narasumber
            WHERE md.proses_id = $proses_id AND mdd.golongan = 'TOP' AND mdd.row_status = 'ACTIVE'
            ORDER BY mdd.yhat DESC
        ";

        $get_data1 = $this->db->query($sql1)->result_array();

        // ekonomi-gol-bawah
        $sql2 = "
            SELECT 
                md.proses_id, mdd.keberadaan_ruta, mdd.detail_id, mdd.golongan, mdd.id_prelist, 
                mdd.rank_sls, md.nama_prop, md.nama_kab, md.nama_kec, md.nama_desa, mdd.nama_krt, mdd.yhat, 
                mdd.kesesuaian_ruta, mdd.hasil_pengamatan, mdd.narasumber, mdd.lastupdate_on, nmdd.nama_krt name_narasumber 
            FROM master_data md
            LEFT JOIN dbo.master_data_detail AS mdd ON md.proses_id = mdd.proses_id
            LEFT JOIN dbo.master_data_detail AS nmdd on nmdd.detail_id = mdd.narasumber
            WHERE md.proses_id = $proses_id AND mdd.golongan = 'BOTTOM' AND mdd.row_status = 'ACTIVE'
            ORDER BY mdd.yhat ASC
        ";

        $get_data2 = $this->db->query($sql2)->result_array();

        // ekonomi-gol-usulan-baru
        $sql3 = "
            SELECT 
                md.proses_id, mdd.nik, mdd.keberadaan_ruta, mdd.detail_id, mdd.golongan, 
                mdd.id_prelist, mdd.rank_sls, md.nama_prop, md.nama_kab, md.nama_kec, md.nama_desa, 
                mdd.nama_krt, mdd.kesesuaian_ruta, mdd.hasil_pengamatan, mdd.narasumber, mdd.lastupdate_on,
                nmdd.nama_krt name_narasumber
            FROM master_data md
            LEFT JOIN dbo.master_data_detail AS mdd ON md.proses_id = mdd.proses_id
            LEFT JOIN dbo.master_data_detail AS nmdd on nmdd.detail_id = mdd.narasumber
            WHERE md.proses_id = $proses_id AND mdd.row_status = 'NEW' AND mdd.lastupdate_on IS NOT NULL
        ";

        $get_data3 = $this->db->query($sql3)->result_array();

        //log-sls
        $sql4 = "
            SELECT audit_trails FROM master_data
            WHERE proses_id = $proses_id
        ";

        $get_data4 = $this->db->query($sql4)->row();

        //data-sls
        $sql5 = "
            SELECT 
                md.nama_sls, md.nama_prop, md.revoke_note, md.nama_kab, md.nama_kec, md.nama_desa, 
                md.tanggal_pelaksanaan, md.lastupdate_on, usr.user_profile_first_name, acc.user_account_username 
            FROM master_data md
            LEFT JOIN dbo.master_data_detail AS mdd ON md.proses_id = mdd.proses_id
			LEFT JOIN ref_assignment task ON md.proses_id = task.proses_id AND task.row_status != 'DELETED'
			LEFT JOIN core_user_profile usr ON task.user_id = usr.user_profile_id
			LEFT JOIN core_user_account acc ON task.user_id = acc.user_account_id
            WHERE md.proses_id = $proses_id 
        ";

        $get_data5 = $this->db->query($sql5)->row_array();

        $data = array();
        $data['gol_atas'] = $get_data1;
        $data['gol_bawah'] = $get_data2;
        $data['gol_new'] = $get_data3;
        $data['log_sls'] = $get_data4;
        $data['data_sls'] = $get_data5;
        $data['title'] = 'Detail SLS (Satuan Lingkungan Setempat)';
        $this->template->title($data['title']);
        $this->template->content("monitoring/detail_sls", $data);
        $this->template->show(THEMES_BACKEND . 'index');
    }
}
