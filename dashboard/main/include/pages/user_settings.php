<!DOCTYPE html>
<html>

<head>
    <?php include_once('../../style/head.html'); ?>
</head>

<body>
    <?php include_once('../navbar.php'); ?>
    <p class="my-4"> amigo </p>
    <div class="d-flex row" id="wrapper">
        <!-- Sidebar -->
        <div class="col-sm-12 col-lg-2 col-md-12">
            <div class="bg-light " id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <?php include_once('../sidebar.html'); ?>
                </div>
            </div>
        </div>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->

        <div class="col-sm-12 col-lg-9 col-md-12">
            <div class="container-fluid mt-5 pt-2 w-75">
                <h2 class="mt-5">change User settings</h2>
                <hr class="border-primary">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 mt-5">
                            <h5 class="mb-3">change account settings</h5>

                            <form>
                                <div class="form-group">
                                    <label class="my-1 col-form-label">Firstname:</label>
                                    <input type="text" placeholder="new firstname" class="form-control" id="changefirstname">
                                </div>
                                <div class="form-group">
                                    <label class=" my-1 col-form-label">lastname:</label>
                                    <input type="text" placeholder="new lastname" class="form-control" id="changelastname">
                                </div>
                            </form>


                            <div id="changeusermessage">

                            </div>

                            <button type="button" class="btn btn-outline-warning" onclick="changenamecheck(
                        document.getElementById('changefirstname').value.trim(),
                        document.getElementById('changelastname').value.trim()
                        )">change</button>

                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-6 my-5">
                            <h5 class="mb-3">Delete your account</h5>

                            <form>
                                <div class="form-group">
                                    <label class="my-1 col-form-label">E-Mail:</label>
                                    <input type="text" placeholder="E-Mail address" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label class="my-1 col-form-label">Password:</label>
                                    <input type="password" placeholder="password" class="form-control" id="password">
                                </div>
                            </form>

                            <div id="deletemessage">

                            </div>

                            <button type="button" class="btn btn-outline-danger" onclick="deleteuser(
                                    document.getElementById('email').value.trim(),
                                    document.getElementById('password').value.trim()
                                    )">Delete Account</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="/pinboard/resources/js/user.js"></script>
</body>

</html>