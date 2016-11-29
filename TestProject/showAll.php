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

<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<!-- Custom CSS & JS -->
<link rel="stylesheet" href="CSS/index.css" />
<script type="text/javascript">
$(document).ready(function(){
	$('#searchForm').submit(function() {
	    if (($("#searchName").val().trim()) === "") {
	        	alert('Please enter the name!!!');
	        return false;
	    }
});

$('li#back-btn').click(function(){
	window.history.back();
});
    
});
</script>

</head>
<body style="background: #d9d9d9">
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
					<li id="back-btn" class=""><a href="#"> Back</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<header></header>
	<div class="showAll-div">
		<div id="selectData" class="custom-css addShadow">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<h2 class="toUpperCase">Patient Details</h2>
					</div>
					<div class="col-lg-6 adjustPos">
						<form method="post" action="customSearch.php" id="searchForm">
							<div class="form-group">
								<input type="text" id="searchName" name="searchName"
									placeholder="Search by a patient name"
									style="line-height: 33px; margin-top: 0; padding: 1px; width: 77%; overflow: hidden;"
									required />
								<button class="btn btn-default greenBtn" style="padding: 12px;">
									<img src="Images/search.png" style="height: 25px;">&nbsp;Search
								</button>
							</div>
						</form>
					</div>
				</div>
				<hr />
		<?php
		include 'connect.php';
		
		if (! $conn) {
			// die ( "Connection failed: " . mysqli_connect_error () );
			?>
		<p>Opps!! Something went wrong while connecting to the database!!!</p>
		<?php
		} else {
			$dbselect_sql = "use mytestDB";
			if (mysqli_query ( $conn, $dbselect_sql )) {
				$selectAll_sql = "select * from patient_info";
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
							
							echo "<tr class='toCapitalize' ><td>" . $row ["id"] . "</td><td>" . $row ["fullname"] . "</td><td>" . $row ["age"] . "</td><td>" . $row ["gender"] . "</td><td>" . $row ["dob"] . "</td><td>" . $row ["mob"] . "</td><td>" . $row ["add_desc"] . "</tr>";
						}
						echo '	    </tbody>
						</table>
					</div>
				</div>';
					} else {
						echo "<h2><i class='fa fa-exclamation-circle fa-lg' aria-hidden='true'></i> &nbsp; Either there is no patient record or There must be some error while conneting to the database !!</h2><p> Please try again after sometime or you may add some patient details !!";
					}
				} else {
				}
			} else {
				?>
								
								<?php
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
