function check_wachtwoord() {
    var wachtwoord = document.getElementById('wachtwoord').value;
    var wachtwoord_controle = document.getElementById('wachtwoord_controle').value;

    if (wachtwoord !== wachtwoord_controle) {
        document.getElementById('wachtwoord_check').innerHTML = 'Wachtwoorden komen niet overeen!';
    } else document.getElementById('wachtwoord_check').innerHTML = '';
}

function zelfde_adres() {
    console.log()
    var data = document.getElementsByClassName("is_zelfde");
    if (document.getElementById("checkbox_zelfde_adres").checked == true) {

        for (var i = 0; i < data.length; i++) {
            data[i].disabled = true;
        }

    } else {
       for (var i = 0; i < data.length; i++) {
            data[i].disabled = false;
           
        }
    }
}

 function details_tonen(id) {
            var str = "table_";
            var res = str.concat(id);
            var x = document.getElementById(res);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
}

function alert_box() {
  alert("Je item werd in je winkelmand gezet!");
}