<?php



echo '
    <div id="contact_wrapper">';

$date = $_POST['system_date'];
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$file = "contactrecord.txt";

$file_open = fopen($file, 'a+');

if(!$file_open){
                echo '<p>Your Message Has Not Been Sent<br/>';
                echo 'The system is down. Please try back later.</p>';
                echo '<p><a href="index.php">back</a></p>';
                exit;
            }else{
                fwrite($file_open, "\n$date\n$name\n$email\n$subject\n$message\n------------------------------------\n");
            }
            fclose($file_open);
            
            

echo '
        <div id="contact_box">
        <hr/>
        <form method="post" action="#" name="messager" enctype="application/x-www-form-urlencoded">
        <input type="hidden" name="system_date">
        <table id="contact_table">
            <tr><td class="righter">Name:</td><td><input type="text" maxlength="50" id="name" size="45" name="name" /></td></tr>
            <tr><td class="righter">Email:</td><td><input type="email" maxlength="50" id="email" size="45" name="email" /></td></tr>
            <tr><td class="righter">Subject:</td><td><input type="text" maxlength="50" id="subject" size="45" name="subject"/></td></tr>
            <tr><td class="righter">Message:</td><td><textarea maxlength="450" id="message" rows="4" cols="37" name="message" ></textarea></td></tr>
            <tr><td class="righter" colspan="2"><input type="submit" value="Send Message"></tr>
        </table>
    </form>
    <hr/>
        <input class="righter" type="image" src="close.jpg" width="30" onclick="hide_contact();" alt="close this window">
        </div>
    </div>
    <header>
        
        <h1>SAN<span class="alt1">ANGELO</span>SENIORS<span class="alt1">.COM</span></h1>
        <p class="small1">Brought to you by the <span class="small2">San Angelo Seniors Magazine</span></p>
        
    </header>
    

    <div id="nav_bar">
        <table>
            <tr>
                <td style="width: 160px;"><a href="#" onclick="show_links();">NAVIGATION ></a></td>
                <td><div id="links">
                        <ul>
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="search.php">SEARCH</a></li>
                            <li><a href="#" onclick="show_contact()">CONTACT</a></li>
                            <!--<li><a href="#">ARTICLES</a></li>-->
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>';

?>