<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/general.css?<?= time() ?>">
    <link rel="stylesheet" href="/css/style.css?<?= time() ?>">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />

    <title>Job Match | Login</title>
  </head>

<body class="">
  <div class="nav">
    <?php loadPartial('navbar'); ?>
  </div>

<div class="container my-5 py-5">
    <form method="POST" action="/auth/user/login" class="bg-white w-50 mx-auto p-4 rounded shadow border-1 text-capitalize text-center">
    <h2 class="text-4xl text-center font-bold mb-4">Login</h2>
    <div class="selection d-flex align-items-center justify-content-center">
        <h5 class="mx-2"><a href="/auth/user/login" class="createOption active">Personnal Account</a></h5>
        <h5 class="mx-2"><a href="/auth/organization/login" class="createOption ">Organization</a></h5>
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
        <a class="text-primary" href="/auth/user/register">Register</a>
      </p>
    </form>
  </div>
</div>

<?= loadPartial('footer') ?>