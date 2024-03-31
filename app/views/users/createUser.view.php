<?= loadPartial('head') ?>

<body class="bg-light">
  <head >
    <?php loadPartial('navbar'); ?>
  </head>
  <div class="container my-4">
    <form method="POST" action="/auth/user/register" class="bg-white w-75 mx-auto p-4 rounded shadow-sm border-1 text-capitalize">
      <h2 class="text-4xl text-center font-bold mb-4">Registeration Form</h2>
      <div class="selection d-flex align-items-center justify-content-center">
        <h5 class="mx-2"><a href="/auth/user/register" class="createOption active">Personnal Account</a></h5>
        <h5 class="mx-2"><a href="/auth/organization/register" class="createOption">Organization</a></h5>
      </div>
      <hr>
      <div class="alert">
        <?= loadPartial('errors', ['errors' => $errors ?? []]) ?>
      </div>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="fname" type="text" name="fname" placeholder="First Name" class="form-control w-100 py-1" value="<?= $user['fname'] ?? '' ?>" />
            <label class="" for="fname">First Name</label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="lname" type="text" name="lname" placeholder="last Name" class="form-control w-100 py-1" value="<?= $user['lname'] ?? '' ?>" />
            <label class="" for="lname">last Name</label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="email" type="text" name="email" placeholder="email " class="form-control w-100 py-1" value="<?= $user['email'] ?? '' ?>" />
            <label class="" for="email">email </label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="phone_num" type="text" name="phone_num" placeholder="phone number" class="form-control w-100 py-1" value="<?= $user['phone_num'] ?? '' ?>" />
            <label class="" for="phone_num">phone number</label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="title" type="text" name="title" placeholder="title" class="form-control w-100 py-1" value="<?= $user['title'] ?? '' ?>" />
            <label class="" for="title">title</label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="bio" type="text" name="bio" placeholder="bio" class="form-control w-100 py-1" value="<?= $user['bio'] ?? '' ?>" />
            <label class="" for="bio">bio</label class="">
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="form-floating mb-4">
            <input id="experience" type="number" name="experience" placeholder="experience" class="form-control w-100 py-1" value="<?= $user['experience'] ?? '' ?>" />
            <label class="" for="experience">experience</label class="">
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="form-floating mb-4">
            <select id="gender" name="gender" class="form-control w-100 py-1">
              <option value="" disabled selected>Select gender</option>
              <option value="male" <?= isset($user['gender']) && $user['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
              <option value="female" <?= isset($user['gender']) && $user['gender'] === 'female' ? 'selected' : '' ?>>Female</option>
            </select>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="mb-4 d-flex align-items-center">
            <label class="pb-3 w-auto" for="bdate">Birth Date</label>
            <input id="bdate" type="date" name="bdate" placeholder="Birth Date" class="form-control w-100 py-1 flex-grow-1" value="<?= $user['bdate'] ?? '' ?>" max="<?= date('Y-m-d') ?>" />
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="country" type="text" name="country" placeholder="country" class="form-control w-100 py-1" value="<?= $user['country'] ?? '' ?>" />
            <label class="" for="country">country</label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="city" type="text" name="city" placeholder="city" class="form-control w-100 py-1" value="<?= $user['city'] ?? '' ?>" />
            <label class="" for="city">city</label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="password" type="password" name="password" placeholder="password" class="form-control w-100 py-1" value="<?= $user['password'] ?? '' ?>" />
            <label class="text-tertiary" for="password">password</label class="">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="password_confirmation" class="form-control w-100 py-1" value="<?= $user['password_confirmation'] ?? '' ?>" />
            <label class="text-tertiary" for="password_confirmation">password confirmation</label class="">
          </div>
        </div>
      </div>
      <div class="col-8 offset-2">
        <button type="submit" class="btn btn-primary w-100">
          Register
        </button>
      </div>
      <p class="mt-4 text-gray-500">
        Already have an account?
        <a class="text-primary text-underline" href="/auth/login">Login</a>
      </p>
    </form>
  </div>

  <?= loadPartial('footer') ?>