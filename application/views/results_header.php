<!DOCTYPE html>
<html lang="en" >
 
<head>   
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/favicon.ico">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-51267835-1', 'sanangeloseniors.com');
        ga('send', 'pageview');

    </script>
    <?php  
        $name = $resource[0]['name'];
        $address = $resource[0]['address'];
        $id = $resource[0]['id'];
        $newname = $resource[0]['name'];
        $pic = $resource[0]['Picture'];
        $phone = $resource[0]['phone'];
        $city = $resource[0]['City'];
        $state = $resource[0]['State'];
        $cat1 = $resource[0]['categoryone'];
        $cat2 = $resource[0]['categorytwo'];
        $cat3 = $resource[0]['categorythree'];
        $pic_name = $resource[0]['pic_name'];

        if($pic_name == ''){
            $pic_name = 'pic_one.jpg';}

        echo '<title>San Angelo Seniors :: '.$newname.'</title>';
        echo '<meta name="description" content="'.$newname.' :: '.$cat1.' :: San Angelo Texas">';
        echo '<meta name="keywords" content="'.$newname.', '.$cat1.', '.$cat2.', '.$cat3.' San Angelo, Texas">';
        
        ?>
    
    <script type="text/javascript" src="<?php echo base_url();?>javascript/senors_javascript.js"></script>
    <link href="<?php echo base_url();?>css/redmond/jquery-ui-1.10.4.custom.css" rel="stylesheet">
    <script src="<?php echo base_url();?>javascript/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>javascript/jquery-ui-1.10.4.custom.js"></script>
    
   
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/san_ang_srs_main.css">
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
    
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
        var geocoder;
        var map;
        function initialize() {
          geocoder = new google.maps.Geocoder();

          var latlng = new google.maps.LatLng(31.4500, -100.4500);
          var mapOptions = {
            zoom: 15,
            center: latlng
          }
          map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var address = "<?php echo $address.' '.$city?>";

            geocoder.geocode( { 'address': address}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
              } else {
              }
            });
        }


        google.maps.event.addDomListener(window, 'load', initialize);

    </script>

</head>
<body>
    

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
    
   
    
    <div id="big_pic_wrapper">
        <div id="big_pic_box">
            <input  id='pic_closer' type="image" src="<?php echo base_url();?>images/close.jpg" width="30" onclick="hide_big_pic();" alt="close this window"><span class='small3'>&nbsp;<?php echo $name; ?></span>
            <hr>
            <img width="750px" src="<?php echo base_url()?>resources/<?php echo $id ?>/images/<?php echo $pic_name ?>">

        </div>
    </div>
    