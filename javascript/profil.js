//javascript
function isValid(str){
  return /[~`$%\^*+=\-\[\]\\';/{}|\\"<>]/g.test(str);
}

function profil(){
var fehler = "";

//email
if (document.getElementById("femail").value.length < 7 || document.getElementById("femail").value.indexOf("@") == -1 || document.getElementById("femail").value.indexOf(".", document.getElementById("femail").value.indexOf("@")) == -1){
fehler += "Eine korrekte E-Mail-Adresse eingeben\n";
}

//fehler Sonderzeichen ausgabe
if (isValid(document.getElementById("fvorname").value) || isValid(document.getElementById("fnachname").value) || isValid(document.getElementById("fbenutzername").value)){
  fehler += "Folgende Sonderzeichen können nicht benutzt werden:\n ~`$%\^*+=\-\[\]\\';/{}|\<> bei Vorname, Nachname und Benutzername\n"
}

//ausgabe
if (fehler != ""){
var fehlertext = "Die folgenden Felder wurden nicht vollständig ausgefüllt:\n\n";
fehlertext += fehler;
alert(fehlertext + "\nBitte änder deine Eingabe noch. Danke.");
return false;
}
else return true;
}
