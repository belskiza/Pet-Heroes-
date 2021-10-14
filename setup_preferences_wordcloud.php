<html>
<head>
<?php include_once 'header.php'?>

<style>
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
    /*
    html, body {
    height: 80vh;
    width: 80vw;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    */
    ul.cloud {
        list-style: none;
        padding-left: 10;
        display: flex;
        flex-wrap: wrap;
        /*align-items: center;*/
        justify-content: center;
        line-height: 2.75rem;
        text-align: center;
        /*height: 300px;
        width: 300px;*/
        width: 400px;
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
        text-align: center;
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
        text-align: center;
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
        margin-left: 15%;
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
        margin-top: 1%;
        text-align: center;
    }

    .inner-cloud {
        margin-left: 35%;
        text-align: center;
    }

    .btn{
        border-color: #2c4c3b;
        background-color: #2c4c3b;
        width: 25%;
        font-size: 1.3vw;
        margin-left: 7%;
        border-width: 5px;
        font-family: "Chelsea Market";
    }
    
</style>

<body>
<div class="all-cloud">
    <h1> Pick the 5 that best describe who you are</h1> 
    <div class="inner-cloud">
        <ul class="cloud" role="navigation" aria-label="Webdev word cloud">
        <li><a href="#" data-weight="4">Energetic</a></li>
        <li><a href="#" data-weight="1">Psycho</a></li>
        <li><a href="#" data-weight="5">Charming</a></li>
        <li><a href="#" data-weight="8">Sporty</a></li>
        <li><a href="#" data-weight="6">Crazy</a></li>
        <li><a href="#" data-weight="4">Caring</a></li>
        <li><a href="#" data-weight="5">Quiet</a></li>
        <li><a href="#" data-weight="6">Loving</a></li>
        <li><a href="#" data-weight="2">Clingy</a></li>
        <li><a href="#" data-weight="9">Caring</a></li>
        <li><a href="#" data-weight="3">Naughty</a></li>
        <li><a href="#" data-weight="7">Adjective1</a></li>
        <li><a href="#" data-weight="8">Adjective2</a></li>
        <li><a href="#" data-weight="1">Adjective3</a></li>
        <li><a href="#" data-weight="3">Adjective4</a></li>
        </ul>
    </div>
</div>
<div class="images">
    <a class="btn btn-success" href="setup_preferences1.php" style="background-color: #2c4c3b;  width: 20%; margin-top: 2%; margin-left: 5%;">Previous Page</a>
    <a class="btn btn-success" href="setup_preferences_done.php" style="background-color: #2c4c3b;  width: 20%; margin-top: 2%; margin-left: 5%;">Finish Quiz</a>
</div>
</body>
</head>
<html>