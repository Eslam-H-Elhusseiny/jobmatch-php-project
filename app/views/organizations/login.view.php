<?= loadPartial('head') ?>

<body class="bg-light">
  <head class="text-dark bg-danger">
    <?php loadPartial('navbar'); ?>
  </head>

<div class="container my-4">
    <form method="POST" action="/auth/organization/login" class="bg-white w-50 mx-auto p-4 rounded shadow-sm border-1 text-capitalize text-center">
    <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
    <div class="selection d-flex align-items-center justify-content-center">
        <h5 class="mx-2"><a href="/auth/user/login" class="createOption">Personnal Account</a></h5>
        <h5 class="mx-2"><a href="/auth/organization/login" class="createOption active">Organization</a></h5>
      </div>
      <hr>

    <?= loadPartial('errors', [
      'errors' => $errors ?? []
    ]) ?>
      <div class="mb-4">
        <input type="text" name="email" placeholder="Email Address" class="form-control" />
      </div>
      <div class="mb-4">
        <input type="password" name="password" placeholder="Password" class="form-control" />
      </div>
      <button type="submit" class="btn btn-outline-primary w-100">
        Login
      </button>

      <p class="mt-4 text-gray-500">
        Don't have an account?
        <a class="text-primary" href="/auth/organization/register">Register</a>
      </p>
    </form>
  </div>
</div>

<?= loadPartial('footer') ?>