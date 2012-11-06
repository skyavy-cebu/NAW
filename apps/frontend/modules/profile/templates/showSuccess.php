<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $profile->getId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $profile->getTitle() ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $profile->getCompany() ?></td>
    </tr>
    <tr>
      <th>State:</th>
      <td><?php echo $profile->getStateId() ?></td>
    </tr>
    <tr>
      <th>City:</th>
      <td><?php echo $profile->getCityId() ?></td>
    </tr>
    <tr>
      <th>Address:</th>
      <td><?php echo $profile->getAddress() ?></td>
    </tr>
    <tr>
      <th>Ido:</th>
      <td><?php echo $profile->getIdo() ?></td>
    </tr>
    <tr>
      <th>To meet:</th>
      <td><?php echo $profile->getToMeet() ?></td>
    </tr>
    <tr>
      <th>Image full:</th>
      <td><?php echo $profile->getImageFull() ?></td>
    </tr>
    <tr>
      <th>Image small:</th>
      <td><?php echo $profile->getImageSmall() ?></td>
    </tr>
    <tr>
      <th>Linkedin url:</th>
      <td><?php echo $profile->getLinkedinUrl() ?></td>
    </tr>
    <tr>
      <th>Fb url:</th>
      <td><?php echo $profile->getFbUrl() ?></td>
    </tr>
    <tr>
      <th>Twitter url:</th>
      <td><?php echo $profile->getTwitterUrl() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $profile->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $profile->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('profile/edit?id='.$profile->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('profile/index') ?>">List</a>
