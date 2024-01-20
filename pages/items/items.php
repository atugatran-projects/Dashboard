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
                        <h3 class="page-title"> Items </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="items.php">New Items</a></li>
                                <li class="breadcrumb-item"><a href="allitem.php">All Items</a></li>
                            </ol>
                        </nav>
                    </div>

                    <form class="row f-row" method="post" action="../database/items/creteItem.php">
                    <input type="hidden" name="user_id" id="user_id">
                        <div class="col-md-12 f-nm">
                            <label for="Types" class="form-label">Type</label>
                            <input class="form-check-input" type="radio" name="Types" checked id="inlineRadio1" value="Good">
                            <label class="form-check-label" for="Types">Good</label>
                            <input class="form-check-input" type="radio" name="Types" id="inlineRadio2" value="Service">
                            <label class="form-check-label" for="Types">Service</label>
                        </div>
                        <div class="col-md-7">
                            <label for="Name" class="form-label">Name:</label>
                            <input type="tel" class="form-control" name="Name" id="validationDefault03" required>
                        </div>
                        <div class="col-md-7">
                            <label for="unit" class="form-label">Unit</label>
                            <select class="form-select" name="unit" aria-label="Default select example">
                                <option disabled value="select menu">select menu</option>
                                <option value="box">box</option>
                                <option value="cm">cm</option>
                                <option value="dz">dz</option>
                                <option value="ft">ft</option>
                                <option value="ml">ml</option>
                            </select>
                        </div>

                        <div class="col-md-7">
                            <label for="sellingPrice" class="form-label">Selling Price:</label>
                            <div class="input-group">
                                <div class="input-group-text">INR</div>
                                <input type="number" class="form-control" name="sellingPrice" id="autoSizingInputGroup" required>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <label for="Description" class="form-label">Description</label>
                            <textarea class="form-control" name="Description" id="validationTextarea" required></textarea>
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