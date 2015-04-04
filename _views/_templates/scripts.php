<script type='text/javascript' src='<?= BASE_PATH; ?>js/ajax.js'></script>
<script type='text/javascript' src='<?= BASE_PATH; ?>js/navbar.js'></script>

<?php foreach($this->data['scripts'] as $scriptPath ) : ?>
  <script type='text/javascript' src='<?= "$scriptPath"; ?>'></script>
<?php endforeach; ?>