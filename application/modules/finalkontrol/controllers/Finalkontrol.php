<?php

class Finalkontrol extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "finalkontrol";

        $this->load->model("finalkontrol/final_kontrol_model");
        $this->load->model("tedarikciler/tedarikciler_model");
        $this->load->model("malzemeler/malzemeler_model");
        $this->load->model("urunler/urunler_model");
        $this->load->model("kontrol_no/kontrol_no_model");
        $this->load->library("pagination");



        if (!get_active_user()) {
            redirect(base_url("login"));
        }
        if (!isAllowedViewModule()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $config = array();
        $config["base_url"] = base_url() . "finalkontrol";
        // Search text
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $config["total_rows"] = $this->final_kontrol_model->getrecordCount($search_text);
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            $config["total_rows"] = $this->final_kontrol_model->get_count();
            if ($this->session->userdata('search') != NULL) {
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
        $items = $this->final_kontrol_model->get_limit(array(), $config["per_page"], $page, $search_text);

        /** Tablodan Verilerin Getirilmesi.. */
        // $items = $this->final_kontrol_model->get_all(
        //     array(), "id ASC"
        // );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;
        $viewData->links = $links;
        $viewData->search_text = $search_text;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function listele()
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->final_kontrol_model->get_all(
            array(),
            "id ASC"
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function search($search_text = "")
    {

        echo $search_text;
        $viewData = new stdClass();
        $config = array();
        $config["base_url"] = base_url() . "finalkontrol";
        // Search text
        // $search_text = "";

        $items = $this->final_kontrol_model->getSearch(array(),  $search_text);

        /** Tablodan Verilerin Getirilmesi.. */
        // $items = $this->final_kontrol_model->get_all(
        //     array(), "id ASC"
        // );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "ara";
        $viewData->items = $items;
        $viewData->search_text = $search_text;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {

        $viewData = new stdClass();

        $viewData->tedarikciler = $this->tedarikciler_model->get_all();
        $viewData->malzemeler = $this->malzemeler_model->get_all();


        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {

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

        if ($validate) {


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


            $insert = $this->final_kontrol_model->add($data);

            // TODO Alert sistemi eklenecek...
            if ($insert) {

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

    public function update_form($id)
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->final_kontrol_model->get(
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





        // seçilen urunnin bilgilerini getir
        $urun = $this->urunler_model->get(
            array(
                "id"    => $item->urun,
            )
        );
        $viewData->urun = $urun;

        // ölçüm tablosu json açılarak veri olarak al
        $viewData->json = json_decode($item->olcum);

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {

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

        if ($validate) {


            $data = array(
                "parti_no"      => $this->input->post("parti_no"),
                "tedarikci"     => $this->input->post("tedarikci"),
                "malzeme"       => $this->input->post("malzeme"),
                "irsaliye"      => $this->input->post("irsaliye"),
                "aciklama"      => $this->input->post("aciklama"),
                "kullanici"      => $this->input->post("kullanici"),
                "tarih"         => $this->input->post("tarih")
            );



            $update = $this->final_kontrol_model->update(array("id" => $id), $data);

            // TODO Alert sistemi eklenecek...
            if ($update) {

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
            $viewData->item = $this->final_kontrol_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id)
    {

        $delete = $this->final_kontrol_model->delete(
            array(
                "id"    => $id
            )
        );

        // TODO Alert Sistemi Eklenecek...
        if ($delete) {

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

    public function gorsel_new_form()
    {
        $viewData = new stdClass();
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "gorsel_add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
}
