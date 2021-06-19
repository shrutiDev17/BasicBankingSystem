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
       width:60%;
       height:17%;
      font-family: monospace;
      font-size: 20px;
      font-weight: bold;
      text-align: left;
      color:#0C005E ;
      margin-left: 300px;
      margin-top:120px;
      border:1px solid black;
      
        }


        th{
        
			font-size: 20px;
			color:#000E43;
      border:1px solid black;
      

		}
		.bt {
        
      background-color: #f72585; 
      border-radius: 50px;
      border: none;
      color: white;
      top:0%;
      text-align: center;
      padding:10px 10px;
      font-size: 25px;}

       .bt:hover{
         background-color: #072891;;
         cursor : pointer;
         

        }
  
        #rightbutton{
          position: absolute;
          text-align: center;
          left: 1300px;       
          width:12%;
          bottom:10px;
        }
         #leftbutton{
          position: absolute;
          text-align: center;
          left: 40px;
          bottom:10px;
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
        #bankimage{
           height: 40px;
           width:40px;
        
           position: absolute;
           left:350px;
              top:16px;
        }
        #headertext1{
          position:absolute;
          top:0px;
          left: 1320px;
          color:white;
           font-size: 34px;
           font-family: candara;
        }
    
    


	</style>
</head>
<body>
  <div class="headings"><h1 id="headertext"><i>Greenwich Waters Bank</i></h1></div>
  <div ><img id="bankimage" src="bank.png"></div>
  <div ><h1 id="headertext1"><i>Transactions</i></h1></div>
   <table>
   <thead>
   	<tr>
   		<th>ID</th>
   		<th>Person From</th>
   		<th>Person To</th>
      <th>Amount </th>
   		<!--<th>Transaction</th>-->
   	</tr>
   </thead>
   <?php
         $user = 'id17090290_root';
         $pass = 'Kz!_WUJ-S)6QHv#P'; 
         $db = 'id17090290_db';
         $conn = new  mysqli('localhost', $user, $pass, $db) or die ("Unable to connect".$conn ->connect_error);

        
         $sql = "SELECT ID, PersonFrom, PersonTo, Amount FROM transactions";
         

         if($result = mysqli_query($conn,$sql))
         {
         	while($row = $result -> fetch_assoc() ){
         		  // session_start();
                   $var = $row["ID"];

                   echo "<input type='hidden' name='ID' value='".$var."'>";
         		echo "<tr>"
         		          ."<td>".$row["ID"]."</td>"
         		          ."<td>".$row["PersonFrom"]."</td>"
         		          ."<td>".$row["PersonTo"]."</td>"
                      ."<td>".$row["Amount"]."</td>"
                      
         		          //."<td>"."<a href='p2.php?ID=".$var."'><input type='submit' class='bt' value='Transfer Money'></a></td>"
         		          
         		    ."</tr>";

         		    
         	}
         	echo "</table>";
          //echo "<div id='rightbutton'>".
                        // "<a href='p1.php'><input type='submit' class='bt'  name='submit' value='Home Page'></a>"."</div>";
         
          echo "<div id='rightbutton'>".
                         "<a href='table.php'><input type='submit' class='bt' value='Customers'></a>"."</div>";
                 "</div>";
           echo "<div id='leftbutton'>".
                         "<a href='index.php'><input type='submit' class='bt' value='Home Page'></a>"."</div>";
                 "</div>";

         }
         else{
         	echo "0 result";
         }
    $conn-> close();

   ?>

</body>
</html>






