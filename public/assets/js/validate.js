var GPS_err = "true";
alert(GPS_err);
 //GPS
function GPS_check() {
  alert('hi');
    var GPS = document.getElementById('GPS').value; 
    var GPS_regix = /^[0-9]*$/;     
    GPS_err = GPS_regix.test(GPS);
    alert(GPS_err);   

    if(GPS != '') {
        if(! GPS_err) {
        alert(GPS_err); 
        document.getElementById('GPS_invalid').innerHTML="ﺻﺤﻴﺢ GPS  اﻟﺮﺟﺎء اﺩﺧﺎﻝ";
        }
    }
    else {
        alert(GPS_err);
        document.getElementById('GPS_invalid').style.display = 'none';
    }

    if (! GPS_err) {
        alert("submit true");
        document.getElementById("submit").disabled = false;     
    }
}
