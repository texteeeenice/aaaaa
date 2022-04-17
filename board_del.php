<?php
date_default_timezone_set("Asia/seoul");
$id = $_GET['id'];
$filename = "./data/article.json";
$json_array = json_decode(file_get_contents($filename), true);
foreach ($json_array as $key => $value) {
    if($id != $value['id']){
        $new_array[] = $value;
    }
}
file_put_contents($filename, json_encode($new_array));
?>
<html>
<script>
    alert('Del Success');
    window.location.href = "./board_list.php";
</script>
</html>
