<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public $viewFolder = "";
//    public $user;

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "dashboard";
//        $this->user = get_active_user();
$this->load->model("kontrol_no/kontrol_no_model");
$this->load->model("girdikontrol/girdi_kontrol_model");
$this->load->model("tedarikciler/tedarikciler_model");
$this->load->model("malzemeler/malzemeler_model");
$this->load->model("kontrol_no/kontrol_no_model");
$this->load->model("kullanicilar/kullanicilar_model");





        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index()
	{
	    $viewData = new stdClass();    
     

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->kontrol_no_model->get_all(
            array(), "id ASC"
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
	}
}



