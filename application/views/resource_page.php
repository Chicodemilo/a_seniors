<div id="wrapper">
<?php
        $name = $resource[0]['name'];
        $address = $resource[0]['address'];
        $id = $resource[0]['id'];
        $newname = $resource[0]['name'];
        $phone = $resource[0]['phone'];
        $city = $resource[0]['City'];
        $state = $resource[0]['State'];
        $cat1 = $resource[0]['categoryone'];
        $cat2 = $resource[0]['categorytwo'];
        $cat3 = $resource[0]['categorythree'];
        $desc = $resource[0]['description'];
        $pic_name = $resource[0]['pic_name'];

        if($pic_name == ''){
            $pic_name = 'pic_one.jpg';
        }
?>
    

<div id="info_page">
    <div id="back"><a href="#" onclick="history.go(-2)">< BACK</a></div>
    <div id="info_block">
        <hr>
        
        <div id="info_block_pic">
        <?php echo '<a href="#" onclick="show_big_pic()"><img id="info_block_pic" class="shadow" width="400px" src="'.base_url().'resources/'.$id.'/images/'.$pic_name.'" onerror="onImgError(this)"></a>'; ?>
        </div>
        
        <div id="info_block_info">
            <?php 
               echo '<h1 class="alt2">'.$newname.'</h1><hr>';
                if($desc != ''){
                    echo "<div id='description_block'>";
                    echo $desc;
                    echo "</div><hr>";
                }
            ?>
            <?php
            echo '<span class="address2">'.$phone.'</span>';
            echo '<br><span class="address">';
            echo $address;
            echo '<br>';
            echo $city.', '.$state.'</span>';
            
            echo '<br><hr>';
            echo 'Service Categories: <ul>';
            echo '<li>'.$cat1.'</li>';
            if($cat2 != ""){
            echo '<li>'.$cat2.'</li>';}
            if($cat3 != ""){
            echo '<li>'.$cat3.'</li>';}
            ?>
        </div>
     <hr>

     <div id="map-canvas"></div>
     <hr>
    </div>

</div>