<h1>Users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Email</th>
      <th>Pass</th>
      <th>Fname</th>
      <th>Lname</th>
      <th>Dob</th>
      <th>Type</th>
      <th>App type</th>
      <th>App</th>
      <th>Activation</th>
      <th>Last login at</th>
      <th>Active</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><a href="<?php echo url_for('register/show?id='.$user->getId()) ?>"><?php echo $user->getId() ?></a></td>
      <td><?php echo $user->getEmail() ?></td>
      <td><?php echo $user->getPass() ?></td>
      <td><?php echo $user->getFname() ?></td>
      <td><?php echo $user->getLname() ?></td>
      <td><?php echo $user->getDob() ?></td>
      <td><?php echo $user->getTypeId() ?></td>
      <td><?php echo $user->getAppType() ?></td>
      <td><?php echo $user->getAppId() ?></td>
      <td><?php echo $user->getActivation() ?></td>
      <td><?php echo $user->getLastLoginAt() ?></td>
      <td><?php echo $user->getActive() ?></td>
      <td><?php echo $user->getCreatedAt() ?></td>
      <td><?php echo $user->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('register/new') ?>">New</a>
