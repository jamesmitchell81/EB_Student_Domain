<?php foreach($this->data['feedback'] as $feedback) : ?>
<div class='notice-block'>
  <h3><?= date("l, F jS Y", strtotime($feedback->getDate())); ?></h3>

  <p class='notice-details'>
    Tutor: <a class='link-blue' href='<?= BASE_PATH . "{$feedback->getStudent()->getStudentId()}/lecturers/{$feedback->getTutor()->getID()}";  ?>'>
              <?= $feedback->getTutor()->getFullName();  ?>
          </a>
  </p>
  <p class='notice-details'>Student: <?= $feedback->getStudent()->getFullName();  ?></p>

  <p class='notice'>
    <?= $feedback->getDetails(); ?>
  </p>
</div><!-- notice block -->
<?php endforeach; ?>
