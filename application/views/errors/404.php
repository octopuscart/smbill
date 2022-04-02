<?php
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
?>
<!-- begin #page-container -->
<div class="page-wrapper">
    <div class="container-fluid">


        <div class="error1">
            <div class="error-code1 m-b-10 f_40">404 <i class="fa fa-warning"></i></div>
            <div class="error-content1">
                <div class="error-message1">We couldn't find it...</div>
                <div class="error-desc1 m-b-20">
                    The page you're looking for doesn't exist. <br />
                    Perhaps, there pages will help find what you're looking for.
                </div>
                <div>
                    <a href="<?php echo site_url("Invoice/deshboard"); ?>" class="btn btn-success">Go Back to Home Page</a>
                </div>
            </div>
        </div>


    </div>
</div>


<?php
$this->load->view('layout/footer');
?>
