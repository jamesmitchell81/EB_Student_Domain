<h3>Assignments</h3>

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

  <?php foreach( $assignment->getCritrea() as $critrea) : ?>
  <h5><?= $critrea->getTitle(); ?></h5>
  <p>
    <?= $critrea->getDetails(); ?>
  </p>
  <?php endforeach; ?>

<?php endforeach; ?>

