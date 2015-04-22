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
      var block;
      if ( text === '' ) return;

      block = doc.getElementById('notice-' + text);

      for ( var i = block.children.length - 1; i >= 0; i-- ) {

        block.removeChild(block.children[i]);
      }

    });
  }


} (window, document))