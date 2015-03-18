window.ajax = (function() {

  // add cross browser checking.
  var http = new XMLHttpRequest();

  http.onreadystatechange = function() {
    if ( http.readyState === 4 ) {
      if ( http.status === 200 ) {
        ajax.callback(http.responseText);
      }
    }
  }

  var ajax = {
    get: function(url, callback) {
      this.callback = callback;
      http.open("GET", url);
      http.send();
    },
    post: function(url, data, callback) {
      this.callback = callback;
      http.open("POST", url);
      http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // important
      http.send(data);
    },
    callback: function(){}
  };

  return ajax;
})();