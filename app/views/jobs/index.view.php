<?php loadPartial('head'); ?>

<!-- HTML -->

<body>
  <div class="nav">
    <?php loadPartial('navbar'); ?>
  </div>

  <main>
    <section class="search-section">
      <div class="search-jobslist">
        <form action="/jobs/search" method="get" class="search-bar">
          <input
            class="search-input"
            type="text"
            placeholder="Search jobs, companies and more.."
          />
          <button href="#" class="search-icon">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
    </section>

    <!-- JOBS -->
    <section class="">
      <div class="section-heading-wrapper">
        <h2 class="section-heading">Find The Right Job</h2>
      </div>
      <div class="container all-jobs">
        <aside>
          <h2>Filters</h2>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci,
            maxime?
          </p>
          <input type="text" />
          <input type="text" />
          <input type="text" />
          <input type="text" />
          <select name="" id="">
            <option value="">filter</option>
            <option value="">filter</option>
            <option value="">filter</option>
            <option value="">filter</option>
            <option value="">filter</option>
          </select>
          <input type="checkbox" />
          <input type="checkbox" />
          <input type="checkbox" />
          <input type="checkbox" />
        </aside>
        <div class="job-flex">
          <?php foreach ($jobs as $job) : ?>
            <div class="job-card">
              <a href="" class="btn-bookmark">
                <i class="fa fa-bookmark"></i>
              </a>
              <div class="company-logo">
                <a href="">
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
                    <a href=""><?= $job->title ?></a>
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
                    <a href="">New York</a>
                  </div>
                  <div class="job-salary">
                    <i class="fa fa-money-bills"></i>
                    <span class="suffix">$</span
                    ><span class="price-text">150</span> -
                    <span class="suffix">$</span
                    ><span class="price-text">180</span> / week
                  </div>
                </div>
                <div class="job-metas-bottom">
                  <div class="">
                    <a class="job-type tag" href="">
                      <?= ucwords($job->job_type,'-') ?>
                    </a>
                  </div>
                  <span class="urgent tag">Urgent</span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

<?php loadPartial('footer'); ?>

