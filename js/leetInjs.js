textToKeep=document.body.innerHTML;
//récupère le document HTML sans modification

leeted=false;
//dis si le code est 13373d

stopLeeting=true;
//permet de passer entre la transcription en 1337 et le texte normal (on va éviter de détruire l'HTML à des fins de paradis quand même)

const alphabetBasic = {
  'a': '4',
  'b': '8',
  'e': '3',
  'f': 'ph',
  'g': '6', 
  'i': '1',
  'o': '0',
  's': '5',
  't': '7'
}
//l'alphabet du 1337 par excellence

function convertInput(text) {
  for (let i = 0; i < text.length; i++) {
    let alphabet
    let letter = text[i].toLowerCase()
    alphabet = alphabetBasic[letter]
    if (alphabet) {
      text = text.replace(text[i], alphabet)
    }
  }
  return text
}
//transforme une chaine de caractères en sa version 1337

function sup3r53cr371npu7(pwd) {
  if (pwd=='babyshark'){if (!leeted) {text = document.body.innerHTML;
  textToInput='';
  for (var i = 0; i < text.length; i++) {
    if (text[i][0]=='<') {stopLeeting=true}
    if (text[i][0]=='>') {stopLeeting=false}
    if (stopLeeting) {textToInput=textToInput.concat(text[i])} else {textToInput=textToInput.concat(convertInput(text[i]))}
  }
  document.body.innerHTML=textToInput;; leeted = true} else {document.body.innerHTML=textToKeep; leeted = false}}
}
//effectue la transformation en 1337 et sa retransformation en texte normal (pour revenir au texte de la plèbe)