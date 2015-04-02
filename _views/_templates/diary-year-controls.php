<ul class='diary-controls'>
<li class='diary-last'>
  <a href='<?= $this->data['last year']['href']; ?>'><?= $this->data['last year']['date']; ?></a>
</li>
<li class='diary-current'>
  <?= $this->data['this year']; ?>
</li>
<li class='diary-last'>
  <a class='diary-next' href='<?= $this->data['next year']['href']; ?>'><?= $this->data['next year']['date']; ?></a>
</li>
</ul>