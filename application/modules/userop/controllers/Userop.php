<?php

class Userop extends MY_Controller {

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users";

        $this->load->model("users/user_model");
    }

    public function login(){

        if(get_active_user()){
            redirect(base_url("anasayfa"));
        }
        $viewData = new stdClass();

        $users = $this->user_model->get_all(
            
        );  
        $viewData->users = $users;
        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login(){ 

         /*
            #1	Admin
            #2	Kalite		  
            #3	Yönetim	
            #4	Planlama  
            #5	Arge
        */
        if(get_active_user()){
            if(get_active_user()->user_role_id == 1){//admin
                redirect(base_url("dashboard"));
            } 
            if(get_active_user()->user_role_id == 2){// kalite
                redirect(base_url("anasayfa/kalite"));
            }
            if(get_active_user()->user_role_id == 3){// yonetim
                redirect(base_url("dashboard"));
            }
            if(get_active_user()->user_role_id == 4){// planlama
                redirect(base_url("dashboard"));
            }
            if(get_active_user()->user_role_id == 5){// arge
                redirect(base_url("dashboard"));
            }          
        }

        $this->load->library("form_validation");

        // Kurallar yazilir..
        //$this->form_validation->set_rules("user_email", "E-posta", "required|trim|valid_email");
        $this->form_validation->set_rules("user_name", "Kullanıcı Adı", "required|trim");
        $this->form_validation->set_rules("user_password", "Şifre", "required|trim|min_length[6]|max_length[8]");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir e-posta adresi giriniz",
                "min_length"  => "<b>{field}</b> en az 6 karakterden oluşmalıdır",
                "max_length"  => "<b>{field}</b> en fazla 8 karakterden oluşmalıdır",
            )
        );

        // Form Validation Calistirilir..
        if($this->form_validation->run() == FALSE){

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {


            $user = $this->user_model->get(
                array(
                    "user_name"     => $this->input->post("user_name"),
                    "password"  => md5($this->input->post("user_password")),
                    "isActive"  => 1
                )
            );
            

            if($user){

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "$user->full_name hoşgeldiniz",
                    "type"  => "success"
                );

                /********** Kullanici Yetkilerinin Session'a Aktarilmasi ************/
                setUserRoles();
                /*********************************************************************/

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);


                if(get_active_user()){

                    if(get_active_user()->user_role_id == 1){//admin

                        redirect(base_url("dashboard"));
                    } 
                    if(get_active_user()->user_role_id == 2){// kalite
                        redirect(base_url("anasayfa/kalite"));

                    }
                    if(get_active_user()->user_role_id == 3){// yonetim
                        redirect(base_url("anasayfa/yonetim"));

                    }
                    if(get_active_user()->user_role_id == 4){// planlama

                        redirect(base_url("anasayfa/planlama"));
                    }
                    if(get_active_user()->user_role_id == 5){// arge

                        redirect(base_url("anasayfa/arge"));

                    }
                    
                
                }

            } else {

                // Hata Verilecek...

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Lütfen giriş bilgilerinizi kontrol ediniz",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("login"));

            }

        }
    }

    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("login"));

    }

    public function forget_password(){


        if(get_active_user()){
            redirect(base_url());
        }

        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "forget_password";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function reset_password(){

        $this->load->library("form_validation");

        // Kurallar yazilir..
        $this->form_validation->set_rules("email", "E-posta", "required|trim|valid_email");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b> alanı doldurulmalıdır",
                "valid_email" => "Lütfen geçerli bir <b>e-posta</b> adresi giriniz",
            )
        );

        if($this->form_validation->run() === FALSE){

            $viewData = new stdClass();

            /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "forget_password";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            $user = $this->user_model->get(
                array(
                    "isActive"  => 1,
                    "email"     => $this->input->post("email")
                )
            );

            if($user){

                $this->load->helper("string");
                $temp_password = random_string();

                $send = send_email($user->email, "Şifremi Unuttum", "CMS'e geçici olarak <b>{$temp_password}</b> şifresiyle giriş yapabilirsiniz");

                if($send){
                    echo "E-posta başarılı bir şekilde gonderilmiştir..";

                    $this->user_model->update(
                        array(
                            "id"    => $user->id
                        ),
                        array(
                            "password"  => md5($temp_password)
                        )
                    );


                    $alert = array(
                        "title" => "İşlem Başarılı",
                        "text" => "Şifreniz başarılı bir şekilde resetlendi. Lütfen E-postanızı kontrol ediniz!",
                        "type"  => "success"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("login"));

                    die();


                } else {

//                    echo $this->email->print_debugger();
                    $alert = array(
                        "title" => "İşlem Başarısız",
                        "text" => "E-posta gönderilirken bir problem oluştu!!",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("sifremi-unuttum"));

                    die();

                }

            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => "Böyle bir kullanıcı bulunamadı!!!",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("sifremi-unuttum"));
            }
        }
    }
}
