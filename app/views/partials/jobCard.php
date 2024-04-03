<div class="job-card">
  <a class="btn-bookmark">
    <i class="fa fa-bookmark"></i>
  </a>
  <div class="company-logo">
    <a href="/organizations/info/<?= $job->org_id?>">
      <img
        width="80"
        src="https://apusthemes.com/wp-demo/superio/wp-content/uploads/2021/03/y9.jpg"
        alt="Company Logo"
      />
    </a>
  </div>
  <div class="job-content">
  <div class="title-wrapper">
    <h3 class="job-title">
      <a href="/jobs/<?= $job->id?>"><?= $job->title ?></a>
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
      <a href="/jobs/search?location=<?= $job->location ?>"><?= $job->location ?></a>
    </div>
    <div class="job-salary">
      <i class="fa fa-money-bills"></i>
      <span class="suffix">Experience ~ <?= $job->job_exp?> Years</span>

    </div>
  </div>
  <div class="job-metas-bottom">
    <div class="">
      <a class="job-type tag" href="/jobs/search?job_type=<?= $job->job_type ?>">
        <?= ucwords($job->job_type,'-') ?>
      </a>
    </div>
    <a href="/jobs/search?job_model=<?= $job->job_model ?>" class="urgent tag">
      <?= ucfirst($job->job_model) ?>
    </a>
  </div>
  </div>
</div>