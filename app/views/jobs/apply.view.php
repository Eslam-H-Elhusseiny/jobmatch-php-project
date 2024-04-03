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

    <title>Job Match| Register</title>
  </head>

<body>

    <!-- Nav Bar -->
    <div class="nav">
        <?php loadPartial('navbar'); ?>
    </div>

    <div class="container my-5 pt-3">
        <form method="POST" action="/jobs/apply"  enctype="multipart/form-data" class="bg-white w-75 mx-auto p-4 rounded shadow border-1 text-capitalize">
            <h2 class="text-4xl text-center font-bold mb-4">Application Form</h2>
            
            <hr>
            <div class="alert">
                <?= loadPartial('errors', ['errors' => $errors ?? []]) ?>
            </div>
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="form-floating mb-4">
                        <input id="experience" type="number" name="experience" placeholder="First Name" class="form-control w-100" value="<?= $user['experience'] ?? '' ?>" />
                        <label class="" for="experience">Experience</label class="">
                    </div>
                </div>
                <div class="col-12 col-md-12">
                <div class="form-floating mb-4">
                    <textarea id="cover-letter" name="cover_letter" placeholder="Cover Letter" class="form-control w-100"><?= $user['cover_letter'] ?? '' ?></textarea>
                    <label for="cover-letter">Cover Letter</label>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-floating mb-4">
                    <input id="resume" type="file" name="resume" accept=".pdf" class="form-control w-100" />
                    <label for="resume">Upload PDF Resume</label>
                </div>
            </div>
  
      <input type="hidden" name="app_id" value="<?php echo $app_id; ?>">
      <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                

            </div>
            <div class="col-8 offset-2">
                <button type="submit" class="btn btn-primary w-100">
                    Submit
                </button>
            </div>
           
        </form>
    </div>

    <?= loadPartial('footer') ?>