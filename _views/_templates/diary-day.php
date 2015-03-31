
<?php $diary = $this->data['diary']; ?>

  <div class="diary-day">
    <?php foreach ($this->data['hours'] as $hour) : ?>
    <div class="diary-hour">
      <span class="diary-time">
        <?= "{$hour}"; ?>
      </span>
      <?php if ( $diary->hasEvent($this->data['today'], date('H:i', strtotime($hour) )) ) : ?>

          <?php
            $today = $this->data['today'];
            $time = date('H:i', strtotime($hour));
            $events = $diary->getEventsAt($today, $time);

            foreach ($events as $event) {

            $cls = strtolower($event->getDiaryName());

              echo "<span class='event {$cls}'>";
              echo $event->getDiaryName();
              echo $event->getTitle();
              echo $event->getDescription();
              echo "</span>";

            }

          ?>
      <?php endif; ?>
    </div><!-- diary-hour -->
    <?php endforeach; ?>
  </div><!-- diary-day -->

