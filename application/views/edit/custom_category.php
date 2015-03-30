<div id="wrapper">
<div class="searcher">
 </div>
 <br>
 <table class="shadow">
    <tr>
        <td>
            <ul class='lefter_light'>
                <li style="font-weight:bold;">Please try to use an existing category first.</li>
                <li>Do not use your business name in the category. Other businesses with similar services should be able to use this category.</li>
                <li>You may use your custom category immediately, but the category will not appear on the main search page till it has been approved by a site administrator.</li>
            </ul> 
        </td>
    </tr>
</table>
 <br><br>
 <?php
    echo "<div class='edit_box' style=>";
    echo "<table class='shadow' min-width='800px'><tr class='header_row_edit'><td  colspan='2' >ENTER YOUR CUSTOM CATEGORY</td></tr>";
    echo "<form method='post' action='".base_url()."edit/submit_category/".$id."'>";
    echo "<tr><td><input type='text' name='category' id='category' placeholder='35 Character Max' maxlength='35' style='width:90%'required></td></tr>";
    echo "<tr><td><input id='button' type='submit' value='SUBMIT CATEGORY'></td></tr></tr>";
    echo "</form></table></div>";
?>
</div>


