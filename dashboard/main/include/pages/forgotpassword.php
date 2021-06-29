<!DOCTYPE html>
<html>

<head>
    <?php include_once('../../style/head.html'); ?>
</head>

<body>
    <div class="container">
        <div class="row ">
            <div class="mt-5 pt-5 mb-3 col-lg-12 col-md-12 col-sm-12 text-center">
                <h1 class="mx-5 ">
                    reset password
                </h1>
                <hr class="border-bottom border-primary" align="middle" width="35%">
            </div>
        </div>
        <div class=" text-left mx-5">
            <div class="row mx-5 my-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>email*</label>
                    <input type="text" class="form-control" placeholder="hans.muster@cognizant.com" id="resetemail">
                </div>
            </div>
            <!-- <div class="row mx-5 my-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <label>verifyfield*</label>
                    <input type="text" class="form-control" placeholder="firstname or lastname" id="resetverify">
                </div>
            </div> -->
            <div class="row mx-5 ">
                <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                    <p class="text-danger">*mandatory fields</p>
                </div>
            </div>
            <div class="row mx-5 text-right mb-5">
                <div class="col-lg-7 col-md-4 col-sm-12 text-center" id="resetpasswordresponse">

                </div>
                <!-- Button trigger modal -->
                <div class="col-lg-5 col-md-8 col-sm-12">
                    <button class="btn btn-outline-danger" name="data" type="submit" onclick="resetpassword(
                        document.getElementById('resetemail').value.trim()
                    )">reset password</button>
                </div>
            </div>
        </div>

        <div class="row mx-5 ">
            <div class="col-lg-12 col-md-12 col-sm-12  text-right">
                <a class="mx-3" href="/pinboard/index.html">already registered?</a>
                <a class="border-right border-primary"></a>
                <a class="ml-3 mr-5" href="/pinboard/register.html">register here</a>
            </div>
        </div>

    </div>
    <script src="/pinboard/resources/js/user.js">
        checkedifloggedin();
    </script>
   
</body>

</html>