<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body{
             background-image: url('img2.jpg');
             backdrop-filter: blur(10px);
             position: absolute;
             height: 100%;
             margin:0;
             top: 0;
             left: 0;
             bottom: 0;
             right:0;            
        }
        h2{         
            width:70%;
            height:70%;
            font-family: monospace;
            font-size: 27px;
            font-weight: bold;
            text-align: center;
            color:#0C005E ;
            margin-left: 200px;
            margin-top:80px;
            padding:10px 10px;
        }
        #optionset{
            position: absolute;
            border-radius: 10px;
             background: transparent;
             font-size: 23px;             
             top:298px;
             left:580px;
             background-color: #D0A9F5;
        } 
        .bt {        
          background-color: #f72585; 
          border-radius: 50px;
          border: none;
          color: white;
          top:0%;
          text-align: center;
          padding:10px 10px;
          font-size: 25px;
           }
       .bt:hover{
         background-color: #072891;;
         cursor : pointer;        
        }
        #rightbutton{
            position: absolute;
            text-align: center;
            left: 1300px;       
            width:12%;
        }
        #leftbutton{
            position: absolute;
            text-align: center;
            left: 60px;
        }
        #amount{
          background: transparent;
          border:2px solid #FA5858;
                 height:30px;
        }
        .entam{
            position: absolute;
            top:340px;
             left:470px;
             font-family: monospace;
            font-size: 27px;
            font-weight: bold;
            text-align: center;
            color:#0C005E ;
        }
        #paybtn{
             position: absolute;
            
             width:5%;
             left: 680px;
             bottom:200px;
             font-size:20px;
        }
          .headings{
           position: absolute;
          height:60px;
          width: 100%;
           background-color: #67D7E0;
       }
         #headertext{
          position:absolute;
          top:0px;
          color:white;
           font-size: 34px;
           font-family: candara;
        }
         #headertext1{
          position:absolute;
          top:0px;
          left: 1320px;
          color:white;
           font-size: 34px;
           font-family: candara;
        }
        #bankimage{
           height: 40px;
           width:40px;   
           position: absolute;
           left:350px;
              top:16px;
        }      
 </style>
</head>
<body>
    <div class="headings"><h1 id="headertext"><i>Greenwich Waters Bank</i></h1>
    <img id="bankimage" src="bank.png">
  <h1 id="headertext1"><i>Transfer Portal</i></h1></div>
   <?php      
         $id= $_GET['ID'];
         $user = 'id17090290_root';
         $pass = 'Kz!_WUJ-S)6QHv#P'; 
         $db = 'id17090290_db';
         $conn = new  mysqli('localhost', $user, $pass, $db) or die ("Unable to connect".$conn ->connect_error);
         $sql = "SELECT ID, Name, Amount FROM users where ID =".$id;
         $q = "SELECT ID, Name, Amount FROM users where ID !=".$id;
         $r = mysqli_query($conn,$q);
         $firstname = "";
         $fullname ="";
         $amtUser="";
         if($result = mysqli_query($conn,$sql))
         {
            $row=mysqli_fetch_array($result);
            $var = $row["ID"];
            $fullname= $row["Name"];
            $firstname = strtok($row["Name"],' ');
            $amtUser = $row["Amount"];
            echo "<input type='hidden' name='ID' value='".$var."'>";
            echo "<h2>
            <p>Hi, ".$firstname.". Glad to have you back !!</p> 
            <p>Your Current Balance is $".$amtUser.". </p>        
            <p>Who's the Lucky one ?</p>
            </h2>";
         }
         echo "<form  action='' method='POST'>";
         if($r -> num_rows > 0)
         {
         echo "<h1><select name='Name2' id='optionset'>";
         echo "<option value='' disabled selected>Choose option</option>";
           while($rows = $r -> fetch_assoc() )
           {    $var = $rows["ID"];    
                $amt = $rows["Amount"];
                echo "<option value='" . $var . "'>" .$rows['Name']." ( $". $amt." )" . "</option>";    
           }
           echo "</select></h1>";
           echo "<p class='entam'>Enter an amount to transfer: <input type='number' name ='txtbox' id='amount'></p>";
           echo "<div id='paybtn'>"."<a href=''><input type='submit' class='bt'  name='submit' value='PAY'></a>".
                 "</div>";
            if(isset($_POST['submit']))
            {
                    $amountToGive = $_POST['txtbox'];
                  $k=0;
                  if($amtUser < $amountToGive || $amountToGive == NULL || $_POST['Name2'] == NULL)
                  {
                        $k=1;
                        echo "<script type='text/javascript'>";
                        echo "window.location = 'failure.html';";
                        echo  "</script>";  
                  }
                  else
                  {
                              $k=0;
                        echo "<script type='text/javascript'>";
                                    echo "window.location = 'success.html';";
                                    echo    "</script>";   
                  }         
                if(!empty($_POST['Name2']) ) 
                {
                     $personIdToGive = $_POST['Name2'];
                     $tr = "SELECT Name, Amount FROM users where ID =".$personIdToGive;
                     $name ="";
                     if($res = mysqli_query($conn,$tr))
                     {
                           $ro=mysqli_fetch_array($res);
                   $name= $ro["Name"];
                     }
              if($k!=1)
              {
                        $q2 = "INSERT INTO transactions(ID,PersonFrom,PersonTo,Amount) 
                              VALUES(NULL, '".$fullname."', '".$name."', ".$amountToGive.")";}
                          if (mysqli_query($conn,$q2)) 
                  {
                                   echo "New record created successfully";
                                }
                            else
                  {
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                  if($k!=1)
                            {
                            $q = "UPDATE users SET Amount = Amount +".$amountToGive." WHERE ID = ".$personIdToGive;
                            $p = "UPDATE users SET Amount = Amount -".$amountToGive." WHERE ID = ".$id;
                  }
                            if (!(mysqli_query($conn,$q) && mysqli_query($conn,$p)))
                            {
                                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                            }
                    }  
                }
           echo "</form>";
           echo "<div id='rightbutton'>"."<a href='p3.php'><input type='submit' class='bt' value='Transactions'></a>".
                "</div>";
           echo "<div id='leftbutton'>"."<a href='table.php'><input type='submit' class='bt' value='Back'></a>".
                "</div>";
         }
         else
         {
                 echo "0 result";
         }
    $conn-> close();
   ?>  
</body>
</html>