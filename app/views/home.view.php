<?php loadPartial('head'); ?>

<!-- HTML -->

<body>
    <header>

    <?php   loadPartial('navbar'); ?>

      <div class="search">
        <h1 class="search-heading">The Easiest Way to Get Your New Job</h1>
        <form action="" class="search-bar">
          <input
            class="search-input"
            type="text"
            placeholder="Search jobs, companies and more.."
          />
          <a href="#" class="search-icon"><i class="fa fa-search"></i></a>
        </form>
      </div>
    </header>

    <main>
      <!-- JOBS -->

      <section class="jobs-section">
        <div class="section-heading-wrapper">
          <h2 class="section-heading">Most Popular Jobs</h2>
          <h4 class="section-heading-small">
            Know your worth and find the job that qualify your life
          </h4>
        </div>
        <div class="container job-grid">
          
        <?php   loadPartial('jobCard'); ?>
        <?php   loadPartial('jobCard'); ?>
        <?php   loadPartial('jobCard'); ?>
        <?php   loadPartial('jobCard'); ?>
        <?php   loadPartial('jobCard'); ?>
        <?php   loadPartial('jobCard'); ?>

        </div>
      </section>

      <!-- HOW IT WORKS -->

      <section class="how-section">
        <div class="section-heading-wrapper">
          <h2 class="section-heading">How It Works?</h2>
          <h4 class="section-heading-small">Job for anyone, anywhere</h4>
        </div>
        <div class="container how-it-works">
          <div class="card">
            <div class="how-image">
              <img src="images/how01-acc.png" alt="How It Works Step 1" />
            </div>
            <div class="how-desc">
              <p>Register an account to start</p>
            </div>
          </div>
          <div class="card">
            <div class="how-image">
              <img src="images/how02-search.png" alt="How It Works Step 2" />
            </div>
            <div class="how-desc">
              <p>Explore over thousands of resumes</p>
            </div>
          </div>
          <div class="card">
            <div class="how-image">
              <img src="images/how03-candidate.png" alt="How It Works Step 3" />
            </div>
            <div class="how-desc">
              <p>Find the most suitable candidate</p>
            </div>
          </div>
        </div>
      </section>

      <!-- RECENT NEWS ARTICLES -->

      <section class="news-section">
        <div class="section-heading-wrapper">
          <h2 class="section-heading">Recent News Articles</h2>
          <h4 class="section-heading-small">Fresh job related news content posted each day</h4>
        </div>
        <div class="container news-container">
          <div class="news-card">
            <div class="image">
              <img src="images/news/blog1.jpg" alt="">
            </div>
            <div class="blog-desc">
              <div class="timestamp">
                <span>31 March, 2024</span>
                <span class="seperator">-</span>
                <span>2 Comments</span>
              </div>
              <div class="title">
                <h4>Attract Sales And Profits</h4>
                <p>A job ravenously while Far much that one rank beheld after
                outside...</p>
                <a href="#">Read More &#10141;</a>
              </div>
            </div>
          </div>
          <div class="news-card">
            <div class="image">
              <img src="images/news/blog2.jpg" alt="">
            </div>
            <div class="blog-desc">
              <div class="timestamp">
                <span>31 March, 2024</span>
                <span class="seperator">-</span>
                <span>5 Comments</span>
              </div>
              <div class="title">
                <h4>5 Tips For Your Job Interviews</h4>
                <p>A job ravenously while Far much that one rank beheld after
                outside...</p>
                <a href="#">Read More &#10141;</a>
              </div>
            </div>
          </div>
          <div class="news-card">
            <div class="image">
              <img src="images/news/blog3.jpg" alt="">
            </div>
            <div class="blog-desc">
              <div class="timestamp">
                <span>30 March, 2024</span>
                <span class="seperator">-</span>
                <span>1 Comment</span>
              </div>
              <div class="title">
                <h4>The Evening of The Holiday</h4>
                <p>A job ravenously while Far much that one rank beheld after
                outside...</p>
                <a href="#">Read More &#10141;</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- SPONSORS -->

      <?php   loadPartial('sponsor'); ?>
    </main>
    <!-- 


    -->
<?php   loadPartial('footer'); ?>