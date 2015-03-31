<div class="diary-edit-wrap">
  <form action='<?= "{$this->data['event']}"; ?>' method='post'>
    <!-- <span class="diary-edit-title">Edit</span> -->
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
        <label for="start-date" class="diary-label">Start:</label>
        <span class='diary-date-time-wrap'>
          <input name="start-date" id="start-date" type="text" class="diary-text" placeholder='Date'>
          <input name="start-time" id="start-time" type="text" class="diary-text" placeholder='Time'>
        </span>
      </span>
      <span class="diary-field-wrap">
        <label for="finish" class="diary-label">Finish:</label>
        <span class='diary-date-time-wrap'>
          <input name="finish-date" id="finish-date" type="text" class="diary-text" placeholder='Date'>
          <input name="finish-time" id="finish-time" type="text" class="diary-text" placeholder='Time'>
        </span>
      </span>
      <span class="diary-field-wrap">
        <label for="reminder" class="diary-label">Remind Me:</label>
        <input name="reminder" id="reminder" type="text" class="diary-text">
      </span>
    <!-- <input type="submit"> -->
      <button class="action-btn diary-edit-confirm">Confirm</button>
      <button class="action-btn diary-edit-delete">Delete</button>
    </span>
  </form>
</div>