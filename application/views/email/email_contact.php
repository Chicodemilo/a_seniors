<html>
    <head>
        <style type='text/css'>
            body {background-color: rgba(230,230,230, .5);
                  height: 700px;}
                  
                  
            .box {background-color: white;
                 position: relative;
                 top: 15px;
                 width: 70%;
                 margin: auto;
                 box-shadow: 0px 0px 14px #6c6c6c;
                 border-radius:12px;
                 padding: 10px;}
            
            
        </style>
    </head>
    <body>
        <div class='box'>
            <h2>Name: <?php echo $name;?></h2>
            <h3>Email: <a href='mailto:<?php echo $email;?>'><?php echo $email;?></a></h3>
            <h4>Subject: <?php echo $subject;?></h2>
            <h4>Sent: <?php echo $time;?></h2>
            <p>Message: <?php echo $message;?></p>
        </div>
    </body>
</html>