<div class="hero">
    <div class="hero__info">
        <h2>Fusion Inspired Cuisine</h2>
        <h3><?php echo $data['subtitle'] ?></h3>
    </div>
    <div class="hero__mission">
        <h2>Our Mission</h2>
        <p><?php echo $data['mission'] ?></p>
    </div>
</div>
<!-- Old UI -->
<!-- <div class="hero-section">
    <center>
        <table width="1000px">
            <tr>
                <td colspan="2"><h2><?php echo $data['subtitle'] ?></h2></td>
                <td>
                    <h3>Our mission</h3><br>
                    <p><?php echo $data['mission'] ?></p>
                </td>
            </tr>
        </table>
    </center>
</div> -->
<div class="container">
        <div class="featured-dish">
            <div class="title">
                <h2>Featured Dish</h2>
            </div>
            <div class="all-dishes">
                <?php 
                    Menu::showFeaturedMenu();
                ?>                 
            </div>    
        </div>
    </div>
<br><br>
<div class="menu-type-select">
    <table>
        <tr>
            <td><img height="300px" width="300px" src="image/static/appetiser.jpg" alt="Delivery Menu Select"></td>
            <td><img height="300px" width="300px" src="image/static/delivery.jpg" alt="Delivery Menu Select"></td>
            <td><img height="300px" width="300px" src="image/static/dessert.jpg" alt="Delivery Menu Select"></td>
            <td><img height="300px" width="300px" src="image/static/dinner.jpg" alt="Delivery Menu Select"></td>
        </tr>
        <tr>
            <td><a href=""><h3>Appetiser</h3></a></td>
            <td><a href=""><h3>Delivery</h3></a></td>
            <td><a href=""><h3>Dessert</h3></a></td>
            <td><a href=""><h3>Dinner</h3></a></td>
        </tr>
    </table>
</div>