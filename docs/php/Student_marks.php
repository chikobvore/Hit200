<?php

require '../dbh/dbh.php';
$dpt = $_SESSION['Department'];
//creating a data table for marks

 echo "<div class='col-md-12' id='1'>".
             "<div class='tile'>".
                   "<div class='tile-body'>".
                        "<table class='table table-hover table-bordered' id='sampleTable'>".
	                          "<thead>".
	                                "<tr>".
	                                  "<th>"."Project Title"."</th>".
	                                  "<th>"."Project ID"."</th>".
	                                  "<th>"."Level"."</th>".
	                                  "<th>"."Year"."</th>".
	                                  "<th>"."Supervisor"."</th>".
	                                  "<th>"."Assessment"."</th>".
	                                  "<th>"."mark"."</th>".
	                                  "<th>"."Assessed by"."</th>".
	                                "</tr>".
	                          "</thead>".
	                          "<tbody>";
//querying data from final marks tables 
	 $sql = "SELECT * FROM final_stage_mark ";
	 $result = mysqli_query($Conn,$sql);
  	 $confirm = mysqli_num_rows($result);

  	 if ($confirm > 0) {
  	 	while ($row = mysqli_fetch_assoc($result)) {
  	 		
  	 		$Project_id = $row['Project_id'];
  	 		$Assessment_id = $row['Assessment_id'];
  	 		$Mark = $row['Mark'];
  	 		$Total_mark = $row['Total_mark'];
  	 		$Overal_mark = $row['Overal_mark'];
  	 		$Assessed_by = $row['Assessed_by'];

  	 		//getting more information about a project from the projects table

  	 		$sql1 = "SELECT * FROM projects WHERE Department = '$dpt' AND stage = 'current' AND Project_id = '$Project_id'";
	  	 	$result1 = mysqli_query($Conn,$sql1);
	  	 	$confirm1 = mysqli_num_rows($result1);

	  	 	if ($confirm1 > 0)
	  	 	{
	  	 			while ($row1 = mysqli_fetch_assoc($result1))
	  	 			{

	  	 				$Year = $row1['Year'];
	  	 				$Level = $row1['Level'];
	  	 				$Project_title = $row1['Project_title'];
	  	 				$Project_id = $row1['Project_id'];
	  	 				$Supervisor = $row1['Supervisor'];

	  	 				//getting more information about the supervisor

	  	 				$sql2 = "SELECT Name,Surname FROM lecturers WHERE Staff_id = '$Supervisor'";
	  	 				$result2 = mysqli_query($Conn,$sql2);
	  	 				$confirm2 = mysqli_num_rows($result2);

	  	 				if ($confirm2 > 0)
	  	 					{
	  	 						while ($row2 = mysqli_fetch_assoc($result2))
	  	 						{

	  	 							$Name = $row2['Name'];
	  	 							$Surname = $row2['Surname'];

	  	 							$sql3 = "SELECT Assessment_title FROM assessment_details WHERE Assessment_id = '$Assessment_id'";
	  	 							$result3 = mysqli_query($Conn,$sql3);
	  	 							$confirm3 = mysqli_num_rows($result3);

	  	 							if ($confirm3 > 0 ) {
	  	 								
	  	 								while ($row3 = mysqli_fetch_assoc($result3)) {
	  	 									$Assessment_title = $row3['Assessment_title'];
	  	 							
	  	 								}
	  	 								echo "<tr>".
	  	 								"<td>".$Project_title."</td>".
	  	 								"<td>".$Project_id."</td>".
	  	 								"<td>".$Level."</td>".
	  	 								"<td>".$Year."</td>".
	  	 								"<td>".$Name." ".$Surname."</td>".
	  	 								"<td>".$Assessment_title."</td>";
	  	 
	  	 								if ($Assessed_by > 4) {
	  	 									echo "<td>".Round($Overal_mark)."</td>".
	  	 										 "<td>".$Assessed_by."</td>"."</tr>";
	  	 								}
	  	 								else{
	  	 									echo "<td>"."Pending.."."</td>".
	  	 										 "<td>".$Assessed_by."</td>".
	  	 										 "</tr>";
	  	 									}

	  	 							}else{
	  	 								echo "Error4".$sql3 . "<br>" . $Conn->error;
	  	 							}
	  	 							
	  	 						}



	  	 				}else{
	  	 					$_SESSION['message'] = 'Some projects marks where not displayed because the projects have no assigned supervisors';
	  	 						#echo "Error3".$sql2 . "<br>" . $Conn->error;
	  	 					}
	  	 				
	  	 						
	  	 					
	  	 			


	  	 			}
	  	 	}

	  	 	

  	 	}

  	 	echo "</tbody>"."</table>";
  	 	echo "</div>"."</div>"."</div>";

  	 }

