<?php
    require_once('classes.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">       
        <title>RJS2000</title>
    </head>

    <body>
        <div class="content">
            <div class="app">

                <div class="heading">
                <h1><a href=".">RJS2000</a></h1>
                </div>

                <div class="input-area">
                    <form action="add_student.php" method="POST">
                        <input required autofocus type="text" style="border-color:red" name="fullname" placeholder="Student name"><br>
                        <input class="button-30" type="submit" value="Add">
                    </form>
                </div>

                <div class="name-bucket">
                    <?php 
                    Main::GetStudents() 
                    ?>
                </div>


            <div class="button-container">
                    <form action="index.php" method="GET">
                        <input  type="hidden" name="randomize" 
                            value="<?php
                                if(isset($_GET["randomize"])){
                                    echo $_GET["randomize"];
                                } else {
                                    
                                }?>">
                            <br>
                        <input id="randomize-btn" class="button-30 big-button" type="submit" value="Randomize">
                    </form>
                </div>

                
            </div>
        </div>

        <div id="randomized-bucket">
                    <?php 
                        // If randomize parameter exist in url, get randomized student
                        if(isset($_GET["randomize"])) {
                            Main::Randomize($_GET["randomize"]);
                        }
                    ?>
                </div>
        
    </body>
</html>