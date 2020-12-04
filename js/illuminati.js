function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}
function francMacons(pwd) {
  if (pwd='911') {
    var w= window.innerWidth;
    var h= window.innerHeight;
    var hautimage = getRandomInt(h-850);
    var gaucheimage = getRandomInt(w-850);
    var audio = new Audio('./media/TheXFilesTheme.mp3');
    audio.play();
    document.write('<img id="triangle" src="./img/Illuminati_triangle_eye.png" width="70" height="24" border="0" id="box" style="position :absolute ;top:'+hautimage+';left:'+gaucheimage+'">');
    window.setInterval(function(){var hautimage = getRandomInt(h-850); var gaucheimage = getRandomInt(w-850); document.getElementById('triangle').parentNode.removeChild(document.getElementById('triangle'));document.write('<img id="triangle" src="./img/Illuminati_triangle_eye.png" border="0" id="box" style="position :absolute ;top:'+hautimage+';left:'+gaucheimage+'">');},750);
  }
}