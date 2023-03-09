<?php
$rnd=rand(0,1000);
$filename = $rnd."-".$_FILES['inputFile']['name'];
$location = "img/".$filename;
if ( move_uploaded_file($_FILES['inputFile']['tmp_name'], $location) ) { 
  echo '<img src="api/img/'.$filename.'" class="image-preview" style="width:143px;height:145px;">
  <input type="hidden" name="photo" id="photo" value="'.$filename.'">';
} else { 
  echo $response= "Error Found "; 
}
?>