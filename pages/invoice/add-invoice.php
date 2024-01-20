<?php include('../common/header.php'); ?>

<body>
    <div class="container-scroller">
        <!-- common:../../common/_navbar.html -->

        <?php include('../../pages/common/navbar.php'); ?>
        <!-- common -->
        <div class="container-fluid page-body-wrapper">
            <!-- common:../../commons/_sidebar.html -->
            <?php include('../../pages/common/sidebar.php'); ?>
            <!-- common -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">

                    </div>
                    <!-- <div class="container"> -->
                    <h3 class="page-title"> Add Invoice</h3>


                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="card p-2 shd">
                                <div class="d-flex flex-row p-2">
                                    <div class="d-flex flex-column text-secondary"> <span class="font-weight-bold "><b>Tax Invoice </b></span> <small>INV-001</small>

                                    </div>
                                </div>


                                <div class="table-responsive p-2">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="clr">
                                                <td><b> Bill From </b></td>
                                                <td> <b>Bill To </b></td>
                                            </tr>
                                            <tr class="content">
                                                <td>Person 1 <br>Amazon<br>India</td>
                                                <td>Person 2 <br> Mr. Akash Sharma <br> India</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="products p-2">
                                    <table class="table ">
                                        <tbody class="bdr">
                                            <tr class="add">
                                                <td><strong>Description</strong></td>
                                                <td><strong>Qty</strong></td>
                                                <td><strong>Price</strong></td>
                                                <td class="text-center"><strong>Total</strong></td>
                                            </tr>
                                            <tr class="content">
                                                <td> Bags</td>
                                                <td>10</td>
                                                <td>$1,500</td>
                                                <td class="text-center">$22,500</td>
                                            </tr>
                                            <tr class="content">
                                                <td>Toys</td>
                                                <td>6</td>
                                                <td>$1,500</td>
                                                <td class="text-center">$15,000</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="products p-2">
                                    <table class="table bdr">
                                        <tbody>
                                            <tr class="add">
                                                <td></td>
                                                <td><strong>Subtotal</strong></td>
                                                <td><strong>GST(10%)</strong></td>
                                                <td class="text-center"><strong>Total </strong></td>
                                            </tr>
                                            <tr class="content">
                                                <td></td>
                                                <td>$40,000</td>
                                                <td>2,500</td>
                                                <td class="text-center">$42,500</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="address p-2">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="add">
                                                <td><strong>Bank Details</strong></td>
                                            </tr>
                                            <tr class="content">
                                                <td> Bank Name : ADS BANK <br> Swift Code : ADS1234Q
                                                    <br> Account Holder :ABC
                                                    <br> Account Number : 5454542ABC <br>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- common:../../commons/_footer.html -->
    <?php include('../../pages/common/footer.php'); ?>
</body>
</html>