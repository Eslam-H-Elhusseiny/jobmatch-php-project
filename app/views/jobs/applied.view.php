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
              <form action="">
                <select name="status" id="status">
                  <option value="applied">Applied</option>
                  <option value="pending">Pending</option>
                  <option value="shortlisted">Shortlisted</option>
                  <option value="rejected">Rejected</option>
                </select>
              </form>
            </td>
          </tr>
          <?php endforeach ; ?>
      </tbody>
    </table>
  </section>



<?php loadPartial('footer'); ?>

