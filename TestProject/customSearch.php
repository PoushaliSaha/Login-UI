<html>
<head>
<!-- Required links and scripts -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- Custom CSS & JS -->
<link rel="stylesheet" href="CSS/index.css" />
<script type="text/javascript">
function goBackPage() {
    window.history.back();
}
</script>

</head>
<body style="background: #d9d9d9" data-ng-app="myApp">
	<nav id="main-nav" class="navbar-custom">
		<div class="container">
			<div class="navbar-header page-scroll">
				<a class="navbar-brand" href="index.html"> <img
					src="Images/sign.png" alt="Avatar"
					style="height: 43px; float: left; width: 53px; margin-top: -10px;"
					class="avatar"> &nbsp;&nbsp;LOGO
				</a>

			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
				</ul>
			</div>
		</div>
	</nav>
	<header></header>
	<div class="showAll-div">
		<div id="selectData" class="custom-css addShadow">
			<div class="container">
				<div class="row">
					<div class="col-lg-10"></div>
					<div class="col-lg-2 adjustPos">

						<button onclick="goBackPage()" class="btn btn-default greenBtn"
							style="padding: 10px 20px; font-size: 19px; margin-bottom: 25px;">
							&nbsp;Back&nbsp;</button>

					</div>
				</div>				
				
				
				<?php
				include 'connect.php';
				
				$title = $_POST ["searchName"];
				
				if ($title != '' || $title != null) {
					if (! $conn) {
						die ( "Connection failed: " . mysqli_connect_error () );
					} else {
						$dbselect_sql = "use mytestDB";
						if (mysqli_query ( $conn, $dbselect_sql )) {
							$selectAll_sql = "SELECT * FROM patient_info where fullname like '%$title%'";
							$result = mysqli_query ( $conn, $selectAll_sql );
							if ($result) {
								
								if (mysqli_num_rows ( $result ) > 0) {
									echo '<div class="row showAllTable">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th class="toUpperCase">Patient Id</th>
															<th class="toUpperCase">Fullname</th>
															<th class="toUpperCase">Age</th>
															<th class="toUpperCase">Gender</th>
															<th class="toUpperCase">Dob</th>
															<th class="toUpperCase">Phone No</th>
															<th class="toUpperCase">Additional Description</th>
														</tr>
													</thead>
													<tbody>';
									while ( $row = mysqli_fetch_assoc ( $result ) ) {
										
										echo "<tr class='toCapitalize'><td>" . $row ["id"] . "</td><td>" . $row ["fullname"] . "</td><td>" . $row ["age"] . "</td><td>" . $row ["gender"] . "</td><td>" . $row ["dob"] . "</td><td>" . $row ["mob"] . "</td><td>" . $row ["add_desc"] . "</tr>";
									}
									echo "</tbody>
									</table>
								</div>
							</div>";
								} else {
									echo "<hr/><h2 class='text-center'>Oops!! No record matched with patient name : '".$title."'!!</h2></div>";
								}
							} else {
							}
						} else {
							?>
								<p>Error while connecting to the database!!!</p>
								<?php
						}
					}
				}
				?>
				    
	</div>
		</div>
	</div>
	<footer class="text-center" id="footer">
		<div class="footer-below">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						Copyright <i class="fa fa-copyright" aria-hidden="true"></i> <span
							class="year"></span>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
