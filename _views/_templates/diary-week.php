
<?php $diary = $this->data['diary']; ?>

<div class='diary-week'>
  <?php foreach ($this->data['hours'] as $hour) : ?>
    <span class="diary-day-week-time">
      <?= "{$hour}"; ?>
    </span>
  <?php endforeach; ?>
<?php foreach ($this->data['diary'] as $day => $diary) : ?>

  <h4><?php date('l jS F Y', strtotime($day)); ?></h4>


  <div class="diary-day-week">
    <?php foreach ($this->data['hours'] as $hour) : ?>

    <div class="diary-hour">

      <?php if ( $diary->hasEvent($day, date('H:i', strtotime($hour) )) ) : ?>

          <?php
            $today = $day;
            $time = date('H:i', strtotime($hour));
            $events = $diary->getEventsAt($today, $time);

            foreach ($events as $event) {

              $cls = strtolower($event->getDiaryName());

              echo " <span class='diary-event'>";
              echo "  <span class='diary-event-start'>{$event->getStartTime('H:i')}</span>";
              echo "  <span class='diary-event-title'>";
              echo "  {$event->getTitle()}";
              echo "  </span>";
              echo "  <span class='diary-event-location'>";
              echo "  {$event->getLocation()}";
              echo "  </span>";
              echo " </span>";
            }

          ?>
      <?php endif; ?>
    </div><!-- diary-hour -->

    <?php endforeach; ?>
  </div><!-- diary-day -->
<?php endforeach; ?>
</div><!-- diary-week -->
 -->