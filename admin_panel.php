<?php require("header.php"); require('db.php'); ?>
<?php 
    $sql = 'SELECT * FROM `users`';
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error();
?>

    <table>
                <thead> 
                    <tr>
                        <th>№</th>
                        <th>login</th>
                        <th>role</th>
                        <th>Email</th>
                        <th>Give role</th>
                    </tr>
                </thead>
                <?php $i = 0;?>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <th><?php echo $row['user_id']; ?></th>
                    <th><?php echo $row['login']; ?></th>
                    <th><?php echo $row['role']; ?></th>
                    <th><?=$row['email']; ?></th>
                    <th>
                        <a class="my-button12 dancing-script-uniquifier" href="query.php?role=admin&id=<?=$row['user_id']; ?>">Admin</a>
                        <a class="my-button12 dancing-script-uniquifier" href="query.php?role=read&id=<?=$row['user_id']; ?>">Read</a>
                    </th>
                </tr>
                <?php endwhile; ?>
            </table>

    <?php require("footer.html"); ?>