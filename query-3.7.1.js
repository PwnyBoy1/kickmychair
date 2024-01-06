/*let img = document.querySelector('img');
let btn1 = document.querySelector('#IB1');



var x = 1
function switching(){
    if  (x==1){
        document.getElementById("nokick").src = './KickMyC/kick.jpg';
        x++}
}


function switchback(){
    if (x==2){
        document.getElementById("nokick").src = './KickMyC/no_kick.jpg';
        x=1;}


        }    

var data = <?php echo json_encode($counterValue);?>;
$('#counter').text(data)
console.log(data);
function increment(){
    data++;
    console.log(increment)
    $('#counter').text(data)
    
    sendCounterToServer(data);
}

function sendCounterToServer(counterValue) {
    $.ajax({
        type: 'POST',
        url: 'update_counter.php',
        data: { users_score: counterValue },
        success: function (response) {
            console.log(response); // Log the response (for debugging)
        },
        error: function (error) {
            console.error('Error updating counter value:', error);
        }
    });

    
}


$('#IB1').click(function () {
    increment();
    switching();
    setTimeout(function () {
        switchback();
    }, 200);
}*/
