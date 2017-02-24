<form method="post">
    <label for="username">Username</label>
    <input name="username" type="text"><br/>
    <label for="age">Age</label>
    <input name="age" type="text"><br/>
        <input type="radio" name="gender" value="female" id="female" />
        <label for="female">Female</label>
        <input type="radio" name="gender" value="male" id="male" />
        <label for="male">Male</label></div><br/>
    <input name="kur" type="submit" value="KUR">

</form>
<?php
 print_r($_POST);
if(isset($_POST["kur"])){
    $user=$_POST["username"];
    $age =$_POST["age"];
    $gender=$_POST["gender"];

    echo"<h1>I am $user. I am $age years old. I am $gender</h1>";
    unset($age);}
?>