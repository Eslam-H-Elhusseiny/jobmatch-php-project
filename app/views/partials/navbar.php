<?php

  use Framework\Session;

?>

<nav class="container nav-bar">
  <a href="/"> <img src="/images/logo.svg" alt="logo" /> </a>
  <div class="nav-links">
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/jobs">Find Jobs</a></li>
      <li><a href="/about-us">About Us</a></li>
    </ul>
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
        <ul class="">
          <li>
            <a href="/auth/user/register" class="text-white hover:underline">Register as User</a>
          </li>
          <li>
            <a href="/auth/organization/register" class="text-white hover:underline">Register as Organization</a>
          </li>
        </ul>
      <?php endif; ?>
    <a href="/auth/register" class="login-btn btn">Login / Sign Up</a>
  </div>
</nav>
