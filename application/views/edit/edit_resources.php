<div id="wrapper">
<div class="searcher">


 </div>
 <br>

 <?php
echo '<div class="results">';
echo "<table class='shadow'><tr class='header_row_edit'><td>NAME</td><td width='10%'>CATEGORY 1</td><td width='10%'>CATEGORY 2</td><td width='10%'>CATEGORY 3</td><td>PHONE NUMBER</td><td>ADDRESS</td><td>CITY</td><td>STATE</td><td>EDIT</td><td>DELETE</td></tr>";
echo '<form method="post" action="'.base_url().'edit/delete_these/">';
$flipper = 1;      
foreach($resources AS $row) { 
    
    if ($flipper == 1){
    		// print_r($row);
            echo "<tr class='row1_edit'><td>".$row['name']."</td>";
            echo "<td>".$row['categoryone']."</td>";
            echo "<td>".$row['categorytwo']."</td>";
            echo "<td>".$row['categorythree']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['City']."</td>";
            echo "<td>".$row['State']."</td>";

            echo "<td><a href='".base_url()."edit/edit_this/".$row['id']."'>EDIT</a></td>";
            echo "<td><input type='checkbox' name='".$row['id']."' value='".$row['id']."'></td>";
            echo "</tr>";
            $flipper = 2;
        }else{
        	// print_r($row);
        	echo "<tr class='row2_edit'><td>".$row['name']."</td>";
            echo "<td>".$row['categoryone']."</td>";
            echo "<td>".$row['categorytwo']."</td>";
            echo "<td>".$row['categorythree']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['City']."</td>";
            echo "<td>".$row['State']."</td>";
            echo "<td><a href='".base_url()."edit/edit_this/".$row['id']."'>EDIT</a></td>";
            echo "<td><input type='checkbox' name='".$row['id']."' value='".$row['id']."'></td>";
            echo "</tr>";
            $flipper = 1;
        }

}

echo "<tr><td colspan='10'class='righter'><input type='submit' value='DELETE SELECTED'></td></tr>";
echo '</form></table></div>';


/*foreach($resources->result() AS $row)
    {
        $this->table->add_row($row->name);
    }

echo $this->table->generate($resources);

*/
echo "<br><br><br><br>";
// echo $this->pagination->create_links();
?>
</div>