<div id="wrapper">
<div class="searcher">
 </div>
 <br>
 <?php
    echo "<div class='edit_box' style=>";
    echo "<table class='shadow' min-width='800px'><tr class='header_row_edit'><td  colspan='2' >ENTER YOUR CUSTOM CATEGORY</td></tr>";
    echo "<form method='post' action='".base_url()."edit/submit_category/".$id."'>";
    echo "<tr><td><input type='test' name='category' id='category' placeholder='35 Character Max' maxlength='35' style='width:90%'required></td></tr>";
    echo "<tr><td><input id='button' type='submit' value='SUBMIT CATEGORY'></td></tr></tr>";
    echo "</form></table></div>";
?>
</div>


