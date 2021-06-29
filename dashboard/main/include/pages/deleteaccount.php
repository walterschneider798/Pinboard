<!DOCTYPE html>
<html>

<head>
    <?php include_once('../../style/head.html'); ?>
</head>

<body>
    <?php include_once('../navbar.php'); ?>

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <?php include_once('../sidebar.html'); ?>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <button class="navbar-toggler" id="menu-toggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

            <div class="container-fluid">
                <h2 class="ml-5">change User settings</h2>
                <hr>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
                            <div class="  ">
                                <button type="button" class="  btn btn-primary " data-toggle="modal" data-target="#deleteuser">Delete your Account</button>
                                <div class="modal fade" id="deleteuser">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteyouraccountmodal">Delete your account</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">E-Mail:</label>
                                                        <input type="text" placeholder="E-Mail address" class="form-control" id="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Password:</label>
                                                        <input type="password" placeholder="password" class="form-control" id="password">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <div id="deletemessage">

                                                </div>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger" onclick="deleteuser(
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
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="/pinboard/resources/js/user.js"></script>
</body>

</html>