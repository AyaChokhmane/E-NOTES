<?php
require_once("includes/connection.php");
require_once("includes/functions.php");

//SELECTING THE DATA WE WANNA MODIFY BY ID 
if (!isset($_GET['id'])) {
    header("Location: index.php");
}else{
    $id=$_GET['id'];
    $sql="SELECT * FROM notes WHERE id='" . $id ."' LIMIT 1";
    $result=mysqli_query($conn,$sql);
    $note=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}

//UPDATING THE DATA 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title=prep_data($_POST['title']);
    $content=prep_data($_POST['content']);
    $important=prep_data($_POST['important']);
    $id=prep_data($_POST['id']);

    $sql="UPDATE notes SET title='$title',content='$content',important='$important' WHERE id='$id'";
    if (mysqli_query($conn,$sql)) {
        header("Location: index.php");
    }
}

    ?>


<!DOCTYPE html>
<html>
    <head>
        <title>E-Notes</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <header>
    <h1 class="header">E-NOTES</h1>

    </header>
    <div class="new-note">
            <div ><a  href="index.php"> Home</a>
            <a href="new.php">New Note</a></div>
    </div>

    <form action="edit.php" method="post">     
    <input type="hidden" name="id" value=<?php echo $note['id']; ?> />            
            <span class="label">Title</span>
            <input type="text" name="title" value=<?php echo $note['title']; ?> />
            
            <span class="label">Content</span>
            <textarea name="content"> <?php echo $note['content']; ?></textarea>

            <div class="chkgroup">
                <span class="label-in">Important</span>
                <input type="hidden" name="important" value="0" />
                <input type="checkbox" name="important" value="1"
                <?php if($note['important']){
                        echo "checked" ; }
                        ?> />
            </div>
            
        <input type="submit" />
</html>