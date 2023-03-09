<?php  
include_once("dbdb.php");
$db = $dbConnection;
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
$json=file_get_contents('php://input');
$data=JSON_decode($json, TRUE);
$response = array();
$method=$data['method'];
if($method=='MailValid')
{
	$check_email=$data['email'];
	$sql243235="SELECT * FROM `ajax_api` WHERE email='$check_email' ORDER BY id DESC";
	foreach($dbConnection->query($sql243235, PDO::FETCH_ASSOC) as $row141);
	if(!empty($row141['id'])){
	$response['statusapi']='Failed';
	$response['message']='Id already exist..!!';
	echo JSON_encode($response);
	exit;	
    } else	{
		$response['statusapi']='success';
		$response['message']='Ok..No Mail Found..';
		echo JSON_encode($response);
		exit;
	}
  
}
if($method=='insert')
{
	$xlid=rand(0,1000);
	$name=$data['name'];
	$email=$data['email'];
	$photo=$data['photo'];
	$sql24323="INSERT INTO ajax_api SET xlid='$xlid', name='$name',email='$email',photo='$photo'";
    $query_insert111 = $dbConnection->prepare( $sql24323 );
    $query_insert111->execute();
    $last_id=$dbConnection->lastInsertId();
    if($last_id){ 
	$response['statusapi']='success';
	$response['message']='Upload Successfully';
	echo JSON_encode($response);
	exit;
    }   else	{
		$response['statusapi']='Failed';
		$response['message']="Upload Failed..!!";
		echo JSON_encode($response);
		exit;
	}
}
if($method=='Update')
{
	$update_id=$data['update_id'];
	$update_name=$data['update_name'];
	$email=$data['email'];
	$sql_update="UPDATE `ajax_api` SET `name` = '$update_name',`email` = '$email' WHERE `id` ='$update_id'";
    $query_update = $dbConnection->prepare( $sql_update );
    $query_update->execute();
    if($query_update)
    { 
    $response['statusapi']='success';
	$response['message']='Update Successfully';
	echo JSON_encode($response);
	exit;
	}   else	{
		$response['statusapi']='Failed';
		$response['message']="Update Failed..!!";
		echo JSON_encode($response);
		exit;
	}
}
if($method=='updatephoto')
{
	$photo=$data['photo_name'];
	$id=$data['photo_id'];
	$sql_update="UPDATE `ajax_api` SET `photo` = '$photo' WHERE `id` ='$id'";
    $query_update = $dbConnection->prepare( $sql_update );
    $query_update->execute();
    if($query_update)
    { 
    $response['statusapi']='success';
	$response['message']='Photo Edit Successfully';
	echo JSON_encode($response);
	exit;
	}   else	{
		$response['statusapi']='Failed';
		$response['message']="Update Failed..!!";
		echo JSON_encode($response);
		exit;
	}
}
if($method=='Delete')
{
	$delete_id=$data['delete_id'];
	$sql_delete="DELETE FROM `ajax_api` WHERE id='$delete_id'";
    $query_delete = $dbConnection->prepare( $sql_delete );
    $query_delete->execute();
    if($query_delete)
    { 
    $response['statusapi']='success';
	$response['message']='Delete Successfully';
	echo JSON_encode($response);
	exit;
	}   else	{
		$response['statusapi']='Failed';
		$response['message']="Delete Failed..!!";
		echo JSON_encode($response);
		exit;
	}
}
if($method=='viewall') 
{
$query = "SELECT * FROM ajax_api ORDER BY id";
foreach($dbConnection->query($query, PDO::FETCH_ASSOC) as $row){
    $dataapi[] = array("id" => $row['id'],
    	             "xlid" => $row['xlid'],
                    "name" => $row['name'],
                    "email" => $row['email'],
                    "photo" => $row['photo']);
}
echo json_encode($dataapi);
exit;
}


?>