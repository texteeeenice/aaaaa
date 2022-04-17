<?php include 'head.php';?>


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
                        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
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

<?php include 'foot.php';?>

</body>
</html>