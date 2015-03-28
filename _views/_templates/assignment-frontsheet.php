
<?php $assignment = $this->data['assignments'][0]; ?>
<?php $student = $this->data['student']; ?>

<table class='assignment-front-sheet'>
  <thead>
    <tr>
      <th class='ass-front-title' colspan='7'>
        <?= $assignment->getModule()->getModuleCode(); ?>
        <?= $assignment->getModule()->getTitle(); ?>
      </th>
    </tr>
    <tr>
      <th class='ass-front-title' colspan='7'><?= $assignment->getTitle(); ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan='3'>Release Date</td>
      <td colspan='4'>Due Date</td>
    </tr>
    <tr>
      <td colspan='3'><?= $assignment->getReleaseDate('D d M Y H:i'); ?></td>
      <td class='ass-fs-date' colspan='4'><?= $assignment->getDueDate('D d M Y H:i'); ?></td>
    </tr>
    <tr>
      <td class='ass-student-start' colspan='2'>Student Name</td>
      <td class='ass-student-start' colspan='5'><?= $student->getFullName(); ?></td>
    </tr>
    <tr>
      <td colspan='2'>Student ID</td>
      <td colspan='5'><?= $student->getStudentId(); ?></td>
    </tr>
    <tr>
      <td colspan='2'>Student Signature</td>
      <td colspan='3'></td>
      <td>Date:</td>
      <td></td>
    </tr>
    <tr>
      <td class='ass-feedback-start' colspan='7'>Assignment Feedback</td>
    </tr>
    <tr>
      <td class='ass-marking-title' colspan='2'></td>
      <td class='ass-marking-title'>Excellent</td>
      <td class='ass-marking-title'>Good</td>
      <td class='ass-marking-title'>Satisfactory</td>
      <td class='ass-marking-title'>Needs some more work</td>
      <td class='ass-marking-title'>Needs much more work</td>
    </tr>
    <?php foreach($assignment->getCriteria() as $criteria) : ?>
    <tr>
      <td colspan='2'>
        <?= $criteria->getTitle(); ?>
        <?= $criteria->getWeightingPC(); ?>
      </td>
      <td class='ass-marking'></td>
      <td class='ass-marking'></td>
      <td class='ass-marking'></td>
      <td class='ass-marking'></td>
      <td class='ass-marking'></td>
    </tr>
    <?php endforeach; ?>
    <tr>
      <td class='ass-feedback-title' colspan='4'>Positive Aspects</td>
      <td class='ass-feedback-title' colspan='3'>Negative Aspects</td>
    </tr>
    <tr>
      <td class='ass-feedback' colspan='4'></td>
      <td class='ass-feedback' colspan='3'></td>
    </tr>
    <tr>
      <td class='ass-lect-fs ass-lect-start' colspan='2'>Lecturer</td>
      <td class='ass-lect-fs ass-lect-start' colspan='5'><?= $assignment->getLecturer()->getFullName(); ?></td>
    </tr>
    <tr>
      <td class='ass-lect-fs' colspan='5'>Lecturer Signature</td>
      <td class='ass-lect-fs' colspan='2'>Date</td>
    </tr>
    <tr>
      <td class='ass-lect-fs' colspan='5'></td>
      <td class='ass-lect-fs' colspan='2'></td>
    </tr>
  </tbody>
</table>