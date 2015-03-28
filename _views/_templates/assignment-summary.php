<?php foreach( $this->data['summary'] as $summary ) : ?>
<table class='assignment-summary'>
  <thead>
    <tr>
      <th class='ass-title'>Title</th>
      <th class='ass-due'>Due Date</th>
      <th class='ass-sub'>Submission Date</th>
      <th class='ass-grade'>Grade</th>
      <th class='ass-weight'>Weighting</th>
      <!-- <th></th> -->
    </tr>
  </thead>
  <tbody>
    <?php foreach ($summary as $assignment) : ?>
    <tr>
      <td><?= $assignment->getAssignment()->getTitle(); ?></td>
      <td><?= $assignment->getAssignment()->getDueDate('d/m/Y H:i'); ?></td>
      <td><?= $assignment->getAssignmentSubmission()->getSubmissionDate('d/m/Y H:i'); ?></td>
      <td><?= $assignment->getAssignmentSubmission()->getGrade(); ?></td>
      <td><?= $assignment->getAssignment()->getWeighting(); ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php endforeach; ?>