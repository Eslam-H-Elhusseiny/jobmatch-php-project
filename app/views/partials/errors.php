<?php if (isset($errors)) : ?>
  <?php foreach ($errors as $error) : ?>
    <?php if (!empty($error)) : ?>
      <div class="alert alert-danger py-1"><?= $error ?></div>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>
