//javascript
function isValid(str){
  return !/[~`$%\^*+=\-\[\]\\';/{}|\\"<>]/g.test(str);
}

function beitragerstellen(){

var fehler = "";


//länge der eingaben
if (document.getElementById("ue").value.length < 5){
fehler += "Überschrift ist zu kurz\n";
}

if (document.getElementById("be").value.length < 7){
fehler += "Beschreibung ist zu kurz\n";
}

if (document.getElementById("bi").value.length < 10){
fehler += "Beitragsinhalt ist zu kurz\n";
}

if (document.getElementById("kt").value.length < 3){
fehler += "Kategorie ist zu kurz\n";
}

//kategorie
if (document.getElementsByName("kt").value.indexOf("#") == -1){
fehler += "Du brauchst ein #\n";
}

//fehler Sonderzeichen ausgabe
if (isValid(document.getElementById("be").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("ue").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("bi").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}

if (isValid(document.getElementById("kt").value)){
  fehler+="Folgende Sonderzeichen können nicht benutzt werden: [~`$%\^*+=\-\[\]\\';/{}|\\<>]\n"
}
//ausgabe
if (fehler != ""){
  var fehlertext = "Die folgenden Felder wurden nicht vollständig ausgefüllt:\n\n";
  fehlertext += fehler;
  alert(fehlertext + "\nBitte füll die leeren Felder noch aus. Danke.");
}
console.log(isValid(document.getElementById("ue").value));
console.log(isValid(document.getElementById("be").value));
console.log(isValid(document.getElementById("bi").value));
console.log(isValid(document.getElementById("kt").value));

}
