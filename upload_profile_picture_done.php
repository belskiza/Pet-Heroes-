<html>

<?php include_once 'header.php'?>

<style>
    .down-three {
        margin-bottom: 3cm;
    }
    .down-one {
        margin-bottom: 1cm;
    }

    .down-five {
        margin-bottom: 3cm;
    }
    
    .header h1 {
        font-size: 3vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 10%;
    }
    .header img{
        margin-left: 55%;
        margin-top: 3%;
    }
    .container {
        margin-left: 2%;
    }
    .col-sm-6 {
        margin-top: 1%;
    }
    .col-sm-6 h1 {
        font-size: 2.5vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 1%;
    }
    .col-sm-8 h1 {
        font-size: 2.5vw;
        color: black;
        font-family: "Chelsea Market";
        margin-top: 7%;
    }
    .col-sm-8 p {
        font-size: 2vw;
        color: black;
        font-family: "Chelsea Market";
    }
    .images{
    
    margin-left: 30%
}

    .all-cloud {
        margin-top: 5%;
        text-align: center;
    }

    .inner-cloud {
        margin-left: 35%;
        text-align: center;
    }

    .btn{
        background: #BCE76D;
        border-color:#BCE76D;
        width: 25%;
        font-size: 1.3vw;
        margin-left: 7%;
        border-width: 5px;
        font-family: "Chelsea Market";
    }
</style>



<body>
<div class="all-cloud">

    <h1> All Done! </h1> 

    <p>
    You have successfully uploaded a profile picture
    </p>

    <p> Redirecting in <span id="countdowntimer">3 </span> Seconds</p>
</div>
<script type="text/javascript">
    var timeleft = 3;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
</script>

<meta http-equiv="refresh" content="3;url=account.php">

</div>
</body>