<?php include 'includes/sessions.php'; ?>
<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Search</title>   
<meta name="description" content="Bootstrap.">  
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>  
<body style="margin:20px auto">  
<div class="container">
<div class="row header" style="text-align:center;color:green">
<h3>Search</h3>
</div>
                    <form method="POST" class="forms-sample">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Search By ID</label>
                      <input type="number" class="form-control" name="student_id" placeholder="Student ID Here" value="">
                    </div>
					
					<div class="form-group">
                      <label for="exampleInputEmail1">Search By Email</label>
                      <input type="email" class="form-control" name="email" placeholder="Email Here" value="">
                    </div>
					<div class="form-group">
                      <label for="exampleInputEmail1">Search By Name</label>
                      <input type="text" class="form-control" name="Name" placeholder="Name Here" value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"> Search By Grade </label>
                      <select class="js-example-basic-single w-100" name="Grad_greater_less">
					  <option value=""></option>
					   <option value=">">Greater Than</option>
                      <option value="<">Less Than</option>
					   <option value="=">Equal To</option>`
                    
					   
                    </select>
					  <input type="number" class="form-control" name="Grade" placeholder="Average Grade Here" value="">
                    </div>
                   
                   
					 <button type="submit" name="Search" class="btn btn-primary mr-2">Search</button>
                    
                    <a href="index.php" class="btn btn-light">Back to Dashboard</a>
                  </form>
			

			<br><br>
			
		<?php 	
		
		if(isset($_POST['Search'])){
		$select = 'SELECT `student_id`, `first_name`, `middle_name`, `last_name`, `email`, `user_id`,`group_name`, AVG(`rating_value`) as avarage ';
  $from = 'FROM `student_tbl` INNER JOIN `student_ratings` ON `student_tbl` .`student_id`=`student_ratings`.`rating_for` INNER JOIN `studentgroups` ON `student_tbl`.`group_id`=`studentgroups`.`group_id` ';
  $where = 'WHERE TRUE';
  
  $HAVING = '';
  //getting variables
  

  $student_id= $_POST['student_id'];
 
  $email= $_POST['email'];
  $Name= $_POST['Name'];
  $Grad_greater_less= $_POST['Grad_greater_less'];
  $Grade= $_POST['Grade'];
//checking which variable  have been entered in the search
  if (!empty($student_id)){
    $where .= " AND `student_id`='$student_id'";
  }
  
  if (!empty($email)){
    $where .= " AND `email`='$email'";
  }
  if (!empty($Name)){
    $where .= " AND `first_name `LIKE'%$Name%' OR  `middle_name `LIKE'%$Name%' OR AND `last_name `LIKE'%$Name%' ";
  }
  if (!empty($Grad_greater_less) AND !empty($Grade) ){
    $Having .= " HAVING  avarage $Grad_greater_less'$Grade'";
  }
  
 
  

  $sql = $select . $from . $where.' GROUP BY `student_id`'.$Having;

		
		$stmt = $conn2->prepare($sql);
		$stmt->execute();
		
		$count = $stmt->rowCount();
				If($count<1){
					echo '<div class="alert alert-warning"> There Are No Results for the Search!</div>';
					
				} else{ ?>	
<table id="myTable" class="table table-striped table-bordered table-responsive table-hover" >  
        <thead>  
          <tr>  
            <th>Student ID </th>  
            <th>Email</th>  
            <th>Avarage</th>  
            <th>Group</th>  
          </tr>  
        </thead>  
        <tbody>
         <?php    

	
							while ($row5 = $stmt->fetch()) {
			
		
		                 
									
			 ?>		
          <tr>  
            <td><?php echo $row5['student_id']?></td>  
            <td><?php echo $row5['email']?></td>  
            <td><?php echo $row5['avarage']?></td>  
            <td><?php echo $row5['group_name']?></td>  
			
							<?php }?>
          </tr>  
     </tbody>  
      </table> 

	  <?php }
		}
	  
	  ?>
	  </div>
</body>  
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>
</html>  