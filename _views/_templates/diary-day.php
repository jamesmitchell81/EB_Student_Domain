<?php include "head.php"; ?>

<?php include "logo-column.php"; ?>

<div class="col-2">
<?php include "header-nav.php"; ?>
  <article id="content">

    <div class="wrap" id="content-header">
      <h2><span class='page-action'>View</span><span class='page-entity'>Diary</span></h2>
    </div>

    <div class="wrap" id="content-workspace">

      <div class="diary-day">
        <div class="diary-hour">
          <span class="diary-time">08:00</span>
        </div>
        <div class="diary-hour">
          <span class="diary-time">09:00</span>
          <span class="diary-item">Lorem ipsum dolor sit amet</span>
        </div>
        <div class="diary-hour">
          <span class="diary-time">10:00</span>
          <span class="diary-item">
            Lorem ipsum dolor sit amet
            Lorem ipsum dolor sit amet
          </span>
        </div>
        <div class="diary-hour">
          <span class="diary-time">11:00</span>
        </div>
        <div class="diary-hour">
          <span class="diary-time">12:00</span>
        </div>
        <div class="diary-hour">
          <span class="diary-time">13:00</span>
        </div>
      </div>

      <div class="diary-edit-wrap">
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
        <button class="action-btn diary-edit-confirm">Confirm</button>
        <button class="action-btn diary-edit-delete">Delete</button>
      </div>

    </div>
  </article>

</div>
<!-- <?php include "_includes/footer.php"; ?>