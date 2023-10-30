<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	## Start Eksekutif ============================================================================================== ##
	function get_data_head($area)
	{
		$now = date('Y-m-d');
		$sql = "EXEC dbo.usp_eksekutif_head '" . $now . "', '" . $area . "'";
		return $this->db->query($sql)->row_array();
	}
	## End Eksekutif ============================================================================================== ##

	## Start Eksekutif ============================================================================================== ##
	function get_status_proses($area)
	{
		$sql = "EXEC dbo.usp_status_proses '" . $area . "'";
		return $this->db->query($sql)->row_array();
	}
	## End Eksekutif ============================================================================================== ##

}
