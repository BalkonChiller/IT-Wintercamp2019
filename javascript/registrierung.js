//javascript
function isValid(str){
  return /[~`$%\^*+=\-\[\]\\';/{}|\\"<>]/g.test(str);
}

function registrieren(){
var fehler = "";

//passwort
if (document.getElementById("fpasswort1").value != document.getElementById("fpasswort2").value){
fehler += "Die eingegebenen Passwörter stimmen nicht überein\n";
}

if (document.getElementById("fpasswort1").value.length < 6){
fehler += "Passwort mit mindestens 6 Zeichen verwenden\n";
}

//email
if (document.getElementById("femail").value.length < 7 || document.getElementById("femail").value.indexOf("@") == -1 || document.getElementById("femail").value.indexOf(".", document.getElementById("femail").value.indexOf("@")) == -1){
fehler += "Eine korrekte E-Mail-Adresse eingeben\n";
}

//teilnahmejahr
var heute = new Date();
if (document.getElementById("fcamp").value="SummerCamp"){
  if (document.getElementById("fjahr").value < 2016 || document.getElementById("fjahr").value > heute.getFullYear()){
    fehler += "Ungültiges Jahr eingegeben\n";
  }
}

if (document.getElementById("fcamp").value="WinterCamp"){
  if (document.getElementById("fjahr").value < 2018 || document.getElementById("fjahr").value > heute.getFullYear()){
    fehler += "Ungültiges Jahr eingegeben\n";
  }
}

//fehler Sonderzeichen ausgabe
if (isValid(document.getElementById("fvorname").value) || isValid(document.getElementById("fnachname").value) || isValid(document.getElementById("fbenutzername").value)){
  fehler += "Folgende Sonderzeichen können nicht benutzt werden:\n ~`$%\^*+=\-\[\]\\';/{}|\<> bei Vorname, Nachname und Benutzername\n"
}

//datenschutz
if (document.getElementById("fdsgelesen").checked == false){
fehler += "Die Datenschutzbestimmungen sind noch nicht akzeptiert\n";
}

//ausgabe
if (fehler != ""){
var fehlertext = "Die folgenden Felder wurden nicht vollständig ausgefüllt:\n\n";
fehlertext += fehler;
alert(fehlertext + "\nBitte füll die Informationen noch aus. Danke.");
}
}

//teilnehmer
function sichtbarkeit(){
 if(document.getElementById("fteilnehmer").checked == true){
   var elem1=document.getElementById("teilnehmerjahr");
   elem1.style.visibility = 'visible';
 }
 else {
   var elem1=document.getElementById("teilnehmerjahr");
   elem1.style.visibility = 'hidden';
 }
}
