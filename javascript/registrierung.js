//javascript
function isValid(str){
  return !/[~`$%\^*+=\-\[\]\\';/{}|\\"<>]/g.test(str);
}

function registrieren(){
var fehler = "";
//passwort
if (document.getElementsByName("fpasswort1").value != document.getElementsByName("fpasswort2").value){
fehler += "Die eingegebenen Passwörter stimmen nicht überein\n";
}

//email

if (document.getElementById("femail").value.length < 7){
fehler += "EMail-Adresse ist zu kurz\n";
}
else {
if (document.getElementsByName("femail").value.indexOf("@") == -1){
fehler += "Eine korrekte eMail-Adresse eingeben\n";
}

else {
if (document.getElementsByName("femail").value.indexOf(".", document.getElementsByName("femail").value.indexOf("@")) == -1){
fehler += "Nach dem @ muss ein Punkt folgen\n";
}

}

}

//teilnahmejahr
var heute=new Date();
if (document.getElementById("fcamp").value="SummerCamp"){
  if (document.getElementById("fjahr").value <2016){
    fehler += "Ungültiges Jahr eingegeben\n";
  }
}

if (document.getElementById("fcamp").value="SummerCamp"){
  if (document.getElementById("fjahr").value >heute.getFullYear()){
    fehler+= "Ungültiges Jahr eingegeben\n"
  }
}

if (document.getElementById("fcamp").value="WinterCamp"){
  if (document.getElementById("fjahr").value <2018){
    fehler += "Ungültiges Jahr eingegeben\n";
  }
}

if (document.getElementById("fcamp").value="WinterCamp"){
  if (document.getElementById("fjahr").value >heute.getFullYear()){
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

}
}
//teilnehmer
function sichtbarkeit(){
 if(document.getElementById("fteilnehmer").checked == true){
   var elem1=document.getElementById("teilnehmerjahr");
   elem1.style.visibility = 'visible';
 }
 else{
   var elem1=document.getElementById("teilnehmerjahr");
   elem1.style.visibility = 'hidden';
 }
}
