<?php  require('db.php');?>
<?php require('header.php');?>
<?php 
    $sql = 'SELECT * FROM `a`'; 
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error();
?>
            <table>
                <thead> 
                    <tr>
                        <th>№</th>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Адрес</th>
                        <th>Посмотреть профиль</th>
                        
                    </tr>
                </thead>
                <?php $i = 0;?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <th><?php echo $i++; ?></th>
                    <th><?php echo $row['First name']; ?></th>
                    <th><?php echo $row['Name']; ?></th>
                    <th><?php echo $row['Last name']; ?></th>
                    <th><?php echo $row['Phone']; ?></th>
                    <th><?php echo $row['email']; ?></th>
                    <th><?php echo $row['Adres']; ?></th>
                    <th><a class="my-button dancing-script-uniquifier" href="cards.php?id=<?=$row['id']; ?>">Viev</a></th>
                </tr>
                <?php endwhile; ?>
            </table>
<?php require('footer.html');?>