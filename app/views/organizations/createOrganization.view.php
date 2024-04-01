<?= loadPartial('head') ?>

<body class="bg-light">

    <head>
        <?php loadPartial('navbar'); ?>
    </head>
    <div class="container my-4">
        <form method="POST" action="/auth/organization/register" class="bg-white w-75 mx-auto p-4 rounded shadow-sm border-1 text-capitalize">
            <h2 class="text-4xl text-center font-bold mb-4">Registeration Form</h2>
            <div class="selection d-flex align-items-center justify-content-center">
                <h5 class="mx-2"><a href="/auth/user/register" class="createOption">Personnal Account</a></h5>
                <h5 class="mx-2"><a href="/auth/organization/register" class="createOption active">Organization</a></h5>
            </div>
            <hr>
            <div class="alert">
                <?= loadPartial('errors', ['errors' => $errors ?? []]) ?>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="org_name" type="text" name="org_name" placeholder="First Name" class="form-control w-100" value="<?= $user['org_name'] ?? '' ?>" />
                        <label class="" for="org_name">organization name</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="email" type="text" name="email" placeholder="email " class="form-control w-100 " value="<?= $user['email'] ?? '' ?>" />
                        <label class="" for="email">email </label class="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="website" type="text" name="website" placeholder="phone number" class="form-control w-100 " value="<?= $user['website'] ?? '' ?>" />
                        <label class="" for="website">website</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="linkedin" type="text" name="linkedin" placeholder="linkedin" class="form-control w-100 " value="<?= $user['linkedin'] ?? '' ?>" />
                        <label class="" for="linkedin">linkedin</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="description" type="text" name="description" placeholder="description" class="form-control w-100 " value="<?= $user['description'] ?? '' ?>" />
                        <label class="" for="description">description</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="industry" type="text" name="industry" placeholder="industry" class="form-control w-100 " value="<?= $user['industry'] ?? '' ?>" />
                        <label class="" for="industry">industry</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-4">
                        <input id="country" type="text" name="country" placeholder="country" class="form-control w-100 " value="<?= $user['country'] ?? '' ?>" />
                        <label class="" for="country">country</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-floating mb-4">
                        <input id="city" type="text" name="city" placeholder="city" class="form-control w-100 " value="<?= $user['city'] ?? '' ?>" />
                        <label class="" for="city">city</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-4 form-floating">
                        <input id="founded" type="number" name="founded" placeholder="Year Founded" class="form-control w-100  flex-grow-1 h-50" value="<?= $user['founded'] ?? '' ?>" max="2024" min="1950" />
                        <label class="w-auto me-2" for="founded">Founded Year</label>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="password" type="password" name="password" placeholder="password" class="form-control w-100 " value="<?= $user['password'] ?? '' ?>" />
                        <label class="text-tertiary" for="password">password</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-floating mb-4">
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="password_confirmation" class="form-control w-100 " value="<?= $user['password_confirmation'] ?? '' ?>" />
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
                <a class="text-primary text-underline" href="/auth/organization/login">Login</a>
            </p>
        </form>
    </div>

    <?= loadPartial('footer') ?>