(function(win, doc) {

  var deleteBtn = doc.querySelectorAll('.notification-delete');

  for ( var i = 0; i < deleteBtn.length; i++ ) {
    deleteBtn[i].addEventListener('click', deleteNotification, false);
  }

  function deleteNotification(e) {
    e.preventDefault();
    var src = e.target || e.srcElement;
    var href = src.getAttribute('href');

    ajax.get(href, function(text) {
      var block, timeout, parentTimeout;
      if ( text === '' ) return;

      block = doc.getElementById('notice-' + text);
      block.style.height = block.getBoundingClientRect().height + "px";
      block.style.opacity = 0;

      for ( var i = block.children.length - 1; i >= 0; i-- ) {
        // block.removeChild(block.children[i]);
        block.children[i].style.opacity = "0";
      }

      parentTimeout = setTimeout(function() {
        block.parentElement.removeChild(block);
        clearTimeout(parentTimeout);
      }, 1000);

      block.style.height = "0px";
      block.style.margin = "0";
      block.style.paddingBottom = "0";

    });
  }


} (window, document))