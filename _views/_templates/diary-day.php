
<?php $diary = $this->data['diary']; ?>

  <div class="diary-day" data-date='<?= $this->data['today']->format('Y/m/d');?>'>

    <?php foreach ($this->data['hours'] as $hour) : ?>

    <span class="diary-hour" data-url='<?= "{$this->data['add-link']}/{$hour}"; ?>' data-time='<?= $hour; ?>'>
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

              if ( $event->getId() ) {
                echo "<a href='{$this->data['edit-link']}/{$event->getId()}' class='diary-event $cls'>";
              } else {
                echo "<a class='diary-event $cls'>";
              }
              echo "  <span class='diary-event-start'>{$event->getStartTime('H:i')}</span>";
              echo "  <span class='diary-event-title'>{$event->getTitle()}</span>";
              echo "  <span class='diary-event-description'>{$event->getDescription()}</span>";
              echo "  <span class='diary-event-location'>{$event->getLocation()}</span>";
              echo "</a>";
            }

          ?>
      <?php endif; ?>
    </span><!-- diary-hour -->

    <?php endforeach; ?>
  </div><!-- diary-day -->

