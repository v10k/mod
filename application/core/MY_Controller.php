<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );

class MY_Controller extends CI_Controller {

	private $mod_name;
	protected $menu_itens = '';

	function __construct() {
		parent::__construct ();
		$this->mod_name = $this->uri->segment(1);
		$this->load->model('RunModel', 'model');
        $this->menu_itens = $this->model->get_menu_itens();
	}

	protected function show($content, $use_navbar = true) {
		$script ['extra_script'] = $this->get_script_list ();
		$style ['extra_style'] = $this->get_style_list ();
		$html  = $this->load->view('common/cabecalho', $style, true);

		$data['mod_name'] = $this->mod_name;
		$data['menu_itens'] = $this->menu_itens;
		if($use_navbar) $html .= $this->load->view('common/navbar', $data, true);

        $html .= $content;
        $html .= $this->load->view('common/rodape', $script, true);
        echo $html;
	}
	
	private $script_list = array ();
	protected function add_script($src) {
		$this->script_list [] = '<script type="text/javascript" src="' . base_url ( 'assets/js/' . $src ) . '.js"></script>' . "\n\t";
	}

	function get_script_list() {
		$aux = '';
		foreach ( $this->script_list as $value ) {
			$aux .= $value;
		}
		return $aux;
	}

	private $style_list = array ();
	protected function add_style($src) {
		$this->style_list [] = '<link href="' . base_url ( 'assets/css/' . $src ) . '.css" rel="stylesheet">'."\n\t";
	}

	function get_style_list() {
		$aux = '';
		foreach ( $this->style_list as $value ) {
			$aux .= $value;
		}
		return $aux;
	}

	public function install(){
        $this->load->model('RunModel', 'model');
		$data['status'] = $this->model->install();
		$data['titulo'] = 'Resultado da Instalação';
        $html = $this->load->view('modules/install_status', $data, true);
        $this->show($html);
	}
	
	public function reset(){
        $this->load->model('RunModel', 'model');
		$data['status'] = $this->model->reset();
		$data['titulo'] = 'Resultado da Operação Reset';
        $html = $this->load->view('modules/install_status', $data, true);
        $this->show($html);
    }
	
    public function config(){
        // aqui vão as configurações que apenas admin tem acesso
        $this->load->model('RunModel', 'model');
        $data['config_itens_list'] = $this->model->config();
        $html = $this->load->view('modules/config_form', $data, true);
        $this->show($html);
    }
}
