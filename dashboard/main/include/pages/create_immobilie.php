<!DOCTYPE html>
<html>

<head>
    <?php include_once('../../style/head.html'); ?>
</head>

<body>

    <?php include_once('../navbar.php'); ?>
    <p class="my-4">amigo</p>

    <div class="d-flex row" id="wrapper">
        <div class="col-sm-12 col-lg-2 col-md-12">
            <!-- Sidebar -->
            <div class=" bg-light " id="sidebar-wrapper">
                <div class="  list-group list-group-flush">
                    <?php include_once('../sidebar.html'); ?>
                </div>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div class="col-sm-12 col-lg-9 col-md-12">
            <div class="container-fluid mt-5 w-75">
                <div class="row mt-5 pt-2">
                    <div class="col-9 ">
                        <h2 class="mt-3 ">create new real estate</h2>
                    </div>
                    <div class="col-3 text-right">
                        <button class="mt-2 btn btn-outline-warning" onclick="opencreatenewproduct()">
                            create product
                        </button>
                    </div>
                </div>
                <hr class="border-primary">
                <div class="container">
                    <form>
                        <div class="container">
                            <div class="form row mt-5">
                                <div class="col-lg-12 col-md-12 col-sm-12  py-3">
                                    <label>title*</label>
                                    <input class="form-control" type="text" id="estatetitle" placeholder="title">
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12  py-3">
                                    <label>price*</label>
                                    <input class="form-control" type="text" id="productprice" placeholder="12.34">
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-12 py-4 mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="forsaleradios" id="forsaleradio" value="0" checked>
                                        <label class="form-check-label" for="forsaleradios">
                                            for sale
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="forrentradios" id="forrentradio" value="1">
                                        <label class="form-check-label" for="forrentradios">
                                            for rent
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 ml-5 mt-2 pt-5 mb-3  ">
                                    <input class="form-check-input" type="checkbox" id="freetohave" onclick="disablemytext()">
                                    <label class="form-check-label" for="gridCheck1">
                                        free to have
                                    </label>

                                </div>

                                <div class="col-12 py-3 mb-3">
                                    <label>upload photo*</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">choose file</label>
                                    </div>
                                </div>
                                <!-- <div class="col-12">
                                <input  id="g-recaptcha-response" name="g-recaptcha-response" /><br >  
                            </div>  -->
                            </div>


                            <div class="form row">
                                <div class="col-12 py-3">
                                    <label>description*</label>
                                    <textarea class="form-control" rows="6" placeholder="Description"></textarea>
                                </div>
                            </div>


                            <div class="form row">
                                <div class="col-6 py-3">
                                    <label>canton*</label>
                                    <select id="selectedcanton" class="custom-select" required>
                                        <option value=""></option>
                                        <option value="Argau">Aargau</option>
                                        <option value="AppenzellAusserhoden">Appenzell Ausserhoden</option>
                                        <option value="AppenzellInnererhoden">Appenzell Innerhoden</option>
                                        <option value="BaselLand">Basel Land</option>
                                        <option value="BaselStadt">Basel Stadt</option>
                                        <option value="Bern">Bern</option>
                                        <option value="Freiburg">Freiburg</option>
                                        <option value="Genf">Genf</option>
                                        <option value="Glarus">Glarus</option>
                                        <option value="Grabünden">Grabünden</option>
                                        <option value="Jura">Jura</option>
                                        <option value="Luzern">Luzern</option>
                                        <option value="Neuenburg">Neuenburg</option>
                                        <option value="Nidwalden">Nidwalden</option>
                                        <option value="Obwalden">Obwalden</option>
                                        <option value="Schaffhausen">Schaffhausen</option>
                                        <option value="Schwyz">Schwyz</option>
                                        <option value="Solothurn">Solothurn</option>
                                        <option value="St.Gallen">St.Gallen</option>
                                        <option value="Tessin">Tessin</option>
                                        <option value="Thurgau">Thurgau</option>
                                        <option value="Uri">Uri</option>
                                        <option value="Waadt">Waadt</option>
                                        <option value="Walis">Wallis</option>
                                        <option value="Zug">Zug</option>
                                        <option value="Zürich">Zürich</option>
                                    </select>
                                </div>

                                <div class="col-6 py-3">
                                    <label>category*</label>
                                    <select id="selectedcategory" class="custom-select" required>
                                        <option value=""></option>
                                        <option value="Vehicles">Vehicles</option>
                                        <option value="Buildings">Buildings</option>
                                        <option value="Electronic">Electronic</option>
                                        <option value="Services">Services</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="AnimalServices">Animal Services</option>
                                        <option value="Clothes">Clothes</option>
                                        <option value="carpool">carpool</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-danger col-12 py-3 ">
                                    *mandatory fields
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 py-3 text-right">
                                    <button class="btn btn-outline-success" onclick="register(
                                document.getElementById('productname').value.trim(),
                                document.getElementById('lastname').value.trim(),
                                document.getElementById('email').value.trim(),
                                document.getElementById('selectedcanton').value.trim(),
                                document.getElementById('selectedcategory').value.trim()
                                )">upload
                                    </button>
                                </div>
                                <div class="col-6 py-3 text-left" id="createproductmessage">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="..\..\..\..\resources\js\user.js">
        checkedifloggedin();
    </script>
</body>

</html>