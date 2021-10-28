<!--
This page is the matching page. It consists of the matching functionality and uses functions
to fetch and update the pets.
-->
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/additional/parallax/parallax.js"></script>

    <style>
        .container {
            width: 100%;
            position: relative;

        }

        .parallax-window {
            background: transparent;
            height: 500pt;
        }


        .text {
            padding-top: 20pt;
            padding-bottom: 20pt
        }

        .header {
            z-index: 2;
            position: relative;
            font-size: 6vw;
            color: #1a1e21;
            font-family: "Chelsea Market";
            margin-left: 870pt;
            padding-top: 100pt;
        }

    </style>
</head>
<?php
require_once 'header.php';
require_once 'additional/allpets.inc.php'
?>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col col-lg-3 border-right">
            <div class="row">
                <h1 style="margin-left: 30%; font-size: 2.5vw">Matches</h1>
            </div>
            <?php while ($row = $result->fetch_assoc()){?>
                <div class="row" style="margin-top: 5%">
                    <div class="col col-lg-4">
                    <img src="uploads/<?php echo $row['picture_destination']?>" class="rounded" style="width: 100%; margin-left: 10%"/>
                    </div>
                    <div class="col">
                <h1 style="font-size: 2vw"><?php echo $row['pet_name']?></h1>
                    <p style="font-size: 1vw">Say hi to <?php echo $row['pet_name']?></p>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <div class="col">
        </div>
    </div>
</div>

</body>
<script src='/libs/js/jquery/jquery-3.2.1.min.js'></script>
<script>
    var i = 0,
        d = null,
        x = null,
        interval = 3000;

    $(document).ready(function(){
        fetch();
    });

    function fetch(){
        // get the data *once* when the page loads
        $.getJSON('info.json', function(data){
            // store the data in a global variable 'd'
            d = data.result;
            // create a recurring call to update()
            x = setInterval(function(){
                update()
            }, interval);
        });
    }

    function update(){
        // if there isn't an array element, reset to the first once
        if (!d[i]){
            clearInterval(x);
            i = 0;
            fetch();
            return;
        }
        // remove the previous items from the page
        $('ul').empty();
        // add the next item to the page
        $('ul').append(
            '<li>' + d[i]['title']
            + '</li><li>' + d[i]['news']
            + '</li><li>' + d[i]['location']
            + '</li>'
        );
        // increment for the next iteration
        i++;
    }
</script>