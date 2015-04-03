(function(doc, win) {

  var diaryAdd = doc.getElementById("diary-add-event");

  diaryAdd.addEventListener("click", function(e) {
    var src = e.target || e.srcElement;
    var href = src.getAttribute('href');
    e.preventDefault();

    console.log(href);




  }, false);



}(document, window))