//javascript
var fehler
//passwort
if (f.fpasswort1.value != f.fpasswort2.value){
fehler += "Die eingegebenen Passwörter stimmen nicht überein\n";
}

//email

if (f.femail.value.length < 7){
fehler += "EMail-Adresse ist zu kurz\n";
}
else {
if (f.femail.value.indexOf("@") == -1){
fehler += "Eine korrekte eMail-Adresse eingeben\n";
}

else {
if (f.femail.value.indexOf(".", f.femail.value.indexOf("@")) == -1){
fehler += "Nach dem @ muss ein Punkt folgen\n";
}

}

}

//teilnehmer
if(document.getElementById("fteilnehmer").checked = true){
  visibility:visible;
}

//teilnahmejahr
if (fcamp="SummerCamp"){
  if (fjahr <2016){
    fehler += "Ungültiges Jahr eingegeben\n";
  }
}

if (fcamp="SummerCamp"){
  if (fjahr >heute.getFullYear){
    fehler+= "Ungültiges Jahr eingegeben\n"
  }
}

if (fcamp="WinterCamp"){
  if (fjahr <2018){
    fehler += "Ungültiges Jahr eingegeben\n";
  }
}

if (fcamp="WinterCamp"){
  if (fjahr >heute.getFullYear){
    fehler+= "Ungültiges Jahr eingegeben\n"
  }
}
//datenschutz
if (document.getElementById("fdsgelesen").checked == false){
fehler += "Die Datenschutzestimmungen sind noch nicht akzeptiert\n";
}

//ausgabe
if (fehler != ""){
var fehlertext = "Die folgenden Felder wurden nicht vollständig ausgefüllt:\n\n";
fehlertext += fehler;
alert(fehlertext + "\nBitte füll die Informationen noch aus. Danke.");
return false;
}
