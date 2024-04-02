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
            <?php require "../app/views/partials/jobCard.php"; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

<?php loadPartial('footer'); ?>

