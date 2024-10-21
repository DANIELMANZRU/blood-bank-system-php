<footer>
    <div class="footer-content py-xl-5 py-lg-3">
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-info">
            <h2 class="mb-sm-3 mb-2">
              <a href="home.php" class="text-white font-weight-bold">
                <span>Vital Fluid </span>Management Portal 
                <i class="fas fa-tint ml-2"></i>
              </a>
            </h2>
            <p>The Vital Fluid Management Portal is a comprehensive software solution designed to optimize the operations of blood donation centers. This system facilitates the efficient management of blood inventories, donor information, and transfusion records. It offers instant access to current blood stock levels, enabling staff to swiftly locate and distribute vital blood components to patients in need. The portal also incorporates features for managing donor data, including personal details, medical histories, and donation records. This information is crucial for maintaining a safe and reliable blood supply. By implementing the Vital Fluid Management Portal, blood centers can enhance their operational efficiency, improve resource allocation, and ultimately contribute to saving more lives.</p>
          </div>
          <div class="col-md-4 footer-contact my-md-0 my-4">
            <h3 class="mb-sm-3 mb-2 text-white">Location <br> - <span> Nairobi</span>, Kenya </br> </h3>
            <ul class="list-unstyled">
              <?php 
$infoType = "contactDetails";
$query = "SELECT * FROM contact_information";
$stmt = $connection->prepare($query);
$stmt->bindParam(':infoType', $infoType, PDO::PARAM_STR);
$stmt->execute();
$contactInfo = $stmt->fetchAll(PDO::FETCH_OBJ);
$infoCount = 1;
if($stmt->rowCount() > 0)
{
foreach($contactInfo as $info)
{ ?>
              <li>
                <i class="fas fa-map-marker-alt float-left"></i>
                <p class="ml-4">
                  <span><?php echo $info->LocationAddress; ?>. </p>
                <div class="clearfix"></div>
              </li>
              <li class="my-3">
                <i class="fas fa-mobile-alt float-left"></i>
                <p class="ml-4"><?php echo $info->PhoneNumber; ?></p>
                <div class="clearfix"></div>
              </li>
              <li>
                <i class="far fa-envelope float-left"></i>
                <a href="mailto:contact@example.com" class="ml-3"><?php echo $info->EmailAddress; ?></a>
                <div class="clearfix"></div>
              </li>
            <?php } } ?></ul>
          </div>
          <div class="col-md-4 footer-links">
            <h3 class="mb-sm-3 mb-2 text-white">Site Navigation</h3>
            <div class="nav-footer">
              <ul class="list-unstyled">
                <li>
                  <a href="home.php">Homepage</a>
                </li>
                <li class="mt-2">
                  <a href="our-story.php">Our Story</a>
                </li>
                <li class="mt-2">
                  <a href="get-in-touch.php">Get in Touch</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="border-top mt-5 pt-lg-4 pt-3 pb-lg-0 pb-3 text-center">
          <p class="copyright mt-lg-1">© Vital Fluid Management Portal - All rights reserved
          </p>
        </div>
      </div>
    </div>
</footer>
  </footer>
  <!-- //footer -->