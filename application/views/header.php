<!DOCTYPE html>
<html lang="en" >
<head>
    <title>
      PHP main_name here
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/favicon.ico">
    <meta charset="utf-8" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    
    <script type="text/javascript" src="<?php echo base_url();?>javascript/apartment_javascript.js"></script>
    <link href="<?php echo base_url();?>css/redmond/jquery-ui-1.10.4.custom.css" rel="stylesheet">
    <script src="<?php echo base_url();?>javascript/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>javascript/jquery-ui-1.10.4.custom.js"></script>
   
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/apartment_main.css">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-51267835-1', 'sanangeloseniors.com');
        ga('send', 'pageview');

    </script>

    <style type="text/css">
        html    {margin: 0px;
                background-image: url(<?php echo base_url();?>images/bgimage.jpg);
                background-repeat: no-repeat;
                background-color: white;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: 100%;
                font-size: 1em;
                letter-spacing: 1px;}
        body    {margin: 0px;}
    </style>

</head>
<body>
    <script type="text/javascript">
        $(document).ready(function(){
                $( "#accordion" ).accordion({ collapsible: true, heightStyle: "content", active: false });
                $( "#button" ).button();
                $( "#menu" ).menu();
        });      
    </script>
    

    <header>
        
        <h1>SAN<span class="alt1">ANGELO</span>SENIORS<span class="alt1">.COM</span></h1>
        <p class="small1">Brought to you by the <span class="small2">San Angelo Seniors Magazine</span></p>
        
    </header>
    
    <div id="nav_bar">
        <table>
            <tr>
                <!--<td style="width: 160px;"><a href="#" onclick="show_links();">NAVIGATION ></a></td>-->
                <td><div id="links">
                        <ul>
                            <li><a href="<?php echo base_url();?>">HOME</a></li>
                            <li><a href="<?php echo base_url();?>welcome/search">SEARCH</a></li>
                            <li><a href="<?php echo base_url();?>welcome/message">CONTACT</a></li>
                            <li><a href="<?php echo base_url();?>welcome/definition">DEFINITIONS</a></li>
                            
                            <!--<li><a href="#">ARTICLES</a></li>-->
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    
