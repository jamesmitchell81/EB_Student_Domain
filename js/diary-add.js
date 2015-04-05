(function(doc, win) {

  var diaryAdd = doc.getElementById("diary-add-event");
  var diaryHourAdd = doc.querySelectorAll(".diary-hour");

  for ( var i = 0; i < diaryHourAdd.length; i++ ) {
    diaryHourAdd[i].addEventListener('click', function(e) {
      var src = e.target || e.srcElement;
      var href = src.getAttribute('data-url');
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
    console.log(src);
    var body = doc.getElementsByTagName('body')[0];

    ajax.get(href, function(text) {
      var container = doc.createElement('div');
      var exit, timeout;

      container.id = "new-content-container";
      container.className = "content-container-hidden";
      container.innerHTML = text;

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
      body.appendChild(container);
      timeout = setTimeout(function() {
        container.className = "show";
        clearTimeout(timeout);
      }, 10);
    });

  }


}(document, window))