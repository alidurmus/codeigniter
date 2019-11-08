<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->tableName = "videos";
    }

 
}

/* End of file WelcomeModel.php */
