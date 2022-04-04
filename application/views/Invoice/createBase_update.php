
<style>
    .invoicetable td, .invoicetable th{
        padding:5px;
        text-align: left;
    }
    .invoicetable h4{
        margin: 0px;

    }

    .invoicetable h4.headerblock{
        margin: 0px;
        margin-bottom: 10px;
    }

    .border-td td, .border-td th{
        border:1px solid lightgray;
    }
    .nobordertable td, .nobordertable th{
        border:1px solid white;
    }


</style>
<?php
$originalDate = date("Y-m-d");
?>
<div style="padding-left: 50px;margin-right: 10px;">
    <table class="invoicetable" style="width: 100%;">
        <tr>
            <td style="height: 200px;">

                <table style="width: 100%;">
                    <tr>
                        <td>
                            <?php
                            if ($header) {
                                ?>
                                <img src="<?php echo base_url(); ?>assets/assets/images/users/1.jpg" alt="users" style="height:120px;" />
                                <?php
                            }
                            ?>
                        </td>
                        <td style="    width: 80%;text-align: left;">
                            <?php
                            if ($header) {
                                ?>
                                <h3 style="font-size:25px;;margin: 0px;">SMART-TECH LOGISTIC (HK) LIMITED</h3>
                                <p  style="font-size:12px;;">
                                    Unit 402, 4/F, Kwai Wu Industrial Building. No. 89 Ta Chuen Ping Street, Kwai Chung. N. T<br/>
                                    Tel: +(852) 2736 6552, Fax: +(852) 2736 6770<br/>
                                    Email: smarttech@biznetvigator.com
                                </p>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>

            </td>

        </tr>
        <tr>

        </tr>
        <tr>
            <td  style="text-align: center;"">
                <table style="width: 100%;border-collapse: collapse;    border-color: #c7c5c5; " border="0">
                    <tr class=""  style="    width:50%;vertical-align: top;"  >

                        <td style="    width:30%;">
                            Invoice No: <?php echo $invoice_data["invoice_no"]; ?>
                        </td>
                        <td  style="text-align: center;height: 100px;   ">
                            <h3 style="font-size:25px;;margin: 0px;">INVOICE</h3>
                        </td>
                        <td style="    width:40%;text-align: right;">
                            Invoice Date: <span placeholder="" id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="trans_date" data-value="<?php echo $invoice_data["trans_date"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $invoice_data["trans_date"]; ?></span>

                        </td>
                    </tr>
                    <tr>
                        <td    style="   vertical-align: top;">
                            <h4 class="headerblock">To</h4>
                            <p>
                                <?php
                                echo $invoice_data["party_name"];
                                ?>
                            </p>
                            <p style="white-space: pre-line;"><?php echo $invoice_data["party_address"]; ?> </p>
                        </td>
                        <td></td>
                        <td  style="  vertical-align: top;"  >
                            <h4  class="headerblock">Consignee</h4>
                            <p>
                                <?php
                                echo $invoice_data["consignee_name"];
                                ?>
                            </p>
                            <p style="white-space: pre-line;"><?php echo $invoice_data["consignee_address"]; ?></p>
                        </td>

                    </tr>



                </table>
            </td>
        </tr>
        <tr>
            <td  style="text-align: center;"">
                <table style="width: 100%;border-collapse: collapse;margin-top: 20px;   " >
                    <tr  class="border-td">
                        <td   colspan="5">
                            <h4>
                                Your Transaction(s)
                                <button type="button" id="add_transection" class="btn btn-primary p-l-40 p-r-40" style="float: right;" data-toggle="modal" data-target="#add_item"><i class="fa fa-plus"></i> Add Transactions</button>

                            </h4>

                        </td>
                    </tr>
                    <tr class="border-td">
                        <td style="width: 70px">
                            <h4>S. No.</h4>

                        </td>

                        <td >
                            <h4>Description(s)</h4>

                        </td>
                        <td style="width: 180px;text-align: right;">
                            <h4>Cost To Company</h4>

                        </td>
                        <td style="width: 180px;text-align: right;">
                            <h4>Net Cost</h4>

                        </td>
                    </tr>
                    <?php
                    foreach ($invoice_description as $key => $value) {
                        ?>
                        <tr class="border-td">
                            <td>
                                <?php echo $key + 1; ?>
                            </td>

                            <td style="white-space: pre-line;">
                                <?php $txndate = $value["description"]; ?>
                                <span  id="<?php echo $value["id"]; ?>" data-type="textarea" data-pk="<?php echo $value['id']; ?>" data-name="description" data-value="<?php echo $value["description"]; ?>" data-params ={'tablename':'billing_invoice_description'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $value["description"]; ?></span>
                                <button type="button" class="btn btn-danger btn-sm p-l-40 p-r-40 remove_transections"  data-toggle="modal" data-target="#remove_item" onclick="removeItem(<?php echo $value["id"];?>)" style="margin-top: 10px;"><i class="fa fa-trash"></i> Remove</button>

                            </td>
                            <td style="text-align: right;">
                                <?php
                                $sb_amount = $value["amount"] ? $value["amount"] : 0
                                ?>
                                <span  id="<?php echo $value["id"]; ?>" data-type="text" data-pk="<?php echo $value['id']; ?>" data-name="amount" data-value="<?php echo $value["amount"]; ?>" data-params ={'tablename':'billing_invoice_description'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" >
                                    <?php
                                    echo GLOBAL_CURRENCY . " " . number_format($sb_amount, 2, '.', '');
                                    ?>

                                </span>
                            </td>
                            <td style="text-align: right;">
                                <?php
                                echo GLOBAL_CURRENCY . " " . number_format($sb_amount, 2, '.', '');
                                ?>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tr style="text-align: right;" class="border-td">
                        <td rowspan="4" colspan="2" style="text-align: left;">


                            <b>  NET AMOUNT IN WORDS</b> 
                            <p style="text-transform: capitalize;"><?php echo $invoice_data["amount_inwords"]; ?></p>

                            </th>
                        </td>
                        <th style="text-align: right;">
                            SUB TOTAL

                        </th>
                        <th style="text-align: right;">

                            <?php
                            echo GLOBAL_CURRENCY . " " . number_format($invoice_data["sub_total"], 2, '.', '');
                            ?>
                        </th>
                    </tr>
                    <tr style="text-align: right;" class="border-td">

                        <th style="text-align: right;">
                            DEPOSITE

                        </th>
                        <th style="text-align: right;">

                            <span placeholder="" id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="deposite" data-value="<?php echo $invoice_data["deposite"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" >
                                <?php
                                $desposite = $invoice_data["deposite"] ? $invoice_data["deposite"] : 0;
                                echo GLOBAL_CURRENCY . " " . number_format($desposite, 2, '.', '');
                                ?>
                            </span>

                        </th>
                    </tr>
                    <tr style="text-align: right;" class="border-td">

                        <th style="text-align: right;">
                            OTHER CHARGES

                        </th>
                        <th style="text-align: right;">
                            <span placeholder="" id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="other_charges" data-value="<?php echo $invoice_data["other_charges"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" >
                                <?php
                                $other_charges = $invoice_data["other_charges"] ? $invoice_data["other_charges"] : 0;

                                echo GLOBAL_CURRENCY . " " . number_format($other_charges, 2, '.', '');
                                ?></span>
                        </th>
                    </tr>
                    <tr style="text-align: right;" class="border-td">

                        <th style="text-align: right;">
                            NET AMOUNT

                        </th>
                        <th style="text-align: right;">
                            <?php
                            $total_amount = $invoice_data["total_amount"] ? $invoice_data["total_amount"] : 0;

                            echo GLOBAL_CURRENCY . " " . number_format($total_amount, 2, '.', '');
                            ?>
                        </th>
                    </tr>



                    <tr style="text-align: right;" class="border-td">
                        <td  colspan="2" style="text-align: left;height: 100px;vertical-align: top">
                            <b>Remark</b><br/>
                            <span  id="remarkid" data-type="textarea" data-pk="<?php echo $invoice_data['id']; ?>" data-name="remark" data-value="<?php echo $invoice_data["remark"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5  editable-click" tabindex="-1" ><?php echo $invoice_data["remark"]; ?></span>


                        </td>
                        <td rowspan="2"  colspan="2"  style="text-align: center;vertical-align: top">
                            <div style="height: 150px;
                                 width: 100%;
                                 display: block;">
                                <b >FOR SMART-TECH LOGISTIC (HK) LIMITED</b>
                            </div>
                            <b>AUTHORIZED SIGNATORY</b>
                        </td>
                    </tr>
                    <tr style="text-align: right;" class="border-td">
                        <td  colspan="3" style="text-align: left;height: 100px;vertical-align: top">
                            <b>TRANSFER TO BELOW BANK DETAILS</b><br/>
                            <table border="0" class="nobordertable">
                                 <tr>
                                    <th>COMPANY NAME</th>
                                    <td>SMART-TECH LOGISTICS (HK) LIMITED</td>
                                </tr>
                                <tr>
                                    <th>BANK NAME</th>
                                    <td>HSBC (HONG KONG) LIMITED</td>
                                </tr>
                                <tr>
                                    <th>ACCOUNT NO.</th>
                                    <td>012-844619-001</td>
                                </tr>
                               
                            </table>



                        </td>


                    </tr>



                </table>
            </td>
        </tr>


    </table>
</div>
