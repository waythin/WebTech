<?php 
   //  include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/header.php';  
?> 

    
    <?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/backend/sidenav.php';  ?>
    
    <div class="area1 user-roles">
        <h2>Admin</h2>
        <ul>
            <li>abtahitajwar@gmail.com</li>
        </ul>
        <h2>Manager</h2>
        <ul>
            <li>ibrahimmohim@gmail.com</li>
            <li>abtahitajwar@gmail.com</li>
        </ul>
        <h2>Rider</h2>
        <ul>
            <li>hasan.mehedi@gmail.com</li>
            <li>ibrahimmohim@gmail.com</li>
            <li>waythinmarma@gmail.com</li>
            <li>abtahitajwar@gmail.com</li>
        </ul>
    </div>
    <div class="area2 search-user">
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
<script src="<?php echo $path.'/utils/js/routes/searchUsers.js' ?>"></script>
</body>
</html>
