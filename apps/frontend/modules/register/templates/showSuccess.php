<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $user->getId() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $user->getEmail() ?></td>
    </tr>
    <tr>
      <th>Pass:</th>
      <td><?php echo $user->getPass() ?></td>
    </tr>
    <tr>
      <th>Fname:</th>
      <td><?php echo $user->getFname() ?></td>
    </tr>
    <tr>
      <th>Lname:</th>
      <td><?php echo $user->getLname() ?></td>
    </tr>
    <tr>
      <th>Dob:</th>
      <td><?php echo $user->getDob() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $user->getTypeId() ?></td>
    </tr>
    <tr>
      <th>App type:</th>
      <td><?php echo $user->getAppType() ?></td>
    </tr>
    <tr>
      <th>App:</th>
      <td><?php echo $user->getAppId() ?></td>
    </tr>
    <tr>
      <th>Activation:</th>
      <td><?php echo $user->getActivation() ?></td>
    </tr>
    <tr>
      <th>Last login at:</th>
      <td><?php echo $user->getLastLoginAt() ?></td>
    </tr>
    <tr>
      <th>Active:</th>
      <td><?php echo $user->getActive() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $user->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('register/edit?id='.$user->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('register/index') ?>">List</a>
