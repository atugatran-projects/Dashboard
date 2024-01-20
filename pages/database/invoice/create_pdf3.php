<?php
include_once("../dbconnect.php");

ob_start();
if (isset($_GET['invoicepdf'])) {
    $sno = $_GET['invoicepdf'];
    $pdf = "SELECT * FROM `invoices` WHERE `invoice_id`='$sno'";
    $pdf2 = mysqli_query($conn, $pdf);
    $row = $pdf2->fetch_assoc();

    $subTotal = $row["subTotal"];
    $total = $row["total"];
    $Discount = $row["Discount"];
    $discount2 = $row["discount2"];
    $Adjustment = $row["Adjustment"];
    $customerName = $row["customerName"];
    $creation_Date = $row["creation_Date"];
    // Img
    if (!empty($row["files"])) {
    $logo_url = $row["files"];
    $folder =     $folder =    "../../../assets/upload/invoice/". $logo_url;;
    $logo_url = '<img src="' . $folder . '" height="80">';
    }else{
        $logo_url = '<img src="../../../assets/images/your_logo.png" height="80">';
    }


    $GST = (intval($subTotal) - intval($total));

    // Items
    $jsonitems = $row['items'];
    $objitems =  json_decode($jsonitems);
    $arrayitems = get_object_vars($objitems);

    $items = '';
    $x = 0;
    foreach ($arrayitems['qty'] as  $value) {

        $items .= '     
        <tr>
        <th style="border-bottom: 1px solid #edf0f9; width: 150px;">' . $arrayitems["name"][$x] . '</th>
        <th style="border-bottom: 1px solid #edf0f9; width: 150px;">' . $arrayitems["qty"][$x] . '</th>
        <th style="border-bottom: 1px solid #edf0f9; width: 150px;">' . $arrayitems["rate"][$x] . '</th>
        <th style="border-bottom: 1px solid #edf0f9; width: 150px; text-align: right;">' . $arrayitems["amount"][$x] . '</th>
        </tr>';
        $x++;
    }

    // Tittle
    $invoice_number = $row["invoice"];
    $order_number = $row["orderNumber"];


    $pageborder  = '1';
    $bordercolor = '';
    $bordercolor = str_replace("rgb(", "", $bordercolor);
    $bordercolor = str_replace(")", "", $bordercolor);
    $bordercolor = explode(",", $bordercolor);
    // Include the main TCPDF library (search for installation path).
    require('../../../assets/tcpdf/tcpdf.php');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->setPrintHeader(false);
    $pdf->setHeaderTemplateAutoreset(true);
    // set margins
    $pdf->SetMargins(15, 15, 15);
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }


    // set some text to print
    $content = '
    <table cellpadding="20" border="0" cellspacing="0" style="width: 100%;margin: 0 auto;">
    <thead>
    <tr>
        <td style="text-align: left; border-bottom: 1px solid black;">'.$logo_url.'</td>
        <th style="border-bottom: 1px solid black;"> <br> <br>
            '.$creation_Date.' <br>
            <strong>Invoice #: INV-'.$invoice_number.' </strong> 
        </th>
    </tr>
</thead>
<tbody>
<tr>
    <th style="border-bottom: 1px dotted black; text-align: left;">
        <strong style="font-size: 20px; line-height: 10px;">Bill To:</strong>

        <p style="font-size: 14px; font-weight: bold; line-height: 20px;">&nbsp;Company Name </p>
        <p style="font-size: 14px; line-height: -20px;"> '.$customerName.' </p>
    </th>
    <th style="border-bottom: 1px dotted black;">
        <strong style="font-size: 20px; line-height: 10px;">Bill From:</strong>

        <p style="font-size: 14px; font-weight: bold; line-height: 20px;">&nbsp;Company Name </p>
        <p style="font-size: 14px; line-height: -20px;"> Magik Web Service </p>
    </th>
</tr>
<tr>
    <td><table cellpadding="20" border="0" cellspacing="0" style="width: 100%; margin: 0 auto;">
            <thead>
                <tr style="background-color: #e0d0b6;">
                    <th style="width: 150px; font-weight: bold;">Name</th>
                    <th style="width: 150px; font-weight: bold;">Qty</th>
                    <th style="width: 150px; font-weight: bold;">Price</th>
                    <th style="width: 150px; font-weight: bold; text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
            '. $items.'
            <./tbody>
        </table>
    </td>
</tr>
<tfoot>
    <tr>
        <td style="width: 65%; text-align: right; font-weight: bold;">SubTotal</td>
        <td style="width: 35%; text-align: right;">'. $subTotal .'</td>
    </tr>
    <tr>
        <td style="line-height: -45px; width: 65%; text-align: right; font-weight: bold;">GST</td>
        <td style="line-height: -45px; width: 35%; text-align: right;">' . $Discount . '' . $discount2 . '</td>
    </tr>
    <tr>
        <td style="line-height: 0px; width: 65%; text-align: right; font-weight: bold;">Adjustmenr</td>
        <td style="line-height: 0px; width: 35%; text-align: right;">'.$Adjustment.'</td>
    </tr>
    <tr>
        <td style="line-height: -30px; width: 65%; text-align: right; font-weight: bold;">Total</td>
        <td style="line-height: -30px; width: 35%; text-align: right;">'.$total.'</td>
    </tr>

    <tr>
        <td><strong>Bank Details</strong></td>
    </tr>
    <tr>
        <td> Bank Name : ADS BANK <br> Swift Code : ADS1234Q
            <br> Account Holder :ABC
            <br> Account Number : 5454542ABC <br>
        </td>
    </tr>
</tfoot>
</table>
';

    $pdf->SetTitle($invoice_number . '-' . date('Y-m-d H:i:s'));
    $pdf->AddPage('P', "A4");
    $pdf->SetLineStyle(array('width' => $pageborder, 'color' => $bordercolor));
    $pdf->Line(0, 0, $pdf->getPageWidth(), 0);
    $pdf->Line($pdf->getPageWidth(), 0, $pdf->getPageWidth(), $pdf->getPageHeight());
    $pdf->Line(0, $pdf->getPageHeight(), $pdf->getPageWidth(), $pdf->getPageHeight());
    $pdf->Line(0, 0, 0, $pdf->getPageHeight());

    $pdf->SetFillColor(255, 255, 255);
    $pdf->writeHTMLCell('', '', '', '', $content, 0, 0, 1, true, 'J', false);
    if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'download') {
        $outputs = "d";
    } else {
        $outputs = "I";
    }

    $pdf->Output($order_number . '-' . date('Y-m-d H:i:s') . '.pdf', $outputs);
    ob_end_flush();
}