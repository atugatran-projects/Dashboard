<?php include('../common/header.php'); ?>

<body>
    <div class="container-scroller">
        <!-- common:../../common/_navbar.html -->

        <?php include('../common/navbar.php'); ?>
        <!-- common -->
        <div class="container-fluid page-body-wrapper">
            <!-- common:../../commons/_sidebar.html -->
            <?php include('../common/sidebar.php'); ?>
            <!-- common -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> All Customer </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="customer.php">New Customer</a></li>
                                <li class="breadcrumb-item active"><a href="allCustomer.php">All Customer</a></li>
                            </ol>
                        </nav>
                    </div>
                    <form action="../database/customers/deleteCustomers.php" method="POST">
                        <button type="submit" name="mDeleteCus" class="btn btn-danger">Delete</button>
                        <table border="1" class="mt-5 table" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <!-- <th style="display: none;"></th> -->
                                    <th>Name</th>
                                    <th>COMPANY NAME</th>
                                    <th>EMAIL</th>
                                    <th>WORK PHONE</th>
                                    <th>Creation_Date</th>
                                    <th>Modified_Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../database/customers/allCustomers.php')
                                ?>
                            </tbody>
                        </table>
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
    <?php include('../common/footer.php'); ?>
    <!-- Plugin js for this page -->
    <script src="<?php echo INV_ASSETS ?>/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo INV_ASSETS ?>/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <script src="<?php echo INV_ASSETS ?>/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page -->
    <script src="<?php echo INV_ASSETS ?>/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>