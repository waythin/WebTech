<?php include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/views/backend/sidenav.php';  ?>
    
    <div class="area1">
        <div class="create-menu-form">
            <form action="http://localhost/webtechProject/controllers/handlers/handleCreateMenu.php" method="POST" enctype="multipart/form-data">
                <td><label for="title">Title</label></td>
                <td><input type="text" name="title"></td>
                <td><label for="subtitle">Sub-Title</label></td>
                <td><input type="text" name="subtitle"></td>
                <td><label for="price">price</label></td>
                <td><input type="number" name="price"></td>
                <td><label for="image">Select Image For dish</label></td>
                <td><input type="file" name="imageFile"></td>
                <td><label for="type">Select Type</label></td>
                <td>
                    <select name="type" id="type">
                        <option value="appetizer">Appetizer</option>
                        <option value="dessert">Dessert</option>
                        <option value="setmeal">Set Meal</option>
                        <option value="drinks">Shakes/Drinks</option>
                    </select>
                </td>
                <td><input type="submit" name="create_menu" value="Create Menu"></td>
            </form>
        </div>
    </div>
    <div class="area2">
    </div>
</div>
<script src="https://kit.fontawesome.com/8d30c69f91.js" crossorigin="anonymous"></script>
</body>
</html>


