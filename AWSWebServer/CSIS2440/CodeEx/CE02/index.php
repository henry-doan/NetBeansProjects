<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>C E 2</title>
    </head>
    <body>
        <?php
        $d = date("D");
        echo "<p>$d</p>";
        
        if ( $d == "Fri" or $d == "Sat" || $d == "Sun") {
           $message = "Have a nice Weekend";
        } else if ($d == "Mon") {
           $message = "Oh no it's monday";
        } else {
           $mesage = "Have a nice day!";
        }
        
        echo $message . "<p></p>";
        

        switch ($d) {
          case "Mon":
              echo "<p>Today is Monday<ul>"
              . "<li>Math 1210</li>
                 <li>CSIS 2420</li>
                 <li>CSIS 1430</li>
                 </ul></p>";
              break;
          case "Tue":
              echo "<p>Today is Tuesday<ul>"
              . "<li>Math 1210</li>
                 </ul></p>";
              break;
          case "Wed":
              echo "<p>Today is Wednesday<ul>"
              . "<li>Math 1210</li>
                 <li>CSIS 2420</li>
                 <li>CSIS 1430</li>
                 </ul></p>";
              break;
          case "Thu":
              echo "<p>Today is Thursday<ul>"
              . "<li>Math 1210</li>
                 </ul></p>";
              break;
          case "Fri":
              echo "<p>Today is Friday</p>";
              break;
          case "Sat":
              echo "<p>Today is Saturday</p>";
              break;
          case "Sun":
              echo "<p>Today is Sunday</p>";
              break;
          default: 
              echo "Wonder which day it is?</p>";
        }
        
        $a = 0;
        $b = 0;
        print('<table width=\'50px\' class="table"><tr><th>$a</th><th>$b</th></tr>');
        for ($i=0; $i < 5; $i++){
           $a += 10;
           $b += 5;
           print("<tr><td>$a</td><td>$b</td></tr>");
        }
        
        print("</table><br>At the end of the loop a=$a and b=$b and i= $i");
        $i = rand(0, 50);
        
        $num = rand(51, 100);
        
        do {
           $num--;
           $i++;
        } while ($i < $num);
        
        echo "<br>Loop stooped at i = $i and num = $num";
        
        echo "<br>Year of Birth:<select><option>--</option>";
        $year1 = date("Y");
        for ($y = 0; $y < 100; $y++){
            if ($y > 17) {
                $yearval = $year1 - $y;
                echo "<option>$yearval</option>\n";
            }
        }
        
        echo "</select>";
        
        ?>
    </body>
</html>
