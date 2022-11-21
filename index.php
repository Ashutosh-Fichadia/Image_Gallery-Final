<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta data-name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    
    <!--===== Boxicons CSS =====-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Image Gallery with Search Box</title> 
</head>
<body>
    <?php 
    echo '<script>$(".up").click(function(){$(".input1").click();});</script>';
    if(isset($_POST['img_submit'])){
        $tmp = $_POST['id1'];
        unlink('images/'.$tmp);
        $img_name=$_FILES['img_upload']['name'];
        $tmp_img_name=$_FILES['img_upload']['tmp_name'];
        $folder='images/';
        move_uploaded_file($tmp_img_name,$folder.$img_name);
    }
        if(isset($_GET['del'])){
            
            
            $tmp = $_GET['id1'];
            unlink('images/'.$tmp);
            // echo '<script type="text/JavaScript">alert("'.$tmp.' was Deleted")</script>';
            
        }
        elseif(isset($_GET['up'])){
            
            $tmp = $_GET['id1'];
            // unlink('images/'.$tmp);
            // $img_name=$_FILES['img_upload']['name'];
            // $tmp_img_name=$_FILES['img_upload']['tmp_name'];
            // $folder='images/';
            // move_uploaded_file($tmp_img_name,$folder.$img_name);
            echo '<script type="text/JavaScript">alert("Update was clicked")</script>';
        }
        
    ?>
    <!-- <a href="demo.php">Click</a> -->
    <div class="container">
        <form action='' method='POST' class="up1" enctype='multipart/form-data'>
            <input type='file'  class="input1" name='img_upload'>
            <input type='submit' class="sub" name='img_submit'>
        </form>
        <div class="search-box">
            <i class="bx bx-search"></i>
            <input type="text" placeholder="Search a movie">
        </div>

        <div class="images">
            <?php
            // $del="";
            // $rem="";
                
                $dir = "./images";
                $arr = scandir($dir);
                $arr = array_diff($arr, array('.','..'));
                // echo $arr;
                foreach($arr as $image){
                    
                    
                    // echo $image;
                    $label = strtok($image,'.');
                    echo "<div class='image-box' data-name='$label'>";
                    echo "<img src='images/$image' alt=''>";
                    echo "<h6>$label</h6>";
                    echo "<form method='GET'><button type='submit' name='del' id='$image/del' onClick='getId(this.id)' class='del'><span class='material-icons md-18'>delete</span></button>";
                    echo "<input type='hidden' name='id1' value='$image'></form>";
                    echo '<form action="" method="POST" class="up" enctype="multipart/form-data">';
                    echo "<input type='file'  class='input1' name='img_upload'><input type='hidden' name='id1' value='$image'>";
                    echo '<input type="submit" class="sub" value="Change" name="img_submit">';
                    echo '</form>';
                    echo "</div>";
                        
                }
                // if(isset)
            ?>
        </div>
    </div>
    <script>
        function getClick(){
            $(".input1").click();
            return false;
        }
        function getId(myid){
            // alert("HI");
            console.log(myid + " was clicked");
            
        } 
    </script>
    <script src="script.js"></script>
</body>
</html>