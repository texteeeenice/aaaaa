<!DOCTYPE html>
<html >

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AAPL Lab">

    <!-- ========== Page Title ========== -->
    <title>AAPL Lab</title>

    <!-- ========== Start Stylesheet ========== -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/font-awesome.min.css" rel="stylesheet">
    <link href="static/css/themify-icons.css" rel="stylesheet">
    <link href="static/css/flaticon-set.css" rel="stylesheet">
    <link href="static/css/magnific-popup.css" rel="stylesheet">
    <link href="static/css/owl.carousel.min.css" rel="stylesheet">
    <link href="static/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="static/css/animate.css" rel="stylesheet">
    <link href="static/css/bootsnav.css" rel="stylesheet">
    <link href="static/css/style.css" rel="stylesheet">
    <link href="static/css/responsive.css" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <link href="static/css/css2.css" rel="stylesheet">

</head>
<?php
    session_start();
    $_SESSION['admin'] = [];
    if($_POST && $_POST['id'] != ''){
        $filename = "./data/admin.json";
        $json_array = json_decode(file_get_contents($filename), true);
        foreach ($json_array as $key => $value) {
            if($value['id'] == $_POST['id'] && $value['password'] == $_POST['password']){
                $_SESSION['admin'] = $value;
            }
        }
    }
?>
<body>

    <!-- Start Login 
    ============================================= -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="login-box">
                        <div class="login">
                            <div class="content">
                                <h3><strong>관리자 로그인</strong></h3>
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <i class="fas fa-envelope-open"></i>
                                                <input class="form-control" name="id" placeholder="ID*" type="text" value="111111">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <i class="fas fa-lock"></i>
                                                <input class="form-control" name="password" placeholder="Password*" type="text" value="123456">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <button type="submit">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="static/js/jquery-1.12.4.min.js"></script>
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/equal-height.min.js"></script>
    <script src="static/js/jquery.appear.js"></script>
    <script src="static/js/jquery.easing.min.js"></script>
    <script src="static/js/jquery.magnific-popup.min.js"></script>
    <script src="static/js/modernizr.custom.13711.js"></script>
    <script src="static/js/owl.carousel.min.js"></script>
    <script src="static/js/wow.min.js"></script>
    <script src="static/js/progress-bar.min.js"></script>
    <script src="static/js/isotope.pkgd.min.js"></script>
    <script src="static/js/imagesloaded.pkgd.min.js"></script>
    <script src="static/js/count-to.js"></script>
    <script src="static/js/YTPlayer.min.js"></script>
    <script src="static/js/progresscircle.js"></script>
    <script src="static/js/bootsnav.js"></script>
    <script src="static/js/main.js"></script>
<?php
    session_start();
    if(count($_SESSION['admin']) > 0){
?>
<script>
    alert('Login Success');
    window.location.href = "./board_list.php";
</script>
<?php
    }
?>
</body>
</html>