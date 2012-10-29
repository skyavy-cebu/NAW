<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $industry->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $industry->getName() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $industry->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $industry->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('industry/edit?id='.$industry->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('industry/index') ?>">List</a>
