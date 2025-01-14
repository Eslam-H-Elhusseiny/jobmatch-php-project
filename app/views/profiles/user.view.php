<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="/css/general.css?<?php echo time(); ?>" />
  <link rel="stylesheet" href="/css/about.css?<?php echo time(); ?>" />
  <link rel="stylesheet" href="/css/profile.css?<?php echo time(); ?>" />
  <title>JobMatch | Profile</title>

</head>

<body class="">
  <div class="nav">
    <?php loadPartial('navbar'); ?>
  </div>
  <!-- $userId = $_SESSION['user']['id']; -->
  
  <!-- Start top section -->
  <section class="profile-header container">
    <div class="profile-img">
      <div id="profile-pic">



        <?php if (isset($user['profile_img'])) : ?>

          <img src="$result" alt="Profile Picture">

        <?php else : ?>

          <label for="profile-pic-upload" class="add-pic-text font-awesome">
            <i class="fa-solid fa-camera"></i>
            Add profile pic
          </label>
          <input type="file" id="profile-pic-upload" name="profile-pic-upload" style="display: none;">

        <?php endif; ?>
      </div>
    </div>

    <div class="profile-nav-info">
      <h3 class="user-name">
        <?= ucfirst($user['fname']) .' '. ucfirst($user['lname']) ?>
      </h3>
      <div class="address">
        <p id="city" class="city"><?= ucfirst($user['city']) ?>,</p>
        <span id="country" class="country"> <?= ucfirst($user['country']) ?></span>
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

  <main class="main-body container">
    <!-- Start left-side section -->
    <section class="left-side">
      <p class="mobile-no"><i class="fa fa-phone"></i> <?= $user['phone_num'] ?></p>
      <p class="user-mail"><i class="fa fa-envelope"></i> <?= $user['email'] ?></p>

      <div class="user-bio">
        <h3>Bio</h3>

        <?php if (isset($user['bio'])) : ?>

          <p class="bio"><?= $user['bio'] ?></p>
      </div>

        <?php else : ?>

          <p>Type about yourself showcasing your personality, communication skills, and experience to impress employers and increas your chances of getting hired..</p>
        
      </div>
          <button class="biobtn font-awesome" id="chatBtn"><i class="fa fa-plus"></i> Add Bio</button>

        <?php endif; ?>

        <form action="" enctype="multipart/form-data" method="POST">

          <?php if (isset($user['cv'])) : ?>
          
            <a href="path_to_cv_file.pdf"><button class="cvbtn font-awesome" id="Create-post"><i class="fa fa-file"></i> View CV</button></a>

          <?php else : ?>

            <button type="button" class="cvbtn"><label for="cv-upload" class="font-awesome"><i class="fa fa-file-arrow-up"></i> Upload CV</label></button>
            <input type="file" id="cv-upload" name="cv-upload" style="display: none;">

          <?php endif; ?>

      </div>
      </form>

    </section>
    <!-- End left-side section -->

    <!-- start right-side section -->
    <section class="right-side">
      <div class="nav-profile">
        <ul>
          <li onclick="tabs(0)" class="t user-post active">Info</li>
          <li onclick="tabs(1)" class="t user-review">Skills</li>
          <li onclick="tabs(2)" class="t user-setting">Jobs</li>
        </ul>
      </div>

      <div class="profile-body">
        <div class="profile-info tab">
          <div class='info-section'>
            <h4 class="general-info">General Info</h4>

            <div class='info-row'>
              <lable class='info-label'>Age:</lable>
              <div class='info-content'>
                <?= $calcAge($user['bdate']); ?> years old.
              </div>
            </div>

            <div class='info-row'>
              <lable class='info-label'>Location:</lable>
              <div class='info-content'><?= $user['country'] ?>.</div>
            </div>

            <div class='info-row'>
              <lable class='info-label'>Experience:</lable>
              <div class='info-content'><?= $user['experience'] ?> Years.</div>
            </div>

            <div class='info-row'>
              <lable class='info-label'>Gender:</lable>
              <div class='info-content'><?= ucfirst($user['gender']) ?></div>
            </div>


            <br>
            <h4 class="general-info">Career Interests</h4>
            <p class="interests">
              <?= $user['bio'] ?>
            </p>
          </div>
        </div>

        <div class="profile-skills tab">
          <form action="index.php" method="post" class="skills-form">
            <label class="skills-lable" for="skills">Select Your Skills:</label>
            <select class="skills-select" name="skills[]" id="skills" multiple>

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



  <?php loadPartial('footer'); ?>
  <script src="/js/profile.js?<?php echo time(); ?>"></script>
</body>

</html>