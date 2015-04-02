<ul class='diary-controls'>
<li>
  <a class='diary-last' href='<?= $this->data['last']['href']; ?>'><?= $this->data['last']['date']; ?></a>
</li>
<li class='diary-current'>
 <?= $this->data['current']; ?>
</li>
<li>
  <a class='diary-next' href='<?= $this->data['next']['href']; ?>'><?= $this->data['next']['date']; ?></a>
</li>
</ul>