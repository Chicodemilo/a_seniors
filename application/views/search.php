<div id="wrapper">
    <br>
    <div class="searcher">
    <form method="get" action="<?php echo base_url(); ?>welcome/results">
    <table >
        <tr>
            <td class="center">FIND THE SERVICE YOU NEED: 
            
                <select  name="need">
                    <option value='^^^Please Select A Category^^^'> Use This Drop-Down Menu To Select a Service </option>
                      <?php 
                        foreach ($categories as $key => $value) {
                            echo '<option value="'.$value['name'].'">'.$value['name'].'</option>';
                        } 
                    ?>
                </select>
                <input id="button" type="submit"  value="FIND IT!">
                
            </td>

        </tr>
    </table>



    </form>
    </div>
    <br>
