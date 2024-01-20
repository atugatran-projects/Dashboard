<?php include('../common/header.php');

include_once("../database/dbconnect.php");

if (isset($_GET['Customersedit'])) {
    $sno = $_GET['Customersedit'];
    $sqlQuery = "SELECT * FROM `customers` WHERE customerId = {$sno}";
    $result = mysqli_query($conn, $sqlQuery);
    $row = $result->fetch_assoc();
};
?>

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
                        <h3 class="page-title"> Edit Customer </h3>
                    </div>


                    <form class="row f-row" action="<?php echo SITE_URL; ?>pages/database/customers/customersedit.php?editCustomers=<?php echo $sno; ?>" method="post">
                        <div class="col-md-12 ">
                            <label for="Customer_Type" class="form-label">Customer Type</label>
                            <?php
                            if ($row["customerType"] == "Business") {
                                echo '<input class="form-check-input" type="radio" name="Customer_Type" checked id="inlineRadio1" value="Business">';
                            } else {
                                echo '<input class="form-check-input" type="radio" name="Customer_Type" id="inlineRadio1" value="Business">';
                            }
                            ?>
                            <label class="form-check-label" for="Customer_Type">Business</label>
                            <?php
                            if ($row["customerType"] == "Individual") {
                                echo '<input class="form-check-input" checked type="radio" name="Customer_Type" id="inlineRadio2" value="Individual">';
                            } else {
                                echo '<input class="form-check-input" type="radio" name="Customer_Type" id="inlineRadio2" value="Individual">';
                            }
                            ?>
                            <label class="form-check-label" for="Customer_Type">Individual</label>
                        </div>

                        <div class="col-md-3">
                            <label for="Salutation" class="form-label">Salutation</label>
                            <select class="form-select" name="Salutation" aria-label="Default select example">

                                <?php
                                if ($row["salutation"] == "Salutation") {
                                    echo '<option value="Salutation" selected>Salutation</option>';
                                } else {
                                    echo '<option value="Salutation">Salutation</option>';
                                }
                                ?>

                                <?php
                                if ($row["salutation"] == "Mr.") {
                                    echo '<option selected value="Mr.">Mr.</option>';
                                } else {
                                    echo '<option value="Mr.">Mr.</option>';
                                }
                                ?>

                                <?php
                                if ($row["salutation"] == "Mrs.") {
                                    echo '<option selected value="Mrs.">Mrs.</option>';
                                } else {
                                    echo '<option value="Mrs.">Mrs.</option>';
                                }
                                ?>

                                <?php
                                if ($row["salutation"] == "Miss.") {
                                    echo '<option selected value="Miss.">Miss.</option>';
                                } else {
                                    echo '<option value="Miss.">Miss.</option>';
                                }
                                ?>

                                <?php
                                if ($row["salutation"] == "Ms.") {
                                    echo '<option selected value="Ms.">Ms.</option>';
                                } else {
                                    echo '<option selected value="Ms.">Ms.</option>';
                                }
                                ?>

                                <?php
                                if ($row["salutation"] == "Dr.") {
                                    echo '<option selected value="Dr.">Dr.</option>';
                                } else {
                                    echo '<option value="Dr.">Dr.</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="First_name" class="form-label">First name</label>
                            <input type="text" name="First_name" class="form-control" id="validationDefault02" value="<?php echo $row["firstName"] ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="last_name" class="form-label">Last name</label>
                            <div class="input-group">

                                <input type="text" name="last_name" class="form-control" id="validationDefaultUsername" value="<?php echo $row["lastName"] ?>" aria-describedby="inputGroupPrepend2" required>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <label for="customerPhone" class="form-label">Customer Phone:</label>
                            <input type="tel" class="form-control" name="customerPhone" id="validationDefault03" value="<?php echo $row["customerPhone"] ?>" required>
                        </div>
                        <div class="col-md-10">
                            <label for="customerEmail" class="form-label">Customer Email:</label>
                            <input type="email" class="form-control" name="customerEmail" id="exampleFormControlInput1" value="<?php echo $row["customerEmail"] ?>" required>
                        </div>
                        <div class="col-md-10">
                            <label for="companyName" class="form-label">Company name:</label>
                            <input type="text" class="form-control" name="companyName" value="<?php echo $row["companyName"] ?>" required>
                        </div>
                        <div class="col-md-10">
                            <label for="Website" class="form-label">Website:</label>
                            <input type="text" name="Website" class="form-control" value="<?php echo $row["Website"] ?>" required>
                        </div>

                        <div class="col-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                    Agree to terms and conditions
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="Customersedit" type="submit">Submit form</button>
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

    <?php include('../common/footer.php'); ?>
    <script src="<?php echo INV_ASSETS; ?>/js/misc.js"></script>
</body>

</html>