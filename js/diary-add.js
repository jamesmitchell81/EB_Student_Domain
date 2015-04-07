(function(doc, win) {

  var diaryAdd = doc.getElementById("diary-add-event");
  var diaryHourAdd = doc.querySelectorAll(".diary-hour");
  var diaryEvent = doc.querySelectorAll('.diary-event');

  for ( var i = 0; i < diaryHourAdd.length; i++ ) {
    diaryHourAdd[i].addEventListener('click', function(e) {
      var src = e.target || e.srcElement;
      var href = src.getAttribute('data-url');
      e.preventDefault();
      displayDiaryEdit(src, href);
    }, true);
  }

  for ( var i = 0; i < diaryEvent.length; i++ ) {
    diaryEvent[i].addEventListener('click', function(e) {
      var src = e.target || e.srcElement;
      var href;
      e.preventDefault();

      // needs proper fix.
      while ( !src.getAttribute('href') ) {
        src = src.parentElement;
      }

      href = src.getAttribute('href');

      displayDiaryEdit(src, href);
    }, false);
  }

  diaryAdd.addEventListener("click", function(e) {
    var src = e.target || e.srcElement;
    var href = src.getAttribute('href');
    e.preventDefault();
    displayDiaryEdit(src, href);
  }, false);

  function displayDiaryEdit(src, href)
  {
    var body = doc.getElementsByTagName('body')[0];

    ajax.get(href, function(text) {
      var container = doc.createElement('div');
      var exit, timeout, confirmBtn, deleteBtn;
      var form, action;

      container.id = "new-content-container";
      container.className = "content-container-hidden";
      container.innerHTML = text;

      form = container.querySelectorAll('form')[0];
      action = form.getAttribute('action');

      exit = container.querySelectorAll('.diary-edit-exit')[0];
      exit.addEventListener('click', function(e) {
        var src = e.target || e.srcElement;
        e.preventDefault();
        container.className = "content-container-hidden";
        timeout = setTimeout(function() {
          body.removeChild(container);
          clearTimeout(timeout);
        }, 100);

      }, false);

      confirmBtn = container.querySelectorAll('.diary-edit-confirm')[0];
      confirmBtn.addEventListener('click', function(e) {
        var btn = e.target || e.srcElement;
        var data = {};
        e.preventDefault();

        data.id = doc.getElementById('id').value;
        data.title = doc.getElementById('title').value;
        data.details = doc.getElementById('details').value;
        data['start-date'] = doc.getElementById('start-date').value;
        data['start-time'] = doc.getElementById('start-time').value;
        data['finish-date'] = doc.getElementById('finish-date').value;
        data['finish-time'] = doc.getElementById('finish-time').value;
        data['action'] = btn.value;

        console.log(action);
        console.log(makeDataString(data));

        ajax.post(action, makeDataString(data),
          function(text) {
            console.log(text);

            var url = win.location.href.split('/');

            dt = url.pop();
            month = url.pop();
            year = url.pop();

            thisDate = new Date(year, month - 1, dt);
            thatDate = new Date(data['start-date']);

            if ( thisDate.getDate() == thatDate.getDate() ) {

              for ( var i = 0; i < diaryHourAdd.length - 1; i++ ) {
                time = diaryHourAdd[i].getAttribute('data-time');
                thisDate.setHours(time.split(':')[0]);

                nextHour = new Date(thisDate.getTime());
                nextHour.setHours(thisDate.getHours() + 1);

                thatDate.setHours(data['start-time'].split(':')[0]);

                console.log(thisDate, nextHour, thatDate);

                if ( (thatDate.getTime() >= thisDate.getTime()) &&
                     (thatDate.getTime() < nextHour.getTime()) ) {

                  diaryHourAdd[i].appendChild(createEvent(data));
                }
              }
            }

            container.className = "content-container-hidden";
            timeout = setTimeout(function() {
              body.removeChild(container);
              clearTimeout(timeout);
            }, 100);
          });

      }, false)

      body.appendChild(container);
      timeout = setTimeout(function() {
        container.className = "show";
        clearTimeout(timeout);
      }, 10);
    });

  }

  function createEvent(data) {
    var a = doc.createElement('a');
    var span = doc.createElement('span');
    span.className =
    span.innerHTML = data['start-time'];
    span.className = "diary-event-start";
    a.appendChild(span);

    span = doc.createElement('span');
    span.innerHTML = " " + data.title + " ";
    span.className = "diary-event-title";
    a.appendChild(span);

    span = doc.createElement('span');
    span.innerHTML = data.details;
    span.className = "diary-event-description";
    a.appendChild(span);

    a.href = '#';
    a.className = 'diary-event';
    return a;
  }

  function makeDataString(obj)
  {
    var str = "";
    for ( var prop in obj ) {
      str += prop + "=" + obj[prop].trim() + "&";
    }
    return encodeURI(str);
  }


}(document, window))