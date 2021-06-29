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
            <div class="bg-light " id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <?php include_once('../sidebar.html'); ?>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
        </div>
        <div class="col-sm-12 col-lg-9 col-md-12">

            <div class="container-fluid mt-5 pt-2 w-75">
                <h2 class="mt-5">change password</h2>
                <hr class="border-primary">



                <form class="container mt-5">
                    <div class="form my-3 row">
                        <div class="col-12">
                            <label>password*</label>
                            <input type="password" class="form-control" id="password1" placeholder="current password">
                        </div>
                    </div>

                    <div class="form my-3 row">
                        <div class="col-12">
                            <label>new password*</label>
                            <input type="password" class="form-control" id="newpassword" placeholder="new password">
                        </div>
                    </div>

                    <div class="form my-3 row">
                        <div class="col-12">
                            <label>confirm password*</label>
                            <input type="password" class="form-control" id="confirmnewpassword" placeholder="confirm password">
                        </div>
                    </div>

                    <div class="form my-3 row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <p class="text-danger">
                                *mandatory fields
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-3 col-sm-12" id="passwordchange">

                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 text-right ">
                            <button type="button" name="data" class="btn btn-outline-warning " onclick="changepassword(
                            document.getElementById('password1').value.trim(),
                            document.getElementById('newpassword').value.trim(),
                            document.getElementById('confirmnewpassword').value.trim()
                            )">Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- /#page-content-wrapper -->
    </div>
    <script src="..\..\..\..\resources\js\user.js">
        checkedifloggedin();
    </script>
</body>

</html>