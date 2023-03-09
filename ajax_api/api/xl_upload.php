<?php 

				if(isset($_FILES['fileUpload']['name']) && $_FILES['fileUpload']['name'] != "") {
					//print_r($_FILES);exit;
				$allowedExtensions = array("xls","xlsx");
					$ext = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
					if(in_array($ext, $allowedExtensions)) {
						$file_size = $_FILES['fileUpload']['size'] / 1024;
						if($file_size < 50) {
							$file = "uploads/".$_FILES['fileUpload']['name'];
							$isUploaded = copy($_FILES['fileUpload']['tmp_name'], $file);
							if($isUploaded) {
								include("db.php");
								include("Classes/PHPExcel/IOFactory.php");
								try {
									$objPHPExcel = PHPExcel_IOFactory::load($file);
								} catch (Exception $e) {
									die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
								}
								$sheet = $objPHPExcel->getSheet(0);
								$total_rows = $sheet->getHighestRow();
								$highest_column = $sheet->getHighestColumn();
								'<table cellpadding="5" cellspacing="1" border="1" class="responsive">';
								$query = "insert into `ajax_api` (`xlid`,`name`, `email`,`photo`) VALUES ";
																for($row =2; $row <= $total_rows; $row++) {
								$single_row = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
									"<tr>";
									$query .= "(";
									foreach($single_row[0] as $key=>$value) {
										"<td>".$value."</td>";
										$query .= "'".mysqli_real_escape_string($con, $value)."',";
									}
									$query = substr($query, 0, -1);
									$query .= "),";
									 "</tr>";
								}
								
								$query = substr($query, 0, -1);
								'</table>';
								mysqli_query($con, $query);
								if(mysqli_affected_rows($con) > 0) {
									echo '<span>Database table updated!</span>';
								} else {
									echo '<span>Can\'t update database table! try again.</span>';
								}
								unlink($file);
							} else {
								echo 'File not uploaded!';
							}
						} else {
							echo '<span class="msg">Maximum file size should not cross 50 KB on size!</span>';	
						}
					} else {
						echo '<span class="msg">This type of file not allowed!</span>';
					}
				} else {
					echo '<span class="msg">Select an excel file first!</span>';
				}

			?>