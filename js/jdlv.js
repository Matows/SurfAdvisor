var width = document.querySelector('main').clientWidth;
var height = document.querySelector('main').clientHeight;
var tailleCase = 30;
nbCasesW = parseInt(width/tailleCase);
nbCasesH = parseInt(height/tailleCase);

jdlvArray=Create2DArray(nbCasesW,nbCasesH);
function Create2DArray(rows, cols) {
  var arr = [];
  for (var i=0;i<rows;i++) {
     arr[i] = [];
     for (var j = 0; j < cols; j++) {
      if (Math.random()>.5){arr[i][j]=true} else {arr[i][j]=false}
     }
  }
  return arr;
}

function actualizeTable(jdlvArray) {
    iterateArray(jdlvArray);
    document.querySelector('main').innerHTML = printingTableTDLV(jdlvArray);
    for (var i = 0; i < jdlvArray.length; i++) {
        for (var j = 0; j < jdlvArray[i].length; j++) {
            document.querySelector('#case'.concat((i*jdlvArray[i].length+j).toString())).addEventListener('click',changeCaseState); 
        }
    }

}

function iterateArray(array) {
  var arr=[];
  for (var i = 0; i < array.length; i++) {
      arr[i]=array[i].map((x)=>x);
  }
  for (var i = 0; i < arr.length; i++) {
    for (var j = 0; j < arr[i].length; j++) {
      arr=checkCase(array,i,j, arr);
    }
  }
  for (var i = 0; i < array.length; i++) {
      array[i]=arr[i].map((x)=>x);
  }
  return arr;
}
function checkCase(array, i, j, arr) {
  var countAliveCells = 0;
  var posTests=[i!=0,j!=0,i!=nbCasesW-1,j!=nbCasesH-1];
  var testCC = array[i][j];
  if (posTests[0]) {countAliveCells=countAliveCells+checkAlive(array,i-1,j);}
  if (posTests[0] && posTests[3]) {countAliveCells=countAliveCells+checkAlive(array,i-1,j+1);}
  if (posTests[3]) {countAliveCells=countAliveCells+checkAlive(array,i,j+1);}
  if (posTests[2] && posTests[3]) {countAliveCells=countAliveCells+checkAlive(array,i+1,j+1);}
  if (posTests[2]) {countAliveCells=countAliveCells+checkAlive(array,i+1,j);}
  if (posTests[2] && posTests[1]) {countAliveCells=countAliveCells+checkAlive(array,i+1,j-1);}
  if (posTests[1]) {countAliveCells=countAliveCells+checkAlive(array,i,j-1);}
  if (posTests[0] && posTests[1]) {countAliveCells=countAliveCells+checkAlive(array,i-1,j-1);}
  arr[i][j]=(countAliveCells==3)||(testCC && countAliveCells==2);
  return arr;
}
function checkAlive(array,i,j) {
  if (array[i][j]==true) {return 1;} else {return 0;}
}

function printingTableTDLV(jdlvArray) {
    stringRet='<table id="jdlv">';
    for (var i = 0; i < jdlvArray.length; i++) {
        stringRet=stringRet.concat("<tr>");
        for (var j = 0; j < jdlvArray[i].length; j++) {
            if (jdlvArray[i][j]) {state='alive'} else {state='dead'}
            stringRet=stringRet.concat("<td id='case",i*jdlvArray[i].length+j,"' class='",state,"'></td>");
        }
        stringRet=stringRet.concat("</tr>");
    }

    return stringRet.concat('</table>');
}

function changeCaseState(event) {
    numb=event.target.id;
    var x = parseInt(parseInt(numb.slice(4)/nbCasesW));
    var y = parseInt(parseInt(numb.slice(4)%nbCasesH));
    if (document.querySelector('#'+numb).className=='alive') {
        document.querySelector('#'+numb).className='dead';
        jdlvArray[x][y]=false;
    } else {
        document.querySelector('#'+numb).className='alive'; 
        jdlvArray[x][y]=true;
    }
}

document.querySelector('main').innerHTML = printingTableTDLV(jdlvArray);
window.setInterval(function(){actualizeTable(jdlvArray)},300);

document.onkeydown = function (e) {
    switch (e.key) {
      case ' ':
        actualizeTable(jdlvArray);
        break; 
    }
}