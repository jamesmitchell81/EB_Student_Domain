
<?php foreach( $this->data['assignments'] as $assignment ) : ?>
  <div class='notice-block'>
  <h4>
    <a class='link-blue' href="<?= BASE_PATH . Input::session('username') . "/assignments/{$assignment->getId()}"; ?>">
      <?= $assignment->getTitle(); ?>
    </a>
  </h4>
  <h5>
    <a class='link-blue' href="<?= BASE_PATH . Input::session('username') . "/lecturers/{$assignment->getLecturer()->getID()}" ;?>">
      <?= $assignment->getLecturer()->getFullName(); ?>
    </a>
  </h5>
  <ul>
    <li class='notice-details'>Release Date: <?= $assignment->getReleaseDate(); ?></li>
    <li class='notice-details'>Due Date: <?= $assignment->getDueDate(); ?></li>
  </ul>

  <?php foreach( $assignment->getCriteria() as $criteria) : ?>

    <h5><?= "{$criteria->getTitle()} {$criteria->getWeightingPC()}"; ?></h5>
    <p class='notice'>
      <?= $criteria->getDetails(); ?>
    </p>
  <?php endforeach; ?>
  </div>

<?php endforeach; ?>

