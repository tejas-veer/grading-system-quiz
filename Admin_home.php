<?php
session_start();
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta name="viewport" content="width=device-width , initial-scale=1 ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark ">
      <!--  <img src="https://cdn11.bigcommerce.com/s-fkkokiv406/images/stencil/800x600/uploaded_images/quizzo.jpg?t=1525706940" style="margin-left:10px" width="200" height="80" class="d-inline-block align-top" alt="">
-->     <h1> <a href="Index.php" style="margin-left:30px ">QUIZZO</a></h1>
        <div class="d-flex justify-content-end">
         <!--   <a href="JumpHome.php" class="btn btn-outline-light" style="margin-right:40px ">HOME</a>
-->    <a href="Admin_login.php" class="btn btn-outline-danger">LOG OUT</a>
        </div>
    </nav>
    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link disabled" href="#"><h4 style="color:#2487e3">Dashboard</h4></a>
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-item nav-link" id="nav-quiz-tab" data-toggle="tab" href="#nav-quiz" role="tab" aria-controls="nav-quiz" aria-selected="false">My Quiz</a>
    <a class="nav-item nav-link" id="nav-student-tab" data-toggle="tab" href="#nav-student" role="tab" aria-controls="nav-student" aria-selected="false">Students</a>
    <a class="nav-item nav-link" id="nav-rank-tab" data-toggle="tab" href="#nav-rank" role="tab" aria-controls="nav-rank" aria-selected="false">Ranking</a>
    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false">Edit Profile</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <!-------------  Home   -------------------->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div id="nav-home-tab">
      <div class="jumbotron">
        <h4 class="display-4">Welcome, <?php echo($_SESSION['aname']); ?></h4>
        <h4 class="lead">Username-<?php echo($_SESSION['ausername']); ?></h4>
        <p class="lead">Contact-<?php echo($_SESSION['aphonenumber']); ?></p>
        <hr class="my-4">
        <p>Email-<?php echo($_SESSION['aemailid']); ?></p>
      </div>
    </div>


  </div>





    <!--------------------My quiz ------------->

    <div class="tab-pane fade" id="nav-quiz" role="tabpanel" aria-labelledby="nav-quiz-tab">
  <?php 
    include('./Connect.php');
    $query1 = " SELECT * FROM `create_quiz_details`";
    $res1 = mysqli_query($Connect,$query1);
  ?>
    
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						<h2> <b></b></h2>
					</div>
					<div class="col-sm-7">
						<a href="Create_quiz_details.php" class="btn btn-success" > <span  align="center">Create Quiz</span></a> &nbsp; &nbsp; &nbsp;
						<br> <br>					
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						
						<th>SL NO</th>
                        <th>QUIZ TITLE</th>
                        <th></th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($Connect,"SELECT * FROM `create_quiz_details`");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
				<tr eid="<?php echo $row['eid']; ?>">
					<td><?php echo $i; ?></td>
					<td><?php echo $row['qtitle']; ?></td>
          <td>             </td>
          <td> &nbsp;
          <?php echo ' <a href="Start_quiz.php?q=create_quiz_details&user=admin&step=2&qtitle='.$row['qtitle'].'&eid='.$row['eid'].'&n=1&t='.$row["qno"].'" class="btn btn-warning" >Start</a> &nbsp;&nbsp; 
        '; ?>
          <a href="Delete_quiz.php?q=del&eid=<?php echo $row['eid']; ?>" class="btn btn-danger"  >Delete</a>
          
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
      </div>

    
  </div>
    


   <!-------------------Student------------------>


  <div class="tab-pane fade" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab">
  
    <?php 
    include('./Connect.php');
    $query1 = " SELECT * FROM `user`";
    $res1 = mysqli_query($Connect,$query1);
  ?>
    
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
						              <h2 class="card-title" style="text-align:center"> <b> <div class="card-head"> Student Details</div></b></h2>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						
						<th>SL NO</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Email Id </th>
                        <th></th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($Connect,"SELECT * FROM `user`");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
			
					<td><?php echo $i; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["username"]; ?></td>
          <td><?php echo $row["phonenumber"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td>             </td>
          <td> &nbsp;&nbsp;
        
          <a href="Student_delete.php?q=delUser&username=<?php echo $row['username']; ?>" class="btn btn-danger"  >Delete</a>
          
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
</div>
       




    <!-------------------Ranking------------------>


  <div class="tab-pane fade" id="nav-rank" role="tabpanel" aria-labelledby="nav-rank-tab">
    
  <?php 
    include('./Connect.php');
    $q=mysqli_query($Connect,"SELECT * FROM ranking  ORDER BY score DESC " )or die('Error223');
  ?>
    
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
						              <h2 class="card-title" style="text-align:center"> <b> <div class="card-head"> Ranking</div></b></h2>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						
						<th>SL NO</th>
                        <th>Name</th>
                        <th>Email Id</th>
                        <th>Quiz Title</th>
                        <th>Score</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
				<tbody>
				
       <?php 
       $q=mysqli_query($Connect,"SELECT * FROM ranking  ORDER BY score DESC " )or die('Error223');
       $c=1;
            while($row=mysqli_fetch_array($q) )
            {
            $e=$row['email'];
            $s=$row['score'];
          
            $q12=mysqli_query($Connect,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
            while($row=mysqli_fetch_array($q12) )
            {
            $name=$row['name'];
            $username=$row['username'];
            $q11=mysqli_query($Connect,"SELECT * FROM history WHERE email='$e' " )or die('Error231');
            while($row=mysqli_fetch_array($q11) )
            {  
              $eid= $row['eid'];
              $result=mysqli_query($Connect,"SELECT * FROM create_quiz_details WHERE eid='$eid' " )or die('Error231');
              while($row=mysqli_fetch_array($result) )
              {
                $qtitle=$row['qtitle'];
              }
            }
            }
            ?>
			
					<td><?php echo $c; ?></td>
          <td><?php echo $name?></td>
          <td><?php echo $e ?></td>
          <td><?php echo $qtitle  ?></td>
          <td><?php echo $s ?></td>
          <td>             </td>
          <td> 
             &nbsp;&nbsp;
          </td>
				</tr>
				<?php
				$c++;
				}
				?>
				</tbody>
			</table>
			
        </div>
</div>
       



  <!--------------------Edit profile--------------->



  <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
  <div class="row row-cols-1 row-cols-md-2">
  <div class="col mb-4">
    <div class="card">
     <h5 align="center" class="card-header">UPDATE PROFILE</h5>
      <div class="card-body">

      <form method="POST" action="Admin_update_phone.php">
            <input type="" class="form-control" name="phone" placeholder="Update Phone Number">
            <br>
            <button type="submit" class="btn btn-primary" name="updatephone">UPDATE</button>
        </form>
        <form method="POST" action="Admin_update_email.php">
            <input type="email" class="form-control" name="email" placeholder="Update Email Id">
            <br>
            <button type="submit" class="btn btn-primary" name="updateemail">UPDATE</button>
        </form>
      </div>
    </div>
  </div>

  <div class="col mb-4">
    <div class="card">
     <h5 align="center" class="card-header"> UPDATE PASSWORD </h5>
      <div class="card-body">
      <form method="POST" action="Admin_update_password.php">
          <label align="center"> Update Password </label>
            <input type="password" class="form-control" name="confirm_password" placeholder="Enter old Password">
            <br>
            <input type="password" class="form-control" name="new_password" placeholder="Enter New Password">
            <br>
            <button type="submit" class="btn btn-danger" name="updatepassword">UPDATE</button>
        </form>
      </div>
    </div>
  </div>
  </div>
<div class="col mb-4">
  <div class="card">
     <h5 align="center" class="card-header"> DELETE ACCOUNT </h5>
  <div class="card-body">
    <form method="POST" action="Admin_delete.php">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password">
            <br>
            <button type="submit" class="btn btn-danger" name="delete">DELETE</button>
        </form>
  </div>
</div>
</div>
</div>


    


</body>
</html>
  