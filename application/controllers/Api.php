<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('Movie');
        $this->load->library('session');
        $this->checklogin = $this->session->userdata('logged_in');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    function updateCurd_post() {
        $fieldname = $this->post('name');
        $value = $this->post('value');
        $pk_id = $this->post('pk');
        $tablename = $this->post('tablename');
        if ($this->checklogin) {
            $data = array($fieldname => $value);
            $this->db->set($data);
            $this->db->where("id", $pk_id);
            $this->db->update($tablename, $data);
        }
    }

    function createRange($start, $end, $total, $gapes, $row, $booked, $reserve, $gap) {
        //A Availble, B:Booked, R Reserved
        $temp = array();
        $temprow = array();
        for ($i = $start; $i <= $end; $i++) {
            $trow = $row . "-" . $i;
            $temp[$trow] = $trow;
        }
        for ($i = 1; $i <= $total; $i++) {
            $trow = $row . "-" . $i;
            if (isset($temp[$trow])) {
                $temprow[$trow] = "A";
            } else {
                $temprow[$trow] = "";
            }
            if (isset($booked[$trow])) {
                $temprow[$trow] = "B";
            }
            if (isset($reserve[$trow])) {
                $temprow[$trow] = "R";
            }
            if (isset($gap[$i])) {
                $trow = $row . "-" . $i . "_" . $gap[$i];
                $temprow[$trow] = "";
            }
        }
        foreach ($gapes as $key => $value) {
            $trow = $row . "-" . $value;
            $temprow[$trow] = "";
        }

        return $temprow;
    }


    function getTheaterTemplate_get($theater_id) {
        $templatelist = $this->Movie->theaterTemplate($theater_id);
        $this->response($templatelist);
    }

    function getLayout_GH_V_WALK_get() {
        $booked = array();
        $reserved = array();
        $gaps = array();
        $layout = array(
            "totalinrow" => 20,
            "sitclass" => array(
                "class1" => array(
                    "price" => "200",
                    "rowcount" => "2",
                    "color" => "#fff",
                    "row" => array(
                        "A" => $this->createRange(6, 13, 19, [], "A", $booked, $reserved, $gaps),
                        "B" => $this->createRange(3, 16, 19, [], "B", $booked, $reserved, $gaps),
                    )
                ),
                "class2" => array(
                    "price" => "220",
                    "rowcount" => "5",
                    "color" => "#fff",
                    "row" => array(
                        "C" => $this->createRange(3, 17, 19, [], "C", $booked, $reserved, $gaps),
                        "D" => $this->createRange(3, 17, 19, [], "D", $booked, $reserved, $gaps),
                        "E" => $this->createRange(3, 17, 19, [], "E", $booked, $reserved, $gaps),
                        "F" => $this->createRange(3, 18, 19, [], "F", $booked, $reserved, $gaps),
                        "G" => $this->createRange(1, 19, 19, [], "G", $booked, $reserved, $gaps),
                    )
                ),
            )
        );
        $this->response($layout);
    }

    function getLayoutGrandOcean_get() {
        $booked = array();
        $reserved = array();
        $gaps = array("7" => "", "25" => "");
        $layout = array(
            "totalinrow" => 35,
            "sitclass" => array(
                "class1" => array(
                    "price" => "180",
                    "rowcount" => "2",
                    "color" => "#fff",
                    "row" => array(
                        "A" => $this->createRange(8, 25, 32, [], "A", $booked, $reserved, $gaps),
                        "B" => $this->createRange(1, 32, 32, [], "B", $booked, $reserved, $gaps),
                        "C" => $this->createRange(1, 32, 32, [], "C", $booked, $reserved, $gaps),
                        "D" => $this->createRange(1, 32, 32, [], "D", $booked, $reserved, $gaps),
                        "E" => $this->createRange(1, 32, 32, [], "E", $booked, $reserved, $gaps),
                        "F" => $this->createRange(1, 32, 32, [], "F", $booked, $reserved, $gaps),
                    )
                ),
                "class2" => array(
                    "price" => "200",
                    "rowcount" => "5",
                    "color" => "#fff",
                    "row" => array(
                        "G" => $this->createRange(5, 28, 32, [25, 26, 7, 8], "G", $booked, $reserved, $gaps),
                        "H" => $this->createRange(5, 28, 32, [], "H", $booked, $reserved, $gaps),
                        "I" => $this->createRange(5, 28, 32, [], "I", $booked, $reserved, $gaps),
                        "J" => $this->createRange(5, 28, 32, [], "J", $booked, $reserved, $gaps),
                    )
                ),
                "class3" => array(
                    "price" => "220",
                    "rowcount" => "5",
                    "color" => "#fff",
                    "row" => array(
                        "K" => $this->createRange(1, 32, 32, [24, 25, 9, 8], "K", $booked, $reserved, $gaps),
                        "L" => $this->createRange(1, 32, 32, [24, 25, 9, 8], "L", $booked, $reserved, $gaps),
                        "M" => $this->createRange(1, 32, 32, [24, 25, 9, 8], "M", $booked, $reserved, $gaps),
                        "N" => $this->createRange(1, 32, 32, [], "N", $booked, $reserved, $gaps),
                        "O" => $this->createRange(1, 32, 32, [], "O", $booked, $reserved, $gaps),
                        "P" => $this->createRange(1, 32, 32, [], "P", $booked, $reserved, $gaps),
                        "Q" => $this->createRange(27, 32, 32, [], "Q", $booked, $reserved, $gaps),
                    )
                ),
            )
        );
        $this->response($layout);
    }

    function getLayout_GH_HSE4_get() {

        $booked = array();
        $reserved = array();
        $gaps = array("4" => "", "19" => "");
        $layout = array(
            "totalinrow" => 25,
            "sitclass" => array(
                "class1" => array(
                    "price" => "180",
                    "rowcount" => "2",
                    "color" => "#fff",
                    "row" => array(
                        "B" => $this->createRange(1, 22, 22, [16], "B", $booked, $reserved, $gaps),
                        "C" => $this->createRange(1, 22, 22, [], "C", $booked, $reserved, $gaps),
                    )
                ),
                "class2" => array(
                    "price" => "200",
                    "rowcount" => "6",
                    "color" => "#fff",
                    "row" => array(
                        "D" => $this->createRange(1, 22, 22, [16], "D", $booked, $reserved, $gaps),
                        "E" => $this->createRange(1, 22, 22, [], "E", $booked, $reserved, $gaps),
                        "F" => $this->createRange(1, 22, 22, [16], "F", $booked, $reserved, $gaps),
                        "G" => $this->createRange(1, 22, 22, [], "G", $booked, $reserved, $gaps),
                    )
                ),
                "class3" => array(
                    "price" => "220",
                    "rowcount" => "5",
                    "color" => "#fff",
                    "row" => array(
                        "H" => $this->createRange(1, 22, 22, [16], "H", $booked, $reserved, $gaps),
                        "I" => $this->createRange(1, 22, 22, [], "I", $booked, $reserved, $gaps),
                        "J" => $this->createRange(1, 22, 22, [16], "J", $booked, $reserved, $gaps),
                        "K" => $this->createRange(1, 22, 22, [], "K", $booked, $reserved, $gaps),
                        "L" => $this->createRange(1, 22, 22, [16], "L", $booked, $reserved, $gaps),
                        "M" => $this->createRange(1, 22, 22, [], "M", $booked, $reserved, $gaps),
                        "N" => $this->createRange(1, 22, 22, [16], "N", $booked, $reserved, $gaps),
                        "O" => $this->createRange(1, 22, 22, [], "O", $booked, $reserved, $gaps),
                        "P" => $this->createRange(1, 22, 22, [16, 5, 6, 7, 8, 9], "P", $booked, $reserved, $gaps),
                    )
                ),
            )
        );
        $this->response($layout);
    }

    function getLayout_GH_HSE3_get() {
        $booked = array();
        $reserved = array();
        $gaps = array("4" => "", "19" => "");
        $layout = array(
            "totalinrow" => 24,
            "sitclass" => array(
                "class1" => array(
                    "price" => "180",
                    "rowcount" => "2",
                    "color" => "#fff",
                    "row" => array(
                        "B" => $this->createRange(1, 21, 21, [19], "B", $booked, $reserved, $gaps),
                        "C" => $this->createRange(1, 21, 21, [], "C", $booked, $reserved, $gaps),
                    )
                ),
                "class2" => array(
                    "price" => "200",
                    "rowcount" => "6",
                    "color" => "#fff",
                    "row" => array(
                        "D" => $this->createRange(1, 21, 21, [19], "D", $booked, $reserved, $gaps),
                        "E" => $this->createRange(1, 21, 21, [], "E", $booked, $reserved, $gaps),
                        "F" => $this->createRange(1, 21, 21, [19], "F", $booked, $reserved, $gaps),
                        "G" => $this->createRange(1, 21, 21, [], "G", $booked, $reserved, $gaps),
                        "H" => $this->createRange(1, 21, 21, [19], "H", $booked, $reserved, $gaps),
                        "I" => $this->createRange(1, 21, 21, [], "I", $booked, $reserved, $gaps),
                    )
                ),
                "class3" => array(
                    "price" => "220",
                    "rowcount" => "5",
                    "color" => "#fff",
                    "row" => array(
                        "J" => $this->createRange(1, 21, 21, [19], "J", $booked, $reserved, $gaps),
                        "K" => $this->createRange(1, 21, 21, [], "K", $booked, $reserved, $gaps),
                        "L" => $this->createRange(1, 21, 21, [19], "L", $booked, $reserved, $gaps),
                        "M" => $this->createRange(1, 21, 21, [], "M", $booked, $reserved, $gaps),
                        "N" => $this->createRange(1, 21, 21, [19], "N", $booked, $reserved, $gaps),
                        "O" => $this->createRange(1, 21, 21, [], "O", $booked, $reserved, $gaps),
                        "P" => $this->createRange(1, 21, 21, [19], "P", $booked, $reserved, $gaps),
                        "Q" => $this->createRange(1, 21, 21, [20, 21, 3], "Q", $booked, $reserved, $gaps),
                    )
                ),
            )
        );
        $this->response($layout);
    }

    function getLayout_GH_HSE1_get() {
        $booked = array();
        $reserved = array();
        $gaps = array("4" => "", "19" => "");
        $layout = array(
            "totalinrow" => 26,
            "sitclass" => array(
                "class1" => array(
                    "price" => "180",
                    "rowcount" => "2",
                    "color" => "#fff",
                    "row" => array(
                        "C" => $this->createRange(1, 24, 24, [], "C", $booked, $reserved, $gaps),
                        "D" => $this->createRange(1, 24, 24, [19], "D", $booked, $reserved, $gaps),
                    )
                ),
                "class2" => array(
                    "price" => "200",
                    "rowcount" => "6",
                    "color" => "#fff",
                    "row" => array(
                        "E" => $this->createRange(1, 24, 24, [], "E", $booked, $reserved, $gaps),
                        "F" => $this->createRange(1, 24, 24, [19], "F", $booked, $reserved, $gaps),
                        "G" => $this->createRange(1, 24, 24, [], "G", $booked, $reserved, $gaps),
                        "H" => $this->createRange(1, 24, 24, [19], "H", $booked, $reserved, $gaps),
                        "I" => $this->createRange(1, 24, 24, [], "I", $booked, $reserved, $gaps),
                    )
                ),
                "class3" => array(
                    "price" => "220",
                    "rowcount" => "5",
                    "color" => "#fff",
                    "row" => array(
                        "J" => $this->createRange(1, 24, 24, [19], "J", $booked, $reserved, $gaps),
                        "K" => $this->createRange(1, 24, 24, [], "K", $booked, $reserved, $gaps),
                        "L" => $this->createRange(1, 24, 24, [19], "L", $booked, $reserved, $gaps),
                        "M" => $this->createRange(1, 24, 24, [], "M", $booked, $reserved, $gaps),
                        "N" => $this->createRange(1, 24, 24, [19], "N", $booked, $reserved, $gaps),
                        "O" => $this->createRange(1, 24, 24, [5, 6, 7, 12], "O", $booked, $reserved, $gaps),
                    )
                ),
            )
        );
        $this->response($layout);
    }

}

?>