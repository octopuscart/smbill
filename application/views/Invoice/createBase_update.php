
<style>
    .invoicetable td, .invoicetable th{
        padding:5px;
        text-align: left;
    }
    .invoicetable h4{
        margin: 0px;
    }
    .border-td td, .border-td th{
        border:1px solid lightgray;
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
            <td  style="text-align: center;height: 100px;    vertical-align: top;">
                <h3 style="font-size:25px;;margin: 0px;">INVOICE</h3>
            </td>
        </tr>
        <tr>
            <td  style="text-align: center;"">
                <table style="width: 100%;border-collapse: collapse;    border-color: #c7c5c5; " border="0">
                    <tr>
                        <td  style="    width: 45%;vertical-align: top;"  rowspan="8" >
                            <h4>To</h4>
                            <p>
                                <?php
                                echo $invoice_data["party_name"];
                                ?>
                            </p>
                            <p>
                                <?php
                                echo $invoice_data["party_address"];
                                ?>
                            </p>
                            <hr/>
                            <h4>Consignee</h4>
                            <p>
                                <?php
                                echo $invoice_data["consignee_name"];
                                ?>
                            </p>
                            <p>
                                <?php
                                echo $invoice_data["consignee_address"];
                                ?>
                            </p>
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <h4>Payment Coupon</h4>
                        </td>
                    </tr>
                    <tr class="border-td">
                        <td>Invoice NO#</td>
                        <td>
                            <?php echo $invoice_data["invoice_no"]; ?>
                        </td>
                    </tr>
                    <tr  class="border-td">
                        <td>Trans. Date</td>
                        <td>
                            <span placeholder="" id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="trans_date" data-value="<?php echo $invoice_data["trans_date"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $invoice_data["trans_date"]; ?></span>

                        </td>
                    </tr>
                    <tr  class="border-td">
                        <td>Due Date</td>
                        <td>

                            <span placeholder="" id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="due_date" data-value="<?php echo $invoice_data["due_date"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $invoice_data["due_date"]; ?></span>

                        </td>
                    </tr>
                    <tr  class="border-td">
                        <td>Deposite</td>
                        <td>

                            <span placeholder="" id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="deposite" data-value="<?php echo $invoice_data["deposite"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $invoice_data["deposite"]; ?></span>

                        </td>
                    </tr>
                    <tr  class="border-td">
                        <td>Other Charges</td>
                        <td>

                            <span placeholder="" id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="other_charges" data-value="<?php echo $invoice_data["other_charges"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $invoice_data["other_charges"]; ?></span>

                        </td>
                    </tr>
                    <tr  class="border-td">
                        <td>Current Balance</td>
                        <td>

                            <span placeholder=""  id="<?php echo $invoice_data["id"]; ?>" data-type="text" data-pk="<?php echo $invoice_data['id']; ?>" data-name="current_balance" data-value="<?php echo $invoice_data["other_charges"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" > <?php
                                echo GLOBAL_CURRENCY . " " . number_format($invoice_data["current_balance"], 2, '.', '');
                                ?></span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td  style="text-align: center;"">
                <table style="width: 100%;border-collapse: collapse;margin-top: 20px;   " >
                    <tr  class="border-td">
                        <td   colspan="3">
                            <h4>Your Transactions</h4>

                        </td>
                    </tr>
                    <tr class="border-td">
                        <td style="width: 30%">
                            <h4>Date</h4>

                        </td>
                        <td style="width: 50%">
                            <h4>Description</h4>

                        </td>
                        <td style="width: 20%;text-align: right;">
                            <h4>Amount</h4>

                        </td>
                    </tr>
                    <?php
                    foreach ($invoice_description as $key => $value) {
                        ?>
                        <tr class="border-td">
                            <td rowspan="2">
                                <?php
                                $txndate = $value["transaction_date"];
                                $newDate = date("F d-Y", strtotime($txndate));
                                ?>
                                <span  id="<?php echo $value["id"]; ?>" data-type="text" data-pk="<?php echo $value['id']; ?>" data-name="transaction_date" data-value="<?php echo $value["transaction_date"]; ?>" data-params ={'tablename':'billing_invoice_description'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $value["transaction_date"]; ?></span>

                            </td>
                            <td style="white-space: pre-line;">
                                <?php $txndate = $value["description"]; ?>
                                <span  id="<?php echo $value["id"]; ?>" data-type="textarea" data-pk="<?php echo $value['id']; ?>" data-name="description" data-value="<?php echo $value["description"]; ?>" data-params ={'tablename':'billing_invoice_description'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $value["description"]; ?></span>

                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr class="border-td">
                            <td>
                                FREIGHT AND OTHER CHARGES

                            </td>
                            <td style="text-align: right;">
                                <?php
                                $value["amount"];
                                ?>
                                <span  id="<?php echo $value["id"]; ?>" data-type="text" data-pk="<?php echo $value['id']; ?>" data-name="amount" data-value="<?php echo $value["amount"]; ?>" data-params ={'tablename':'billing_invoice_description'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" >
                                    <?php
                                    echo GLOBAL_CURRENCY . " " . number_format($value["amount"], 2, '.', '');
                                    ?>

                                </span>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tr style="text-align: right;" class="border-td">
                        <td></td>
                        <th style="text-align: right;">
                            TOTAL AMOUNT

                        </th>
                        <th style="text-align: right;">

                            <?php
                            echo GLOBAL_CURRENCY . " " . number_format($invoice_data["current_balance"], 2, '.', '');
                            ?>
                        </th>
                    </tr>


                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width: 100%;height:100px;border-collapse: collapse;     border-color: #c7c5c5;" >
                    <tr  class="border-td">
                        <td  style="    width: 100%;vertical-align: top;" >
                            <h4>Remark</h4>
                            <span  id="<?php echo $invoice_data["id"]; ?>" data-type="textarea" data-pk="<?php echo $invoice_data['id']; ?>" data-name="remark" data-value="<?php echo $invoice_data["remark"]; ?>" data-params ={'tablename':'billing_invoice'} data-url="<?php echo site_url("LocalApi/updateCurd"); ?>" data-mode="inline" class="m-l-5 editable editable-click" tabindex="-1" ><?php echo $invoice_data["remark"]; ?></span>

                        </td>


                    </tr>
                </table>
            </td>
        </tr>

    </table>
</div>
