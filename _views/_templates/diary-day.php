
<?php $diary = $this->data['diary']; ?>

  <div class="diary-day">

    <?php foreach ($this->data['hours'] as $hour) : ?>

    <a class="diary-hour" href='<?= "{$this->data['add-link']}/{$hour}"; ?>'>
      <span class="diary-time">
        <?= "{$hour}"; ?>
      </span>
      <?php if ( $diary->hasEvent($this->data['today']->format('Y-m-d'), date('H:i', strtotime($hour) )) ) : ?>

          <?php
            $today = $this->data['today']->format('Y-m-d');
            $time = date('H:i', strtotime($hour));
            $events = $diary->getEventsAt($today, $time);

            foreach ($events as $event) {

              $cls = strtolower($event->getDiaryName());

              // echo "  <a href='../../edit/{$event->getId()}' class='diary-event $cls'>";
              echo "<span data-event='{$event->getId()}' class='diary-event $cls'>";
              echo "  <span class='diary-event-start'>{$event->getStartTime('H:i')}</span>";
              echo "  <span class='diary-event-title'>";
              echo "  {$event->getTitle()}";
              echo "  </span>";
              echo "  <span class='diary-event-location'>";
              echo "  {$event->getLocation()}";
              echo "  </span>";
              echo "</span>";
            }

          ?>
      <?php endif; ?>
    </a><!-- diary-hour -->

    <?php endforeach; ?>
  </div><!-- diary-day -->

