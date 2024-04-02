<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/css/profile.css?<?php echo time(); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <!-- Start top section -->
  <section class="profile-header">
    <div class="profile-img">
      <div id="profile-pic">
        <?php 
        $org_id = $_SESSION['organization']['id'];
        $org_name = $_SESSION['organization']['org_name'];
        $org_industry = $_SESSION['organization']['industry'];
        $org_email = $_SESSION['organization']['email'];
        $org_desc = $_SESSION['organization']['description'];
        // $org_country = $_SESSION['organization']['country'];
        // $org_city = $_SESSION['organization']['city'];
        // $org_founded = $_SESSION['organization']['founded'];
        // $org_website = $_SESSION['organization']['website'];
        // $org_linkedin = $_SESSION['organization']['linkedin'];

        $con = new mysqli("localhost", "root", "", "php_project", 3309);
        if ($con->connect_errno) {
          die("Connection failed!");
        }

        $sql = "SELECT profile_img FROM organizations WHERE id=$org_id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          echo '<img src="$result" alt="Profile Picture">';    //src="' . $row["profile_img"] . '"
        } else {
          echo '<label for="profile-pic-upload" class="add-pic-text font-awesome"><i class="fa-solid fa-camera"></i>Add profile pic</label>';
          echo '<input type="file" id="profile-pic-upload" name="profile-pic-upload" style="display: none;">';
        }

        $con->close();
        ?>
      </div>
    </div>

    <div class="profile-nav-info">
      <h3 class="user-name"><?= $org_name ?></h3>
      <div class="address">
        <p id="city" class="city"><?= $org_industry ?></p>
        <!-- <span id="country" class="country">USA.</span> -->
      </div>
    </div>

    <div class="profile-option">
      <div class="notification">
        <i class="fa fa-bell"></i>
        <span class="alert-message">3</span>
      </div>
    </div>
  </section>
  <!-- End top section -->

  <main class="main-body">
    <!-- Start left-side section -->
    <section class="profile-side">
      <p class="user-mail"><i class="fa fa-envelope"></i> <?= $org_email ?></p>

      <div class="user-bio">
        <?php
        $org_id = $_SESSION['organization']['id'];

        $con = new mysqli("localhost", "root", "", "php_project", 3309);
        if ($con->connect_errno) {
          die("Connection failed!");
        }

        $sql = "SELECT description FROM organizations WHERE id=$org_id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          echo '<h3>Bio</h3>';
          echo '<p class="bio">We help people improve their English language skills by providing high quality language instruction in an environment where everyone is respected, actively engaged in learning and oriented to achieving success. In our Academy , Attention to details is what differentiates mediocre from magnificent. We relentlessly pursue excellence from our team members and our students. We are committed to life-long learning as we provide opportunity for growth in a professional, motivational, and caring environment.</p>';
          echo '</div>';
        } else {
          echo '<p>Write your descriptions to ensure accuracy and clarity and to make it easier for the applicant to know the company’s system, priorities and goals.</p>';
          echo '</div>';
          echo '<button class="biobtn font-awesome" id="chatBtn"><i class="fa fa-plus"></i> Add Bio</button>';
        }

        $con->close();
        ?>

    </section>
    <!-- End left-side section -->

    <!-- start right-side section -->
    <section class="right-side">
      <div class="nav">
        <ul>
          <li onclick="tabs(0)" class="user-post active">Info</li>
          <li onclick="tabs(1)" class="user-setting">Jobs</li>
        </ul>
      </div>

      <div class="profile-body">
        <div class="profile-info tab">
          <div class='info-section'>
            <h4 class="general-info">General Info</h4>
            <?php
            $org_id = $_SESSION['organization']['id'];
            $conn = new mysqli("localhost", "root", "", "php_project", 3309);
            $sql = "SELECT country, city, founded, website, linkedin FROM organizations WHERE id = $org_id";
            $result = $conn->query($sql);
            $data = mysqli_fetch_assoc($result);

            // Store the data in variables
            $country = $data['country'] . ", " . $data['city'];
            $founded = $data['founded'];
            $website = $data['website'];
            $linkedin = $data['linkedin'];

            // Display the data in the HTML
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Location:</lable>";
            echo "<div class='info-content'>" . $country . "</div>";
            echo "</div>";
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Founded:</lable>";
            echo "<div class='info-content'>" . $founded . " </div>";
            echo "</div>";
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Website:</lable>";
            echo "<div class='info-content'>" . $website . " </div>";
            echo "</div>";
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Linkedin:</lable>";
            echo "<div class='info-content'>" . $linkedin . "</div>";
            echo "</div>";

            mysqli_close($conn);
            ?>
            <br><h4 class="general-info">Career Interests</h4>
            <p class="interests">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente pariatur accusantium et neque dicta incidunt quam ut, tempore illum. Dolor eum ipsam, eaque deserunt magnam labore nostrum aperiam repellendus veritatis.</p>
          </div>
        </div>

        <div class="profile-jobs tab">
          <h1>Jobs</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit omnis eaque, expedita nostrum, facere libero provident laudantium. Quis, hic doloribus! Laboriosam nemo tempora praesentium. Culpa quo velit omnis, debitis maxime, sequi
            animi dolores commodi odio placeat, magnam, cupiditate facilis impedit veniam? Soluta aliquam excepturi illum natus adipisci ipsum quo, voluptatem, nemo, commodi, molestiae doloribus magni et. Cum, saepe enim quam voluptatum vel debitis
            nihil, recusandae, omnis officiis tenetur, ullam rerum.</p>
        </div>
      </div>
    </section>
  </main>


  <!-- For profile-pic -->
  <?php
    // Check if profile picture upload button is clicked
    if (isset($_FILES['profile-pic-upload'])) {
      // File upload handling for profile picture
      $file = $_FILES['profile-pic-upload'];

      // Check for errors during file upload
      if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        $fileContent = file_get_contents($fileTmpName);

        $con = new mysqli("localhost", "root", "", "php_project", 3309);

        if ($con->connect_errno) {
          die("Connection failed!");
        }

        $org_id = $_GET['id'];
        $sql = "UPDATE oranizations SET profile_img='$fileContent' WHERE id = '$org_id'";

        $result = $con->query($sql);

        if ($result) {
          echo "CV successfully uploaded!";
        } else {
          echo "CV upload failed: " . $con->error;
        }

        $con->close();
      } else {
        echo 'CV file upload error: ' . $file['error'];
      }
    }

  ?>


  <script src="/js/profile.js"></script>
</body>

</html>