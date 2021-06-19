<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			 background-image: url('img2.jpg');
			 position: absolute;
			 margin:0;
             top: 0;
             left: 0;
             bottom: 0;
             right:0;
			 
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
          left: 660px;
          top:600px;
          width:12%;
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
    


	</style>
</head>
<body>
  
       <div class="headings"><h1 id="headertext"><i>Greenwich Waters Bank</i></h1></div>

   
          <div id="rightbutton">
              <a href="table.php"><input type="submit" class="bt"  name="submit" value="View Customers"></a></div>;
        
          <div ><img id="bankimage" src="bank.png"></div>
  

 

</body>
</html>






