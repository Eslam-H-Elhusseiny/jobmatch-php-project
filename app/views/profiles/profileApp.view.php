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
  <div class="nav">
    <?php loadPartial('navbar'); ?>
  </div>
  <!-- $userId = $_SESSION['user']['id']; -->
  
  <!-- Start top section -->
  <section class="profile-header">
    <div class="profile-img">
      <div id="profile-pic">
        <?php
        $id = $_GET['id'] ?? 0;

        $con = new mysqli("localhost", "root", "", "php_project", 3309);
        if ($con->connect_errno) {
          die("Connection failed!");
        }

        $sql = "SELECT profile_img FROM applicants WHERE id=$id";
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
      <h3 class="user-name">Brigh Mert</h3>
      <div class="address">
        <p id="city" class="city">New York,</p>
        <span id="country" class="country">USA.</span>
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
    <section class="left-side">
      <p class="mobile-no"><i class="fa fa-phone"></i> +234705569700</p>
      <p class="user-mail"><i class="fa fa-envelope"></i> Brighmertac80@gmail.com</p>

      <div class="user-bio">
        <?php
        $id = $_GET['id'] ?? 0;

        $con = new mysqli("localhost", "root", "", "php_project", 3309);
        if ($con->connect_errno) {
          die("Connection failed!");
        }

        $sql = "SELECT bio FROM applicants WHERE id=$id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          echo '<h3>Bio</h3>';
          echo '<p class="bio">Lorem ipsum dolor sit amet, hello how consectetur adipisicing elit. Sint consectetur provident magni yohoho consequuntur, voluptatibus ghdfff exercitationem at quis similique. Optio, amet!</p>';
          echo '</div>';
        } else {
          echo '<p>Type about yourself showcasing your personality, communication skills, and experience to impress employers and increas your chances of getting hired..</p>';
          echo '</div>';
          echo '<button class="biobtn font-awesome" id="chatBtn"><i class="fa fa-plus"></i> Add Bio</button>';
        }

        $con->close();
        ?>

        <form action="" enctype="multipart/form-data" method="POST">
          <?php
          $id = $_GET['id'] ?? 0;

          $con = new mysqli("localhost", "root", "", "php_project", 3309);
          if ($con->connect_errno) {
            die("Connection failed!");
          }

          $sql = "SELECT cv FROM applicants WHERE id=$id";
          $result = $con->query($sql);

          if ($result->num_rows > 0) {
            echo '<a href="path_to_cv_file.pdf"><button class="cvbtn font-awesome" id="Create-post"><i class="fa fa-file"></i> View CV</button></a>';
          } else {
            echo '<button type="button" class="cvbtn"><label for="cv-upload" class="font-awesome"><i class="fa fa-file-arrow-up"></i> Upload CV</label></button>';
            echo '<input type="file" id="cv-upload" name="cv-upload" style="display: none;">';
          }

          $con->close();
          ?>
      </div>
      </form>

      <!-- ====================================================================================================== -->
      <!-- <div class="user-bio">
        <p>Type about yourself showcasing your personality, communication skills, and experience to impress employers and increas your chances of getting hired..</p>
      </div>

      <form action="">
        <div class="profile-btn">
          <button class="biobtn" id="chatBtn"><i class="fa fa-plus"></i> Add Bio</button>
          <button type="file" class="cvbtn" id="Create-post"><i class="fa fa-file-arrow-up"></i> Upload CV</button>
        </div>
      </form> -->
      <!-- ====================================================================================================== -->
    </section>
    <!-- End left-side section -->

    <!-- start right-side section -->
    <section class="right-side">
      <div class="nav">
        <ul>
          <li onclick="tabs(0)" class="user-post active">Info</li>
          <li onclick="tabs(1)" class="user-review">Skills</li>
          <li onclick="tabs(2)" class="user-setting">Jobs</li>
        </ul>
      </div>

      <div class="profile-body">
        <div class="profile-info tab">
          <div class='info-section'>
            <h4 class="general-info">General Info</h4>
            <?php
            $conn = new mysqli("localhost", "root", "", "php_project", 3309);
            $sql = "SELECT bdate, country, city, experience, gender FROM applicants WHERE id = 1";
            $result = $conn->query($sql);
            $data = mysqli_fetch_assoc($result);

            // Store the data in variables
            $birth_date = $data['bdate'];
            $country = $data['country'] . ", " . $data['city'];
            $experience = $data['experience'];
            $gender = $data['gender'];

            // Calculate the age based on the birthdate
            $birth_date = new DateTime($birth_date);
            $today = new DateTime("now");
            $age = $birth_date->diff($today)->y;

            // Display the data in the HTML
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Age:</lable>";
            echo "<div class='info-content'>" . $age . " years</div>";
            echo "</div>";
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Location:</lable>";
            echo "<div class='info-content'>" . $country . "</div>";
            echo "</div>";
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Experience:</lable>";
            echo "<div class='info-content'>" . $experience . " years</div>";
            echo "</div>";
            echo "<div class='info-row'>";
            echo "<lable class='info-label'>Gender:</lable>";
            echo "<div class='info-content'>" . $gender . "</div>";
            echo "</div>";

            // Close the database connection
            mysqli_close($conn);
            ?>
            <br>
            <h4 class="general-info">Career Interests</h4>
            <p class="interests">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente pariatur accusantium et neque dicta incidunt quam ut, tempore illum. Dolor eum ipsam, eaque deserunt magnam labore nostrum aperiam repellendus veritatis.</p>
          </div>
        </div>

        <div class="profile-skills tab">
          <form action="index.php" method="post" class="skills-form">
            <label class="skills-lable" for="skills">Select Your Skills:</label>
            <select class="skills-select" name="skills[]" id="skills" multiple>
              <?php
                $conn = new mysqli("localhost", "root", "", "php_project", 3309);
                if ($conn->connect_errno) {
                  die("Connection failed!");
                }

                $sql = "SELECT * FROM skills";
                $skills = $conn->query($sql);

                foreach ($skills as $skill) {
                    echo "<option value='{$skill['id']}'>{$skill['name']}</option>";
                  }
                
                $conn->close();
              ?>
            </select>
            <button class="skills-button" type="submit" name="add_skills">Add Skills</button>
          </form>
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


  <!-- For CV and profile-pic -->
  <?php
    // Check if CV upload button is clicked
    if (isset($_FILES['cv-upload'])) {

      $file = $_FILES['cv-upload'];

      // Check for errors during file upload
      if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        $fileContent = file_get_contents($fileTmpName);

        $con = new mysqli("localhost", "root", "", "php_project", 3309);

        if ($con->connect_errno) {
          die("Connection failed!");
        }

        $id = $_GET['id'];
        $sql = "UPDATE applicants SET cv='$fileContent' WHERE id = '$id'";

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

        $id = $_GET['id'];
        $sql = "UPDATE applicants SET profile_img='$fileContent' WHERE id = '$id'";

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

  <!-- select tag for skills -->
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $conn = new mysqli("localhost", "root", "", "php_project", 3309);
    }
  
    $user_id = $_GET['id'] ?? 1;
    $skills = $_POST['skills'];

    $query_delete = "DELETE from app_skills where app_id = $user_id";
    $conn->query($query_delete);

    foreach ($skills as $skill) {
      $skill_id = intval($skill);
      $sql = "INSERT INTO app_skills (app_id, skill_id) VALUES ($user_id, $skill_id)";
      $conn->query($sql);
    }

    $conn->close();
  ?>

  <?php loadPartial('footer'); ?>
  <script src="/js/profile.js"></script>
</body>

</html>