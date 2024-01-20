<?php include('../../common/header.php'); ?>

<?php
if (isset($_GET['invoicepdf'])) {
    $sno = $_GET["invoicepdf"];
    // echo $invoicepdf;
}
?>


<body>
    <section class="pdf_con">
        <h1>Select Your PDF Design</h1>
        <div class="allPDF-con">
            <a href="create_pdf.php?invoicepdf=<?php echo $sno ?>" class="card_con">
                <div class="card">
                    <div class="card-info">
                        <!-- <h2 class="Name">name</h2> -->
                        <img src="<?php echo INV_ASSETS ?>/images/Invoice.jpg" alt="Invoice1" />
                    </div>
                </div>
            </a>

            <a href="create_pdf2.php?invoicepdf=<?php echo $sno ?>" class="card_con">
                <div class="card">
                    <div class="card-info">
                        <!-- <h2 class="Name">name</h2> -->
                        <img src="<?php echo INV_ASSETS ?>/images/Invoice2.jpg" alt="Invoice1" />
                    </div>
                </div>
            </a>

            <a href="create_pdf3.php?invoicepdf=<?php echo $sno ?>" class="card_con">
                <div class="card">
                    <div class="card-info">
                        <!-- <h2 class="Name">name</h2> -->
                        <img src="<?php echo INV_ASSETS ?>/images/Invoice3.jpg" alt="Invoice1" />
                    </div>
                </div>
            </a>
        </div>
    </section>
</body>

</html>