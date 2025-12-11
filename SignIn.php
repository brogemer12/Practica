<?php require('header.php');?>
<form action="query.php" method="post">
    <input type="hidden" name="register">

    <label for="name">Введите имя</label>
    <input type="text" name='login' id='login'><br>

    <label for="email">Введите email</label>
    <input type="email" name='email' id='email'cols="30"><br>

    <label for="pas">Введите passsword</label>
    <input type="text" name='password' id='pas'cols="30"><br>

    <label for="pas1">Повторите passsword</label>
    <input type="text" name='password1' id='pas1'cols="30"><br>

    <button class="my-button dancing-script-uniquifier" type="submit">Submit</button>

</form>
<?php require('footer.html');?>