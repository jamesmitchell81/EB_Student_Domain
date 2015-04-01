<ul class='diary-controls'>
<li>
  <a class='diary-yesterday' href='<?= $this->data['yesterday']['href']; ?>'><?= $this->data['yesterday']['date']; ?></a>
</li>
<li>
  <a class='diary-add' href='<?= $this->data['add-link']; ?>'>add</a>
</li>
<li>
  <a class='diary-tomorrow' href='<?= $this->data['tomorrow']['href']; ?>'><?= $this->data['tomorrow']['date']; ?></a>
</li>
</ul>