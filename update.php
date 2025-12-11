<?php session_start(); require('db.php');?>
<?php require('header.php');?>
<?php 
    $sql = "SELECT * FROM `a` WHERE id ='".$_GET['id']."'"; 
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error();
    $row = mysqli_fetch_assoc($result);
?>
<form action="query.php" method="post">
    <input type="hidden" name="update">
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">

    <label for="UFirstname" class="label">Введите фамилию</label>
    <input value="<?=$row['First name'];?>" type="text" name='UFirstname' id='UFirstname'><br>

    <label for="Uname">Введите имя</label>
    <input value="<?=$row['Name'];?>" type="text" name='Uname' id='Uname'><br>

    <label for="ULastname">Введите отчество</label>
    <input value="<?=$row['Last name'];?>" class="bungee-spice-regular" type="text" name='ULastname' id='ULastname'><br>

    <label for="Uphone">Введите телефон</label>
    <input value="<?=$row['Phone'];?>" class="bungee-spice-regular" type="tel" name='Uphone' id='Uphone'><br>

    <label for="Uemail">Введите email</label>
    <input value="<?=$row['email'];?>" type="email" name='Uemail' id='Uemail'cols="30"><br>

    <label for="Uaddres">Введите аддрес</label>
    <textarea name="Uaddres" id="Uaddres" cols="70" rows="5"><?=$row['Adres'];?></textarea><br>

    <button class="my-button dancing-script-uniquifier" type="submit">Submit</button>

</form>
<?php require('footer.html');?>