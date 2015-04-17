<div class='diary-controls'>
  <span class='diary-last'>
    <a class='btn btn-green' href='<?= $this->data['last']['href']; ?>'>
      <?= date('l jS M Y', strtotime($this->data['last']['date'])); ?>
    </a>
  </span>
  <span class='diary-add'>
    WC: <?= date('l jS M Y', strtotime($this->data['current'])); ?>
  </span>
  <span class='diary-next'>
    <a class='btn btn-green ' href='<?= $this->data['next']['href']; ?>'>
      <?= date('l jS M Y', strtotime($this->data['next']['date'])); ?>
    </a>
  </span>
</div>