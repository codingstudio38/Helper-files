<?php
$imgid=$_REQUEST['imgid'];
$rnd=rand(0,1000);
$filename = $rnd."-".$_FILES['file']['name'];
$location = "img/".$filename;
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo '<img src="api/img/'.$filename.'" class="image-preview" style="width:143px;height:145px;">
  <input type="hidden" name="imgupdate'.$imgid.'" id="imgupdate'.$imgid.'" value="'.$filename.'">';
} else { 
  echo $response= "Error Found "; 
}
?>