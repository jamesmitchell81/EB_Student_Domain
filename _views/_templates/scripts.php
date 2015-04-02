<!--<script src='<?= BASE_PATH . "_js/navbar.js"; ?>'></script>-->
<!--<script type="text/javascript" src='../_js/navbar.js'></script>-->
<script type="text/javascript">
(function(win, doc){

  var nav_one = doc.getElementById("nav-core-1");
  var nav_two = doc.getElementById("nav-core-2");
  var timeout, delay;

  nav_one.addEventListener("mouseover", function(e) {
    var src = e.target || e.srcElement;

    win.clearTimeout(timeout);
    win.clearTimeout(delay);
    // nav_two.style.top = to + "px";
    delay = win.setTimeout(function() {
      nav_two.style.top = "64px";
    }, 300)
  }, false);

  nav_one.addEventListener("mouseout", function(e) {
    win.clearTimeout(delay);

    timeout = win.setTimeout(function(){
      nav_two.style.top = "-1400px";
    }, 200);
  }, false);

  nav_two.addEventListener("mouseover", function(e) {
    var src = e.target || e.srcElement;
    // var srcBottom = src.getBoundingClientRect().top;
    win.clearTimeout(timeout);

    nav_two.style.top = "64px";
  }, false);

  nav_two.addEventListener("mouseout", function(e) {
    timeout = win.setTimeout(function(){
      nav_two.style.top = "-1400px";
    }, 200);
  }, false);

} (window, document))
</script>
<!-- <script src='<?php BASE_PATH . "_js/navbar.js"; ?>'></script>-->