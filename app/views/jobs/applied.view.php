<?php loadPartial('head'); ?>

<!-- HTML -->

<body>
  <div class="nav">
    <?php loadPartial('navbar'); ?>
  </div>

  <main>

  <section class="container">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Experience</th>
          <th>Country</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($list as $app) : ?>
          <tr>
            <td><?= $app->id ?></td>
            <td><?= $app->fname ?></td>
            <td><?= $app->lname ?></td>
            <td><?= $app->email ?></td>
            <td><?= $app->phone_num ?></td>
            <td><?= $app->experience ?></td>
            <td><?= $app->country ?></td>
            <td>
              <form action="/jobs/status" method="post">
            <input type="hidden" name="app_id" value="<?php echo $app->id; ?>">
            <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                <select name="status" id="status">
                  <option value="applied" <?php if($app->status == 'applied') echo 'selected="selected"'; ?>>Applied</option>
                  <option value="pending" <?php if($app->status == 'pending') echo 'selected="selected"'; ?>>Pending</option>
                  <option value="shortlisted" <?php if($app->status == 'shortlisted') echo 'selected="selected"'; ?>>Shortlisted</option>
                  <option value="rejected" <?php if($app->status == 'rejected') echo 'selected="selected"'; ?>>Rejected</option>
                </select>
                <button>&#9998;</button>
              </form>
            </td>
          </tr>
          <?php endforeach ; ?>
      </tbody>
    </table>
  </section>



<?php loadPartial('footer'); ?>

