let img = document.querySelector('img');
let btn1 = document.querySelector('#IB1');
var x = 1

 

function switching(){
    if  (x==1){
        document.getElementById("nokick").src = 'KickMyC/kick.jpg';
        x++}
}


function switchback(){
    if (x==2){
        document.getElementById("nokick").src = 'KickMyC/no_kick.jpg';
        x=1;}


        }    

var data=0;
document.getElementById('counter').innerText=data;
function increment(){
    data=data+1;
    document.getElementById('counter').innerText=data;
}


