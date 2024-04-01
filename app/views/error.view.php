<?= loadPartial('head') ?>

<!-- HTML -->

<body>
    <div class="nav">
      <?php loadPartial('navbar'); ?>
    </div>

<section style="height: 40vh; font-size: 1.5rem;">
  <div class="container">
    <div ><?= $status ?></div>
    <p >
      <?= $message ?>
    </p>
    <a class="block text-center" href="/">Go Back To Home Page</a>
  </div>
</section>

<?= loadPartial('footer') ?>