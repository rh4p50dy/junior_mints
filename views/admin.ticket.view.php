<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="icon" type="image/x-icon" href="../src/img/favicon.ico">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  
</head>
<body >
	<div class="container-fluid">
		<div class="row g-0">	<!-- Wrapper -->

			<nav class="col-2 bg-light pe-3 border-right"> <!-- Left Side Nav -->

				<h1 class="h4 py-3 text-center text-primary">
					<a href="/"><img src="../src/img/logo.png" height="60px" alt="logo"></a>
				</h1>
				
				<div class="list-group text-center text-lg-start">
					<span class="list-group-item disabled d-none d-lg-block">
						<small>CONTROLS</small>
					</span>
					<a href="/admin" class="list-group-item list-group-item-action">
						<i class="fas fa-home"></i>
						<span class="d-none d-lg-inline">Dashboard</span>
					</a>
					<a href="/admin/user" class="list-group-item list-group-item-action ">
						<i class="fas fa-users"></i>
						<span class="d-none d-lg-inline">Users</span>
						<span class="d-none d-lg-inline badge bg-danger rounded-pill float-end"></span>
					</a>
					<a href="/admin/ticket" class="list-group-item list-group-item-action active">
						<i class="fas fa-chart-line"></i>
						<span class="d-none d-lg-inline">Ticket Order</span>
					</a>
					<a href="/admin/contact" class="list-group-item list-group-item-action ">
						<i class="fas fa-flag"></i>
						<span class="d-none d-lg-inline">Contact Form</span>
					</a>
					<a href="/admin/shop" class="list-group-item list-group-item-action">
						<i class="fa-solid fa-cart-shopping"></i>
						<span class="d-none d-lg-inline">Shop Orders</span>
					</a>
				</div>

				<div class="list-group mt-4 text-center text-lg-start">
					<span class="list-group-item disabled d-none d-lg-block">
						<small>ACTIONS</small>
					</span>
					<a href="/admin/blog" class="list-group-item list-group-item-action">
						<i class="fas fa-user"></i>
						<span class="d-none d-lg-inline">Manage Blogs</span>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="fas fa-edit"></i>
						<span class="d-none d-lg-inline">Update Data</span>
					</a>
					<a href="#" class="list-group-item list-group-item-action">
						<i class="far fa-calendar-alt"></i>
						<span class="d-none d-lg-inline">Add Events</span>
					</a>
				</div>

			</nav> <!-- Left Side Nav -->

			<main class="col-10 bg-secondary"> <!-- Main (Top Nav & Content) -->
				
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="flex-fill"></div>
					<div class="navbar nav">
						<li class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" style="color: darkslategray;" data-bs-toggle="dropdown">
								<i class="fas fa-user-circle"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-end ">
								<li><a href="/" class="dropdown-item">Home</a></li>
								<li><a href="/admin" class="dropdown-item">User Profile</a></li>
								<li><a href="/logout" class="dropdown-item">Logout</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link" style="color: darkslategray;">
								<i class="fas fa-cog"></i>
							</a>
						</li>
					</div>
				</nav>

				<div class="container-fluid mt-3 p-4"> <!-- Content -->
					<?php if($_GET['error']=="deletedone"){
						echo "<div class=\"row mb-3\">	
								<div class=\"col\">
								<div class=\"alert alert-info\">
								<h3>Marked Completed!</h3>
							</div>
						</div>
					</div>";
					}?>
					<div class="row mt-4 flex-column flex-lg-row"> 
						<!-- Content Row 2 -->
						<div class="col">
							<h2 class="h6 text-white-50">Ticket Order List</h2>
							<div class="card mb-3" >
								<div class="card-body">
									<div class="text-end">
										<button class="btn btn-sm btn-outline-secondary">
											<i class="fas fa-search"></i>
										</button>
										<button class="btn btn-sm btn-outline-secondary">
											<i class="fas fa-sort-amount-up"></i>
										</button>
										<button class="btn btn-sm btn-outline-secondary">
											<i class="fas fa-filter"></i>
										</button>
									</div>
									<table class="table">
										<tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Phone Number</th>
                      <th scope="col">Email</th>
					  <th scope="col">Match Type</th>
                      <th scope="col">Seat Type</th>
                      <th scope="col">Payment Method</th>
                      <th scope="col">Ticket Amount</th>
                      <th scope="col">Remark</th>
                      
                      <th scope="col">Completed</th>
										</tr>
                    <tr>
                    <?php 
    
                      while($row = mysqli_fetch_assoc($resultData)){
                          
                      ?>    

                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $row['phone'];?></td>
                          <td><?php echo $row['email'];?></td>
						  <td>
						<?php 
							$match = $row['match_type'];
							if($match == "M1"){
								echo "Vs Slime";
							  }elseif($match == "M2"){
								echo "Vs Team Liquid";
							  }elseif($match == "M3"){
								echo "Vs Apex";
							  }elseif($match == "M4"){
								echo "Vs CTRL Kick";
							  }else{
								echo "Error";
							  }
						 
						?>
						  </td>
                          <td>
                          <?php 
                            if($row['type'] == "1"){
                              echo "VIP Seat";
                            }else{
                              echo "Regular Seat";
                            }
                          ?>
                          </td>
                          <td>
                            <?php 
                              switch($row['payment']){
                                case "0":
                                  echo "Cash on Deli";break;
                                case "1":
                                  echo "Wave Pay";break;
                                case "2":
                                  echo "KBZ Pay";break;
                                case "3":
                                  echo "Take in";break;
                              };
                            ?>
                          </td>
                          <td><?php echo $row['ticket_number'];?></td>
                          <td><?php if($row['remarks'] !==""){
                            echo $row['remarks'];
                          }else{echo "No Comments";};?></td>
                          
                          <td>
						  	<form action="../config/ticket.delete.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $row['id']?>">
								<input class="btn btn-success" type="submit" name="submit" value="Complete">
							</form>
						  </td>
                      </tr>
                      <?php } ?>
									</table>
								</div>
							</div>
						</div>
					</div> <!-- Content Row 2 -->
					

				</div> <!-- Content -->

			</main> <!-- Main (Nav & Content) -->
			
		</div> <!-- Wrapper -->

		<footer class="text-center py-4 text-muted">
			&copy; Copyright 2023
		</footer>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
