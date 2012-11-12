<h1>Events List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Start</th>
      <th>End</th>
      <th>City</th>
      <th>Venue</th>
      <th>Address</th>
      <th>Prepay slots</th>
      <th>Max capacity</th>
      <th>Admission prepay</th>
      <th>Admission at door</th>
      <th>Admission no rsvp</th>
      <th>Image full</th>
      <th>Image small</th>
      <th>Event admin1</th>
      <th>Event admin2</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($events as $event): ?>
    <tr>
      <td><a href="<?php echo url_for('event/show?id='.$event->getId()) ?>"><?php echo $event->getId() ?></a></td>
      <td><?php echo $event->getName() ?></td>
      <td><?php echo $event->getDescription() ?></td>
      <td><?php echo $event->getStart() ?></td>
      <td><?php echo $event->getEnd() ?></td>
      <td><?php echo $event->getCityId() ?></td>
      <td><?php echo $event->getVenue() ?></td>
      <td><?php echo $event->getAddress() ?></td>
      <td><?php echo $event->getPrepaySlots() ?></td>
      <td><?php echo $event->getMaxCapacity() ?></td>
      <td><?php echo $event->getAdmissionPrepay() ?></td>
      <td><?php echo $event->getAdmissionAtDoor() ?></td>
      <td><?php echo $event->getAdmissionNoRsvp() ?></td>
      <td><?php echo $event->getImageFull() ?></td>
      <td><?php echo $event->getImageSmall() ?></td>
      <td><?php echo $event->getEventAdmin1() ?></td>
      <td><?php echo $event->getEventAdmin2() ?></td>
      <td><?php echo $event->getCreatedAt() ?></td>
      <td><?php echo $event->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('event/new') ?>">New</a>
