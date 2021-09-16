<html>

<?php include_once 'header.php'?>

<style>
    .down-three {
        margin-bottom: 3cm;
    }
</style>

<p class='down-three'></p>

<head>
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
    <script type="text/javascript">
    $(function() {
    'use strict';
  
    var body = $('body');
  
    function goToNextInput(e) {
      var key = e.which,
        t = $(e.target),
        sib = t.next('input');
  
      if (key != 9 && (key < 48 || key > 57)) {
        e.preventDefault();
        return false;
      }
  
      if (key === 9) {
        return true;
      }
  
      if (!sib || !sib.length) {
        sib = body.find('input').eq(0);
      }
      sib.select().focus();
    }
  
    function onKeyDown(e) {
      var key = e.which;
  
      if (key === 9 || (key >= 48 && key <= 57)) {
        return true;
      }
  
      e.preventDefault();
      return false;
    }
    
    function onFocus(e) {
      $(e.target).select();
    }
  
    body.on('keyup', 'input', goToNextInput);
    body.on('keydown', 'input', onKeyDown);
    body.on('click', 'input', onFocus);
  
    })
    </script>
    <body>
        <div id="wrapper">
            <div id="dialog">
                <h3>Email has been sent! Please enter the 4-digit verification code that has been sent to your email:</h3>
                <div id="form">
                        <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                        <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" /><input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" /><input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                    <button class="btn btn-primary btn-embossed">Verify</button>
                </div>
                <div>
                    Didn't receive the code?<br />
                    <a href="#">Send code again</a><br />
                    <a href="#">Change phone number</a>
                </div>
            </div>
        </div>
    </body>
</head>
</html>