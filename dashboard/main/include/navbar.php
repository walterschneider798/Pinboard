<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/pinboard/dashboard/index.php">Cognizant Pinboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" >
        <span class="navbar-toggler-icon"></span>
        
    </button>

    <div class="collapse navbar-collapse  " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item h5 mt-1">
                <a class="nav-link " href="/pinboard/dashboard/main/include/pages/create_product.php">create product<span class="sr-only">(current)</span> <i class="far fa-plus-square"></i></a>
            </li>

            <li class="nav-item h5 mt-1">
                <a class="nav-link" href="/pinboard/dashboard/main/include/pages/faq.php">FAQ<i class="ml-1 far fa-comment-dots"></i></a>
            </li>


            <li class="nav-item h5 mt-1">
                <a class="nav-link " onclick="logout()">Logout<i class="ml-1 fas fa-sign-out-alt"></i></a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Pinboard" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search </button>
        </form>
        <script src="/pinboard/resources/js/user.js">
            checkedifloggedin()
        </script>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>