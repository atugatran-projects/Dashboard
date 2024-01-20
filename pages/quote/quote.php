<?php include('../common/header.php'); ?>
<?php include('../database/dbconnect.php'); ?>

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
                        <h3 class="page-title"> New Quote </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="quote.php">New Quote</a></li>
                                <li class="breadcrumb-item"><a href="Allquote.php">All Quote</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="f-row row">
                        <form class="row" action="../database/quote/quote.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="col-md-7">
                                <label for="CustomerName" class="form-label">Customer name</label>
                                <select class="form-select form-control" name="CustomerName">
                                    <option disabled>select customer</option>
                                    <?php
                                    $id = $_SESSION['userID'];
                                    $sql = "SELECT * FROM `customers` WHERE `user_id`='$id'";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row["firstName"];
                                                        echo " ";
                                                        echo $row["lastName"]; ?>"><?php echo ucfirst($row["firstName"]);
                                                                                    echo " ";
                                                                                    echo ucfirst($row["lastName"]); ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-7">
                                <label for="Invoice" class="form-label">Quote #</label>
                                <input type="number" class="form-control" name="Invoice" required>
                            </div>
                            <div class="col-md-7">
                                <label for="OrderNumber" class="form-label">Order Number</label>
                                <input type="number" class="form-control" name="OrderNumber" require>
                            </div>
                            <div class="col-md-6">
                                <label for="QuoteDate" class="form-label">Quote Date</label>
                                <input type="date" class="form-control" name="QuoteDate" required>

                            </div>

                            <div class="col-md-3">
                                <label for="ExpireyDate" class="form-label">Expirey Date</label>
                                <input type="date" class="form-control" name="ExpireyDate" required>

                            </div>
                            <div class="btm-bdr"></div>

                            <div class="col-md-7">
                                <label for="Salesperson" class="form-label">Salesperson</label>
                                <select class="form-select form-control" name="Salesperson">
                                    <option disabled selected>Select or Add Salesperson</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>

                                </select>
                            </div>
                            <div class="btm-bdr"></div>
                            <div class="col-md-6">
                                <label for="Subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="Subject" required placeholder="Let your customer know what this Invoice is for">
                            </div>

                            <div class="row">
                                <div class="col-lg-12 grid-margin stretch-card">

                                    <div class="card">
                                        <div id="container">
                                            <button type="button" class="btn btn-primary" onclick="Ajax()" id="Addline">Add New Row </button>
                                            <button type="button" class="btn btn-primary" onclick="deleteRow()">Delete Row </button>
                                            <br>
                                            <br>
                                            <table id="employee-table">
                                                <thead>
                                                    <tr>
                                                        <th>ITEM DETAILS
                                                        </th>
                                                        <th>QUANTITY
                                                        </th>
                                                        <th>Unit
                                                        </th>
                                                        <th>RATE
                                                        </th>
                                                        <th>AMOUNT
                                                        </th>
                                                        <th>Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="listitems" id="itemId_1">
                                                        <td>
                                                            <input type="hidden" id="item_name_1" name="name[]">
                                                            <select class="selItem" id="item_item_1" style='width: 200px;'>
                                                                <option disabled value='0'>- Search Item -</option>
                                                            </select>
                                                        </td>
                                                        <td><input onchange="calculate(this)" id="item_qty_1" class="qty" name="qty[]" type="number" value="1" name="qty"></td>
                                                        <td><input id="item_unit_1" class="unit" readonly type="text" name="unit[]"></td>
                                                        <td><input onchange="calculate(this)" readonly id="item_rate_1" class="rate" type="number" value="0" name="rate[]"></td>
                                                        <td><input onchange="calculate(this)" readonly id="item_amount_1" class="amount" type="number" value="0" name="amount[]"></td>
                                                        <td><input id="item_delete_1" type="button" value="delete" onclick="deleteRow(this)" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="subTotal" class="form-label">Sub Total</label>
                                        <input type="text" id="Sub_Total" name="subTotal" readonly onchange="calculate2(this)" required class="form-control" placeholder="0.00">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="Discount" class="form-label">Discount</label>
                                        <div class="d-flex">
                                            <input class="form-control" required id="Discount" onchange="calculate2(this)" type="number" value="0" name="Discount">
                                            <select id="selectTax" onchange="calculate2(this)" name="Discount2" class="form-select">
                                                <option selected value="%">%</option>
                                                <option value="$">$</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="Adjustment" class="form-label">Adjustment</label>
                                        <input type="number" id="Adjustment" required name="Adjustment" onchange="calculate2(this)" class="form-control" placeholder="0.00">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="TCS" class="form-label">TCS</label>
                                        <select name="TCS" class="form-select">
                                            <option disabled>Select a tax</option>
                                            <option value="gold tax">gold tax</option>
                                            <option value="hardware tax">hardware tax</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="total" class="form-label">Total</label>
                                        <input type="text" id="total" required onchange="calculate2(this)" name="total" readonly class="form-control" placeholder="0.00">
                                    </div>
                                </div>

                                <div class="file-up">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating">
                                                <!-- <label for="termsAndConditions">Terms And Conditions</label> -->
                                                <textarea class="form-control" name="termsAndConditions" style="height: 100px">Terms And Conditions</textarea>

                                            </div>
                                        </div>
                                        <div class="col upload-bg">
                                            <input type="file" name="file[]" id="myFile">
                                            <p>only 1 file upload</p>
                                        </div>
                                    </div>
                                    <div class="pd">
                                        <!-- <button type="button" class="btn btn-primary">Save as Draft</button> -->
                                        <button name="createQuote" type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-primary">Cancel</button>
                                        <input name="count" type="hidden" value="1" id="item_count" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
    <script src="<?php echo INV_ASSETS; ?>/vendors/js/custom.js"></script>
    <script>
        const Ajax = () => {
            $(".selItem").select2({
                ajax: {
                    url: "../../pages/database/getData.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        let ele = this[0].parentNode.parentNode.id
                        // console.log(ele);
                        return {
                            searchTerm: params.term, // search term
                            Element: ele
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            }).on('select2:select', function(e) {
                let data = e.params.data;
                let ele = data.ele;
                let dataId = data.id
                $.ajax({
                    url: "../../pages/database/getData2.php",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: {
                        dataId: dataId
                    },
                    success: function(response) {
                        // Name
                        jQuery("#" + jQuery(ele)[0].childNodes[1].childNodes[1].id).val(response[0].name)
                        // Unit
                        jQuery("#" + jQuery(ele)[0].childNodes[5].childNodes[0].id).val(response[0].unit)
                        // Rate
                        jQuery("#" + jQuery(ele)[0].childNodes[7].childNodes[0].id).val(response[0].sellingPrice)
                        // Amount
                        jQuery("#" + jQuery(ele)[0].childNodes[9].childNodes[0].id).val(response[0].sellingPrice)
                        // Calaculate
                        calculate(jQuery(ele)[0].childNodes[1].childNodes[1]);
                    },
                    cache: true
                })
            });;
        }
        Ajax()
    </script>
</body>

</html>