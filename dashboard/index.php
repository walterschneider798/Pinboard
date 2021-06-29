<!DOCTYPE html>
<html>

<head>
    <?php include_once('main/style/head.html'); ?>
</head>

<body>

    <?php include_once('main/include/navbar.php'); ?>
    <p class="my-4">amigo</p>




    <div class="d-flex row" id="wrapper">
        <div class="col-sm-12 col-md-12 col-lg-2">
            <div class="bg-light " id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <?php include_once('main/include/sidebar.html'); ?>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-9">
            <div class="container-fluid w-75 mt-5 pt-2">
                <h2 class="mt-5 ">Dashboard</h2>
                <hr class="border-primary">
                <div class="container">
                    <div class="row my-5">
                        <div class="col-lg-3 col-md-1 col-sm-0">

                        </div>
                        <div class="col-lg-5 col-md-10 col-sm-12">
                            <div class="text-center card text-white bg-success " style=" ">
                                <div class="card-header">create new product</div>
                                <div class="card-body">
                                    <button onclick="opencreatenewproduct()" class="btn btn-warning card-title"><i class="fas fa-plus"></i> Product</button>
                                    <p class="card-text">create here and now a new, saleable product</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-1 col-sm-0">

                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="mb-3 col-lg-6 col-md-12 col-sm-12">
                            <div class="text-center card text-white bg-info" style=" max-width: 22.5rem;">
                                <div class="card-header">view your products</div>
                                <div class="card-body">
                                    <button onclick="openproductlist()" class=" btn btn-warning card-title"><i class="fas fa-eye"></i>
                                        View
                                    </button>
                                    <p class="card-text">
                                        watch all your available products
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class=" text-center card text-white bg-info " style=" max-width: 22.5rem;">
                                <div class="card-header">look at your real estate</div>
                                <div class="card-body">
                                    <button onclick="openimmobilielist()" class="btn btn-warning card-title"><i class="fas fa-eye"></i>
                                        View
                                    </button>
                                    <p class="card-text">
                                        take a look at all your properties here
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="/pinboard/resources/js/user.js">
    checkedifloggedin();
</script>


</html>