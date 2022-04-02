<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CMS extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->curd = $this->load->model('Curd_model');
        $session_user = $this->session->userdata('logged_in');
        if ($session_user) {
            $this->user_id = $session_user['login_id'];
        } else {
            $this->user_id = 0;
        }
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
        $this->user_type = $this->session->logged_in['user_type'];
    }

    public function partySetting() {
        $table_name = "billing_party";
        $data = array();
        $data['title'] = "Party Setup";
        $data['description'] = "";
        $data['form_title'] = "Party Setup";
        $data['table_name'] = $table_name;
        $form_attr = array(
            "name" => array(
                "title" => "Party Name",
                "required" => true,
                "place_holder" => "Party Name",
                "type" => "text",
                "width" => "300px",
                "default" => ""),
            "address" => array(
                "title" => "Address",
                "required" => false,
                "place_holder" => "Address",
                "type" => "textarea",
                "width" => "50%",
                "default" => ""),
            "display_index" => array(
                "title" => "",
                "required" => false,
                "place_holder" => "",
                "type" => "hidden",
                "default" => ""
            ),
        );

        if (isset($_POST['submitData'])) {
            $postarray = array();
            foreach ($form_attr as $key => $value) {
                $postarray[$key] = $this->input->post($key);
            }
            $this->Curd_model->insert($table_name, $postarray);
            redirect("CMS/partySetting");
        }


        $categories_data = $this->Curd_model->get($table_name);
        $data['list_data'] = $categories_data;

        $fields = array(
            "id" => array("title" => "ID#", "width" => "100px"),
            "title" => array("title" => "Theater Name", "width" => "50%"),
            "description" => array("title" => "Description", "width" => "50%"),
        );

        $data['fields'] = $fields;
        $data['form_attr'] = $form_attr;
        $this->load->view('layout/curd', $data);
    }

    public function consigneeSetting() {
        $table_name = "billing_consignee";
        $data = array();
        $data['title'] = "Consignee Setup";
        $data['description'] = "";
        $data['form_title'] = "Consignee Setup";
        $data['table_name'] = $table_name;
        $form_attr = array(
            "name" => array(
                "title" => "Consignee Name",
                "required" => true,
                "place_holder" => "Consignee Name",
                "type" => "text",
                "width" => "300px",
                "default" => ""),
            "address" => array(
                "title" => "Address",
                "required" => false,
                "place_holder" => "Address",
                "type" => "textarea",
                "width" => "50%",
                "default" => ""),
            "display_index" => array(
                "title" => "",
                "required" => false,
                "place_holder" => "",
                "type" => "hidden",
                "default" => ""
            ),
        );

        if (isset($_POST['submitData'])) {
            $postarray = array();
            foreach ($form_attr as $key => $value) {
                $postarray[$key] = $this->input->post($key);
            }
            $this->Curd_model->insert($table_name, $postarray);
            redirect("CMS/consigneeSetting");
        }


        $categories_data = $this->Curd_model->get($table_name);
        $data['list_data'] = $categories_data;

        $fields = array(
            "id" => array("title" => "ID#", "width" => "100px"),
            "title" => array("title" => "Theater Name", "width" => "50%"),
            "description" => array("title" => "Description", "width" => "50%"),
        );

        $data['fields'] = $fields;
        $data['form_attr'] = $form_attr;
        $this->load->view('layout/curd', $data);
    }

}

?>
