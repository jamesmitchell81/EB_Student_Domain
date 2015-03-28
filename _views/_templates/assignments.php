<!-- <h3>Assignments</h3> -->

<?php foreach( $this->data['assignments'] as $assignment ) : ?>
  <h4>
    <a href="<?= "";?>">
      <?= $assignment->getTitle(); ?>
    </a>
  </h4>
  <h5>
    <a href="<?= "";?>">
      <?= $assignment->getLecturer()->getFullName(); ?>
    </a>
  </h5>
  <ul>
    <li>Release Date: <?= $assignment->getReleaseDate(); ?></li>
    <li>Due Date: <?= $assignment->getDueDate(); ?></li>
  </ul>

  <?php foreach( $assignment->getCriteria() as $criteria) : ?>

    <h5><?= "{$criteria->getTitle()} {$criteria->getWeightingPC()}"; ?></h5>
    <p>
      <?= $criteria->getDetails(); ?>
    </p>
  <?php endforeach; ?>

<?php endforeach; ?>

