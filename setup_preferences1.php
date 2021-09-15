<html>
<head>
<?php include_once 'header.php'?>

<style>
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
<p class='down-five'></p>
<p class='down-five'></p>
<div>
    
    <h3> Setup Preferences </h3> 
    <div>
        <label for="exampleDataList" class="form-label">Question 1: What level of experience do you have owning pets?</label>
        <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">Experienced: Owned many pets before</option>
        <option value="2">Beginner: Owned at least one pet before</option>
        <option value="3">Novice: Never owned a pet before</option>
        </select>

        <p class='down-one'>
        </p>

        <label for="exampleDataList" class="form-label">Question 2: Is your property fenced off?</label>
        <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1">Yes</option>
        <option value="2">No</option>
        </select>

        <p class='down-one'>
        </p>

        <label for="exampleDataList" class="form-label">Question 3: How much time can you dedicate to your pet each day?</label>
        <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1"> more then 3 hours</option>
        <option value="2"> 1 - 3 hours</option>
        <option value="3">less then 1</option>
        </select>

        <p class='down-one'>
        </p>

        <label for="exampleDataList" class="form-label">Question 4: Insert Question?</label>
        <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="1"> 1</option>
        <option value="2"> 2</option>
        <option value="3"> 3</option>
        </select>

        <p class='down-one'>
        </p>

        <label for="exampleDataList" class="form-label">Question 5: What pet are you most interested in?</label>
        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
        <datalist id="datalistOptions">
        <option value="Dog">
        <option value="Cat">
        <option value="Other">
        </datalist>
    </div>

<div class="col-sm-6">
    <a type="button" class="btn rounded-pill" href='setup_preferences2.php'>Next Page</a>
</div>
</div>
</body>
</head>
<html>