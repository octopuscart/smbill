<style>
    .invoicetable td, .invoicetable th{
        padding:5px;
        text-align: left;
    }
    .invoicetable h4{
        margin: 0px;
    }


</style>
<?php
$originalDate = date("Y-m-d");
?>
<table class="invoicetable" style="width:500px;">


    <tr>
        <td  style="text-align: center;"">
            <table style="width: 100%;border-collapse: collapse; " border="1">




                <tr>
                    <td>Party</td>
                    <td>
                        <select name="party_id" class="form-control">
                            <?php
                            foreach ($parties as $key => $value) {
                                $party_name = $value["name"];
                                $party_id = $value["id"];
                                echo "<option value='$party_id'>$party_name</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Consignee</td>
                    <td>
                        <select name="consignee_id" class="form-control">
                            <?php
                            foreach ($consignee as $key => $value) {
                                $consignee_name = $value["name"];
                                $consignee_id = $value["id"];
                                echo "<option value='$consignee_id'>$consignee_name</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Trans. Date</td>
                    <td>
                        <div class="input-group date datepicker" id="">
                            <input type="text" class="form-control" name='trans_date' readonly=""  aria-describedby="sizing-addon2" value="<?php echo $originalDate; ?>" required="">
                            <span class="input-group-btn input-group-addon" >
                                <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Due Date</td>
                    <td>
                        <div class="input-group date datepicker" id="">
                            <input type="text" class="form-control" name='due_date' readonly=""  aria-describedby="sizing-addon2" value="">
                            <span class="input-group-btn input-group-addon" >
                                <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Deposite</td>
                    <td>
                        <input type="text" class="form-control" name='deposite'  aria-describedby="sizing-addon2" value="">

                    </td>
                </tr>
                <tr>
                    <td>Other Charges</td>
                    <td>
                        <input type="text" class="form-control" name='other_charges'  aria-describedby="sizing-addon2" value="">

                    </td>
                </tr>
               
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-success" name="submit" type="submit">Create Invoice</button>

                    </td>
                </tr>
            </table>
        </td>
    </tr>


</table>