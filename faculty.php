
<?php include 'php/db_connect.php';?>

<?php


if(isset($_POST['btndelete'])){


    $id =   $_POST['id'];

    $sql = "DELETE FROM faculty WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FacultyList</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/programList.css">
    <!-- Custom JS -->
    <script src="js/script.js"></script>
    <script src="js/programList.js"></script>
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body >

    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href=""><i class="fa fa-fw fa-envelope"></i> Messages</a>
        <a href=""><i class="fa fa-fw fa-bell"></i> Notifications</a>
        <a href=""><i class="fa fa-fw fa-cogs"></i> Settings</a>
    </div>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">

        <button class="openbtn bg-dark" onclick="openNav()">&#9776; <b style="font-size: 18px;">Menu</b> </button>

        <a class="navbar-brand" style="margin-left:25%;" href="#">
            <img class="rounded-circle" style="width: 50px;height: 50px" src="images/Uni_Logo.png" alt="Logo"
                style="width:40px;">
        </a>

        <a class="navbar-brand" href="#">Uni-Review</a>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="example" action="action_page.php">
                <input type="text" placeholder="Search program" name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </nav>

        <!-- Links -->
        <ul class="navbar-nav" style="margin-left:15%;">
            <li class="nav-item">
                <a class="nav-link" href="homepage.php"><i class="fa fa-fw fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=><i class="fa fa-fw fa-user-circle"></i> Logout</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" style="margin-right: 2%"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-cogs"></i>
                    Settings</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="userprofile.php">Edit Profile</a>
                    <a class="dropdown-item" href="adminDashboard.php">Admin</a>
                    <a class="dropdown-item" href="aboutpage.php">About</a>
                    <a class="dropdown-item" href="#"> Contact Us</a>
                </div>
            </li>
        </ul>
    </nav>

    <!--Main Body Start-->

    <div class="container p-3 ">

        <div class = "row">

        <?php

            $uni_id=$_GET['uni_id'];

            
         $sql = "SELECT id,  name, email, research_area, img_src FROM faculty Where university = '$uni_id'";
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_array($result) ){


            echo  '            
            <div class = "col-sm-12 col-md-6 col-lg-4">             
			<div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
			
			 <div class="card-header"> <h2 class="text-center">'.$row["name"].'</h2></div>
			 <img class="card-img-top" src="upload/faculty/ '.$row["img_src"].'" alt="Card image cap">
			 <div class="card-body"><h5><b>email:</b> '.$row["email"].'</h5>
			 	<p> <b>research area:</b></p> 
                 <p> '.$row["research_area"].'.</p>               
             </div> 
             <div class="card-footer">
                
                
            <form method="post"   enctype="multipart/form-data">
                <input type="hidden" name = "id"  value ='.$row["id"].' >
                <button type="submit" name="btndelete" >Delete</button>
            </form>
                 </div>
                
             </div>
           </div>
        
            
            ';
          }
         
       
        
        ?>

 
            <!-- <div class = "col-sm-12 col-md-6 col-lg-4">             
               <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                <div class="card-body"><h5>Programming Language1</h5>
                    <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                </div> 
                <div class="card-footer">
                    <li class="list-group-item">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                    </li>
                    <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                    <div class='admin' style="display: none;" >
                        <button>Edit</button>
                        <button>Delete</button>
                    </div>
                   
                </div>
              </div>
            </div>


            

            <div class = "col-sm-12 col-md-6 col-lg-4">             
                <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                 <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                 <div class="card-body"><h5>Programming Language1</h5>
                     <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                 </div> 
                 <div class="card-footer">
                     <li class="list-group-item">
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                     </li>
                     <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                     <div class='admin' style="display: none;" >
                         <button>Edit</button>
                         <button>Delete</button>
                     </div>
                    
                 </div>
               </div>
             </div>


             <div class = "col-sm-12 col-md-6 col-lg-4">             
                <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                 <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                 <div class="card-body"><h5>Programming Language1</h5>
                     <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                 </div> 
                 <div class="card-footer">
                     <li class="list-group-item">
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                     </li>
                     <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                     <div class='admin' style="display: none;" >
                         <button>Edit</button>
                         <button>Delete</button>
                     </div>
                    
                 </div>
               </div>
             </div>
 
 
             <div class = "col-sm-12 col-md-6 col-lg-4">             
                 <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                  <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                  <div class="card-body"><h5>Programming Language1</h5>
                      <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                  </div> 
                  <div class="card-footer">
                      <li class="list-group-item">
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                      </li>
                      <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                      <div class='admin' style="display: none;" >
                          <button>Edit</button>
                          <button>Delete</button>
                      </div>
                     
                  </div>
                </div>
              </div>


              <div class = "col-sm-12 col-md-6 col-lg-4">             
                <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                 <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                 <div class="card-body"><h5>Programming Language1</h5>
                     <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                 </div> 
                 <div class="card-footer">
                     <li class="list-group-item">
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                     </li>
                     <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                     <div class='admin' style="display: none;" >
                         <button>Edit</button>
                         <button>Delete</button>
                     </div>
                    
                 </div>
               </div>
             </div>
 
 
             <div class = "col-sm-12 col-md-6 col-lg-4">             
                 <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                  <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                  <div class="card-body"><h5>Programming Language1</h5>
                      <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                  </div> 
                  <div class="card-footer">
                      <li class="list-group-item">
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                      </li>
                      <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                      <div class='admin' style="display: none;" >
                          <button>Edit</button>
                          <button>Delete</button>
                      </div>
                     
                  </div>
                </div>
              </div>

              <div class = "col-sm-12 col-md-6 col-lg-4">             
                <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                 <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                 <div class="card-body"><h5>Programming Language1</h5>
                     <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                 </div> 
                 <div class="card-footer">
                     <li class="list-group-item">
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                     </li>
                     <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                     <div class='admin' style="display: none;" >
                         <button>Edit</button>
                         <button>Delete</button>
                     </div>
                    
                 </div>
               </div>
             </div>
 
 
             <div class = "col-sm-12 col-md-6 col-lg-4">             
                 <div class="card space" onmouseover="hover(this); show()" onmouseout= "endHover(this); hide()">
                  <div class="card-header"> <h2 class="text-center">CSE115</h2></div>
                  <div class="card-body"><h5>Programming Language1</h5>
                      <p>This is programming language intorduction course. concepts of programming is tought in C Language.</p>               
                  </div> 
                  <div class="card-footer">
                      <li class="list-group-item">
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star checked"></span>
                          <span class="fa fa-star-half checked"></span> <a style="margin-left: 10px;" href="#">Rate </a>
                      </li>
                      <li class="list-group-item"><a href="#"> Click to view feedbacks -> </a></li>
                      <div class='admin' style="display: none;" >
                          <button>Edit</button>
                          <button>Delete</button>
                      </div>
                     
                  </div>
                </div>
              </div>

           
  -->
  
           
         </div>



    </div>
    <!--Main Body End-->

    <!--Bootstrap JS,JSQ-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>