<?php
// Disable error display for production
ini_set('display_errors', 0);

// Load configuration settings
include_once('includes/config_settings.php');

// Set up database connection
$databaseLink = initializeDatabaseLink();

// Retrieve donor records
$donorRecords = fetchDonorRecords($databaseLink);

// Terminate database connection
terminateDatabaseLink($databaseLink);
?>
ini_set('display_errors', 0);
require('includes/app_config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Blood Donation Management System | Donor Directory</title>
	<!-- Meta information -->
	
	<script>
		window.onload = function() {
			setTimeout(adjustViewport, 0);
		};

		function adjustViewport() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta information end -->

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Core Bootstrap CSS -->
	<link rel="stylesheet" href="css/custom-styles.css" type="text/css" media="all" />
	<!-- Custom Styles -->
	<link rel="stylesheet" href="css/font-awesome-all.min.css">
	<!-- Font Awesome Icons -->
	<!-- Stylesheets end -->

	<!-- Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet">
	<!-- Web Fonts end -->

</head>

<body>
	<?php include('includes/header_nav.php');?>

	<!-- Hero section -->
	<div class="hero-banner">
		<div class="container">

		</div>
	</div>
	<!-- Hero section end -->

	<!-- Breadcrumb -->
	<div class="breadcrumb-container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Donor Directory</li>
			</ol>
		</nav>
	</div>
	<!-- Breadcrumb end -->

	<!-- Main content -->
	<main class="donor-list-section py-5">
		<div class="py-xl-5 py-lg-3">
			
			<div class="section-title text-center mb-5">
				<h2 class="main-heading">Donor Directory</h2>
				<span>
					<i class="fas fa-heartbeat"></i>
				</span>
				<p class="mt-2">Heroes ready to save lives</p>
			</div>
			<div class="d-flex">
				
				<div class="row donor-grid mt-5" style="padding-left: 50px;">
				<?php
				
$activeStatus = 1;
 

$sqlQuery = "SELECT * FROM blood_donors WHERE donor_status = :status";
$statementHandler = $dbConnection->prepare($sqlQuery);
$statementHandler->bindParam(':status', $activeStatus, PDO::PARAM_INT);
$statementHandler->execute();
$donorList = $statementHandler->fetchAll(PDO::FETCH_OBJ);
$donorCount = 1;
if($statementHandler->rowCount() > 0)
{
foreach($donorList as $donorInfo)
{ ?>
				<div class="col-md-4 donor-card">
					
					<div class="donor-photo">
					
							<img src="images/donor-avatar.jpg" alt="Donor Photo" style="border:1px #000 solid" class="img-fluid" />
				
						<h3><?php echo htmlspecialchars($donorInfo->FullName);?>
						</h3>
					</div>
					<div class="donor-details p-4">


<table class="table table-bordered">

	<tbody>
	  <tr>
		<th>Gender</th>
		<td><?php echo htmlspecialchars($donorInfo->Gender);?></td>
	  </tr>
	  <tr>
		<td>Blood Group</td>
		<td><?php echo htmlspecialchars($donorInfo->BloodGroup);?></td>
	  </tr>
	  <tr>
		<td>Contact Number</td>
		<td><?php echo htmlspecialchars($donorInfo->MobileNumber);?></td>
	  </tr>

		 <tr>
		<td>Email Address</td>
		<td><?php echo htmlspecialchars($donorInfo->EmailId);?></td>
	  </tr>

			   <tr>
		<td>Age</td>
		<td><?php echo htmlspecialchars($donorInfo->Age);?></td>
	  </tr>

		<tr>
		<td>Location</td>
		<td><?php echo htmlspecialchars($donorInfo->Address);?></td>
	  </tr>

<tr>
		<td>Additional Info</td>
		<td><?php echo htmlspecialchars($donorInfo->Message);?></td>
	  </tr>

	</tbody>
</table>
<a class="btn btn-primary" style="color:#fff"  href="contact-donor.php?donor_id=<?php echo $donorInfo->id;?>">Contact Donor</a>
					</div>
				</div><br>
			<?php }} ?>
			
			
			</div>
			</div>
		</div>
	</main>
	<!-- Main content end -->

	


	<?php include('includes/footer_content.php');?>

	<!-- Scripts -->
	<!-- jQuery -->
	<script src="js/jquery-3.5.1.min.js"></script>
	<!-- Core JavaScript -->

	<!-- Slider plugin -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#hero-slider").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event triggered.</li>");
				},
				after: function () {
					$('.events').append("<li>after event triggered.</li>");
				}
			});
		});
	</script>
	<!-- Slider plugin end -->

	<!-- Navigation script -->
	<script src="js/fixed-navigation.js"></script>
	<!-- Navigation script end -->

	<!-- Smooth scroll -->
	<script src="js/smooth-scroll.min.js"></script>
	<!-- Back to top -->
	<script src="js/back-to-top.js"></script>
	<!-- Animation -->
	<script src="js/animate.js"></script>
	<!-- Custom scripts -->
	<script src="js/custom.js"></script>

	<script src="js/bootstrap.min.js"></script>
	<!-- Bootstrap core JavaScript -->

	<!-- Scripts end -->

</body>

</html>