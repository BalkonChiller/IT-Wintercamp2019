function passwort_aendern(){
var fehler = "";

if (document.getElementById("fpasswort1").value != document.getElementById("fpasswort2").value){
fehler += "Die eingegebenen Passwörter stimmen nicht überein\n";
}

if (document.getElementById("fpasswort1").value.length < 6){
fehler += "Passwort mit mindestens 6 Zeichen verwenden\n";
}

//ausgabe
if (fehler != ""){
var fehlertext = "Es ist ein Fehler aufgetreten:\n\n";
fehlertext += fehler;
alert(fehlertext + "\nBitte änder deine Eingabe noch. Danke.");
}
}
