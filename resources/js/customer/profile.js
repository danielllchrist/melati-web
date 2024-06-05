console.log('tes')

function p(){
    console.log('masuk');
}

function hidePassword() {
    console.log('masuk');
    var x = document.getElementById('passlama');
    var y = document.getElementById('passbaru');
    var eye = document.getElementById('eyehide');

    console.log(x);
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

    if (y.type === "password") {
        y.type = "text";
      } else {
        y.type = "password";
      }
  }
