<div class="row">
	<div class="col-lg-12">
		<div class="breadcrump">
			<li class="active">
				<i class="fa fa-bar-chart"></i>
				Dashboard / View Payments
			</li>
		</div>
	</div>
</div><!--breadcrump End-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>
					View Payments
				</h3>
			</div>
			<div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Payment No: </th>
                                <th>Invoice No: </th>
                                <th>Amount Paid: </th>
                                <th>Payment Method: </th>
                                <th>Reference No: </th>
                                <th>Payment Date: </th>
                                <th>Proof of Payment: </th>
                                <th>Delete Payment: </th>
                                <th>Return Payment: </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            $get_payments = "SELECT * FROM payments";
                            $run_payments = mysqli_query($con, $get_payments);

                            while ($row_payments = mysqli_fetch_array($run_payments)) {
                                $payment_id = $row_payments['payment_id'];
                                $invoice_id = $row_payments['invoice_id'];
                                $amount = $row_payments['amount'];
                                $payment_mode = $row_payments['payment_mode'];
                                $ref_no = $row_payments['ref_no'];
                                $payment_date = $row_payments['payment_date'];
                                $proof_image = $row_payments['proof_image'];
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td bgcolor="yellow"><?php echo $invoice_id; ?></td>
                                <td>Rp <?php echo $amount; ?></td>
                                <td><?php echo $payment_mode; ?></td>
                                <td><?php echo $ref_no; ?></td>
                                <td><?php echo $payment_date; ?></td>
                                <td>
                                    <a href="../website/bukti/<?php echo $proof_image; ?>" download>
                                        <img src="../website/bukti/<?php echo $proof_image; ?>" alt="Proof Image" width="100">
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?payment_delete=<?php echo $payment_id; ?>"> <i class="fa fa-trash"></i> Delete </a>
                                </td>
                                <td>
                                    <a href="index.php?return_payment=<?php echo $payment_id; ?>">
                                    <i class="fa fa-undo"></i> Return Payment
                                    </a>
                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
