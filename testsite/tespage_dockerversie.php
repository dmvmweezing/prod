<?php
/*resttest*/
  $focus=0;
  if(isset($_POST['btn_opdracht1'])){$focus=1;}
  if(isset($_POST['btn_opdracht2'])) {$focus=2;}
  $html="leeg";
  if($focus==1)
    {
      if($_POST['txt_naam']!="" && $_POST['txt_password']!="")
      {
        $url="http://10.0.2.5:5051/valideer/" . $_POST['txt_naam'] . "/" . $_POST['txt_password'];
        $html1=file_get_contents($url);
      }
      else
      {
        $html1="beide velden invullen aub!!!";
      }
    }
  if($focus==2)
   {
     $url="http://10.0.2.5:5052/hoofdstad/" . $_POST['txt_land'];
     $html2="hoofdstad van " . $_POST['txt_land'] . " is " . file_get_contents($url);
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
</head>

<body>
   <h1>Testapplicatie voor DEVOPS, VERSIE-01</h1>
   <table style="width:100%"">
     <tr>
       <?php
         if($html1=="goed")
           echo("<td style='border: solid black 1px;background-color:green';>");
         if($html1=="fout")
           echo("<td style='border: solid black 1px;background-color:red';>");
         if($html1!="goed" && $html1!="fout")
           echo("<td style='border: solid black 1px;background-color:white';>");
       ?>
       <!-- <td style="border: solid black 1px";>  -->
 
         <div class="form" style="text-align: left; padding:5px;height:200px;">
            <h2 style="color:blue;">Dit is een testfunctie voor authenticatie</h2>
            <form method="POST" action="" name="opdracht1" id="opdracht1">
              <input type="hidden" id="opdr1" name="opdr1" value="functieNL">
              <label for="txt_naam">Naam:</label> 
              <input type=text" name="txt_naam" id="txt_naam">
              <label for="txt_password">Password:</label>
              <input type=text" name="txt_password" id="txt_password">
              <input type="submit" value="Valideer Credentials" name="btn_opdracht1" value="btn_opdracht1" >
            </form>
            <br/><h3 style="color:darkred; margin:0px; padding:0px;">Drie test-accounts</h3>
            karelh/P@ssW0rd<br/>
            eddiev/W@chtwoord<br/>
            ottop/Geheim
         </div>
       </td>
     </tr>
     <tr>
       <td style="border: solid black 1px";>
         <div class="form" style="text-align: left; padding:5px;height:200px">
            <h2 style="color:blue;">Dit is een testfunctie voor opzoeken van een land-hoofdstad</h2>
            <form method="POST" action="" name="opdracht2" id="opdracht2">
              <input type="hidden" id="opdr2" name="opdr2" value="functieHoofdstad">
              <label for="txt_land">Land:</label>
              <input type="text" name="txt_land" id="txt_land">
              <input type="submit" value="Roep hoofdstad functie aan" name="btn_opdracht2" value="btn_opdracht2" >
            </form>
            <br/><h3 style="color:darkred; margin:0px; padding:0px;">Probeer een Europees land.</h3><br/><br/>
            <?php
              echo($html2);
            ?>

         </div>
       </td>
     </tr>
   </table>

   <?php
       echo($html1);
   ?>

</body>
</html>
