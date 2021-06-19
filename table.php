<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			 background-image: url('img2.jpg');
			 backdrop-filter: blur(10px);
			 position: absolute;
			 margin:0;
             top: 0;
             left: 0;
             bottom: 0;
             right:0;
		}		
		table{
			border-collapse: collapse;
			width:70%;
			height:70%;
			font-family: monospace;
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			color:#0C005E ;
			margin-left: 260px;
			margin-top:80px;
			padding:10px 10px;
        }
        th{
			font-size: 30px;
			color:#000E43;
		}
		.bt {
		  background-color: #f72585; 
		  border-radius: 50px;
		  border: none;
		  color: white;
		  padding: 10px 22px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		}
       .bt:hover{
         background-color: #072891;;
         cursor : pointer;    
        }
        #leftbutton{
        	position: absolute;
        	text-align: center;
        	left: 700px;
        	bottom:62px;
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
	<div class="headings"><h1 id="headertext"><i>Greenwich Waters Bank</i></h1></div>
	<div ><img id="bankimage" src="bank.png"></div>
	<div ><h1 id="headertext1"><i>Customers</i></h1></div>
   <table>
   <thead>
   	<tr>
   		<th>ID</th>
   		<th>Name</th>
   		<th>Amount</th>
   		<!--<th>Transaction</th>-->
   	</tr>
   </thead>
   <?php
         $user = 'id17090290_root';
         $pass = 'Kz!_WUJ-S)6QHv#P'; 
         $db = 'id17090290_db';
         $conn = new  mysqli('localhost', $user, $pass, $db) or die ("Unable to connect".$conn ->connect_error);

        
         $sql = "SELECT ID, Name, Amount FROM users";
         $result = mysqli_query($conn,$sql);

         if($result -> num_rows > 0)
         {
         	while($row = $result -> fetch_assoc() ){
         		  // session_start();
                   $var = $row["ID"];

                   echo "<input type='hidden' name='ID' value='".$var."'>";
         		echo "<tr>"
         		          ."<td>".$row["ID"]."</td>"
         		          ."<td>".$row["Name"]."</td>"
         		          ."<td>".$row["Amount"]."</td>"
         		          ."<td>"."<a href='p2.php?ID=".$var."'><input type='submit' class='bt' value='Transfer Money'></a></td>"
         		          
         		    ."</tr>";

         		    
         	}
         	echo "</table>";
         	
         }
         else{
         	echo "0 result";
         }
    $conn-> close();

   ?>
 <div id='leftbutton'><a href='index.php'><input type='submit' class='bt' value='Back'></a></div>;
</body>
</html>






