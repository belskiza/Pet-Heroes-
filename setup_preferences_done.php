<html>

<?php include_once 'header.php'?>

<style>
    .down-three {
        margin-bottom: 3cm;
    }
</style>



<body>
<div>
<p class='down-three'></p>
<h1> All Done! </h1> 

<p>
Thanks for answering the questions!
</p>
<p>
You are now all good to find your newest pet!
</p>

<p> Redirecting in <span id="countdowntimer">3 </span> Seconds</p>

<script type="text/javascript">
    var timeleft = 3;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(downloadTimer);
    },1000);
</script>

<meta http-equiv="refresh" content="3;url=profile.php">

</div>
</body>