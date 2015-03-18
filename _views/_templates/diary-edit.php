<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div class="diary-edit-wrap">
  <form action='<?= "{$action}"; ?>' method='post'>
    <span class="diary-edit-title">Edit</span>
    <span class="diary-edit-exit">&times;</span>
    <span class="diary-input-wrap">
      <span class="diary-field-wrap">
        <label for="title" class="diary-label">Title:</label>
        <input name="title" id="title" type="text" class="diary-text">
      </span>
      <span class="diary-field-wrap">
        <label for="details" class="diary-label">Details:</label>
        <textarea cols="10" rows="3" id="details" name="details" class="diary-textarea"></textarea>
      </span>
      <span class="diary-field-wrap">
        <label for="start" class="diary-label">Start:</label>
        <input name="start" id="start" type="text" class="diary-text">
      </span>
      <span class="diary-field-wrap">
        <label for="finish" class="diary-label">Finish:</label>
        <input name="finish" id="finish" type="text" class="diary-text">
      </span>
      <span class="diary-field-wrap">
        <label for="reminder" class="diary-label">Remind Me:</label>
        <input name="reminder" id="reminder" type="text" class="diary-text">
      </span>

    </span>
    <input type="submit">
    <!-- <button class="action-btn diary-edit-confirm">Confirm</button> -->
    <button class="action-btn diary-edit-delete">Delete</button>
  </form>
</div>

</body>
</html>