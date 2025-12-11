<?php
    session_start();
    session_destroy();
?>
<?php require('header.php'); ?>
<form action="query.php" method="post">
    <input type="hidden" name="Login">

    <label for="name">Введите имя</label>
    <input type="text" name='name' id='name'><br>

    <label for="pass">Введите passsword</label>
    <input type="password" name='password' id='pass'cols="30"><br>

    <button class="my-button dancing-script-uniquifier" type="submit">Submit</button>

</form>
<?php require('footer.html');?>