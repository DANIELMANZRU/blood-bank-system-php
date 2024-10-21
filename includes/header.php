<?php
// Initiate the user session
session_start();

// Additional session-related operations can be included here if needed
// Examples:
// $_SESSION['user_identifier'] = null;
// $_SESSION['user_alias'] = '';
// $_SESSION['session_initiation_time'] = time();
?>

<!-- page-header -->
<header>
    <!-- top-section -->
    <div class="top-section py-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 top-social-media">
                    <div class="row">
                        <!-- social-links -->
                        <ul class="col-lg-4 col-6 top-info-list text-center">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="mx-3">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                            <li class="ml-3">
                                <a href="#">
                                    <i class="fab fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>
<?php 
$page_type = "contact_page";
$query_string = "SELECT * from contact_info_table";
$stmt = $pdo->prepare($query_string);
$stmt->execute();
$contact_data = $stmt->fetchAll(PDO::FETCH_OBJ);
$row_count = 1;
if($stmt->rowCount() > 0)
{
foreach($contact_data as $contact_item)
{ ?>
                        <!-- //social-links -->
                        <div class="col-6 header-top-info pl-3 text-lg-left text-center">
                            <p class="text-white">
                                <i class="fas fa-map-marker-alt mr-2"></i><?php echo $contact_item->Location; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 top-social-media text-lg-right text-center">
                    <div class="row">
                        <div class="col-lg-7 col-6 top-contact-info">
                            <p class="text-white">
                                <i class="far fa-envelope-open mr-2"></i>
                                <a href="mailto:contact@example.com" class="text-white"><?php echo $contact_item->Email; ?></a>
                            </p>
                        </div>
                        <div class="col-lg-5 col-6 header-contact pl-4 text-lg-left">
                            <p class="text-white">
                                <i class="fas fa-phone mr-2"></i>+<?php echo $contact_item->Phone; ?></p>
                        </div>
                    </div><?php } } ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- //page-header -->

<!-- navigation-bar -->
<div id="main-content">
    <!-- menu -->
    <div class="main-menu py-1">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top-nav">
            <div class="container">
                <!-- logo -->
                <h1>
                    <a class="navbar-brand font-weight-bold font-italic" href="home.php">
                        <span>Blood</span>Bank
                        <i class="fas fa-tint"></i>
                    </a>
                </h1>
                <!-- //logo -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarContent">
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item active mt-lg-0 mt-3">
                            <a class="nav-link" href="home.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="about-us.php">About Us</a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="contact-us.php">Contact Us</a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="donor-directory.php">Donor Directory</a>
                        </li>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="find-donor.php">Find Donor</a>
                        </li>
                        <?php if (strlen($_SESSION['user_id']!=0)) {?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                User Account
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="user-profile.php">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="update-password.php">Update Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="donation-requests.php">Donation Requests</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="user-logout.php">Logout</a>
                            </div>
                        </li>
                        <?php } ?>
                        <?php if (strlen($_SESSION['user_id']==0)) {?>
                        <li class="nav-item mx-lg-4 my-lg-0 my-3">
                            <a class="nav-link" href="admin/admin-login.php">Admin</a>
                        </li>
                    </ul>
                    <!-- login-button -->
                    <a href="user-login.php" class="login-link ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" >
                        <i class="fas fa-sign-in-alt mr-2"></i>Login</a><?php } ?>
                    <!-- //login-button -->
                </div>
            </div>
        </nav>
    </div>
    <!-- //menu -->
    <!-- modal -->

    <!-- registration -->
    <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-2">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login px-4 mx-auto mw-100">
                        <h5 class="text-center mb-4">Register Now</h5>
                        <form action="#" method="post"  name="registration" onsubmit="return validatePassword();">
                            <div class="form-group">
                                <label>Full Name</label>
                                 <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" name="mobile_number" id="mobile_number" required="true" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+">
                            </div>
                            
                            <div class="form-group">
                                <label class="mb-2">Email Address</label>
                                <input type="email" name="email_address" class="form-control" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Age</label>
                                <input type="text" class="form-control" name="user_age" id="user_age" placeholder="Age" required="">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Gender</label>
                                <select name="user_gender" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Blood Group</label>
                                <select name="blood_group" class="form-control" required>
<?php $query_string = "SELECT * from blood_groups ";
$stmt = $pdo->prepare($query_string);
$stmt->execute();
$blood_groups = $stmt->fetchAll(PDO::FETCH_OBJ);
$row_count = 1;
if($stmt->rowCount() > 0)
{
foreach($blood_groups as $group)
{               ?>  
<option value="<?php echo htmlentities($group->BloodGroup);?>"><?php echo htmlentities($group->BloodGroup);?></option>
<?php }} ?>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="user_address" id="user_address" required="true" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" name="user_message" required> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="user_password" id="user_password" required="">
                            </div>
                           
                            <button type="submit" class="btn btn-primary submit mb-4" name="register">Register</button>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //registration -->
    <!-- //modal -->
</div>
<!-- //navigation-bar -->