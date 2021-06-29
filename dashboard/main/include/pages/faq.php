<!DOCTYPE html>
<html>

<head>
    <?php include_once('../../style/head.html'); ?>
</head>

<body>
    <?php include_once('../navbar.php'); ?>
    <p class="my-4"> amigo </p>

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
               
            </nav>

            <div class="container-fluid mt-4 ml-3 pl-5 text-center">
                <h2 class=" border-bottom border-primary ">FAQ</h2>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <script src="/pinboard/resources/js/user.js">
    checkedifloggedin();
  </script>
</body>

</html>