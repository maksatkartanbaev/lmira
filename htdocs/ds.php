<?php
            $i = 1;
            while($i<19){ 
                echo "<tr>";
                if ($bong[$i-1] == 1){
                    echo "<td>№$i</td>";
                    echo "<td id='cc' class='room.$i._status room-open'>Open</td>";
                    echo "<td></td>";
                    echo "<td id='dd' class='room' data-room='$i' data-room-status='1'>Settle</td>";
                } else{
                    echo "<td>№$i</td>";
                    echo "<td id='cc' class='room.$i._status room-closed'>Closed</td>";
                    echo "<td></td>";
                    echo "<td id='dd' class='room' data-room='$i' data-room-status='0'>Move out</td>";
                }
                $i++;
            }
        ?>