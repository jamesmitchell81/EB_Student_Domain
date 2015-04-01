

<div class="diary-month">
<?php foreach( $this->data['calender'] as $row) : ?>

<?php endforeach; ?>

<?php foreach( $this->data['calender'] as $row) : ?>

  <div class='diary-month-cal-row'>
    <?php foreach($row as $day => $date) : ?>
      <div class='diary-month-cal-cell'>
        <?= $date; ?>
      </div>
    <?php endforeach; ?>
  </div>

<?php endforeach; ?>
</div><!-- diary - month -->
      <table class="diary-month">
        <thead>
          <tr>
            <th class="diary-month-day">Mon</th>
            <th class="diary-month-day">Tue</th>
            <th class="diary-month-day">Wed</th>
            <th class="diary-month-day">Thu</th>
            <th class="diary-month-day">Fri</th>
            <th class="diary-month-day">Sat</th>
            <th class="diary-month-day">Sun</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="" data-date="01-12-2014">1</td>
            <td class="heat-4" data-date="02-12-2014">2</td>
            <td class="" data-date="03-12-2014">3</td>
            <td class="" data-date="04-12-2014">4</td>
            <td class="heat-3" data-date="05-12-2014">5</td>
            <td class="" data-date="06-12-2014">6</td>
            <td class="" data-date="07-12-2024">7</td>
          </tr>
          <tr>
            <td>8</td>
            <td>9</td>
            <td class="heat-1">10</td>
            <td>11</td>
            <td>12</td>
            <td class="heat-2">13</td>
            <td>14</td>
          </tr>
          <tr>
            <td>15</td>
            <td class="heat-2">16</td>
            <td>17</td>
            <td>18</td>
            <td>19</td>
            <td class="heat-5">20</td>
            <td>21</td>
          </tr>
          <tr>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td class="heat-5">25</td>
            <td class="heat-2">26</td>
            <td class="heat-4">27</td>
            <td>28</td>
          </tr>
          <tr>
            <td>29</td>
            <td>30</td>
            <td>31</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
          </tr>
        </tbody>
      </table>
