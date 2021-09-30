<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/backend/sidenav.php';  
include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/order.php'; 
?>
    
    <div class="area1">
    <?php $orders = getUndeliveredOrders(); 
        foreach($orders as $order) {
            echo '
            <div class="order">
                <div class="title"><h2>Order No: #'.$order['order_id'].'</h2></div>
                <div class="details"><p>'.$order['item'].'</p></div>
                <div class="price"><p>'.$order['price'].'</p></div>
            </div>
            ';
        }
    ?>
        
    </div>
    <div class="area2">
        <div class="search-form" id="userSearchForm">
            <form action="" method="POST">
                <input type="text" name="email">
                <input type="submit" name="search" value="search">
            </form>
        </div>
        <div class="search-result" id="search-result">
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/8d30c69f91.js" crossorigin="anonymous"></script>
</body>
</html>