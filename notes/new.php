<?php 
require_once("includes/functions.php");
require_once("includes/connection.php");

//INSERTING MY DATA THAT I RECEIVED FROM THE FORM 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title=prep_data($_POST['title']);
    $content=prep_data($_POST['content']);
    $important=prep_data($_POST['important']);
    $sql="INSERT INTO notes(title,content,important) VALUES('$title','$content','$important')";
    if (mysqli_query($conn,$sql)) {
        header("Location: index.php");
    }else{
        echo "something went wrong !";
        header("Location: index.php");


    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>E-NOTES</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <header>
                <h1 class="header">E-NOTES</h1>
    </header>

    <div class="new-note">
            <div ><a  href="index.php"> Home</a>
            <a href="new.php">New Note</a></div>
    </div>
    <form action="new.php" method="post">     
    <div class="container">
    <span class="label">Title</span>
            <input type="text" name="title" />
            
            <span class="label">Content</span>
            <textarea name="content"> </textarea>

            <div class="chkgroup">
                <span class="label-in">Important</span>
                <input type="hidden" name="important" value="0" />
                <input type="checkbox" name="important" value="1" />
            </div>
            
        <input type="submit" />

    </div>
    </form>
</html>
<?php 
require_once('includes/close.php');
?>