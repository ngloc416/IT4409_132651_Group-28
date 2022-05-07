function getCookie(name) {
  var cookieArr = document.cookie.split(";");
  for (var i = 0; i < cookieArr.length; i++) {
    var cookiePair = cookieArr[i].split("=");
    if (name == cookiePair[0].trim()) {
      return decodeURIComponent(cookiePair[1]);
    }
  }
  return null;
}

function loadCookie() {
  var allCookie = getCookie("cookie");
  var start = 0;
  var stop = allCookie.length;
  var i = 0;
  while (true) {
    for (i = start; i < stop; i++) {
      if (allCookie[i] == " ") break;
    }

    var tmpCookie = allCookie.substring(start, i);
    document.writeln(tmpCookie + " ");
    start = i + 1;
    if (start >= stop) break;
  }
}

function addCookie() {
  var data = document.myform.textarea.value;
  if (data == "") {
    return false;
  } else {
    var oldCookie = getCookie("cookie");
    var cookievalue = "";
    cookievalue = encodeURIComponent(data);
    var maxAge = "; max-age=" + 1 * 24 * 60 * 60 + ";";
    document.cookie = "cookie=" + cookievalue + maxAge;
    document.myform.textarea.value = "";
  }
}
