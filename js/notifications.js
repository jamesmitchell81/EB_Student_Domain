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
      block.style.height = block.getBoundingClientRect().height;

      parentTimeoutTime = block.children.length * 500;

      var i = block.children.length - 1;

      interval = setInterval(function() {
        if ( i === 0 ) {
          clearInterval(interval);
          return;
        }

        var fadeSteps = 10;
        fadeInterval = setInterval(function() {
          if ( fadeSteps === 0 ) {
            clearInterval(fadeInterval);
            return;
          }
          block.children[i].style.opacity = fadeSteps / 10;
          fadeSteps--;
        }, 30);

        block.removeChild(block.children[i]);
        i--;
      }, 500);

      parentTimeout = setTimeout(function() {
        block.parentElement.removeChild(block);
        clearTimeout(parentTimeout);
      }, parentTimeoutTime);
    });
  }


} (window, document))