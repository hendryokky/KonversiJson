<?php
          $connect = mysqli_connect("localhost", "root", "", "daerah"); //Connect PHP to MySQL Database
          $query = '';
          $table_data = '';
          $filename = "kabupaten34.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $array = json_decode($data, true); //Convert JSON String into PHP Array
          foreach($array as $row) //Extract the Array Values by using Foreach Loop
          {
           $query .= "INSERT INTO kabupaten(id, pid, name, ibukota, bsni, hash) VALUES ('".$row["id"]."', '".$row["pid"]."', '".$row["name"]."', '".$row["ibukota"]."', '".$row["bsni"]."', '".$row["hash"]."'); ";  // Make Multiple Insert Query 
           $table_data .= '
            <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["pid"].'</td>
       <td>'.$row["name"].'</td>
	   <td>'.$row["ibukota"].'</td>
	   <td>'.$row["bsni"].'</td>
	   <td>'.$row["hash"].'</td>
      </tr>
           '; //Data for display on Web page
          }
          if(mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
    {
     echo '<h3>Imported JSON Data</h3><br />';
     
          }




          ?>