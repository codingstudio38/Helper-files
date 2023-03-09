 <?php
include_once("dbdb.php");
$sql2="SELECT * FROM `video1` order by id DESC";
foreach($dbConnection->query($sql2, PDO::FETCH_ASSOC) as $row2)
 {
//echo $row2['link'];
//exit;
  ?>

  <video class="wp-video-shortcode" id="video-1967-1" preload="metadata" controls="controls"><source type="video/youtube" src="https://www.youtube.com/watch?v=<?php echo $row2['link']; ?>" /><a href="https://www.youtube.com/watch?v=<?php echo $row2['link']; ?>">https://www.youtube.com/watch?v=<?php echo $row2['link']; ?></a></video>

   <?php } ?>


