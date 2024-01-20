<?php include('../common/header.php');

include_once("../database/dbconnect.php");

if (isset($_GET['itemsedit'])) {
    $sno = $_GET['itemsedit'];
    $sqlQuery = "SELECT * FROM `items` WHERE itemId = {$sno}";
    $result = mysqli_query($conn, $sqlQuery);
    $row = $result->fetch_assoc();
}
?>

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
                        <h3 class="page-title"> Edit Items </h3>
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="items.php">New Items</a></li>
                                <li class="breadcrumb-item"><a href="allitem.php">All Items</a></li>
                            </ol>
                        </nav> -->
                    </div>

                    <form class="row f-row" method="post" action="../database/items/itemedit.php?editItem=<?php echo $sno; ?>">
                        <div class="col-md-12 f-nm">
                            <label for="Type" class="form-label">Type</label>
                            <?php
                            if ($row["type"] == "Good") {
                                echo '<input class="form-check-input" type="radio" name="Type" checked id="inlineRadio1" value="Good">';
                            } else {
                                echo '<input class="form-check-input" type="radio" name="Type" id="inlineRadio1" value="Good">';
                            }
                            ?>
                            <label class="form-check-label" for="Type">Good</label>
                            <?php
                            if ($row["type"] == "Service") {
                                echo '<input class="form-check-input" type="radio" name="Type" id="inlineRadio2" checked value="Service">';
                            } else {
                                echo '<input class="form-check-input" type="radio" name="Type" id="inlineRadio2" value="Service">';
                            }
                            ?>
                            <label class="form-check-label" for="Type">Service</label>
                        </div>
                        <div class="col-md-7">
                            <label for="Name" class="form-label">Name:</label>
                            <input type="tel" class="form-control" name="Name" value="<?php echo $row["name"] ?>" id="validationDefault03" required>
                        </div>
                        <div class="col-md-7">
                            <label for="unit" class="form-label">Unit</label>
                            <select class="form-select" name="unit" aria-label="Default select example">
                                <?php
                                if ($row["unit"] == "select menu") {
                                    echo '<option value="select menu" selected>select menu</option>';
                                } else {
                                    echo '<option value="select menu">select menu</option>';
                                }
                                ?>

                                <?php
                                if ($row["unit"] == "box") {
                                    echo '<option selected value="box">box</option>';
                                } else {
                                    echo '<option value="box">box</option>';
                                }
                                ?>

                                <?php
                                if ($row["unit"] == "cm") {
                                    echo '<option selected value="cm">cm</option>';
                                } else {
                                    echo '<option value="cm">cm</option>';
                                }
                                ?>

                                <?php
                                if ($row["unit"] == "dz") {
                                    echo '<option selected value="dz">dz</option>';
                                } else {
                                    echo '<option value="dz">dz</option>';
                                }
                                ?>

                                <?php
                                if ($row["unit"] == "ft") {
                                    echo '<option selected value="ft">ft</option>';
                                } else {
                                    echo '<option value="ft">ft</option>';
                                }
                                ?>

                                <?php
                                if ($row["unit"] == "ml") {
                                    echo '<option value="ml">ml</option>';
                                } else {
                                    echo '<option value="ml">ml</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-7">
                            <label for="sellingPrice" class="form-label">Selling Price:</label>
                            <div class="input-group">
                                <div class="input-group-text">INR</div>
                                <input type="number" class="form-control" name="sellingPrice" value="<?php echo $row["sellingPrice"] ?>" id="autoSizingInputGroup" required>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <label for="Description" class="form-label">Description</label>
                            <textarea class="form-control" name="Description" id="validationTextarea" required><?php echo $row["description"] ?></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                        <div class="pd">
                            <button type="submit" name="createItems" class="btn btn-success">Save</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger">Cancel</button>
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