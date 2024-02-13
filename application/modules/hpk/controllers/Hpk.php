<?php

class Hpk extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "hpk";

        $this->load->model("hpk/hpk_model");

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

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->hpk_model->get_all(
            array(),
            "id ASC"
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function listele()
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $items = $this->hpk_model->get_all(
            array(),
            "id ASC"
        );
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form()
    {
        $viewData = new stdClass();
        $viewData->hpk = $this->hpk_model->get_all();
        $main_id = $this->input->post("main_id");
        $proses = $this->input->post("proses");

        $viewData->main_id = $main_id;
        $viewData->proses = $proses;
        // var_dump($main_id ); 
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $hpk = $this->input->post("hpk");
        $main_id = $this->input->post("main_id");
        $proses = $this->input->post("proses");

        $this->form_validation->set_rules("hpk", "hpk ", "required|trim");
        $this->form_validation->set_rules("main_id", "main_id ", "required|trim");
        $this->form_validation->set_rules("proses", "proses ", "required|trim");
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if ($validate) {

            // aktif kullanıcı bilgilerini al
            $user = get_active_user();

            $data = array(
                "hpk"      => $this->input->post("hpk"),
                "main_id"     => $this->input->post("main_id"),
                "proses"      => $this->input->post("proses")
            );
            $insert = $this->hpk_model->add($data);
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

            redirect(base_url("anasayfa/proseskontrol_duzenle/$main_id"));
        } else {

            $viewData = new stdClass();
            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;
            $viewData->hpk = $hpk;
            $viewData->main_id = $main_id;
            $viewData->aciklama = $proses;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id)
    {

        $viewData = new stdClass();

        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->hpk_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->categories = $this->portfolio_category_model->get_all(
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

    public function update($id)
    {

        $this->load->library("form_validation");

        // Kurallar yazilir.

        $hpk = $this->input->post("hpk");
        $main_id = $this->input->post("main_id");
        $proses = $this->input->post("proses");

        $this->form_validation->set_rules("hpk", "hpk ", "required|trim");
        $this->form_validation->set_rules("main_id", "main_id ", "required|trim");
        $this->form_validation->set_rules("proses", "proses ", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if ($validate) {

            $data = array(
                "hpk"      => $this->input->post("hpk"),
                "main_id"     => $this->input->post("main_id"),
                "proses"      => $this->input->post("proses")
            );

            $update = $this->hpk_model->update(array("id" => $id), $data);

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

            redirect(base_url("hpk"));
        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->hpk = $hpk;
            $viewData->main_id = $main_id;
            $viewData->proses = $proses;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->hpk_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id)
    {
        $hpk = $this->hpk_model->get(
            array(
                "id"    => $id
            )
        );

        $delete = $this->hpk_model->delete(
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

        redirect(base_url("anasayfa/proseskontrol_duzenle/$hpk->main_id"));
    }
}
