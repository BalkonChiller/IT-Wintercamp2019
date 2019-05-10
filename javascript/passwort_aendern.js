//passwort ändern js
function isValid(str){
  return /[~`$%\^*+=\-\[\]\\';/{}|\\"<>]/g.test(str);
}

function passwort_aendern(){
var fehler = "";

if (document.getElementsByName("pw1").value != document.getElementsByName("pw2").value){
fehler += "Die eingegebenen Passwörter stimmen nicht überein\n";
}

//fehler Sonderzeichen ausgabe
if (isValid(document.getElementById("emailf").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("pw1").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("pw2").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

//ausgabe
if (fehler != ""){
var fehlertext = "Es ist ein Fehler aufgetreten:\n\n";
fehlertext += fehler;
alert(fehlertext + "\nBitte änder deine Eingabe noch. Danke.");

}

}
