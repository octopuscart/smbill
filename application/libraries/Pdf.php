<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
include_once APPPATH.'/third_party/tcpdf_min/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}

?>