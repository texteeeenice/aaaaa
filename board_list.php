<?php include 'head.php';?>

<?php
session_start();
$jb_login = false;

  if( isset( $_SESSION[ 'admin' ] ) ) {
    $jb_login = TRUE;
  }
?>

<?php
    $page = empty($_GET['page']) ? 1 : $_GET['page'];
    $filename = "./data/article.json";
    $json_array = json_decode(file_get_contents($filename), true);
    $all_page_number = ceil(count($json_array) / 10);
?>



    <div class="our-process-area default-padding bottom-less">
        <div class="container">
        <section> <!-- id = news, class news css is needed-->
            <div class="container"> 
                <div class="container aos-init aos-animate" data-aos="fade-up">
                    <div class="board-table-header ibt">
                        <div class="rows_count">

<?php
      if ( $jb_login ) {
        echo '<a class="btn circle btn-dark border btn-sm" href="board_add.php" style="float:right;margin-bottom:5px;" rel=\"nofollow\">Add</a>
<a class="btn circle btn-dark border btn-sm" href="logout.php" style="float:right;margin-bottom:5px;" rel=\"nofollow\">로그아웃</a>';
} else {
        echo '<a class="btn circle btn-dark border btn-sm" href="login.php" style="float:right;margin-bottom:5px;" rel=\"nofollow\" >Login</a>';
      }
    ?>


</div>
                    </div>
                  

                    <div>
                        <table class="table table-hover ibt" id="table-id">
                            <thead>
                                <tr><th> No. </th>
                                    <!--<th> Index </th>-->
                                    <th> Title </th>
                                    <th> Date </th>
                                    <th> Views </th> 
                                </tr>
                            </thead>
                            <tbody> 
                                <?php foreach(array_reverse($json_array) as $key=> $value){ ?>
                                <?php   if($key >= ($page - 1) * 10 && $key < ($page * 10)){ ?>
                                   <tr><td><?php echo $value['id']; ?></td>
                                        <td>
                                            <a href="./board_show.php?id=<?php echo $value['id']; ?>" style="color:#105299;">
                                                <?php echo $value['title']; ?>
                                            </a>
                                        </td>
                                        <td><?php echo $value['time']; ?></td>
                                        <td><?php echo $value['view'];?>
<?php
      if ( $jb_login ) {
          echo '<a class="btn circle btn-dark border" style="float: right;" href="board_del.php?id=' . $value['id'].'">Del</a>';
        echo '<a class="btn circle btn-dark border" style="float: right;" href="board_mod.php?id=' . $value['id'];
        echo '">Mod</a>';


} else {
        echo '&nbsp;';
      }
    ?>


</td>
                                    </tr>
                                    <?php }}?>
                                </tbody>
                        </table>
                    </div>

    
                    <nav aria-label="Pagination">
                        <hr class="my-0">
                        <ul class="pagination justify-content-center my-4">
                            <?php for ($i=1; $i <= $all_page_number; $i++) {?>
                            <li data-page="<?php echo $i;?>" class="active">
                                <a href="./board_list.php?page=<?php echo $i;?>" class="page-link">
                                    <?php if($i == $page){ ?>
                                        <span><?php echo $i;?></span>
                                    <?php }else{?>
                                        <span style="color:#000;"><?php echo $i;?></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <?php }?>
                       </ul>
                    </nav>
                    </div>            
                </div>            
        </section>
        </div>
    </div>

<?php include 'foot.php';?>


</body>
</html>