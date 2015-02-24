<?php
echo '<div class="results">';

$x = 0;
foreach ($data AS $row){
    if($row['categorytwo'] != ''){
        $x++;
    }
}

$y = 0;
foreach ($data AS $row){
    if($row['categorythree'] != ''){
        $y++;
    }
}


if ($y > 0){
    echo "<table class='shadow'><tr class='header_row'><td>NAME OF PROVIDER</td><td>1st SERVICE PROVIDED</td><td>2nd SERVICE PROVIDED</td><td>3RD SERVICE PROVIDED</td><td class='phone_col'>PHONE NUMBER</td></tr>";
    $flipper = 1;      
    foreach($data AS $row) { 

        if ($flipper == 1){
                echo "<tr class='row1'><td><a href='".base_url()."welcome/resource/".$row['id']."'>".$row['name']."</a></td><td>".$row['categoryone']."</td><td>".$row['categorytwo']."</td><td>".$row['categorythree']."</td><td class='phone_col'>".$row['phone']."</td></tr>";
                $flipper = 2;
            }else{
                echo "<tr class='row2'><td><a href='".base_url()."welcome/resource/".$row['id']."'>".$row['name']."</a></td><td>".$row['categoryone']."</td><td>".$row['categorytwo']."</td><td>".$row['categorythree']."</td><td class='phone_col'>".$row['phone']."</td></tr>";
                $flipper = 1;
            }
    }
    echo '</table></div>';
    
}elseif ($x > 0) {
    echo "<table class='shadow'><tr class='header_row'><td>NAME OF PROVIDER</td><td>1st SERVICE PROVIDED</td><td>2nd SERVICE PROVIDED</td><td class='phone_col'>PHONE NUMBER</td></tr>";
    $flipper = 1;      
    foreach($data AS $row) { 

        if ($flipper == 1){
                echo "<tr class='row1'><td><a href='".base_url()."welcome/resource/".$row['id']."'>".$row['name']."</a></td><td>".$row['categoryone']."</td><td>".$row['categorytwo']."</td><td class='phone_col'>".$row['phone']."</td></tr>";
                $flipper = 2;
            }else{
                echo "<tr class='row2'><td><a href='".base_url()."welcome/resource/".$row['id']."'>".$row['name']."</a></td><td>".$row['categoryone']."</td><td>".$row['categorytwo']."</td><td class='phone_col'>".$row['phone']."</td></tr>";
                $flipper = 1;
            }
    }
    echo '</table></div>';
    
    
}  else {
    echo "<table class='shadow'><tr class='header_row'><td>NAME OF PROVIDER</td><td>TYPE OF SERVICE</td><td class='phone_col'>PHONE NUMBER</td></tr>";
    $flipper = 1;      
    foreach($data AS $row) { 

        if ($flipper == 1){
                echo "<tr class='row1'><td><a href='".base_url()."welcome/resource/".$row['id']."'>".$row['name']."</a></td><td>".$row['categoryone']."</td><td class='phone_col'>".$row['phone']."</td></tr>";
                $flipper = 2;
            }else{
                echo "<tr class='row2'><td><a href='".base_url()."welcome/resource/".$row['id']."'>".$row['name']."</a></td><td>".$row['categoryone']."</td><td class='phone_col'>".$row['phone']."</td></tr>";
                $flipper = 1;
            }
    }
    echo '</table></div>';   
}

//echo $this->pagination->create_links();
?>