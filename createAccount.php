<?php
$page_title = "Create Account";
include ("partials/header.inc");
?>

<body onload="document.createAccountForm.reset();">
<form name="createAccountForm" action="database_functions/submitNewAccount.php" method="POST">


    <label for="username">Username: </label>
    <input type="text" name="username" id="username" maxlength="30" onkeyup="checkExists(this.value)" required>
    <p id="usernameFeedback"></p>
    <br>

    <div id="passwordGroup">
        <label for="password1">Password: </label>
        <input type="password" name="password1" onblur="passwordMatch()" id="password1" maxlength="30" required>

        <label for="password2">Repeat Password: </label>
        <input type="password" name="password2" onblur="passwordMatch()" id="password2" maxlength="30" required>
        <br>
    </div>

    <label for="first_name">First Name:</label>
    <input type="text" name="firstname" maxlength="30" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="lastname" maxlength="30" required>
    <br>

    <label for="weight">Weight:</label>
    <input type="number" name="weight" step="0.01" min="100" required>
    <br>

    <label for="DOB">Birthday:</label>
    <input type="date" name="DOB" required>
    <br>

    <label for="height">Height:</label>
    <div id="height">
        <select name="heightFeet" required>
            <option disabled selected value="">ft</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <select name="heightInches" required>
            <option disabled selected value="">in</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
        </select>
    </div>

    <input type="radio" name="gender" value="male" required> Male<br>
    <input type="radio" name="gender" value="female"> Female<br>

    <button type="submit" name="submitNewAccount" id="submitNewAccount" disabled="true">Create Account</button>


</form>

<?php
include ("partials/footer.inc");
?>