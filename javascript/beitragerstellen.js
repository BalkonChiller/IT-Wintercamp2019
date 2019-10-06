//javascript
function isValid(str){
  return !/[~`$%\^*+=\-\[\]\\';/{}|\\"<>]/g.test(str);
}

function beitragerstellen(){

var fehler = "";


//länge der eingaben
if (document.getElementById("titel").value.length < 5){
fehler += "Überschrift ist zu kurz\n";
}

if (document.getElementById("be").value.length < 7){
fehler += "Beschreibung ist zu kurz\n";
}

if (document.getElementById("inhalt").value.length < 10){
fehler += "Beitragsinhalt ist zu kurz\n";
}

if (document.getElementById("kategorie").value.length < 3){
fehler += "Kategorie ist zu kurz\n";
}

//kategorie
if (document.getElementsByName("kategorie").value.indexOf("#") == -1){
fehler += "Du brauchst ein #\n";
}

//fehler Sonderzeichen ausgabe
if (isValid(document.getElementById("be").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("titel").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("inhalt").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("kategorie").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}
//ausgabe
if (fehler != ""){
  var fehlertext = "Die folgenden Felder wurden nicht vollständig ausgefüllt:\n\n";
  fehlertext += fehler;
  alert(fehlertext + "\nBitte füll die leeren Felder noch aus. Danke.");
}
console.log(isValid(document.getElementById("titel").value));
console.log(isValid(document.getElementById("be").value));
console.log(isValid(document.getElementById("inhalt").value));
console.log(isValid(document.getElementById("kategorie").value));

}
