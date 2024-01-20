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
                        <h3 class="page-title"> New Customer </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="customer.php">New Customer</a></li>
                                <li class="breadcrumb-item"><a href="allCustomer.php">All Customer</a></li>
                            </ol>
                        </nav>
                    </div>


                    <form class="row f-row" action="../database/customers/createCustomer.php" method="post">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="col-md-12 ">
                            <label for="Customer_Type" class="form-label">Customer Type</label>
                            <input class="form-check-input" type="radio" name="Customer_Type" checked id="inlineRadio1" value="Business">
                            <label class="form-check-label" for="Customer_Type">Business</label>
                            <input class="form-check-input" type="radio" name="Customer_Type" id="inlineRadio2" value="Individual">
                            <label class="form-check-label" for="Customer_Type">Individual</label>
                        </div>

                        <div class="col-md-3">
                            <label for="Salutation" class="form-label">Salutation</label>
                            <select class="form-select" name="Salutation" aria-label="Default select example">
                                <option value="Salutation" selected>Salutation</option>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss.">Miss.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Dr.">Dr.</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="First_name" class="form-label">First name</label>
                            <input type="text" name="First_name" class="form-control" id="validationDefault02" required>
                        </div>
                        <div class="col-md-3">
                            <label for="last_name" class="form-label">Last name</label>
                            <div class="input-group">

                                <input type="text" name="last_name" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <label for="customerPhone" class="form-label">Customer Phone:</label>
                            <input type="tel" class="form-control" name="customerPhone" id="validationDefault03" required>
                        </div>
                        <div class="col-md-10">
                            <label for="customerEmail" class="form-label">Customer Email:</label>
                            <input type="email" class="form-control" name="customerEmail" id="exampleFormControlInput1" required>
                        </div>
                        <div class="col-md-10">
                            <label for="companyName" class="form-label">Company name:</label>
                            <input type="text" class="form-control" name="companyName" required>
                        </div>
                        <div class="col-md-10">
                            <label for="Website" class="form-label">Website:</label>
                            <input type="text" name="Website" class="form-control" required>
                        </div>

                        <div class="col-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                    Agree to terms and conditions
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="createcus" type="submit">Submit form</button>
                        </div>
                    </form>
                </div>
                <footer class="footer">
                    <div class="footer-inner-wraper">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between py-2">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2023</span>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- common:../../commons/_footer.html -->
    <?php include('../../pages/common/footer.php'); ?>
    <script src="<?php echo INV_ASSETS; ?>/js/misc.js"></script>
</body>

</html>