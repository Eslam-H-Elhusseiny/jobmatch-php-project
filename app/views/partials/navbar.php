<?php

  use Framework\Session;

?>

<nav class="container nav-bar">
  <a href="/"> <img src="/images/logo.svg" alt="logo" /> </a>
  <div class="nav-links">
    <ul class="mb-0">
      <li><a href="/">Home</a></li>
      <li><a href="/jobs">Find Jobs</a></li>
      <li><a href="/about-us">About Us</a></li>
    </ul>
    <a href="/auth/user/login" class="login-btn btn" style="margin-left: 1rem;">Login</a>
    <?php if (Session::has('user')) : ?>
        <div class="gap-4 d-flex justify-content-between align-items-center">
          <div class="text-light text-decoration-underline">
            Welcome <?= Session::get('user')['fname'] ?>
          </div>
          <form method="POST" action="/auth/logout">
            <button type="submit" class="btn btn-outline-light">Logout</button>
          </form>
        </div>
      <?php elseif (Session::has('organization')) : ?>
        <div class="gap-4 d-flex justify-content-between align-items-center">
          <div class="text-light text-decoration-underline">
            Welcome <?= Session::get('organization')['org_name'] ?>
          </div>
          <form method="POST" action="/auth/logout">
            <button type="submit" class="btn btn-outline-light">Logout</button>
          </form>
        </div>
      <?php else : ?>

        <a href="/auth/user/register" class="login-btn btn">Register</a>

      <?php endif; ?>
  </div>
</nav>
