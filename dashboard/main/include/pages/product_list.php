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
        <div class="bg-light " id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <?php include_once('../sidebar.html'); ?>
            </div>
        </div>
        <div class="container-fluid mt-5 pt-2 w-75">
            <div class="row">
                <div class="col-6">
                    <h2 class="mt-3">your products</h2>
                </div>
                <div class="col-6 text-right">
                    <button class="mt-2 btn btn-outline-info" onclick="opencreatenewproduct()">
                        new product
                    </button>
                    <button class="mt-2 btn btn-outline-warning" onclick="openimmobilie()">
                        new immobilie
                    </button> 
                    <button class="mt-2 btn btn-outline-danger" onclick="openimmobilielist()">
                       view your Immobilie
                    </button>
                 
                </div>
            </div>
            <hr class="border-primary">
            <div class="container">
                <form>
                    <div class="container">
                        <div class="form row mt-5">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    </div>
    <script src="..\..\..\..\resources\js\user.js">
        checkedifloggedin();
    </script>
</body>

</html>