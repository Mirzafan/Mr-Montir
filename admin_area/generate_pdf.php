<?php

require('../fpdf/fpdf.php');
include('includes/db.php');

if (isset($_GET['generate_pdf'])) {
    class PDF extends FPDF {
        function Header() {
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Order Report Mr.Montir', 0, 1, 'C');
            $this->Ln(10);
        }

        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
        }
    }

    $pdf = new PDF('L', 'mm', 'A4'); // Landscape mode
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);

    // Header table
    $pdf->Cell(10, 10, 'No', 1);
    $pdf->Cell(40, 10, 'Customer Email', 1);
    $pdf->Cell(30, 10, 'Invoice No', 1);
    $pdf->Cell(50, 10, 'Product Title', 1); // Auto width for Product Title
    $pdf->Cell(20, 10, 'Qty', 1);
    $pdf->Cell(20, 10, 'Size', 1);
    $pdf->Cell(40, 10, 'Order Date', 1);
    $pdf->Cell(30, 10, 'Total Amount', 1);
    $pdf->Cell(30, 10, 'Status', 1);
    $pdf->Ln();

    $i = 0;
    $get_orders = "SELECT * FROM customer_order";
    $run_orders = mysqli_query($con, $get_orders);

    while ($row_orders = mysqli_fetch_array($run_orders)) {
        $i++;
        $order_id = $row_orders['order_id'];
        $c_id = $row_orders['customer_id'];
        $invoice_no = $row_orders['invoice_no'];
        $product_id = $row_orders['product_id'];
        $qty = $row_orders['qty'];
        $size = $row_orders['size'];
        $order_date = $row_orders['order_date'];
        $due_amount = $row_orders['due_amount'];
        $order_status = $row_orders['order_status'];

        // Get customer email
        $get_customer = "SELECT * FROM customers WHERE customer_id='$c_id'";
        $run_customer = mysqli_query($con, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_email = $row_customer['customer_email'];

        // Get product title
        $get_products = "SELECT * FROM products WHERE product_id='$product_id'";
        $run_products = mysqli_query($con, $get_products);
        $row_products = mysqli_fetch_array($run_products);
        $product_title = $row_products['product_title'];

        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 10, $i, 1);
        $pdf->Cell(40, 10, $customer_email, 1);
        $pdf->Cell(30, 10, $invoice_no, 1);
        $pdf->Cell(50, 10, $product_title, 1); // Auto width for Product Title
        $pdf->Cell(20, 10, $qty, 1);
        $pdf->Cell(20, 10, $size, 1);
        $pdf->Cell(40, 10, $order_date, 1);
        $pdf->Cell(30, 10, $due_amount, 1);
        $pdf->Cell(30, 10, ucfirst($order_status), 1);
        $pdf->Ln();
    }

    $pdf->Output('D', 'order_report.pdf');
    exit();
}
?>


