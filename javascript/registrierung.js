
if (f.onlex_password.value == ""){
fehler += "- Anti-Spam-Kontrolle\n";
}

else {
   (f.onlex_password.value != "trowssap")
fehler += "- Passwort der Anti-Spam-Kontrolle ist falsch \n";
}


if (f.fpasswort1.value != f.fpasswort2.value){
fehler += "- die eingegebenen Passwörter stimmen nicht überein\n";
}

if (f.eMail.value == ""){
fehler += "- deine eMail-Adresse\n";
}

else {
if (f.eMail.value.length < 7){
fehler += "- eMail-Adresse ist zu kurz\n";
}
else {
if (f.eMail.value.indexOf("@") == -1){
fehler += "- eine korrekte eMail-Adresse\n";
}

else {
if (f.eMail.value.indexOf(".", f.eMail.value.indexOf("@")) == -1){
fehler += "- nach dem @ muss ein Punkt folgen\n";
}

}

}

}
