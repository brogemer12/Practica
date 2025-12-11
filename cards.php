<?php require('db.php');?>


<?php 
    $sql = "SELECT * FROM `a` WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($mysqli, $sql);
    if(mysqli_errno($mysqli)) echo mysqli_error();
    $row = mysqli_fetch_assoc($result);
?>
<?php require('header.php');?>
    <table class="caveat-uniquifier">            
        <tr>
            <th colspan="2" >Карточка <?=$row['Name']; ?></th>
        </tr>
        <tr>
            <td>Фамилия</td>
            <td><?=$row['First name']; ?></td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><?=(!empty($row['Name']))?  $row['Name']:  "-"; ?></td>
        </tr>
        <tr>
            <td>Отчество</td>
            <td><?=(!empty($row['Last name']))? $row['Last name']: "-"; ?></td>
        </tr>
        <tr>
            <td>Телефон</td>
            <td><?=(!empty($row['Phone']))? $row['Phone']: "-"; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?=(!empty($row['email']))? $row['email']: "-"; ?></td>
        </tr>
        <tr>
            <td>Адресс</td>
            <td><?=(!empty($row['Adres']))? $row['Adres']: "-"; ?></td>
        </tr>

    </table>
    <div>

        <?php if(isset($row['User_id']) && isset($_SESSION['userId']) || isset($_SESSION['role'])):?>
            <?php if($row['User_id'] == $_SESSION['userId'] || $_SESSION['role'] == 'admin'):?>
                <a class="my-button dancing-script-uniquifier" href="query.php?del&id=<?=$row['id']; ?>">Delete</a>
                <a class="my-button dancing-script-uniquifier" href="update.php?id=<?=$row['id']; ?>">Update</a>
            <?php endif;?>
        <?php endif;?>
        
        <form action="query.php" method="post">
            <?php 
                $sql = "SELECT * FROM `coments` WHERE article_id = '".$_GET['id']."'";
                $result = mysqli_query($mysqli, $sql);
                if(mysqli_errno($mysqli)) echo mysqli_error();
            ?>
            <input type="hidden" name="coments">
            <input type="hidden" name="id" value="<?=$_GET['id'];?>">
            <input class="textarea1" type="comments" placeholder="Comments" name="coment">
            <button class="my-button dancing-script-uniquifier" type="submit">Submit</button>
        </form>
        <label for=><?php if(!empty($row1['comment']) && isset($row1['article_id']) == $_GET['id']) echo $row1['comment'].'<br>'; ?></label>
        <?php while($row1 = mysqli_fetch_assoc($result)): ?>
            <?php if(!isset($_GET['update'])):?>
            <form action="">
                
                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <input type="hidden" name="update">                
                <label class="my-label dancing-script-uniquifier"><?=$row1['comment']?></BR></label>

                <?php if(isset($row1['user_id']) && isset($_SESSION['userId']) || isset($_SESSION['role'])):?>
                    <?php if($row1['user_id'] == $_SESSION['userId'] || $_SESSION['role'] == 'admin'):?>
                        <button class="button dancing-script-uniquifier" type="submit">Update</button>
                        <a class="my-button dancing-script-uniquifier" href='query.php?id_comment=<?=$row1['id'];?>&id=<?=$_GET['id'];?>'>Delete</a>
                    <?php endif;?>
                <?php endif;?>

            </form>
            <?php endif;?>
            <?php if(isset($_GET['update'])):?>
            <form action="query.php">
                <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                <input type="hidden" name="id_comment" value='<?=$row1['id'];?>'>              
                <textarea name="EditText" id="EditText"><?=$row1['comment']?></textarea>
                <button class="button dancing-script-uniquifier" type="submit">Save</button>
            </form>
            <?php endif;?>
        <?php endwhile; ?>
    </div>
<?php require('footer.html');?>