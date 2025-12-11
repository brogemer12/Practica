<?php require('header.php');?>
<form action="query.php" method="post">
    <input type="hidden" name="create">

    <label for="Firstname" class="label">Введите фамилию</label>
    <input type="text" name='Firstname' id='Firstname'><br>

    <label for="name">Введите имя</label>
    <input type="text" name='name' id='name'><br>

    <label for="Lastname">Введите отчество</label>
    <input class="bungee-spice-regular" type="text" name='Lastname' id='Lastname'><br>

    <label for="phone">Введите телефон</label>
    <input class="bungee-spice-regular" type="tel" name='phone' id='phone'><br>

    <label for="email">Введите email</label>
    <input type="email" name='email' id='email'cols="30"><br>

    <label for="addres">Введите аддрес</label>
    <textarea name="addres" id="addres" cols="70" rows="5"></textarea><br>

    <button class="my-button dancing-script-uniquifier" type="submit">Submit</button>

</form>
<?php require('footer.html');?>