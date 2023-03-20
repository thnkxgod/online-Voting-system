<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../HTML/index.html");
} 

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red"> Not Voted </b>';
}
else{
    $status = '<b style="color:#2fc356">Voted </b>';
}

?> 







<html>
    <head>
        <title> Dashboard </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>

    <Body>                                                           <!-- use ->>>>>    background="../Image/krishna.jpg"  for adding image in background-->
    <style>

     b{
        float:left;
        }

    body{
        background-image: url('../Image/images\ \(15\).jpeg');
        background-repeat: no-repeat;
        background-size: cover;
        }

    #mainSection{
        padding:15px;
    }
    #gPannel{
        padding:15px;
    }

    #backbtn{
        background-color: rgb(35 151 3 / 22%);
        float : left;


        }

    #logoutbtn{
        background-color:rgb(255 0 0 / 22%);
        float : right;

        }


    #gPannel {
        padding: 15px;
        width: 100%;
        height: 87%;

    }

    #profile{
        height:50%;
        backdrop-filter:blur(200px);
        border-radius: 15px;
        color:white;
        width:30%;
        padding:10px;
        float:left;
 
    }

    #group{
        height:50%;
        backdrop-filter:blur(200px);
        border-radius: 15px;
        color:white;
        width:69%;
        padding:10px;
        float:right;
 
    }

    #group img, #profile img {
        border-radius: 50px;
     }


    </style>

    <div id="mainSection">

        <div id="headerSection">
            <a href="../HTML/index.html"> <button id="backbtn"> Back</button></a>
            <a href="../api/logout.php"> <button id="logoutbtn"> Logout</button></a>
            <h1> Online Voting System </h1>
        </div>
        <hr>

        <div id="gPannel">
            <div id="profile">
                <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"><br><br>
                <b>Name : </b> <?php echo $userdata['name'] ?><br><br>
                <b>mobile : </b> <?php echo $userdata['mobile'] ?><br><br>
                <b>Address : </b> <?php echo $userdata['address'] ?><br><br>
                <b>status : </b><?php echo $status ?><br>
            </div>
        
            <div id="group">
                <?php 
                    if($_SESSION['groupsdata']){
                        for($i=0;$i<count($groupsdata);$i++){
                            ?>
                            <div>
                                <img style="float:right;" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" width="100" height="100">
                                <b>Group Name :</b> <?php echo $groupsdata[$i]['name'] ?><br><br>
                                <b>Votes : </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                                <form action="../API/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                    <?php 
                                    if($_SESSION['userdata']['status']<2){
                                        if($_SESSION['userdata']['status']<1){
                                        ?><input type="submit" name="votebtn" value="Vote" id="votebtn"><?php
                                        }

                                    }
                                    else{
                                        echo "
                                        <script>
                                            alert(' You already voted...! ');
                                            window.location = '../routes/dashboard.php';
                                        </script>
                                        ";
                                    } ?>  

                                </form>
                            </div><hr> 
                            <?php
                        }
                    }
                    else{
                         
                    }
                ?>
        
            </div>

        </div>
    

    </div>
    <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p>&copy; 2023 www.rajendrasingharora.com. All rights reserved.</p>
            </div>
          </div>
        </div>
      </footer>


    </Body>
</html>  