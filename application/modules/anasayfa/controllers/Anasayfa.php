<?php

class Anasayfa extends MY_Controller
{
    public $viewFolder = "";
    
    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "anasayfa";

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        $this->load->model("girdikontrol/girdi_kontrol_model");
        $this->load->model("proseskontrol/proses_kontrol_model");
        $this->load->model("finalkontrol/final_kontrol_model");

        $this->load->model("tedarikciler/tedarikciler_model");
        $this->load->model("malzemeler/malzemeler_model");        
        $this->load->model("urunler/urunler_model");
        
        $this->load->model("kontrol_no/kontrol_no_model");
        $this->load->model("kullanicilar/kullanicilar_model");   
        
        $this->load->model("sonuc_secim/sonuc_secim_model");
        
    }

    public function index(){

        $viewData = new stdClass();
       
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "giris";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function kalite(){

        $viewData = new stdClass();
       
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "kalite";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function planlama(){

        $viewData = new stdClass();
       
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "planlama";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function arge(){

        $viewData = new stdClass();
       
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "arge";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function yonetim(){

        $viewData = new stdClass();
       
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "yonetim";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function malzeme(){

        $viewData = new stdClass();
       
        $viewData->malzemeler = $this->malzemeler_model->get_all();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "malzeme";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function urun(){

        $viewData = new stdClass();
       
        $viewData->urunler = $this->urunler_model->get_all();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "urun";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function urun2(){

        $viewData = new stdClass();
       
        $viewData->urunler = $this->urunler_model->get_all();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "urun";
        //$viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index2", $viewData);
    }

    public function girdikontrol(){

        $viewData = new stdClass();
        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->girdi_kontrol_model->listele();
       

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "girdikontrol";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function girdikontrol_ekle(){

        $viewData = new stdClass();

        $viewData->tedarikciler = $this->tedarikciler_model->get_all();      
        $viewData->kullanicilar = $this->kullanicilar_model->get_all();
        $viewData->sonuc_secim = $this->sonuc_secim_model->get_all();

        // formdan gelen bilgilere göre olcum tablosunu getir
        $malzeme_id = $this->input->post("malzeme");       

        $malzeme = $this->malzemeler_model->get(
            array(
                "id"    => $malzeme_id,
            )
        );      
       // ölçüm tablosu json açılarak veri olarak al
       $viewData->json = json_decode($malzeme->olcum);    

       $viewData->malzeme= $malzeme;
        
       $viewData->user = get_active_user();        
       
       //die();
        // var_dump($viewData->json);
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "girdikontrol_ekle";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function girdikontrol_kaydet(){

        $this->load->library("form_validation");

        // Kurallar yazilir..

        $parti_no = $this->input->post("parti_no");
        $tedarikci = $this->input->post("tedarikci");
        $malzeme = $this->input->post("malzeme");
        $irsaliye = $this->input->post("irsaliye");
        $tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");   
        $kullanici = $this->input->post("kullanici"); 
        $sonuc = $this->input->post("sonuc");           
        $olcum = json_encode($this->input->post("form"));       
         

        $this->form_validation->set_rules("parti_no", "Parti No", "required|trim");
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
                "process_isim"  => "girdikontrol",
                "parti_no"      => $parti_no,
                "lot_no"        => "",
                "kutu_no"       => "",                
                "tarih"         => date("Y-m-d H:i:s")
            );

            // kontrol numarası alma işlemi
           // $insert2 = $this->kontrol_no_model->add($data2);
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
            "sonuc"      => $this->input->post("sonuc"), 
            "kontrol_no"    => $get_kontrol_id,  
            "tarih"         => $this->input->post("tarih"),
            "olcum"         => $olcum
        );
        
        $insert3 = $this->girdi_kontrol_model->add($data);
        
            // TODO: Alert sistemi eklenecek...
            if($insert3){

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
            
            redirect(base_url("anasayfa/girdikontrol"));

            } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "anasayfa/girdikontrol_ekle";
            $viewData->form_error = true;
            $viewData->parti_no = $parti_no;
            $viewData->tedarikci = $tedarikci;
            $viewData->malzeme = $malzeme;
            $viewData->irsaliye = $irsaliye;
            $viewData->json = json_decode($olcum); 
            $viewData->kullanici = $kullanici;
            $viewData->sonuc = $sonuc;
    
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function girdikontrol_duzenle($id){
        $viewData = new stdClass();
        /** Tablodan Verilerin Getirilmesi.. */
        $viewData->sonuc_secim = $this->sonuc_secim_model->get_all();

        $item = $this->girdi_kontrol_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->tedarikciler = $this->tedarikciler_model->get_all(
            array(
                "isActive"  => 1
            )
        );
          
       // ölçüm tablosu json açılarak veri olarak al
       $viewData->json = json_decode($item->olcum);

       // seçilen malzemenin bilgilerini getir
       $malzeme = $this->malzemeler_model->get(
        array(
            "id"    => $item->malzeme,
            )
        );  
       $viewData->malzeme= $malzeme;
        
       $viewData->user = get_active_user();

       //die();
        // var_dump($viewData->json);
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "girdikontrol_duzenle";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
   
    }

    public function girdikontrol_sil($id){

        $delete = $this->girdi_kontrol_model->delete(
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
        redirect(base_url("anasayfa/girdikontrol"));
    }

    public function girdikontrol_guncelle($id){
        $this->load->library("form_validation");

        // Kurallar yazilir..

        $parti_no = $this->input->post("parti_no");
        $tedarikci = $this->input->post("tedarikci");
        $malzeme = $this->input->post("malzeme");
        $irsaliye = $this->input->post("irsaliye");
        //$tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");   
        $kullanici = $this->input->post("kullanici");            
        $sonuc = $this->input->post("sonuc");            
        $olcum = json_encode($this->input->post("form"));       
         

        $this->form_validation->set_rules("parti_no", "Parti No", "required|trim");
        $this->form_validation->set_rules("irsaliye", "irsaliye ", "required|trim");   
       
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

       // Form Validation Calistirilir..
       $validate = $this->form_validation->run();

       if($validate){        
        
        // aktif kullanıcı bilgilerini al
        $user = get_active_user(); 
            
        $data = array(
            "parti_no"      => $this->input->post("parti_no"),
            "tedarikci"     => $this->input->post("tedarikci"),
            "malzeme"       => $this->input->post("malzeme"),
            "irsaliye"      => $this->input->post("irsaliye"),
            "aciklama"      => $this->input->post("aciklama"),  
            "sonuc"      => $this->input->post("sonuc"),  
            "kullanici"      => $user->id,  
           //"tarih"         => $this->input->post("tarih"),
            "olcum"         => $olcum
        );
        $update = $this->girdi_kontrol_model->update(array("id" => $id), $data);
            // TODO: Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Kayıt güncellendi sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                }
        
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            
            redirect(base_url("anasayfa/girdikontrol"));

            } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "anasayfa/girdikontrol_duzenle";
            $viewData->form_error = true;
            $viewData->parti_no = $parti_no;
            $viewData->tedarikci = $tedarikci;
            $viewData->malzeme = $malzeme;
            $viewData->irsaliye = $irsaliye;
            $viewData->json = json_decode($olcum); 
            $viewData->kullanici = $kullanici;
            $viewData->sonuc = $sonuc;
    
             /** Tablodan Verilerin Getirilmesi.. */
             $viewData->item = $this->girdi_kontrol_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function proseskontrol(){

        $viewData = new stdClass();
        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->proses_kontrol_model->listele();
       

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "proseskontrol";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function proseskontrol_ekle(){

        $viewData = new stdClass();

        $viewData->sonuc_secim = $this->sonuc_secim_model->get_all();

        // formdan gelen bilgilere göre olcum tablosunu getir
        $urun_id = $this->input->post("urun");       

        $urun = $this->urunler_model->get(
            array(
                "id"    => $urun_id,
                )
        );      
       // ölçüm tablosu json açılarak veri olarak al
       $viewData->json = json_decode($urun->olcum);     

       $viewData->urun= $urun;
        
       $viewData->user = get_active_user();        
       
       //die();
        // var_dump($viewData->json);
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "proseskontrol_ekle";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function proseskontrol_kaydet(){

        $this->load->library("form_validation");

        // Kurallar yazilir..

        $parti_no = $this->input->post("parti_no");
        $urun = $this->input->post("urun");       
        $lot = $this->input->post("lot");
        $tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");   
        $kullanici = $this->input->post("kullanici");            
        $sonuc = $this->input->post("sonuc");            
        $olcum = json_encode($this->input->post("form"));       
         

        $this->form_validation->set_rules("parti_no", "Parti No", "required|trim");
       
        $this->form_validation->set_rules("lot", "lot ", "required|trim");   
       
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

       // Form Validation Calistirilir..
       $validate = $this->form_validation->run();

       if($validate){          

            $data2 = array(
                "process_isim"  => "proseskontrol",
                "parti_no"      => $parti_no,
                "lot_no"        => $lot,
                "kutu_no"       => "",                
                "tarih"         => date("Y-m-d H:i:s")
            );

            // kontrol numarası alma işlemi
           // $insert2 = $this->kontrol_no_model->add($data2);
            $get_kontrol_id = get_kontrol_id($data2);


    
        
        // aktif kullanıcı bilgilerini al
        $user = get_active_user(); 
            
        $data = array(
            "parti_no"      => $this->input->post("parti_no"),
            "lot"           => $this->input->post("lot"),
            "urun"          => $this->input->post("urun"),            
            "aciklama"      => $this->input->post("aciklama"),  
            "kullanici"     => $this->input->post("kullanici"), 
            "sonuc"     => $this->input->post("sonuc"), 
            "kontrol_no"    => $get_kontrol_id,  
            "tarih"         => $this->input->post("tarih"),
            "olcum"         => $olcum
        );
        
        $insert3 = $this->proses_kontrol_model->add($data);
        
            // TODO: Alert sistemi eklenecek...
            if($insert3){

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
            
            redirect(base_url("anasayfa/proseskontrol"));

            } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "anasayfa/proseskontrol_ekle";
            $viewData->form_error = true;
            $viewData->parti_no = $parti_no;
            $viewData->tedarikci = $tedarikci;
            $viewData->urun = $urun;
            $viewData->json = json_decode($olcum); 
            $viewData->kullanici = $kullanici;
            $viewData->sonuc = $sonuc;
    
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function proseskontrol_duzenle($id){
        $viewData = new stdClass();
        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->proses_kontrol_model->get(
            array(
                "id"    => $id,
            )
        );      
          
        $viewData->sonuc_secim = $this->sonuc_secim_model->get_all();

       // ölçüm tablosu json açılarak veri olarak al
       $viewData->json = json_decode($item->olcum);

       // seçilen urunnin bilgilerini getir
       $urun = $this->urunler_model->get(
        array(
            "id"    => $item->urun,
            )
        );  
       $viewData->urun= $urun;
        
       $viewData->user = get_active_user();

       //die();
        // var_dump($viewData->json);
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "proseskontrol_duzenle";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
   
    }

    public function proseskontrol_sil($id){

        $delete = $this->proses_kontrol_model->delete(
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
        redirect(base_url("anasayfa/proseskontrol"));
    }

    public function proseskontrol_guncelle($id){
        $this->load->library("form_validation");

        // Kurallar yazilir..

        $parti_no = $this->input->post("parti_no");
        $lot = $this->input->post("lot");
        $urun = $this->input->post("urun");
        //$tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");   
        $kullanici = $this->input->post("kullanici");            
        $sonuc = $this->input->post("sonuc");            
        $olcum = json_encode($this->input->post("form"));       
         

        $this->form_validation->set_rules("parti_no", "Parti No", "required|trim");   
        $this->form_validation->set_rules("lot", "lot ", "required|trim");   
       
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

       // Form Validation Calistirilir..
       $validate = $this->form_validation->run();

       if($validate){        
        
        // aktif kullanıcı bilgilerini al
        $user = get_active_user(); 
            
        $data = array(
            "parti_no"      => $this->input->post("parti_no"),
            "lot"     => $this->input->post("lot"),
            "urun"       => $this->input->post("urun"),
            "aciklama"      => $this->input->post("aciklama"),  
            "sonuc"      => $this->input->post("sonuc"),  
            "kullanici"      => $user->id,  
            //"tarih"         => $this->input->post("tarih"),
            "olcum"         => $olcum
        );
        $update = $this->proses_kontrol_model->update(array("id" => $id), $data);
            // TODO: Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Kayıt güncellendi sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                }
        
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            
            redirect(base_url("anasayfa/proseskontrol"));

            } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "anasayfa/proseskontrol_duzenle";
            $viewData->form_error = true;
            $viewData->parti_no = $parti_no;
            $viewData->lot = $lot;
            $viewData->urun = $urun;
            $viewData->json = json_decode($olcum); 
            $viewData->kullanici = $kullanici;
            $viewData->sonuc = $sonuc;
    
             /** Tablodan Verilerin Getirilmesi.. */
             $viewData->item = $this->proses_kontrol_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function finalkontrol(){

        $viewData = new stdClass();
        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->final_kontrol_model->listele();       

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "finalkontrol";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function finalkontrol_ekle(){

        $viewData = new stdClass();
        $viewData->sonuc_secim = $this->sonuc_secim_model->get_all();
        // formdan gelen bilgilere göre olcum tablosunu getir
        $urun_id = $this->input->post("urun");       

        $urun = $this->urunler_model->get(
            array(
                "id"    => $urun_id,
            )
        );      
       // ölçüm tablosu json açılarak veri olarak al
       $viewData->json = json_decode($urun->olcum);

      

       $viewData->urun= $urun;
        
       $viewData->user = get_active_user();        
       
       //die();
        // var_dump($viewData->json);
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "finalkontrol_ekle";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function finalkontrol_kaydet(){

        $this->load->library("form_validation");

        // Kurallar yazilir..

        $kutu_no = $this->input->post("kutu_no");
        $lot = $this->input->post("lot");
        $urun = $this->input->post("urun");
        $tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");   
        $kullanici = $this->input->post("kullanici");            
        $sonuc = $this->input->post("sonuc");            
        $olcum = json_encode($this->input->post("form"));       
         

        $this->form_validation->set_rules("kutu_no", "Kutu No", "required|trim");   
        $this->form_validation->set_rules("lot", "lot ", "required|trim");   
       
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
                "parti_no"      => "",
                "lot_no"        =>  $lot,
                "kutu_no"       => $kutu_no,                
                "tarih"         => date("Y-m-d H:i:s")
            );

           
           

            // kontrol numarası alma işlemi
          //  $insert2 = $this->kontrol_no_model->add($data2);
            $get_kontrol_id = get_kontrol_id($data2);

            var_dump($data2);
            die();
    
        
        // aktif kullanıcı bilgilerini al
        $user = get_active_user(); 
            
        $data = array(
            "kutu_no"      => $this->input->post("kutu_no"),
            "lot"     => $this->input->post("lot"),
            "urun"       => $this->input->post("urun"),
            "aciklama"      => $this->input->post("aciklama"),  
            "kullanici"      => $this->input->post("kullanici"), 
            "sonuc"      => $this->input->post("sonuc"), 
            "kontrol_no"    => $get_kontrol_id,  
            "tarih"         => $this->input->post("tarih"),
            "olcum"         => $olcum
        );
        
        $insert3 = $this->final_kontrol_model->add($data);
        
            // TODO: Alert sistemi eklenecek...
            if($insert3){

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
            
            redirect(base_url("anasayfa/finalkontrol"));

            } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "anasayfa/finalkontrol_ekle";
            $viewData->form_error = true;
            $viewData->kutu_no = $kutu_no;
            $viewData->lot = $lot;
            $viewData->urun = $urun;
            $viewData->json = json_decode($olcum); 
            $viewData->kullanici = $kullanici;
            $viewData->sonuc = $sonuc;
    
            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function finalkontrol_duzenle($id){
        $viewData = new stdClass();
        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->final_kontrol_model->get(
            array(
                "id"    => $id,
            )
        );      
        $viewData->sonuc_secim = $this->sonuc_secim_model->get_all();  
       // ölçüm tablosu json açılarak veri olarak al
       $viewData->json = json_decode($item->olcum);

       // seçilen urunnin bilgilerini getir
       $urun = $this->urunler_model->get(
        array(
            "id"    => $item->urun,
            )
        );  
       $viewData->urun= $urun;
        
       
       $viewData->user = get_active_user();

       //die();
        // var_dump($viewData->json);
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "finalkontrol_duzenle";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
   
    }

    public function finalkontrol_sil($id){

        $delete = $this->final_kontrol_model->delete(
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
        redirect(base_url("anasayfa/finalkontrol"));
    }

    public function finalkontrol_guncelle($id){
        $this->load->library("form_validation");

        // Kurallar yazilir..

        $kutu_no = $this->input->post("kutu_no");
        $lot = $this->input->post("lot");
        $urun = $this->input->post("urun");
       // $tarih = $this->input->post("tarih");
        $aciklama = $this->input->post("aciklama");   
        $kullanici = $this->input->post("kullanici");            
        $sonuc = $this->input->post("sonuc");            
        $olcum = json_encode($this->input->post("form"));       
         

        $this->form_validation->set_rules("kutu_no", "Kutu No", "required|trim");
        $this->form_validation->set_rules("lot", "lot ", "required|trim");   
       
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

       // Form Validation Calistirilir..
       $validate = $this->form_validation->run();

       if($validate){        
        
        // aktif kullanıcı bilgilerini al
        $user = get_active_user(); 
            
        $data = array(
            "kutu_no"       => $this->input->post("kutu_no"),
            "lot"           => $this->input->post("lot"),
            "urun"          => $this->input->post("urun"),
            "aciklama"      => $this->input->post("aciklama"),  
            "sonuc"         => $this->input->post("sonuc"),  
            "kullanici"     => $user->id,  
           // "tarih"         => $this->input->post("tarih"),
            "olcum"         => $olcum
        );
        $update = $this->final_kontrol_model->update(array("id" => $id), $data);
            // TODO: Alert sistemi eklenecek...
            if($update){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Kayıt başarılı bir şekilde güncellendi",
                    "type"  => "success"
                );

                } else {

                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "Kayıt güncellendi sırasında bir problem oluştu",
                        "type"  => "error"
                    );
                }
        
            // İşlemin Sonucunu Session'a yazma işlemi...
            $this->session->set_flashdata("alert", $alert);
            
            redirect(base_url("anasayfa/finalkontrol"));

            } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "anasayfa/finalkontrol_duzenle";
            $viewData->form_error = true;
            $viewData->kutu_no = $kutu_no;
            $viewData->lot = $lot;
            $viewData->json = json_decode($olcum);           
            $viewData->kullanici = $kullanici;
            $viewData->sonuc = $sonuc;
    
             /** Tablodan Verilerin Getirilmesi.. */
             $viewData->item = $this->final_kontrol_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }



    public function new_form(){

        $viewData = new stdClass();

        $viewData->tedarikciler = $this->tedarikciler_model->get_all();
        $viewData->malzemeler = $this->malzemeler_model->get_all();
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
        $olcum = json_encode($this->input->post("form"));          

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
                "process_isim"  => "girdikontrol",
                "parti_no"      => $this->input->post("parti_no"),
                "lot_no"        => "",
                "kutu_no"       => "",                
                "tarih"         => date("Y-m-d H:i:s")
            );

            // kontrol numarası alma işlemi
           // $insert2 = $this->kontrol_no_model->add($data2);
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
                "tarih"         => $this->input->post("tarih"),
                "olcum"         =>  json_encode($this->input->post("form"))
            );


            $insert = $this->girdi_kontrol_model->add($data);



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

            redirect(base_url("anasayfa/girdikontrol"));

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
        $item = $this->girdi_kontrol_model->get(
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

            $update = $this->girdi_kontrol_model->update(array("id" => $id), $data);

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

            redirect(base_url("girdikontrol"));

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
            $viewData->item = $this->girdi_kontrol_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

    }

    public function delete($id){

        $delete = $this->girdi_kontrol_model->delete(
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
        redirect(base_url("girdikontrol"));

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
