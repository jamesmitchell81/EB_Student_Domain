<table>
  <thead>
    <tr>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Student ID</td>
      <td><?= $this->data->getStudentId(); ?></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?= $this->data->getFullName(); ?></td>
    </tr>
    <tr>
      <td>Email Address</td>
      <td><?= $this->data->getEmailAddress(); ?></td>
    </tr>
    <tr>
      <td>Tel No.</td>
      <td><?= $this->data->getMobile(); ?></td>
    </tr>
    <tr>
      <td>Home Address</td>
      <td><?= $this->data->getHomeAddress(); ?></td>
    </tr>
    <tr>
      <td>Term Address</td>
      <td><?= $this->data->getTermAddress(); ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?= $this->data->getGender(); ?></td>
    </tr>
    <tr>
      <td>Quailifications...</td>
      <td></td>
    </tr>
    <tr>
      <td>Modules...</td>
      <td></td>
    </tr>
  </tbody>
</table>