<?php foreach( $this->data['summary'] as $summary ) : ?>
  <h5>
    <?= $summary[0]->getAssignment()->getModule()->getTitle(); ?>
  </h5>
<table class='table-5'><!-- class='assignment-summary'>-->
  <thead>
    <tr>
      <th>Title</th>
      <th>Due Date</th>
      <th>Submission Date</th>
      <th>Grade</th>
      <th>Weighting</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($summary as $i => $assignment) : ?>
    <tr>
      <td><?= $assignment->getAssignment()->getTitle(); ?></td>
      <td><?= $assignment->getAssignment()->getDueDate('d/m/Y H:i'); ?></td>
      <td><?= $assignment->getAssignmentSubmission()->getSubmissionDate('d/m/Y H:i'); ?></td>
      <td><?= $assignment->getAssignmentSubmission()->getGradePC(); ?></td>
      <td><?= $assignment->getAssignment()->getWeighting(); ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php endforeach; ?>