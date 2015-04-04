(function(doc, win) {

  var diaryAdd = doc.getElementById("diary-add-event");

  diaryAdd.addEventListener("click", function(e) {
    var src = e.target || e.srcElement;
    var href = src.getAttribute('href');
    var body = doc.getElementsByTagName('body')[0];

    e.preventDefault();

    ajax.get(href, function(text) {

      var container = doc.createElement('div');

      container.innerHTML = text;

      body.appendChild(container);



    });

  }, false);



}(document, window))