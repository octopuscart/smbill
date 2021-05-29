<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 */
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class MovieEvent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model('User_model');
        $this->load->model('Movie');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
        $this->user_type = $this->session->logged_in['user_type'];
    }

    public function index() {
        redirect("Media/images");
    }

    ///Category management 
    public function images() {
        $this->db->select('id, image');
        $query = $this->db->get('media');
        $image_list = $query->result();
        $data['image_list'] = $image_list;
        if (isset($_POST['submit'])) {
            $datetime = date("F j, Y, g:i a");
            //Check whether user upload picture
            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'assets/media';
                $config['allowed_types'] = '*';
                $temp1 = rand(100, 1000000);
                $ext1 = explode('.', $_FILES['picture']['name']);
                $ext = strtolower(end($ext1));
                $file_newname = $temp1 . "1." . $ext;
                $config['file_name'] = $file_newname;
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else {
                    $picture = '';
                }
            } else {
                $picture = '';
            }
            $user_id = $this->session->userdata('logged_in')['login_id'];
            $post_data = array(
                'image' => $file_newname,
                'datetime' => date('Y-m-d H:M:S'),
                'user_id' => $user_id
            );

            $this->db->insert('media', $post_data);
            $last_id = $this->db->insert_id();


            //
            //Storing insertion status message.
            if ($last_id) {
                redirect('Media/images');
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
            } else {
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        $this->load->view('CMS/Media/image', $data);
    }

    public function newEvent() {
        $data = array();


        $data['categories'] = array();

        $config['upload_path'] = 'assets/movies';
        $config['allowed_types'] = '*';
        if (isset($_POST['submit_data'])) {
            $picture = '';

            if (!empty($_FILES['picture']['name'])) {
                $temp1 = rand(100, 1000000);
                $config['overwrite'] = TRUE;
                $ext1 = explode('.', $_FILES['picture']['name']);
                $ext = strtolower(end($ext1));
                $file_newname = $temp1 . $ext;
                $picture = $file_newname;
                $config['file_name'] = $file_newname;
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                } else {
                    $picture = '';
                }
            }

            $movieArray = array(
                "image" => $picture,
                "attr" => $this->input->post("attr"),
                "title" => $this->input->post("title"),
                "description" => $this->input->post("description"),
                "trailer_link" => $this->input->post("trailer_link"),
            );

            $this->db->insert('movie_show', $movieArray);
            redirect("MovieEvent/newEvent");
        }

        $this->load->view('Movie/new_event', $data);
    }

    public function eventList() {
        $this->db->order_by('id desc');
        $query = $this->db->get('movie_show');
        $image_list = $query->result_array();
        $data['eventlist'] = $image_list;
        $this->load->view('Movie/list', $data);
    }

    public function newsTheaterTemplate($theater_id = 0) {
        $data["theater_id"] = $theater_id;
        $query = $this->db->get('movie_theater');
        $theaterlist = $query->result_array();
        $data["theater_list"] = $theaterlist;

        $this->db->where('id', $theater_id);
        $query = $this->db->get('movie_theater');
        $theaterobj = $query->row_array();
        $data["theaterobj"] = $theaterobj;

        if (isset($_POST['addtemplate'])) {
            $templatearray = array(
                "theater_id" => $theater_id,
                "title" => $this->input->post("template_name"),
                "reserve_seats" => $this->input->post("reserved_seats"),
                "status" => "active"
            );
            $this->db->insert('movie_theater_template', $templatearray);
            $last_id = $this->db->insert_id();

            $classname = $this->input->post("class");
            $price = $this->input->post("price");
            foreach ($classname as $key => $value) {
                $templateattr = array(
                    "template_id" => $last_id,
                    "class_name" => $classname[$key],
                    "class_price" => $price[$key],
                );
                $this->db->insert('movie_theater_template_class', $templateattr);
            }
        }

        $this->load->view('Movie/theater_template_create', $data);
    }

    function createEvent() {
        $query = $this->db->get('movie_theater');
        $theaterlist = $query->result_array();
        $data["theater_list"] = $theaterlist;

        $this->db->order_by('id desc');
        $query = $this->db->get('movie_show');
        $image_list = $query->result_array();
        $data['eventlist'] = $image_list;


        if (isset($_POST['submit_data'])) {
            $movie_id = $this->input->post("movie_id");
            $theater_id = $this->input->post("theater_id");
            redirect("MovieEvent/updateEvent/$theater_id/$movie_id");
        }
        $this->load->view('Movie/create_event', $data);
    }

    function updateEvent($theater_id, $movie_id) {
        $query = $this->db->get('movie_theater');
        $theaterlist = $query->result_array();
        $data["theater_list"] = $theaterlist;

        $this->db->where('id', $theater_id);
        $query = $this->db->get('movie_theater');
        $theaterobj = $query->row_array();
        $data["theaterobj"] = $theaterobj;

        $this->db->select("*, description as about");
        $this->db->where('id', $movie_id);
        $query = $this->db->get('movie_show');
        $movieobj = $query->row_array();
        $movieobj["image"] = MOVIEPOSTER . $movieobj["image"];

        $data["movie"] = $movieobj;

        $data["theater_id"] = $theater_id;

        if (isset($_POST["submit_data"])) {
            $inputdata = $this->input->post();
            $template_id = $inputdata["template_id"];
            $eventdate = $inputdata["event_date"];
            $eventtime = $inputdata["event_time"];
            foreach ($eventdate as $key => $value) {
                $e_date = $eventdate[$key];
                $e_time = $eventtime[$key];
                $eventdata = array(
                    "theater_id" => $theater_id,
                    "movie_id" => $movie_id,
                    "theater_template_id" => $template_id,
                    "event_date" => $e_date,
                    "event_time" => $e_time
                );
                $this->db->insert('movie_event', $eventdata);
            }
            redirect("MovieEvent/evenMovietList");
        }


        $this->load->view('Movie/updateevent', $data);
    }

    public function evenMovietList() {
        $eventlist = $this->Movie->getEventsList();
//        echo "<pre>";
//        print_r($eventlist);
        $data['eventlist'] = $eventlist;
        $this->load->view('Movie/eventlist', $data);
    }

    public function yourTicket($bookingid) {
        $data["booking_id"] = $bookingid;
        $this->db->where('booking_id', $bookingid);
        $query = $this->db->get('movie_ticket_booking');
        $bookingobj = $query->row_array();
        $movies = $this->Movie->movieInforamtion($bookingobj['movie_id']);
        $data['movieobj'] = $movies;


        $theaters = $movies = $this->Movie->theaterInformation($bookingobj['theater_id']);
        $data['theater'] = $theaters;

        $data['booking'] = $bookingobj;
        $data['seats'] = $this->Movie->bookedSeatById($bookingobj['id']);
        $this->load->view('Movie/ticketview', $data);
    }

    function paidBooking($bookid, $paymentstatus) {
        $this->db->where('booking_id', $bookid);
        $query = $this->db->get('movie_ticket_booking');
        $bookingobj = $query->row_array();
        $bid = $bookingobj["id"];
        $bookingArray = array(
            "payment_type" => urldecode($paymentstatus),
            "payment_attr" => "Payment Received",
            "booking_type" => "Paid",
            "booking_time" => date('H:i:s'),
            "booking_date" => Date('Y-m-d'),
        );
        print_r($bookingArray);
        $this->db->set($bookingArray);
        $this->db->where('id', $bid);  //set column_name and value in which row need to update
        $this->db->update('movie_ticket_booking');

        $this->db->set("status", "1");
        $this->db->where('movie_ticket_booking_id', $bid); //set column_name and value in which row need to update
        $this->db->update('movie_ticket');
        redirect("MovieEvent/yourTicketMail/$bookid");
    }

    function cancleBooking($bookid) {
        $this->db->where('booking_id', $bookid);
        $query = $this->db->get('movie_ticket_booking');
        $bookingobj = $query->row_array();
        $bid = $bookingobj["id"];
        $bookingArray = array(
            "payment_attr" => "Admin Cancelled",
            "booking_type" => "Cancelled",
            "booking_time" => date('H:i:s'),
            "booking_date" => Date('Y-m-d'),
        );
        $this->db->set($bookingArray);
        $this->db->where('id', $bid);  //set column_name and value in which row need to update
        $this->db->update('movie_ticket_booking');

        $this->db->set("status", "0");
        $this->db->where('movie_ticket_booking_id', $bid); //set column_name and value in which row need to update
        $this->db->update('movie_ticket');
        redirect("MovieEvent/yourTicketMail/$bookid");
    }

    function refundBooking($bookid) {
        $this->db->where('booking_id', $bookid);
        $query = $this->db->get('movie_ticket_booking');
        $bookingobj = $query->row_array();
        $bid = $bookingobj["id"];
        $bookingArray = array(
            "payment_attr" => "Admin Refund",
            "booking_type" => "Refund",
            "booking_time" => date('H:i:s'),
            "booking_date" => Date('Y-m-d'),
        );
        $this->db->set($bookingArray);
        $this->db->where('id', $bid);  //set column_name and value in which row need to update
        $this->db->update('movie_ticket_booking');

        $this->db->set("status", "0");
        $this->db->where('movie_ticket_booking_id', $bid); //set column_name and value in which row need to update
        $this->db->update('movie_ticket');
        redirect("MovieEvent/yourTicketMail/$bookid");
    }

    public function yourTicketMail($bookingid) {
        $this->db->where('booking_id', $bookingid);
        $query = $this->db->get('movie_ticket_booking');

        $bookingobj = $query->row_array();
        $movies = $this->Movie->movieInforamtion($bookingobj['movie_id']);
        $data['movieobj'] = $movies;

        $theaters = $this->Movie->theaterInformation($bookingobj['theater_id']);
        $data['theater'] = $theaters;

        $data['booking'] = $bookingobj;
        $data['seats'] = $this->Movie->bookedSeatById($bookingobj['id']);


        $emailsender = EMAIL_SENDER;
        $sendername = EMAIL_SENDER_NAME;
        $email_bcc = EMAIL_BCC;

        $this->email->set_newline("\r\n");
        $this->email->from(EMAIL_BCC, $sendername);
        $this->email->to($bookingobj['email']);
        $this->email->bcc(EMAIL_BCC);

        $subject = "Your Movie Ticket(s) for " . $movies['title'];
        $this->email->subject($subject);


        $message = $this->load->view('Movie/ticketviewemail', $data, true);
        setlocale(LC_MONETARY, 'en_US');
        $checkcode = REPORT_MODE;
        $checkcode = 0;
        if ($checkcode) {
            $this->email->message($message);
            $this->email->print_debugger();
            $send = $this->email->send();
            if ($send) {
                redirect("MovieEvent/yourTicket/$bookingid");
            } else {
                $error = $this->email->print_debugger(array('headers'));
                redirect("MovieEvent/yourTicket/$bookingid");
            }
        } else {
            redirect("MovieEvent/yourTicket/$bookingid");
        }
    }

    function createEventV2() {
        
    }

    function bookingList() {
        $eventlist = $this->Movie->movieevent();
        $data["eventlist"] = $eventlist;
        $this->load->view('Movie/bookingList', $data);
    }

    function bookNow($event_id) {
        $eventinfo = $this->Movie->eventInformation($event_id);
        $data["event_info"] = $eventinfo;

        $data['event_id'] = $event_id;
        $data['total_seats'] = 5;

        $data["theater_template_id"] = $eventinfo["theater_template_id"];


        $data['movie'] = $eventinfo["movie"];

        $theaters = $eventinfo["theater"];


        $data['theater'] = $theaters;
        $data['theater_id'] = $eventinfo["theater_id"];

        if (isset($_POST['proceed'])) {
            $ticket = $this->input->post('ticket');
            $price = $this->input->post('price');

            $ticketarray = array(
                "ticket" => array(),
                "movie_id" => $eventinfo["movie_id"],
                "total" => 0,
                "event_id" => $event_id,
                "theater_id" => $eventinfo["theater_id"],
                "selected_date" => $eventinfo["event_date"],
                "selected_time" => $eventinfo["event_time"],
            );
            foreach ($ticket as $key => $value) {
                $ticketarray["ticket"][$value] = $price[$key];
                $ticketarray["total"] += $price[$key];
            }
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $contact_no = $this->input->post('contact_no');

            $bookingArray = array(
                "name" => $name,
                "email" => $email,
                "contact_no" => $contact_no,
                "select_date" => $eventinfo['event_date'],
                "select_time" => $eventinfo['event_time'],
                "movie_id" => $eventinfo['movie_id'],
                "theater_id" => $eventinfo['theater_id'],
                "total_price" => $ticketarray['total'],
                "event_id" => $event_id,
                "payment_type" => "",
                "payment_attr" => "",
                "payment_id" => "",
                "booking_type" => "Reserved",
                "booking_time" => Date('Y-m-d'),
                "booking_date" => date('H:i:s'),
            );

            $this->db->insert('movie_ticket_booking', $bookingArray);
            $last_id = $this->db->insert_id();
            $bookid = Date('Ymd') . "" . $last_id;
            $bookid_md5 = md5($bookid);
            $this->db->set('booking_no', $bookid);
            $this->db->set('booking_id', $bookid_md5);
            $this->db->where('id', $last_id); //set column_name and value in which row need to update
            $this->db->update('movie_ticket_booking');

            $ticketlist = $ticketarray["ticket"];

            foreach ($ticketlist as $vtk => $vtp) {
                $seatArray = array(
                    "movie_ticket_booking_id" => $last_id,
                    "seat_price" => $vtp,
                    "seat" => $vtk,
                );
                $this->db->insert('movie_ticket', $seatArray);
            }
            redirect("MovieEvent/yourTicket/" . $bookid_md5);

            print_r($ticketarray);
        }

        $this->load->view('Movie/selectsit', $data);
    }

}
