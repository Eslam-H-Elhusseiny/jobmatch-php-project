<?php

use Framework\Session;
?>

<!-- Nav -->
<div class="navContainer">
  <nav class="container nav-bar d-flex align-items-center justify-content-between py-1">
    <a href="/" class="mb-1"> <img src="/images/logo.svg" class="w-100" alt="logo" /> </a>
    <div class="nav-links d-flex align-items-center">
      <ul class="mb-0">
        <li><a href="/">Home</a></li>
        <li><a href="#">Find Jobs</a></li>
        <li><a href="#">About Us</a></li>
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
        <ul class="mb-0">
          <li>
            <a href="/auth/user/register" class="text-white hover:underline">Register as User</a>
          </li>
          <li>
            <a href="/auth/organization/register" class="text-white hover:underline">Register as Organization</a>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>
</div>
