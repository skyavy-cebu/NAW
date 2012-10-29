<h1>Industrys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($industrys as $industry): ?>
    <tr>
      <td><a href="<?php echo url_for('industry/show?id='.$industry->getId()) ?>"><?php echo $industry->getId() ?></a></td>
      <td><?php echo $industry->getName() ?></td>
      <td><?php echo $industry->getCreatedAt() ?></td>
      <td><?php echo $industry->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('industry/new') ?>">New</a>
