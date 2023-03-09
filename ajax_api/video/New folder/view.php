<?php
include_once("dbdb.php");
$i = 0;
$sql2="SELECT * FROM `video` order by id DESC";
foreach($dbConnection->query($sql2, PDO::FETCH_ASSOC) as $row2)
 {

  ?>
<table width="50%" border="1">
  <tr>
    <td width="50%">Video Name</td>
    <td width="50%">Video</td>
  </tr>
  <tr>
    <td><?php echo $row2['name'];?></td>
    <td><?php echo $row2['link'];?></td>
  </tr>
</table>

 <?php } ?>