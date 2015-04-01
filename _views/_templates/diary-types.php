<ul class='diary-types'>
  <?php foreach($this->data['types'] as $key => $type) : ?>
    <li class='diary-type'>
      <?= $type["Type"]; ?>
    </li>
  <?php endforeach; ?>
</ul>