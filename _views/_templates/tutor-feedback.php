<?php foreach($this->data['feedback'] as $feedback) : ?>

  <h3><?= date("l, F jS Y", strtotime($feedback->getDate())); ?></h3>

  <p>
    Tutor: <a href='<?= BASE_PATH . "{$feedback->getStudent()->getStudentId()}/lecturers/{$feedback->getTutor()->getID()}";  ?>'>
              <?= $feedback->getTutor()->getFullName();  ?>
          </a>
  </p>
  <p>Student: <?= $feedback->getStudent()->getFullName();  ?></p>

  <p>
    <?= $feedback->getDetails(); ?>
  </p>

<?php endforeach; ?>
