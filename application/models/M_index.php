    <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class M_index extends CI_Model
	{

		function getData()
		{
			return $this->db->get('penduduk')->result_array();
		}
	}
