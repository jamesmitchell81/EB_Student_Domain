<table class='assignment-summary'>
  <thead>
    <tr>
      <th>Module</th>
      <th class='ass-title'>Title</th>
      <th class='ass-due'>Due Date</th>
      <th class='ass-sub'>Submission Date</th>
      <th class='ass-grade'>Grade</th>
      <th class='ass-weight'>Weighting</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach( $this->data['summary'] as $summary ) : ?>
    <?php foreach ($summary as $i => $assignment) : ?>
    <tr>
      <?php if ( $i == 0 ) : ?>
        <td rowspan='2'><?= $assignment->getAssignment()->getModule()->getTitle(); ?></td>
      <?php endif; ?>
      <td><?= $assignment->getAssignment()->getTitle(); ?></td>
      <td><?= $assignment->getAssignment()->getDueDate('d/m/Y H:i'); ?></td>
      <td><?= $assignment->getAssignmentSubmission()->getSubmissionDate('d/m/Y H:i'); ?></td>
      <td><?= $assignment->getAssignmentSubmission()->getGradePC(); ?></td>
      <td><?= $assignment->getAssignment()->getWeighting(); ?></td>
    </tr>
    <?php endforeach; ?>
  <?php endforeach; ?>
  </tbody>
</table>