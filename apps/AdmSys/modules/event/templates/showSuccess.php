<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $event->getId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $event->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $event->getDescription() ?></td>
    </tr>
    <tr>
      <th>Start:</th>
      <td><?php echo $event->getStart() ?></td>
    </tr>
    <tr>
      <th>End:</th>
      <td><?php echo $event->getEnd() ?></td>
    </tr>
    <tr>
      <th>City:</th>
      <td><?php echo $event->getCityId() ?></td>
    </tr>
    <tr>
      <th>Venue:</th>
      <td><?php echo $event->getVenue() ?></td>
    </tr>
    <tr>
      <th>Address:</th>
      <td><?php echo $event->getAddress() ?></td>
    </tr>
    <tr>
      <th>Prepay slots:</th>
      <td><?php echo $event->getPrepaySlots() ?></td>
    </tr>
    <tr>
      <th>Max capacity:</th>
      <td><?php echo $event->getMaxCapacity() ?></td>
    </tr>
    <tr>
      <th>Admission prepay:</th>
      <td><?php echo $event->getAdmissionPrepay() ?></td>
    </tr>
    <tr>
      <th>Admission at door:</th>
      <td><?php echo $event->getAdmissionAtDoor() ?></td>
    </tr>
    <tr>
      <th>Admission no rsvp:</th>
      <td><?php echo $event->getAdmissionNoRsvp() ?></td>
    </tr>
    <tr>
      <th>Image full:</th>
      <td><?php echo $event->getImageFull() ?></td>
    </tr>
    <tr>
      <th>Image small:</th>
      <td><?php echo $event->getImageSmall() ?></td>
    </tr>
    <tr>
      <th>Event admin1:</th>
      <td><?php echo $event->getEventAdmin1() ?></td>
    </tr>
    <tr>
      <th>Event admin2:</th>
      <td><?php echo $event->getEventAdmin2() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $event->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $event->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('event/edit?id='.$event->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('event/index') ?>">List</a>
