  <div class="diary-month-tabs">
    <ul>
      <?php foreach ($this->data['months'] as $month => $href) : ?>
        <?php if ($month == $this->data['month']) : ?>
      <li><a class="diary-month-link current" href="<?= $href; ?>"><?= $month; ?></a></li>
        <?php else : ?>
      <li><a class="diary-month-link" href="<?= $href; ?>"><?= $month; ?></a></li>
      <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
