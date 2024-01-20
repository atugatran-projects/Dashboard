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
        <td style="border-bottom: 2px solid black; border-top: 2px solid black; border-left: 2px solid black;">' . $arrayitems["name"][$x] . '</td>
        <td style="border-bottom: 2px solid black; border-top: 2px solid black;">' . $arrayitems["qty"][$x] . '</td>
        <td style="border-bottom: 2px solid black; border-top: 2px solid black;">$' . $arrayitems["rate"][$x] . '</td>
        <td style="border-bottom: 2px solid black; border-top: 2px solid black; border-right: 2px solid black;">$' . $arrayitems["amount"][$x] . '</td>
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
<tbody>
    <tr>
        <td><table cellpadding="0" border="0" cellspacing="0" style="width: 100%;">
                <tbody>
                    <tr width="100%">
                        <td><strong style="font-size: 18px; text-align: left;">Tax Invoice</strong><br>
                            <small style="font-size: 16px; text-align: left;">INV-' . $invoice_number . '</small>
                        </td>
                        <td style="text-align: right;">'.$logo_url.'</td>
                    </tr>
                </tbody>
            </table></td>
    </tr>
    <tr>
        <td><table cellpadding="20" border="0" cellspacing="0"
                style="width: 100%; background-color: #9e9e9e !important;color: white;">
                <tr>
                    <td><h2>Bill From</h2></td>
                    <td><h2>Bill To</h2></td>
                </tr>
            </table>
            <table cellpadding="20" border="0" cellspacing="0" style="width: 100%;">
                <tr>
                    <td>Prson1<br>Magik Web Service<br>India</td>
                    <td>Prson2<br>' . $customerName . '<br>India</td>
                </tr>
            </table></td>
    </tr>
    <tr>
        <td><table cellpadding="20" border="0" cellspacing="0" style="width: 100%;">
            <tr>
                <td style="border-top: 2px solid black; border-left: 2px solid black;"><strong>Name</strong></td>
                <td style="border-top: 2px solid black;"><strong>Qty</strong></td>
                <td style="border-top: 2px solid black;"><strong>Price</strong></td>
                <td style="border-top: 2px solid black; border-right: 2px solid black;"><strong>Total</strong></td>
            </tr>
            ' . $items . '
        </table></td>
    </tr>
    <tr>
        <td><table cellpadding="20" border="0" cellspacing="0" style="width: 100%;">
            <tr>
                <td style="text-align: left; border-top: 2px solid black; border-left: 2px solid black;"><strong>Subtotal</strong></td>
                <td style="text-align: center; border-top: 2px solid black;"><strong>GST</strong></td>
                <td style="text-align: center; border-top: 2px solid black;"><strong>Adjustmenr</strong></td>
                <td style="text-align: right; border-top: 2px solid black; border-right: 2px solid black;"><strong>Total</strong></td>
            </tr>
            <tr>
                <td style="text-align: left; border-bottom: 2px solid black; border-top: 2px solid black; border-left: 2px solid black;">$' . $subTotal . '</td>
                <td style="text-align: center; border-bottom: 2px solid black; border-top: 2px solid black;">' . $Discount . '' . $discount2 . '</td>
                <td style="text-align: center; border-bottom: 2px solid black; border-top: 2px solid black;">' . $Adjustment . '</td>
                <td style="text-align: right; border-bottom: 2px solid black; border-top: 2px solid black; border-right: 2px solid black;">$' . $total . '</td>
            </tr>
        </table></td>
    </tr>
    <tr><td><table>
        <tbody>
            <tr>
                <td><strong>Bank Details</strong></td>
            </tr>
            <tr>
                <td> Bank Name : ADS BANK <br> Swift Code : ADS1234Q
                    <br> Account Holder :ABC
                    <br> Account Number : 5454542ABC <br>
                </td>
            </tr>
        </tbody>
    </table></td></tr>
</tbody>
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
