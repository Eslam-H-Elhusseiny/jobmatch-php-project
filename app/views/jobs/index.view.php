<?php loadPartial('head'); ?>

<!-- HTML -->

<body>
  <div class="nav">
    <?php loadPartial('navbar'); ?>
  </div>

  <main>
    <section class="search-section">
      <div class="search-jobslist">
        <form action="/jobs/search" method="GET" class="search-bar">
          <input
            class="search-input"
            type="text"
            name="keywords"
            placeholder="Search jobs, companies and more.."
          />
          <button class="search-icon">
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
          <form action="/jobs/search" method="GET" class="">
            <div class="filter_search">
              <label for="location">Locations:</label>
              <input
              id="location"
              type="text"
              name="location"
              placeholder="Search Locations"
              />
            </div>

            <div class="filter_search">
              <label for="job_type">Job Type:</label>
              <select name="job_type" id="job_filter">
                <option selected disabled>Choose...</option>
                <option value="full-time">Full-Time</option>
                <option value="part-time">Part-Time</option>
              </select>
            </div>

            <div class="filter_search">
              <label for="job_model">Job Model:</label>
              <select name="job_model" id="job_model">
                <option selected disabled>Choose...</option>
                <option value="onsite">Onsite</option>
                <option value="remote">Remote</option>
                <option value="hybrid">Hybrid</option>
              </select>
            </div>

            <button class="btn-apply">
                Filter
            </button>
          </form>
        </aside>

        <div class="job-flex">
          <?php foreach ($jobs as $job) : ?>
            <?php require "../app/views/partials/jobCard.php"; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

<?php loadPartial('footer'); ?>

