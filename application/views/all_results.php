<?php
echo '<div class="results">';
echo "<table class='shadow'><tr class='header_row'><td>NAME OF PROVIDER</td><td>TYPE OF SERVICE</td><td>PHONE NUMBER</td></tr>";
$flipper = 1;      
foreach($resources->result() AS $row) { 
    
    if ($flipper == 1){
            echo "<tr class='row1'><td><a href='".base_url()."welcome/resource/".$row->id."'>".$row->name."</a></td><td>".$row->categoryone."</td><td>".$row->phone."</td></tr>";
            $flipper = 2;
        }else{
        echo "<tr class='row2'><td><a href='".base_url()."welcome/resource/".$row->id."'>".$row->name."</a></td><td>".$row->categoryone."</td><td>".$row->phone."</td></tr>";
            $flipper = 1;
        }

}

echo '</table></div>';


/*foreach($resources->result() AS $row)
    {
        $this->table->add_row($row->name);
    }

echo $this->table->generate($resources);

*/
echo "<br>";
echo $this->pagination->create_links();
?>