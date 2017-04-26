<!DOCTYPE html>
<?php 
include_once './Dbi.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagination Demo by learn.iotwebplanet.com </title>
        <style>
            table{
                background-color: red;
                color: white;
            }
            
        </style>
    </head>
    <body>
        <?php
        
        // Create object ob DB class for db connectivity
         $db=new Dbi();
         $db_con=$db->get_conn();
         mysqli_set_charset($db_con, 'utf8');
         //set data to display per page
         $num_rec_per_page=3;
         
         //checking paging by GET
         
         if (isset($_GET["page"])) 
                { 
             $page  = $_GET["page"];   //get value of page
             
                 } 
         else { 
                  $page=1;    //if first page then set 1
              }
              
              
 //pagination trick or logic              
$start_from = ($page-1) * $num_rec_per_page; 

//create query to check total record 
$psql = 'SELECT * FROM exclusive_news'; 

//run query and save result 
$rs_result=mysqli_query($db_con,$psql);

//count total number of record in result
$total_records = mysqli_num_rows($rs_result);  

//set how many pagination will be visible totalrecord/record per page
$total_pages = ceil($total_records / $num_rec_per_page); 


//code for display pagination 

        echo "<a href='index.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) 
        { 
            echo "<a href='index.php?page=".$i."'>".$i."</a> "; 
        } 
echo "<a href='index.php?page=$total_pages'>".'>|'."</a> "; // Goto last page

//end of pagination code


?>
        <table border="2" width="1" cellspacing="1" cellpadding="1" style="width: 500px;">
            <thead>
                <tr>
                    <th>id</th>
                    <th>date</th>
                    <th>title</th>
                    
                </tr>
            </thead>
            <tbody>
                 <?php
           
//this query for loding data in table based on pagination
                 
           $sql = "SELECT  * FROM exclusive_news LIMIT $start_from, $num_rec_per_page"; 
            $table_data=  mysqli_query($db_con,$sql);
           // $sl=$start_from;
            while ($row = mysqli_fetch_array($table_data)) {
                   


?> 
                <tr>
                    <td><?php  echo $row['id']; ?></td>
                   <td><?php  echo $row['date']; ?></td>
                     <td><?php  echo $row['title']; ?></td>
                </tr>
             <?php 
             
            }
             ?>
            </tbody>
        </table>
        
        
<?php

//code for display pagination 

        echo "<a href='index.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) 
        { 
            echo "<a href='index.php?page=".$i."'>".$i."</a> "; 
        } 
echo "<a href='index.php?page=$total_pages'>".'>|'."</a> "; // Goto last page

//end of pagination code

?>
      
    </body>
</html>
