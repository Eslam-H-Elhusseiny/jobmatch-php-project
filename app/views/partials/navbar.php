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
          <div class="text-blue-500">
            Welcome <?= Session::get('user')['name'] ?>
          </div>
          <form method="POST" action="/auth/logout">
            <button type="submit" class="text-white inline hover:underline">Logout</button>
          </form>
        </div>
      <?php else : ?>
        <ul class="mb-0">
          <li>
            <a href="/auth/login" class="text-white hover:underline">Login</a>
          </li>
          <li>
            <a href="/auth/register" class="text-white hover:underline">Register</a>
          </li>
        </ul>
      <?php endif; ?>

  </div>
</nav>
</div>
