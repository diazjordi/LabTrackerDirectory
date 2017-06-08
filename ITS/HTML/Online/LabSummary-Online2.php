<title>Lab Summary - LT</title>
  <?php
include("../../../../Resources/PHP/header.php");
?>
  <?php
require_once("../../../../Resources/PHP/MySQL/mysql_connect_labtracker_its.php");
?>
  <?php
$sqlQuery = "SELECT sub.*   
    FROM (    
      SELECT map_name, map_desc, SUM(units_available + units_in_use + units_offline + units_suppressed), units_available, units_in_use, units_offline, units_suppressed, timestamp     
      FROM labstatus     
      Group By map_desc, timestamp    
      ORDER BY timestamp DESC  
    ) sub   
    GROUP BY map_desc 
    ORDER BY map_desc
    LIMIT 1";
$sqlQueryResults = $conn->query($sqlQuery) or trigger_error($conn->error . " [$sql]");
?>
  <?php
require_once("../../../../Resources/PHP/MySQL/mysql_disconnect_labtracker_its.php");
?>

<div class="col-md-6">
   <h1>Annex Link<small> Summary</small></h1>
</div>
<div class="container">
   <h3 align="right" id="date" class="pull-right"></h3>
</div>
<hr>
<style type="text/css">
   .table table{width:1200px}
   .tg                       {border-collapse:collapse;border-spacing:0;margin:0px auto;}
   .tg td                    {font-family:Arial, sans-serif;font-size:40px;padding:1px 1px;border-style:hidden;border-width:1px;overflow:hidden;word-break:normal;width:1080/12%}.tg .column-name-cell      {background-color:#FFCB2F;color:#000000;width:200px;height:60px;text-align:center; vertical-align:middle;}
   .tg .column-name-cell     {background-color:#000000;color:#000000;width:350px;height:60px;text-align:center;vertical-align:middle;} 
   .tg .suppressed-cell      {background-color:#FFCB2F;color:#FFCB2F;width:200px;height:60px;text-align:center;vertical-align:middle;font-size:30px}
   .tg .suppressed-data-cell {background-color:#FFFFFF;color:#FFFFFF;width:200px;height:80px;text-align:center;vertical-align:middle;font-size:30px}
   .tg .data-cell            {background-color:#000000;color:#000000;width:400px;height:80px;text-align:center;vertical-align:middle;}
   .tg .legend-cell          {text-align:center;}
   a:visited                 {color: #000000;} 
   a:link                    {color: #000000;}
</style>
<script>
   var d = new Date();
   var month = d.getMonth() + 1;
   var day = d.getDate();
   var year = d.getUTCFullYear();
   //var date = month + "-" + day + "-" + year;
   //var time = d.toDateString();
   document.getElementById("date").innerHTML = d.toDateString();
</script>
<!-- availColor =    #FFCB2F -->
<!-- noStatusColor = #595138 -->
<!-- inUseColor =    #665113 -->
<div align="center" class="container">
   <h3 class="center">
   Information Updated Every 15 minute(s)</h4>
</div>
<div class="table" id="table">
   <table class="tg" align="center">
      <tbody>
         <tr>
            <td class="column-name-cell"><font color="#FFCB2F">Area</font></td>
            <td class="column-name-cell"><font color="#FFCB2F">Available</font></td>
            <td class="column-name-cell"><font color="#FFCB2F">Total</font></td>
            <td class="column-name-cell"><font color="#FFCB2F">% Available</font></td>
         </tr>
         <?php
            // Get # of Results returned
            $rowCount = mysqli_num_rows($sqlQueryResults);
            $time = 0;
            
            if ($rowCount > 0){
              	// Get appropriate lab name
            	while ($row = $sqlQueryResults->fetch_row()) {
            		$time = date("g:i a",strtotime($row[6]));            		
	              
	               // Get percentage in use and change lab name cell color
                $percent = ($row[3] / $row[2]) * 100;
                $percent = round($percent);
                
                $color = "";
                $text = "";
                if ($percent >= 75){
                  $color = "#00FF00";
                  $text = " > 75%";
                } elseif ($percent < 75 && $percent >= 10){
                  $color = "#FFCB2F";
                  $text = " 10 - 75%";
                } elseif ($percent < 10) {
                  $color = "#FF0000";
                  $text = " < 10%";
                }
		                
                echo" <tr> \n";
		            echo" <td style=\"background-color:{$color}\" class=\"data-cell\"><font color=\"#000000\">{$row[0]}</font></td>\n";
		            echo" <td class=\"data-cell\"><font color=\"#FFCB2F\">{$row[3]}</font></td>\n";
		            echo" <td class=\"data-cell\"><font color=\"#FFCB2F\">{$row[2]}</font></td>\n";
		            echo" <td style=\"background-color:{$color}\" class=\"data-cell\"><font color=\"#000000\">{$text}</font></td>\n";
		            echo" </tr> \n";
            		}

              		echo" <tr><td colspan=\"4\" class=\"column-name-cell\"><font color=\"#FFCB2F\">Last Updated {$time}</font></td></tr>\n";
            	} 
            ?>
      </tbody>
   </table>
</div>
<div id="container" align="center">
   <p>
      PAGE WILL AUTO REFRESH
   </p>
</div>
<?php include("../../../Resources/PHP/footer.php"); ?>

