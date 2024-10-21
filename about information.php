<?php
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="zxx">

/**
 * This section of the HTML code represents the header and styling of the web page. It includes the following:
 * - The page title "Blood Donation Management System | About Our Organization"
 * - Meta tags for keywords and viewport
 * - A script that scrolls the page to the top on load
 * - Stylesheets for Bootstrap, the main CSS, and Font Awesome icons
 * - Web font imports for Lato and Montserrat
 */
<head>
	<title>Hematology Donation Management Platform | About Our Institution</title>
	<!-- Metadata Keywords -->
	
	<script>
		// Automatically scroll to page top on load
		window.onload = function() {
			setTimeout(function() {
				window.scrollTo({
					top: 0,
					behavior: 'smooth'
				});
			}, 10);
		};
	</script>
	<!-- End of Metadata Keywords -->

	<!-- CSS Files -->
	<link rel="stylesheet" href="styles/bootstrap-core.css">
	<!-- Bootstrap Framework CSS -->
	<link rel="stylesheet" href="styles/primary.css" type="text/css" media="all">
	<!-- Primary Styles -->
	<link rel="stylesheet" href="styles/icons.css">
	<!-- Icon Library -->
	<!-- End of CSS Files -->

	<!-- Typography -->
	<!-- Open Sans font for body text -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<!-- Roboto font for headings -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<!-- End of Typography -->

</head>

<body>
	<?php include('includes/header.php');?>

	<!-- banner 2 -->
	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- page details -->
	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">About Us</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- about -->
	<section class="about py-5">
		<div class="container py-xl-5 py-lg-3">
			<?php 
$pagetype="aboutus";
$sql = "SELECT type,detail,PageName from tblpages where type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype',$pagetype,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
			<div class="w3ls-titles text-center mb-md-5 mb-4">
				<h3 class="title"><?php   echo htmlentities($result->PageName); ?></h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
			</div>
			<p class="aboutpara text-center mx-auto"><?php  echo $result->detail; ?>.</p>
<?php } } ?>
			
		</div>
	</section>
	<!-- //about -->



	<?php include('includes/footer.php');?>


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- banner slider -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- //banner slider -->

	<!-- fixed navigation -->
	<script src="js/fixed-nav.js"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/medic.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>