<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/header2.php'; 
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/webtechProject/';
?>

<div class="menu-container">
<?php 
    if(isset($_GET['loggedin'])) {
        echo 'Please login in first to order';
    }
?>
        <div class="menu-type">
            <ul>
                <li class="selected-menu" id="appetizer">Appetiser</li>
                <li id="setmeal">Set Meal</li>
                <li id="dessert">Dessert</li>
                <li id="drinks">Drinks</li>
            </ul>
        </div>
        <div class="menu">
            <!-- <div class="preview">
                <button id="addtocart" class="addtocart"></button>
                <img src="<?php echo $path.'image/ui/preview-menu4.png' ?>" alt="">
                <h2>EL Passo' De Pasta</h2>
                <h3>Chicken | Butter | Dou</h3>
                <p>ummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>          
            <div class="menu-items selected-menu-item"><img src="<?php echo $path.'image/ui/menu1.png' ?>" class="menu" alt=""></div>
            <div class="menu-items"><img src="<?php echo $path.'image/ui/menu2.png' ?>" class="menu" alt=""></div>
            <div class="menu-items"><img src="<?php echo $path.'image/ui/menu3.png' ?>" class="menu" alt=""></div>
            <div class="menu-items"><img src="<?php echo $path.'image/ui/menu4.png' ?>" class="menu" alt=""></div> -->
        </div>
        <div class="navigator">
            <!-- <div class="selected-navigator"></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div> -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo $path.'utils/js/routes/fetchMenu.js'?>"></script>
    <script src="<?php echo $path.'utils/js/ui/menu.js'?>"></script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/footer2.php'; ?>