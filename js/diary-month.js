(function(wind, doc){
  var days = doc.querySelectorAll(".diary-month td");

  for ( var i = 0; i < days.length; i++ ) {
    days[i].addEventListener("click", showDay, false);
  }

  function showDay(e) {
    var src = e.target || e.srcElement;
    var tabs = doc.getElementsByClassName("diary-month-tabs")[0];


  }

  function moveTabs() {

  }

}(window, document))