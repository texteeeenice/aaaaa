<?php include 'head.php';?>

<?php
    $is_add = false;
    date_default_timezone_set("Asia/seoul");
    if($_POST['title'] != '' && $_POST['content'] != ''){
        $filename = "./data/article.json";
        $json_array = json_decode(file_get_contents($filename), true);
        $json_array[] = [
            'id'=> count($json_array) + 1,
            'title'=> $_POST['title'],
            'content'=> $_POST['content'],
            'time'=> date("Y/m/d", time()),
            'view'=> 0
        ];
        file_put_contents($filename, json_encode($json_array));
        $is_add = true;
    }
?>

    </header>
    <!-- End Header -->

    <div class="breadcrumb-area text-center" style="height:170px;padding: 0 0;width:100%;margin-top: 110px;">
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

    <form class="blog-area single full-blog full-blog default-padding" method="POST">
        <div class="container">
            <div class="blog-items">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <input class="form-control" name="title" placeholder="Title*" type="text" value="">
                </div>
            </div>
        </div>
        <textarea name="content" id="editor" ></textarea>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <button type="submit" class="btn circle btn-dark border btn-sm" style="margin: 20px auto;">
                    Submit
                </button>
            </div>
        </div>
            </div>
        </div>
    </form>

<?php include 'foot.php';?>

       <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

<?php
    if($is_add == true){
?>
<script>
    alert('Add Success');
    window.location.href = "./board_list.php";
</script>
<?php
    }
?>
</body>
</html>