<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
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

    function convert_num_word($number) {
        $no = round($number);
        $point = round($number - $no, 2) * 100;
        $hundred = null;
        $digits_1 = strlen($no);
        $i = 0;
        $str = array();
        $wordsz = array('0' => 'zero', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',);
        $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
        while ($i < $digits_1) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += ($divider == 10) ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
            } else
                $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);
        $result = $result ? $result : $wordsz[$result / 10];
        $points = ($point) ?
                " and " . $wordsz[$point / 10] . " " .
                $wordsz[$point = $point % 10] : '';
        return "Only " . GLOBAL_CURRENCY . $result . " " . ($points ? "" . $points . " Cents" : "") . "";
    }

    function getDataArray($table_name) {
        $alldata = $this->db->get($table_name)->result_array();
        $resultarray = array();
        foreach ($alldata as $key => $value) {
            $resultarray[$value["id"]] = $value;
        }
        return $resultarray;
    }

    function reports() {
        $data = array();
        $data['exportdata'] = 'yes';
        $date1 = date('Y-m-') . "01";
        $data['dateselected'] = 'no';

        $date2 = date('Y-m-t');
        if (isset($_GET['daterange'])) {
            $daterange = $this->input->get('daterange');
            $datelist = explode(" to ", $daterange);
            $date1 = $datelist[0];
            $date2 = $datelist[1];
            $data['dateselected'] = 'yes';
        }
        $daterange = $date1 . " to " . $date2;

        $this->db->where("trans_date between '$date1' and '$date2'");
        $query = $this->db->get("billing_invoice");
        $invoiceslist = $query->result_array();



        $data["invoiceslist"] = $invoiceslist;
        $data['daterange'] = $daterange;
        $this->load->view('Invoice/reports', $data);
    }

    function reportsXls() {
        $data = array();

        $date1 = date('Y-m-') . "01";

        $date2 = date('Y-m-t');
        if (isset($_GET['daterange'])) {
            $daterange = $this->input->get('daterange');
            $datelist = explode(" to ", $daterange);
            $date1 = $datelist[0];
            $date2 = $datelist[1];
            $data['dateselected'] = 'yes';
        }
        $daterange = $date1 . " to " . $date2;

        $this->db->where("trans_date between '$date1' and '$date2'");
        $query = $this->db->get("billing_invoice");
        $invoiceslist = $query->result_array();


        $delimiter = ",";
        $filename = $daterange . ".csv";
        $f = fopen('php://memory', 'w');

        $fields = array('S. No.', 'Invoice No.', 'Party', 'Consignee', 'Trans. Date', 'Total Amount');
        fputcsv($f, $fields, $delimiter);

        foreach ($invoiceslist as $key => $value) {
            $lineData = array($key + 1,
                $value["invoice_no"],
                $value["party_name"],
                $value["consignee_name"],
                $value["trans_date"],
                $value["total_amount"],
            );
            fputcsv($f, $lineData, $delimiter);
        }
        fseek($f, 0);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');
        //output all remaining data on a file pointer
        fpassthru($f);
        exit;
    }

    function create() {
        $data = array();
        $parties = $this->getDataArray("billing_party");

        $data["parties"] = $parties;

        $consignee = $this->getDataArray("billing_consignee");
        $data["consignee"] = $consignee;

        if (isset($_POST["submit"])) {
            $party_id = $this->input->post("party_id");
            $consignee_id = $this->input->post("consignee_id");
            $insertarray = array(
                "party_id" => $party_id,
                "party_name" => $parties[$party_id]["name"],
                "party_address" => $parties[$party_id]["address"],
                "consignee_id" => $consignee_id,
                "consignee_name" => $consignee[$consignee_id]["name"],
                "consignee_address" => $consignee[$consignee_id]["address"],
                "invoice_no" => "",
                "trans_date" => $this->input->post("trans_date"),
                "due_date" => "",
                "deposite" => "",
                "other_charges" => "",
                "sub_total" => "",
                "total_amount" => "",
                "remark" => "",
            );
            $this->db->insert('billing_invoice', $insertarray);
            $last_id = $this->db->insert_id();
            $invoice_no = date("Ymd") . "" . $last_id;
            $this->db->where("id", $last_id);
            $this->db->set("invoice_no", $invoice_no);
            $this->db->update("billing_invoice");
            redirect(site_url("Invoice/update/$last_id"));
        }


        $this->load->view('Invoice/create', $data);
    }

    function update($invoice_id) {
        $data = array();
        $this->db->where("id", $invoice_id);
        $invoice_data = $this->db->get("billing_invoice")->row_array();
        $invoice_description = $this->db->where("billing_invoice_id", $invoice_id)->get("billing_invoice_description")->result_array();
        $total = 0;
        $total_amount = 0;
        $deposite = $invoice_data["deposite"] ? $invoice_data["deposite"] : 0;
        $other_charges = $invoice_data["other_charges"] ? $invoice_data["other_charges"] : 0;

        foreach ($invoice_description as $key => $value) {
            $value["amount"] = trim($value["amount"]) ? $value["amount"] : 0;
            $total += $value["amount"];
        }
        $total_amount = ($total + $other_charges) - $deposite;

        $amount_inwords = "";
        if ($total_amount > 0) {
            $amount_inwords = $this->convert_num_word($total_amount);
        }
        else{
            $total_amount2 = $total_amount*(-1);
            $amount_inwords = $this->convert_num_word($total_amount2). " (Credit)";
        }

        $this->db->where("id", $invoice_id);
        $this->db->set(array("sub_total" => $total, "total_amount" => $total_amount));
        $this->db->update("billing_invoice");
        $invoice_data["amount_inwords"] = $amount_inwords;

        $invoice_data["sub_total"] = $total;
        $invoice_data["total_amount"] = $total_amount;

        $data["invoice_data"] = $invoice_data;
        $data["invoice_description"] = $invoice_description;

        $parties = $this->getDataArray("billing_party");

        $data["parties"] = $parties;

        $consignee = $this->getDataArray("billing_consignee");
        $data["consignee"] = $consignee;

        if (isset($_POST["submitData"])) {
            $insertarray = array(
                "billing_invoice_id" => $invoice_id,
                "transaction_date" => "",
                "amount" => $this->input->post("amount"),
                "description" => $this->input->post("description"),
            );
            $this->db->insert('billing_invoice_description', $insertarray);
            redirect(site_url("Invoice/update/$invoice_id"));
        }

        if (isset($_POST["submitPaty"])) {
            $party_id = $this->input->post("party_id");
            $consignee_id = $this->input->post("consignee_id");
            $insertarray = array(
                "party_id" => $party_id,
                "party_name" => $parties[$party_id]["name"],
                "party_address" => $parties[$party_id]["address"],
                "consignee_id" => $consignee_id,
                "consignee_name" => $consignee[$consignee_id]["name"],
                "consignee_address" => $consignee[$consignee_id]["address"],
            );
            $this->db->where("id", $invoice_id);
            $this->db->set($insertarray);
            $this->db->update("billing_invoice");
            redirect(site_url("Invoice/update/$invoice_id"));
        }

        if (isset($_POST["removeTransection"])) {
            $tr_id = $this->input->post("transection_id");
            $this->db->where("id", $tr_id);
            $this->db->delete('billing_invoice_description');
            redirect(site_url("Invoice/update/$invoice_id"));
        }


        $this->load->view('Invoice/update', $data);
    }

    function downloadInvoice($invoice_id) {
        $data = array();
        $this->db->where("id", $invoice_id);
        $invoice_data = $this->db->get("billing_invoice")->row_array();
        $invoice_description = $this->db->get("billing_invoice_description")->result_array();
        $total_amount = 0;
        foreach ($invoice_description as $key => $value) {
            $total_amount += $value["amount"];
        }

        $invoice_data["sub_total"] = $total_amount;

        $data["invoice_data"] = $invoice_data;
        $data["invoice_description"] = $invoice_description;
        $data["header"] = 0;
        $pdfFilePath = $invoice_data["invoice_no"] . ".pdf";
        ob_clean();
        setlocale(LC_MONETARY, 'en_US');
        echo $html = $this->load->view('Invoice/createBase_update', $data, true);
    }

}

?>
