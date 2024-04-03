<?php

  use Framework\Session;

?>

<nav class="container nav-bar">
  <a href="/"> <img src="/images/logo.svg" alt="logo" /> </a>
  <div class="nav-links">
    <ul class="mb-0">
      <li><a href="/">Home</a></li>
      <li><a href="/jobs">Find Jobs</a></li>
      <li><a href="/about">About Us</a></li>
    </ul>
    <?php if (Session::has('user')) : ?>
        <div class="welcome-container">
          <div class="welcome-text">
            Welcome, <a href="/auth/user/profile" style="text-decoration: underline;"><?= Session::get('user')['fname'] ?></a> 
          </div>
          <form method="POST" action="/auth/logout">
            <button type="submit" class="btn-logout">Logout</button>
          </form>
        </div>
      <?php elseif (Session::has('organization')) : ?>
        <div class="welcome-container">
          <div class="welcome-text">
            Welcome, <a href="/auth/organization/profile" style="text-decoration: underline;"><?= Session::get('organization')['org_name'] ?></a>
          </div>
          <form method="POST" action="/auth/logout">
            <button type="submit" class="btn-logout">Logout</button>
          </form>
        </div>
        <a href="/create/job" class="login-btn btn">Post A Job</a>
      <?php else : ?>

        <a href="/auth/user/login" class="login-btn btn" style="margin-left: 1rem;">Login</a>
        <a href="/auth/user/register" class="login-btn btn">Register</a>

      <?php endif; ?>
  </div>
</nav>
