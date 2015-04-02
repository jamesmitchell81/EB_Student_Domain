<ul class='diary-controls'>
<li class='diary-last'>
  <a href='<?= $this->data['last']['href']; ?>'><?= $this->data['last']['date']; ?></a>
</li>
<li class='diary-current'>
  <?= $this->data['current']; ?>
</li>
<li class='diary-last'>
  <a class='diary-next' href='<?= $this->data['next']['href']; ?>'><?= $this->data['next']['date']; ?></a>
</li>
</ul>