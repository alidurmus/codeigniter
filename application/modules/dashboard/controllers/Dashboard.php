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
$this->load->library("pagination");


        if(!get_active_user()){
            redirect(base_url("login"));
        }

    }

    public function index()
	{
	    $viewData = new stdClass();   
        $config = array();
        $config["base_url"] = base_url() . "dashboard";
       // $config["total_rows"] = $this->kontrol_no_model->get_count();
          // Search text
          $search_text = "";
          if($this->input->post('submit') != NULL ){
              $search_text = $this->input->post('search');
              $config["total_rows"] = $this->kontrol_no_model->getrecordCount($search_text);
          $this->session->set_userdata(array("search"=>$search_text));
          }else{
              $config["total_rows"] = $this->kontrol_no_model->get_count();
              if($this->session->userdata('search') != NULL){
                  $search_text = $this->session->userdata('search');
              }
          }
        $config["per_page"] = 100;
      
        $config["uri_segment"] = 2;
        $config["num_links"] = 15;

        //$config["use_page_numbers"] = TRUE;
        //$config["page_query_string"] = TRUE;
        //$config["reuse_query_string"] = FALSE;
        $config["prefix"] = "";
        $config["suffix"] = "";
        //$config["use_global_url_suffix"] = FALSE;

        $config["full_tag_open"] = "<nav> <ul class='pagination'>";
        $config["full_tag_close"] = "</ul></nav>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["first_url"] = "";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["next_link"] = "&gt;";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["prev_link"] = "&lt;";

        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";

        $this->pagination->initialize($config);
       
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $links = $this->pagination->create_links();

        $items = $this->kontrol_no_model->get_limit(array(), $config["per_page"], $page, $search_text);




        /** Tablodan Verilerin Getirilmesi.. */
        // $items = $this->kontrol_no_model->get_all(
        //     array(), "id ASC"
        // );

        // $count = $this->kontrol_no_model->get_count();
        // $per_page = 10;
        // $uri_segment = 2;
        // $base_url = base_url() . "authors";

        // $this->pagination->initialize($items);
        // $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        // $data["links"] = $this->pagination->create_links();




        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->links = $links;
        $viewData->search_text = $search_text;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
    

    public function search()
	{
	    $viewData = new stdClass();    
     
        $search_data = $this->input->post('keyword');   

        $config = array();
        $config["base_url"] = base_url() . "dashboard/search";
        $config["total_rows"] = $this->kontrol_no_model->get_count();
        $config["per_page"] = 10;
      
        $config["uri_segment"] = 2;
        $config["num_links"] = 5;

        //$config["use_page_numbers"] = TRUE;
        //$config["page_query_string"] = TRUE;
        //$config["reuse_query_string"] = FALSE;
        $config["prefix"] = "";
        $config["suffix"] = "";
        //$config["use_global_url_suffix"] = FALSE;

        $config["full_tag_open"] = "<nav> <ul class='pagination'>";
        $config["full_tag_close"] = "</ul></nav>";
        $config["first_link"] = "İlk";
        $config["first_tag_open"] = "<li class='page-item'>";
        $config["first_tag_close"] = "</li>";
        $config["first_url"] = "";
        $config["last_link"] = "Son";
        $config["last_tag_open"] = "<li class='page-item'>";
        $config["last_tag_close"] = "</li>";
        $config["next_link"] = "&gt;";
        $config["next_tag_open"] = "<li class='page-item'>";
        $config["next_tag_close"] = "</li>";
        $config["prev_link"] = "&lt;";

        $config["prev_tag_open"] = "<li class='page-item'>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='page-item active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li class='page-item'>";
        $config["num_tag_close"] = "</li>";

        $this->pagination->initialize($config);
       
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $links = $this->pagination->create_links();

       

        $items = $this->kontrol_no_model->get_limit(array(
            "process_isim"    => $search_data,
        ),
         $config["per_page"],
          $page
        );      



        /** Tablodan Verilerin Getirilmesi.. */
        // $items = $this->kontrol_no_model->get_all(
        //     array(), "id ASC"
        // );

        // $count = $this->kontrol_no_model->get_count();
        // $per_page = 10;
        // $uri_segment = 2;
        // $base_url = base_url() . "authors";

        // $this->pagination->initialize($items);
        // $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        // $data["links"] = $this->pagination->create_links();




        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->links = $links;


		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }








}



