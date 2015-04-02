<!-- <h3>Assignments</h3> -->


<?php foreach( $this->data['assignments'] as $assignment ) : ?>
  <div class='assignment-details'>
  <h4>
    <a class='ass-details-title' href="<?= BASE_PATH . Input::session('username') . "/assignments/{$assignment->getId()}"; ?>">
      <?= $assignment->getTitle(); ?>
    </a>
  </h4>
  <h5 class='module-lecturers'>
    <a href="<?= BASE_PATH . Input::session('username') . "/lecturers/{$assignment->getLecturer()->getID()}" ;?>">
      <?= $assignment->getLecturer()->getFullName(); ?>
    </a>
  </h5>
  <ul class='ass-dates'>
    <li>Release Date: <?= $assignment->getReleaseDate(); ?></li>
    <li>Due Date: <?= $assignment->getDueDate(); ?></li>
  </ul>

  <?php foreach( $assignment->getCriteria() as $criteria) : ?>

    <h5 class='ass-critrea'><?= "{$criteria->getTitle()} {$criteria->getWeightingPC()}"; ?></h5>
    <p class='ass-description'>
      <?= $criteria->getDetails(); ?>
    </p>
  <?php endforeach; ?>
  </div>

<?php endforeach; ?>

