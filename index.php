<?php

include_once 'header.php';
include_once './includes/dbh.inc.php';
include_once './classes/login.classes.php';

$user = $_SESSION['userid'];

    $sql = "SELECT users_score FROM users WHERE users_id = '$user'";
    $result = $conn->query($sql);
 

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $counterValue = $row['users_score'];
    } else {
        $counterValue = 0;
    } 


?>


            <div class="container">

                
                        <img id = "kick" src="./KickMyC/kick.jpg" style="display:none;">
                        <img src="./KickMyC/no_kick.jpg" id="nokick" alt="Kick My Chair">

                        <div class="chairandcounter" id="Button">
                            <input id="IB1" type="Image" src="./KickMyC/button.png" alt="button">                
                            </div>
            <div class= "audioandtext">
                                        <audio controls loop autoplay id='song'>
                                            <source src="./KickMyC/kicksong.mp3" type="audio/mpeg">
                                        </audio>
                                        <h1 id="counter"><?php echo $counterValue; ?></h1>  
                                    </div> 
                                          
    </body> 
    
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
</html> 

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    
    let img = document.querySelector('img');
    let btn1 = document.querySelector('#IB1');

    var x = 1;

    function switching() {
        if (x == 1) {
            document.getElementById("nokick").src = './KickMyC/kick.jpg';
            x++;
        }
    }

    function switchback() {
        if (x == 2) {
            document.getElementById("nokick").src = './KickMyC/no_kick.jpg';
            x = 1;
        }
    }
<?php
if(isset($_SESSION["userid"])){ ?>
    var data = <?php echo json_encode($counterValue); ?>;
    $('#counter').text(data);
    console.log(data);

    function increment() {
        console.log('Increment function called');
    data++;
    console.log('Updated data:', data);
    $('#counter').text(data);
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
<?php   
}
else{ ?>
    var data = <?php echo json_encode($counterValue); ?>;
    $('#counter').text(data);
    console.log(data);

    function increment() {
        console.log('Increment function called');
    data++;
    console.log('Updated data:', data);
    $('#counter').text(data);
    }
<?php
}
?>

    $('#IB1').click(function () {
    console.log('Button clicked');
    increment();
    switching();
    setTimeout(function () {
        switchback();
    }, 200);
});
</script>