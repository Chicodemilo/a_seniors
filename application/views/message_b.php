<div id='wrapper'>
        <div id="contact_box_b">
            
                <hr/>

                    <?php
                    echo form_open(); 

                    ?>
                    <input type="hidden" name="system_date">
                    <table id="contact_table">
                        <tr><td class="righter">Name:</td><td>
                            <input type="text" maxlength="50" id="name" size="45" name="name" 
                                   placeholder="<?php if (form_error('name') != ''){echo form_error('name');}else{echo '';}?>"
                                   value="<?php if (set_value('name') != ''){echo set_value('name');}else{echo '';}?>"
                                   /></td></tr>
                        
                        
                        <tr><td class="righter">Email:</td><td>
                                <input type="text" maxlength="50" id="email" size="45" name="email" 
                                       placeholder="<?php if (form_error('email') != ''){echo form_error('email');}else{echo '';}?>"
                                       value="<?php if (form_error('email') != ''){echo '';}else{echo set_value('email');}?>"
                                       /></td></tr>
                        
                        <tr><td class="righter">Subject:</td><td>
                                <input type="text" maxlength="50" id="subject" size="45" name="subject" 
                                       placeholder="<?php if (form_error('subject') != ''){echo form_error('subject');}else{echo '';}?>"
                                       value="<?php if (set_value('subject') != ''){echo set_value('subject');}else{echo '';}?>"
                                       /></td></tr>
                        
                        <tr><td class="righter">Message:</td><td>
                                <textarea maxlength="450" id="message" rows="4" cols="37" name="message"
                                       placeholder="<?php if (form_error('message') != ''){echo form_error('message');}else{echo '';}?>"
                                       ><?php if (set_value('message') != ''){echo set_value('message');}else{echo '';}?></textarea></td></tr>
                        
                        <tr><td></td><td><?php echo $image;?></td></tr>
                        
                        <tr><td class="righter_light">Please type the text from the box above:</td><td>
                                <input type="text" maxlength="50" size="45" name="captcha" 
                                       placeholder="<?php if (form_error('captcha') != ''){echo form_error('captcha');}else{echo '';}?>"
                                       /><br><a class='small4' href="<?php echo base_url();?>welcome/message">Click Here if you need new random letters</a></td></tr>
                        
                        <tr><td></td><td><input id="button" type="submit" value="Send Message"></td></tr>
                        
                    </table>

                    <?php
                    echo form_close();

                    ?>

                <hr>

            
        </div>
 
</div>