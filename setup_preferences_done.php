<html>

<?php include_once 'header.php'?>

<style>
    .down-three {
        margin-bottom: 3cm;
    }
    .down-one {
        margin-bottom: 1cm;
    }

    html, body {
    height: 100vh;
    width: 100vw;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    ul.cloud {
    list-style: none;
    padding-left: 0;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    line-height: 2.75rem;
    width: 450px;
    }

    ul.cloud a {
    /*   
    Not supported by any browser at the moment :(
    --size: attr(data-weight number); 
    */
    --size: 4;
    --color: #a33;
    color: var(--color);
    font-size: calc(var(--size) * 0.25rem + 0.5rem);
    display: block;
    padding: 0.125rem 0.25rem;
    position: relative;
    text-decoration: none;
    /* 
    For different tones of a single color
    opacity: calc((15 - (9 - var(--size))) / 15); 
    */
    }

    ul.cloud a[data-weight="1"] { --size: 1; }
    ul.cloud a[data-weight="2"] { --size: 2; }
    ul.cloud a[data-weight="3"] { --size: 3; }
    ul.cloud a[data-weight="4"] { --size: 4; }
    ul.cloud a[data-weight="5"] { --size: 6; }
    ul.cloud a[data-weight="6"] { --size: 8; }
    ul.cloud a[data-weight="7"] { --size: 10; }
    ul.cloud a[data-weight="8"] { --size: 13; }
    ul.cloud a[data-weight="9"] { --size: 16; }

    ul[data-show-value] a::after {
    content: " (" attr(data-weight) ")";
    font-size: 1rem;
    }

    ul.cloud li:nth-child(2n+1) a { --color: #181; }
    ul.cloud li:nth-child(3n+1) a { --color: #33a; }
    ul.cloud li:nth-child(4n+1) a { --color: #c38; }

    ul.cloud a:focus {
    outline: 1px dashed;
    }

    ul.cloud a::before {
    content: "";
    position: absolute;
    top: 0;
    left: 50%;
    width: 0;
    height: 100%;
    background: var(--color);
    transform: translate(-50%, 0);
    opacity: 0.15;
    transition: width 0.25s;
    }

    ul.cloud a:focus::before,
    ul.cloud a:hover::before {
    width: 100%;
    }

    @media (prefers-reduced-motion) {
        ul.cloud * {
            transition: none !important;
        }
    }

    .down-five {
        margin-bottom: 3cm;
    }
    .down-one {
        margin-bottom: 1cm;
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
        position: fixed;
        margin-left: 75%;
        margin-top: 9%;
    }

    .btn{
        border-color:#BCE76D;
        width: 25%;
        font-size: 1.3vw;
        margin-left: 7%;
        border-width: 5px;
        font-family: "Chelsea Market";
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

<meta http-equiv="refresh" content="3;url=account.php">

</div>
</body>