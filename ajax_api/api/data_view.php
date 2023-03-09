<table width="50%" border="1" align="center">
 <tr>
          <th>Id</th>
          <th>Xl Id</th>
          <th>Video Name</th>
          <th>Email Id</th>
          <th>Photo</th>
         <th>Action</th>
        </tr>
  <?php
include_once("dbdb.php");
$i = 0;
$sql2="SELECT * FROM `ajax_api` order by id DESC";
foreach($dbConnection->query($sql2, PDO::FETCH_ASSOC) as $row2)
 {
  ?>
  <tr>
  	<!--<td><?php echo ++$i;?></td>-->
    <td><?php echo $row2['id'];?></td>
    <td><?php echo $row2['xlid'];?></td>
    <td><?php echo $row2['name'];?></td>
    <td><?php echo $row2['email'];?></td>
    <td><div><img src="api/img/<?php echo $row2['photo']; ?>" title="<?php echo $row2['photo']; ?>" style="width: 30px;height: 30px;" /><a href="#" onclick="viewform(<?php echo $row2['id'];?>);"><img src="api/imgi/edit.png" width="20" height="20" /></a></div>


<form method="post" enctype="multipart/form-data" class="myFormId" action="myFormId" id="myFormId<?php echo $row2['id'];?>" name="myFormId" style="display:none;">
<table width="50%" border="0" align="center" >
  <tr>
    <td colspan="2"><input type="hidden" name="imgid" id="imgid<?php echo $row2['id'];?>" value="<?php echo $row2['id'];?>"  />
<input type="file" name="file" class="File_edit" id="File_edit<?php echo $row2['id'];?>" accept="image/jpeg, image/jpg, image/png" onchange="updateimg(<?php echo $row2['id'];?>);"></td>

  </tr>
  <tr>
    <td colspan="2"><p id="update_sms<?php echo $row2['id'];?>"></p></td>
  </tr>
  <tr>
    <td><input type="button" value="Update" class="button" onclick="updatephoto(<?php echo $row2['id'];?>);"/> </td>
    <td><input type="button" value="Cancel" class="button"  onclick="hideform(<?php echo $row2['id'];?>);"/></td>
  </tr>
</table>
</form>

</td>
    <td>
      <table>
        <tr>
          <td><input type="button" name="Edit" id="Edit" onclick="Edit(<?php echo $row2['id'];?>);"  value="Edit"></td>
          <td><input type="button" name="Delete" id="Delete" onclick="Delete(<?php echo $row2['id'];?>);" value="Delete"></td>
        </tr>
      </table>
    </td>
  </tr>
   <?php } ?>
</table>



<?php
$sql1="SELECT * FROM `ajax_api`  order by id DESC";
foreach($dbConnection->query($sql1, PDO::FETCH_ASSOC) as $row2)
 {
  ?> 
<div id="id02<?php echo $row2['id'];?>" class="w3-modal" style="display:none;">
  <div class="w3-modal-content" style="width:700px;
    height:100%;
    border: 5px solid #e36900;
    margin-top: -60px;">
    <div class="w3-container">
   <span onclick="document.getElementById('id02'+<?php echo $row2['id'];?>).style.display='none'" class="w3-closebtn"
   style="color: #FFFFFF;
    text-align: center;
    font-size: 15px;
    border: 1px solid transparent;
    padding: 3px 10px;
    text-decoration: none;
    border-radius: .25rem;
    background-color: #e92929;
    margin-top:10px;">Cancel</span>
      <div style="background-color: #E19F04;
    color: #FFFFFF;
    font-size: 17px;
    font-weight: bold;
    margin-top: 45px;
    width: 100%;
    text-align: center;">Data Edit</div>
    <style>
  .input_type{
  width:100%;
  border:2px solid #FF00FF;
  border-radius: .25rem;}
  </style>
  <form method="post" enctype="multipart/form-data" action="" id="data_form" >
          <table width="50%" border="0" align="center">
        <tr>
         <td width="34%">Name</td>
          <td width="34%"> <input type="text" id="update_name<?php echo $row2['id'];?>" placeholder="Video Name" value="<?php echo $row2['name'];?>"></td>
           <td width="34%"></td>
         </tr>
        <tr>
         <td width="34%">Link</td>
          <td width="34%"> <input type="text" id="email<?php echo $row2['id'];?>" placeholder="Put iframe Link"  value="<?php echo $row2['email'];?>"></td>
           <td width="34%"></td>
         </tr>
         <tr>
         <td width="34%" colspan="3"><input type="button"  value="Update" onclick="updatedata(<?php echo $row2['id'];?>);" ></td>
         </tr>
        </table>
        </form>
</div>
</div>
</div>
<?php } ?>
