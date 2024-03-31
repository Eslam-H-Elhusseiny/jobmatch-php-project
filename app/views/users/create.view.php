<?= loadPartial('head') ?>
<?= loadPartial('navbar') ?>

<div class="flex justify-center items-center mt-20">
  <div class="container my4">
    <form method="POST" action="/auth/register" class="bg-white w-75 mx-auto p-4 rounded shadow-sm border-1">
      <h2 class="text-4xl text-center font-bold mb-4">Registeration Form</h2>
      <div class="alert">
        <?= loadPartial('errors', ['errors' => $errors ?? []]) ?>
      </div>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="fname" type="text" name="fname" placeholder="First Name" class="form-control w-100 py-0" value="<?= $user['fname'] ?? '' ?>" />
            <label class="opacity-75" for="fname">First Name</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="lname" type="text" name="lname" placeholder="last Name" class="form-control w-100 py-0" value="<?= $user['lname'] ?? '' ?>" />
            <label class="opacity-75" for="lname">last Name</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="email" type="text" name="email" placeholder="email " class="form-control w-100 py-0" value="<?= $user['email'] ?? '' ?>" />
            <label class="opacity-75" for="email">email </label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="phone_num" type="text" name="phone_num" placeholder="phone_num" class="form-control w-100 py-0" value="<?= $user['phone_num'] ?? '' ?>" />
            <label class="opacity-75" for="phone_num">phone_num</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="title" type="text" name="title" placeholder="title" class="form-control w-100 py-0" value="<?= $user['title'] ?? '' ?>" />
            <label class="opacity-75" for="title">title</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="bio" type="text" name="bio" placeholder="bio" class="form-control w-100 py-0" value="<?= $user['bio'] ?? '' ?>" />
            <label class="opacity-75" for="bio">bio</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="form-floating mb-4">
          <input id="experience" type="number" name="experience" placeholder="experience" class="form-control w-100 py-0" value="<?= $user['experience'] ?? '' ?>" />
            <label class="opacity-75" for="experience">experience</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-3">
          <div class="form-floating mb-4">
            <input id="gender" type="text" name="gender" placeholder="gender" class="form-control w-100 py-0" value="<?= $user['gender'] ?? '' ?>" />
            <label class="opacity-75" for="gender">gender</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="bdate" type="date" name="bdate" placeholder="bdate" class="form-control w-100 py-0" value="<?= $user['bdate'] ?? '' ?>" />
            <label class="opacity-75" for="bdate">bdate</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="country" type="text" name="country" placeholder="country" class="form-control w-100 py-0" value="<?= $user['country'] ?? '' ?>" />
            <label class="opacity-75" for="country">country</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="city" type="text" name="city" placeholder="city" class="form-control w-100 py-0" value="<?= $user['city'] ?? '' ?>" />
            <label class="opacity-75" for="city">city</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="password" type="password" name="password" placeholder="password" class="form-control w-100 py-0" value="<?= $user['password'] ?? '' ?>" />
            <label class="text-tertiary" for="password">password</label class="opacity-75">
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="form-floating mb-4">
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="password_confirmation" class="form-control w-100 py-0" value="<?= $user['password_confirmation'] ?? '' ?>" />
            <label class="text-tertiary" for="password_confirmation">password confirmation</label class="opacity-75">
          </div>
        </div>


      </div>
      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">
        Register
      </button>

      <p class="mt-4 text-gray-500">
        Already have an account?
        <a class="text-blue-900" href="/auth/login">Login</a>
      </p>
    </form>
  </div>
</div>

<?= loadPartial('footer') ?>