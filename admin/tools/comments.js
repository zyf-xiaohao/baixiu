xhr = new XMLHttpRequest();
xhr.open('get','api/checkLogin.php',false);

xhr.onreadystatechange = function () {
  if (xhr.readyState == 4 && xhr.status == 200) {
    if (xhr.responseText.trim() != 'ok') {
      location = 'login.html';
      return;
    } 
  }
}

xhr.send();