<?php loadPartial('head'); ?>

<!-- HTML -->

<body>
  <div class="nav">
    <?php loadPartial('navbar'); ?>
  </div>

  <!-- Job Details -->
  <main>
    
    <!-- Job Header -->
    <section class="header">
      <div class="container job-header">
        <div class="job-details">
        <div class="company-logo">
                <a href="/jobs/<?= $jobs->id?>">
                  <img
                    width="90"
                    src="https://apusthemes.com/wp-demo/superio/wp-content/uploads/2021/03/y9.jpg"
                    alt="Company Logo"
                  />
                </a>
              </div>
              <div class="job-content">
                <div class="title-wrapper">
                  <h3 class="job-title">
                    <a href="/jobs/<?= $jobs->id?>"><?= $jobs->title ?></a>
                  </h3>
                  <span class="featured">Featured</span>

                  <span class="filled">Filled</span>
                </div>
                <div class="job-metas">
                  <div class="category-job">
                    <div class="job-category">
                      <i class="fa fa-briefcase breif"></i>
                      <a href="">Design</a>,

                      <a href="">Development</a>
                    </div>
                  </div>
                  <div class="job-location">
                    <i class="fa fa-map-location-dot"></i>
                    <a href="/jobs/search?keywords=<?= $jobs->location ?>"><?= $jobs->location ?></a>
                  </div>
                  <div class="job-salary">
                    <i class="fa fa-money-bills"></i>
                    <span class="suffix">Experience ~ <?= $jobs->job_exp?> Years</span>

                  </div>
                </div>
                <div class="job-metas-bottom">
                  <div class="">
                    <a class="job-type tag" href="/jobs/search?keywords=<?= $jobs->job_type ?>">
                      <?= ucwords($jobs->job_type,'-') ?>
                    </a>
                  </div>
                  <span class="urgent tag"><?= ucfirst($jobs->job_model) ?></span>
                </div>
          </div>
        </div>
        <div class="right">
          <span class="expire">Application ends: <span class="date">May 19, 2026</span></span>
          <form action="">
            <button class="btn-apply">Apply Now</button>
          </form>
        </div>
      </div>

    </section>

    <!-- Job Details -->

    <section>
      <div class="container">
        <div class="all-jobs">
          <div class="job-flex">
            <h3>Job Description:</h3>
            <p>
              <?= $jobs->description ?>
            </p>
            <h3>Key Responsibilities</h3>
            <p>
              <?= $jobs->key_res ?>
            </p>
          </div>
          <aside class="single-job-aside">
            <div class="job-location">
              <i class="fa fa-map-location-dot"></i>
              <a href="/jobs/search?keywords=<?= $jobs->location ?>">Location: <?= $jobs->location ?></a>
            </div>

            <div class="job-category">
              <i class="fa fa-briefcase breif"></i>
              <a href="">Design</a>,
              <a href="">Development</a>
            </div>

            <div class="job-salary">
              <i class="fa fa-money-bills"></i>
              <span class="suffix">Experience ~ <?= $jobs->job_exp?> Years</span>
            </div>


            <div class="job-category">
              <span class="suffix">Job Model: <?= ucfirst($jobs->job_model) ?></span>
            </div>

            <div class="job-category">
              <span> Job Type: 
                <?= ucwords($jobs->job_type,'-') ?>
              </span>
            </div>

          </aside>
        </div>
      </div>
    </section>
<?php loadPartial('footer'); ?>
