<!--<?php var_dump($this->data['summary']); ?>-->

<?php foreach( $this->data['summary'] as $summary ) : ?>
  <h5 class='ass-sum-module'>
    <?= $summary[0]->getAssignment()->getModule()->getTitle(); ?>
  </h5>
<table class='assignment-summary'>
  <thead>
    <tr>
      <th class='ass-title'>Title</th>
      <th class='ass-due'>Due Date</th>
      <th class='ass-sub'>Submission Date</th>
      <th class='ass-grade'>Grade</th>
      <th class='ass-weight'>Weighting</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($summary as $i => $assignment) : ?>
    <tr>
      <td class='ass-title'><?= $assignment->getAssignment()->getTitle(); ?></td>
      <td class='ass-due'><?= $assignment->getAssignment()->getDueDate('d/m/Y H:i'); ?></td>
      <td class='ass-sub'><?= $assignment->getAssignmentSubmission()->getSubmissionDate('d/m/Y H:i'); ?></td>
      <td class='ass-grade'><?= $assignment->getAssignmentSubmission()->getGradePC(); ?></td>
      <td class='ass-weight'><?= $assignment->getAssignment()->getWeighting(); ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php endforeach; ?>