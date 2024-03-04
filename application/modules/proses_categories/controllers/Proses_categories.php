<?php

class Proses_categories extends MY_Controller
{
    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "proses_categories";

        $this->load->model("proses_category_model");
        $this->load->model("proseskontrol/proses_kontrol_model");
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
        $items = $this->proses_category_model->get_all(
            array()
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
        $viewData->categories = $this->proses_kontrol_model->listele();
        $main_id = $this->input->post("main_id");
        $proses = $this->input->post("proses");
        $viewData->main_id = $main_id;
        $viewData->proses = $proses;

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save()
    {
        $this->load->library("form_validation");
        // Kurallar yazilir..
        $this->form_validation->set_rules("main_id", "main_id", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();
        $main_id = $this->input->post("main_id");
        $proses_id = $this->input->post("proses_id");
        $proses = $this->input->post("proses");
        // var_dump($main_id);
        if ($main_id == $proses_id) {
            $alert = array(
                "title" => "İşlem Başarısız",
                "text" => "Aynı proses alt kategori olarak eklenemez",
            );
        } elseif ($validate) {

            // Upload Süreci...
            $insert = $this->proses_category_model->add(
                array(
                    "proses_id"         => $this->input->post("proses_id"),
                    "main_id"         => $this->input->post("main_id"),
                    "proses"         => $this->input->post("proses")
                )
            );

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

            $viewData->categories = $this->proses_kontrol_model->listele();
            $viewData->main_id = $main_id;
            //$viewData->proses_id = $proses_id;
            $viewData->proses = $proses;
            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id)
    {

        $viewData = new stdClass();
        $viewData->categories = $this->proses_kontrol_model->listele();
        /** Tablodan Verilerin Getirilmesi.. */
        $item = $this->proses_category_model->get(
            array(
                "id"    => $id,
            )
        );

        $viewData->main_id = $this->proses_kontrol_model->get_all();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id)
    {

        $this->load->library("form_validation");

        // Kurallar yazilir..

        $this->form_validation->set_rules("title", "Başlık", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> alanı doldurulmalıdır"
            )
        );

        // Form Validation Calistirilir..
        $validate = $this->form_validation->run();

        if ($validate) {

            $update = $this->proses_category_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "proses_id" => $this->input->post("proses_id"),
                    "main_id" => $this->input->post("main_id"),
                    "proses" => $this->input->post("proses"),
                )
            );

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

            redirect(base_url("proses_categories"));
        } else {

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            /** Tablodan Verilerin Getirilmesi.. */
            $viewData->item = $this->proses_category_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id)
    {
        $proses_category = $this->proses_category_model->get(
            array(
                "id"    => $id,
            )
        );
        //   var_dump($proses_category);

        $delete = $this->proses_category_model->delete(
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
        //redirect(base_url("proses_categories"));
        redirect(base_url("anasayfa/proseskontrol_duzenle/$proses_category->main_id"));
    }

    public function isActiveSetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;
            $this->proses_category_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }
}
