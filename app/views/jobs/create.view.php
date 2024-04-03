<!DOCTYPE html>
<html>

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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/general.css?<?= time() ?>">
    <link rel="stylesheet" href="/css/style.css?<?= time() ?>">
    <style>
        a:hover {
            color: white;
            text-decoration: none;
        }
    </style>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
    <title>JobMatch | Post A Job</title>

</head>

<body>
    <div class="nav">
        <?php loadPartial('navbar'); ?>
    </div>
    <div class="container">
        <h2 class="mt-5">Job Posting Form</h2>
        <hr>
        <form action="/jobs" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($job_data['title']) ? htmlspecialchars($job_data['title']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo isset($job_data['description']) ? htmlspecialchars($job_data['description']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="job_type">Job Type:</label>
                <select class="form-control" id="job_type" name="job_type">

                    <option value="full-time" <?php echo (isset($job_data['job_type']) && $job_data['job_type'] == 'full-time') ? 'selected' : ''; ?>>Full-Time</option>

                    <option value="part-time" <?php echo (isset($job_data['job_type']) && $job_data['job_type'] == 'part-time') ? 'selected' : ''; ?>>Part-Time</option>
                    
                </select>
            </div>
            <div class="form-group">
                <label for="job_model">Job Model:</label>
                <select class="form-control" id="job_model" name="job_model">

                    <option value="onsite" <?php echo (isset($job_data['job_model']) && $job_data['job_model'] == 'onsite') ? 'selected' : ''; ?>>Onsite</option>

                    <option value="remote" <?php echo (isset($job_data['job_model']) && $job_data['job_model'] == 'remote') ? 'selected' : ''; ?>>Remote</option>

                    <option value="hybrid" <?php echo (isset($job_data['job_model']) && $job_data['job_model'] == 'hybrid') ? 'selected' : ''; ?>>Hybrid</option>

                </select>
            </div>
            <div class="form-group">
                <label for="job_exp">Job Experience:</label>
                <input type="text" class="form-control" id="job_exp" name="job_exp" value="<?php echo isset($job_data['job_exp']) ? htmlspecialchars($job_data['job_exp']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo isset($job_data['location']) ? htmlspecialchars($job_data['location']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="city">city:</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo isset($job_data['city']) ? htmlspecialchars($job_data['city']) : ''; ?>">
            </div>

            <div class="form-group">
                <label for="expiry_date">Expiry Date:</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?php echo isset($job_data['expiry_date']) ? htmlspecialchars($job_data['expiry_date']) : ''; ?>">
            </div>

            <!-- <input type="hidden" name="org_id" value="<?php echo $_SESSION['user']['id']; ?>"> -->
            <input type="hidden" name="is_open" value="<?= 1 ?>">
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php loadPartial('footer'); ?>

</body>

</html>