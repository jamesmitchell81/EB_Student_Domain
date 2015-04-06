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
        var src = e.target || e.srcElement;
        var data = {};
        e.preventDefault();

        data.id = doc.getElementById('id').value;
        data.title = doc.getElementById('title').value;
        data.details = doc.getElementById('details').value;
        data['start-date'] = doc.getElementById('start-date').value;
        data['start-time'] = doc.getElementById('start-time').value;
        data['finish-date'] = doc.getElementById('finish-date').value;
        data['finish-time'] = doc.getElementById('finish-time').value;
        data['action'] = src.value;

        ajax.post(action, makeDataString(data),
          function(text) {
            console.log(text);
          });

      }, false)

      body.appendChild(container);
      timeout = setTimeout(function() {
        container.className = "show";
        clearTimeout(timeout);
      }, 10);
    });

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