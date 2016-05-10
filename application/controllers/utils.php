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
		$this->envia_alerta();
	}
	
	public function envia_alerta()
	{
		$this->load->library('email');

		$this->email->from('marcussoares16@gmail.com', 'Marcus Soares');
		$this->email->to('marcusoares16@gmail.com');

		$this->email->subject('Teste vigilancia');
		$this->email->message('Testando a classe de email.');	
	    $this->email->attach($this->varredura(0));
	    $this->email->attach($this->varredura(1));

		echo $this->email->send() ? 'E-mail enviado!' : 'Problemas ao enviar e-mail.';

		//echo $this->email->print_debugger();
		//$this->load->view('index', $this->data);
	}

	public function varredura($indice = 0)
	{
		$path = 'D:/teste/';
		$diretorio = glob($path.'*.{jpeg,gif,png}');   

		$arquivos = array();
		foreach (glob($path.'*.{jpeg,jpg}', GLOB_BRACE) as $file) {
			//$file." \n\r";
			$arquivos[filectime($file)] = $file;
			krsort($arquivos);
			//print_r(array_slice($arquivos,0,2));
			$anexo = array_slice($arquivos,0,2);
		}

		return isset($anexo[$indice]) ? "".$anexo[$indice] : null;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */