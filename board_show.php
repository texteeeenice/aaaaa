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
    <link rel="shortcut icon" href="logo.ico"/>
    <!-- ========== Start Stylesheet ========== -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/font-awesome.min.css" rel="stylesheet">
    <link href="static/css/themify-icons.css" rel="stylesheet">
    <link href="static/css/flaticon-set.css" rel="stylesheet">
    <link href="static/css/magnific-popup.css" rel="stylesheet">
    <link href="static/css/owl.carousel.min.css" rel="stylesheet">
    <link href="static/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="static/css/animate.css" rel="stylesheet">
    <link href="static/css/style.css" rel="stylesheet">
    <link href="static/css/responsive.css?456798" rel="stylesheet">
    <link href="static/css/bootsnav.css" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>

    <link href="static/css/css2.css" rel="stylesheet">

</head>

<body style="transition: auto">


<div class="breadcrumb-area text-center" style="padding: 13% 0px 10% 0px;">
    <header id="home">
        <nav class="navbar navbar-default attr-bg navbar-fixed white bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="static/picture/logo_ewha1.png" class="logo logo-display" alt="Logo" style="height:70px;">
                        <img src="static/picture/logo_ewha1.png" class="logo logo-scrolled" alt="Logo" style="height:70px;">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="publications.html">Publications</a></li>
                        <li><a href="teaching.html">Teaching</a></li>
                        <li>
                            <a href="research.html">Research</a>
                        </li> 
                        <li><a href="project.html">Project</a></li>
                        <!--<li><a href="board_list.php">Board</a></li>-->
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Fixed BG -->
    <div class="fixed-bg" style="background-image: url(static/image/index_bg2.png);background-size: 100%"></div>
    <!-- Fixed BG -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
     <?php
    $id = $_GET['id'];
    $filename = "./data/article.json";
    $json_array = json_decode(file_get_contents($filename), true);
    $data = ['id'=> 0, 'title'=> 'no article', 'content'=> '', 'view'=> 0, 'time'=> date("d M, Y", time())];
    foreach ($json_array as $key => $value) {
        if($id == $value['id']){
            $data = $value;
            $data['time'] = date("d M, Y", strtotime($data['time']));
            $json_array[$key]['view'] += 1;
        }
    }
    file_put_contents($filename, json_encode($json_array));
?>


 
   

    </header>
    <!-- End Header -->


    <div class="breadcrumb-area bg-gradient text-center" style="height:170px;padding: 0 0;width:100%;margin-top: 110px;">
        <!-- Fixed BG -->
        <div class="fixed-bg" style="background-image: url(static/image/index_bg2.png);background-size: 100%"></div>
        <!-- Fixed BG -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 style="margin-top: 7%">Board</h1>
                    <ul class="breadcrumb" style="bottom: -100px;">
                        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active"><a href="board_list.php" style="color:#105299;">Board</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area single full-blog full-blog default-padding">
        <div class="container">
            <div class="blog-items">
                <div class="row">
                    <div class="blog-content wow fadeInUp col-lg-10 offset-lg-1 col-md-12">
                        <div class="item">
                            <div class="blog-item-box">
                                <div class="info">
                                    <div class="meta">
                                        <ul>
                                            <li><i class="fas fa-calendar-alt"></i> <?php echo $data['time']; ?></li>
                                            <li>Views: <?php echo $data['view']; ?></li>
                                        </ul>
                                    </div>
                                    <h2><?php echo $data['title']; ?></h2>
                                    <?php echo $data['content']; ?>
                                    <div class="post-pagi-area">
                                        <a href="./board_show.php?id=<?php echo $data['id'] - 1; ?>"><i class="fas fa-angle-double-left"></i> Previus Board</a>
                                        <a href="./board_show.php?id=<?php echo $data['id'] + 1; ?>">Next Board<i class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

 <!-- Start Footer Bottom -->
        <div class="footer-bottom" style="background-color: #00061c;padding-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p style="color: #ffffff;line-height: 17px;font-size: 12px;">© 2022 AAPL lab. Site made with <a target="_blank" href="https://jekyllrb.com/"  style="color: #c0c6f8;font-weight: 500;">Jekyll</a>; <a target="_blank"  style="color: #c0c6f8;font-weight: 500;" href="https://bigdataewha.github.io/aboutwebsite.html">copy and modify it for your own research group. </a>
                        <br>We are part of the <a target="_blank" href="http://www.ewha.ac.kr/ewha/index.do"  style="color: #c0c6f8;font-weight: 500;">Big data analytics of Ewha Womans University</a> at <a target="_blank"  style="color: #c0c6f8;font-weight: 500;" href="https://cms.ewha.ac.kr/user/indexMain.action?siteId=bigdata">Ewha Womans University.</a></p>
                    </div>
                    
                    <div class="col-md-6">
                        <p style="color: #ffffff;line-height: 17px;font-size: 12px;">Contact: 03760 서울특별시 서대문구 이화여대길52 이화신세계관 419호
                        <br>Seoul, Republic of Korea <a target="_blank" href="https://www.google.nl/maps/place/Ewha+Womans+University/@37.561863,126.9446452,17z/data=!3m1!4b1!4m5!3m4!1s0x357c988459902d69:0xf2536b3850f9d80d!8m2!3d37.5618588!4d126.9468339?hl=en&shorturl=1"  style="color: #c0c6f8;font-weight: 500;">(Maps)</a></p>
                </div>

                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->

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
    <script>
        $(window).scroll(function (){
            if($(this).scrollTop() > $(".navbar").height()){
                if(!$(".navbar").hasClass('bg_nav')){
                    $(".navbar").addClass('bg_nav');
                }
            }else{
                $(".navbar").removeClass('bg_nav');
            }
        })
    </script>
</body>
</html>

</body>
</html>