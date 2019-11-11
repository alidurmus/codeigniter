<?php

class Musteriler extends MY_Controller
{
    public $viewFolder = "";
    
    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "musteriler";

       
       
        $this->load->model("musteriler/musteriler_model");
      
     
        $this->load->model("kullanicilar/kullanicilar_model");

   

        if(!get_active_user()){
            redirect(base_url("login"));
        }
        if(!isAllowedViewModule()){
            redirect(base_url());
        }
    }

    public function index(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->musteriler_model->get_all(
            array(), "id ASC"
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function listele(){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->musteriler_model->get_all(
            array(), "id ASC"
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }


    public function new_form(){

        $viewData = new stdClass();

        $viewData->musteriler = $this->musteriler_model->get_all();
       
        $viewData->kullanicilar = $this->kullanicilar_model->get_all();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){

        $this->load->library("form_validation");

        // Kurallar yazilir..

        $parti_no = $this->input->post("parti_no");
        $tedarikci = $this->input->post("tedarikci");
        $malzeme = $this->input->post("malzeme");
        $irsaliye = $this->input->post("irsaliye");
        $tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");   
        $kullanici = $this->input->post("kullanici");            

        $this->form_validation->set_rules("parti_no", "Parti No", "required|trim");
       // $this->form_validation->set_rules("tedarikci", "tedarikci", "required|trim");
        //$this->form_validation->set_rules("malzeme", "malzeme ", "required|trim");
        $this->form_validation->set_rules("irsaliye", "irsaliye ", "required|trim");        

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){
           

            $data2 = array(
                "process_isim"  => "finalkontrol",
                "parti_no"      => $this->input->post("parti_no"),
                "lot_no"        => "",
                "kutu_no"       => "",                
                "tarih"         => date("Y-m-d H:i:s")
            );

            // kontrol numarası alma işlemi
            $insert2 = $this->kontrol_no_model->add($data2);
            $get_kontrol_id = get_kontrol_id($data2);


            // aktif kullanıcı bilgilerini al
            $user = get_active_user(); 
          
            $data = array(
                "parti_no"      => $this->input->post("parti_no"),
                "tedarikci"     => $this->input->post("tedarikci"),
                "malzeme"       => $this->input->post("malzeme"),
                "irsaliye"      => $this->input->post("irsaliye"),
                "aciklama"      => $this->input->post("aciklama"),  
                "kullanici"      => $this->input->post("kullanici"), 
                "kontrol_no"    => $get_kontrol_id,  
                "tarih"         => $this->input->post("tarih")
            );


            $insert = $this->musteriler_model->add($data);

            // TODO Alert sistemi eklenecek...
            if($insert){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde eklendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Ekleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }
            
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("finalkontrol"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->parti_no = $parti_no;
            $viewData->tedarikci = $tedarikci;
            $viewData->malzeme = $malzeme;
            $viewData->irsaliye = $irsaliye;
            $viewData->kullanici = $kullanici;
     
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function update_form($id){

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->musteriler_model->get(
            array(
                "id"    => $id,
            )
        );
             
        $viewData->tedarikciler = $this->tedarikciler_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $viewData->malzemeler = $this->malzemeler_model->get_all(
            array(
                "isActive"  => 1
            )
        );

        $viewData->kullanicilar = $this->kullanicilar_model->get_all(
            array(
                "isActive"  => 1
            )
        );


        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id){

        $this->load->library("form_validation");

        // Kurallar yazilir.

        $parti_no = $this->input->post("parti_no");
        $tedarikci = $this->input->post("tedarikci");
        $malzeme = $this->input->post("malzeme");
        $irsaliye = $this->input->post("irsaliye");
        $tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");     
        $kullanici = $this->input->post("kullanici");           

        $this->form_validation->set_rules("parti_no", "Parti No", "required|trim");
       // $this->form_validation->set_rules("tedarikci", "tedarikci", "required|trim");
        //$this->form_validation->set_rules("malzeme", "malzeme ", "required|trim");
        $this->form_validation->set_rules("irsaliye", "irsaliye ", "required|trim");        

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if($validate){


            $data = array(
                "parti_no"      => $this->input->post("parti_no"),
                "tedarikci"     => $this->input->post("tedarikci"),
                "malzeme"       => $this->input->post("malzeme"),
                "irsaliye"      => $this->input->post("irsaliye"),
                "aciklama"      => $this->input->post("aciklama"),                
                "kullanici"      => $this->input->post("kullanici"),
                "tarih"         => $this->input->post("tarih")
            );

        

            $update = $this->musteriler_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Kayıt Güncelleme sırasında bir problem oluştu",
                    "type"  => "error"
                );
            }

            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("finalkontrol"));

        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->parti_no = $parti_no;
            $viewData->tedarikci = $tedarikci;
            $viewData->malzeme = $malzeme;
            $viewData->irsaliye = $irsaliye;



            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->musteriler_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        $delete = $this->musteriler_model->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if($delete){

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt başarılı bir şekilde silindi",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "İşlem Başarılı",
                "text" => "Kayıt silme sırasında bir problem oluştu",
                "type"  => "error"
            );


        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("finalkontrol"));

    } 

    public function gorsel_new_form(){
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "gorsel_add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    } 
    
    public function gorsel_save(){
    } 
    
    public function gorsel_update_form($id){
    } 
    
    public function gorsel_update($id){
    } 
    
    public function gorsel_delete($id){
    } 

    public function olcum_new_form(){
        
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    } 
    
    public function olcum_save(){
    } 
    
    public function olcum_update_form($id){
    } 
    
    public function olcum_update($id){
    } 

    public function olcum_delete($id){
    }
}
