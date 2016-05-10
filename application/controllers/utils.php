<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('utils_model', 'utils');
		$this->data['database'] = $this->utils->get_database();
		$this->data['tables'] = $this->utils->check_tables();
		
		$this->load->view('index', $this->data);
	}

	public function consulta()
	{
		$this->load->model('utils_model', 'utils');
		$consulta = $this->utils->select_estoque();
		
		$this->load->view('consulta', compact('consulta'));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */