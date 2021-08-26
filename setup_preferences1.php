<html>

<?php include_once 'header.php'?>

<style>
    .down-three {
        margin-bottom: 3cm;
    }
    .down-one {
        margin-bottom: 1cm;
    }
</style>

<body>
<div>
    <p class='down-three'></p>
    </p>
    <h1> Setup Preferences </h1> 
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
<a class="btn btn-primary btn-lg" href="setup_preferences2.php"> Next Page </a>
</div>
</body>
<html>