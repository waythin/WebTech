<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/controllers/menu.php'; ?>

<?php $menu = Menu::getFullMenu(); ?>
<center>
    <h2>Appetizer</h2>
    <?php
    $count = 0; 
    echo '<table style="width:70%">';
        foreach($menu as $key=>$item) {
            if($item['type'] === 'appetizer') {
                $count += 1;
                if($key%2 === 1) {
                    echo '
                        <tr>
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                    ';
                } else {
                    echo '
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                        </tr>
                    ';
                }
                
            }
        }
        if($count % 2 == 1) echo '</tr>';
        echo '</table>';
    ?>
    <!--Dessert -->
    <h2>Dessert</h2>
    <?php
    $count = 0; 
    echo '<table style="width:70%">';
        foreach($menu as $key=>$item) {
            if($item['type'] === 'dessert') {
                $count += 1;
                if($key%2 === 1) {
                    echo '
                        <tr>
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                    ';
                } else {
                    echo '
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                        </tr>
                    ';
                }
                
            }
        }
        if($count % 2 == 1) echo '</tr>';
        echo '</table>';
    ?>


    <!--Dining -->
    <h2>Set Meal</h2>
    <?php
    $count = 0; 
    echo '<table style="width:70%">';
        foreach($menu as $key=>$item) {
            if($item['type'] === 'setmeal') {
                $count += 1;
                if($key%2 === 1) {
                    echo '
                        <tr>
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                    ';
                } else {
                    echo '
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                        </tr>
                    ';
                }
                
            }
        }
        if($count % 2 == 1) echo '</tr>';
        echo '</table>';
    ?>

    <!--Shakes -->
    <h2>Shakes/Drinks</h2>
    <?php
    $count = 0; 
    echo '<table style="width:70%">';
        foreach($menu as $key=>$item) {
            if($item['type'] === 'drinks') {
                $count += 1;
                if($key%2 === 1) {
                    echo '
                        <tr>
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                    ';
                } else {
                    echo '
                        <th align="left">
                        '.$item['title'].'   '.$item['price'].'/- <br>
                        '.$item['subtitle'].'<br>
                        <from><input type="button" name="'.$item['menu_id'].'" id="atc_d1" value="Add To Cart"></from>
                        </th>            
                        <td><img height="150" widht="150" src="'.'../'.$item['image'].'"></td>
                        </tr>
                    ';
                }
                
            }
        }
        if($count % 2 == 1) echo '</tr>';
        echo '</table>';
    ?>
    
<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/footer.php'; ?>