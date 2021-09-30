<?php 
    include $_SERVER['DOCUMENT_ROOT'].'/webtechProject/models/menu.php';

    class Menu {
        protected $title, $subtitle, $desc, $price, $image, $type;
        function __construct($title, $subtitle, $desc, $price, $image, $type) {
            $this->title = $title;
            $this->subtitle = $subtitle;
            $this->desc = $desc;
            $this->price = $price;
            $this->image = $image;
            $this->type = $type;
        }
        public function save() {
            $msg = insertMenuItem($this->title, $this->subtitle, $this->desc, $this->price, $this->image, $this->type);
            return $msg;
        }
        public static function getMenuByType($type) {
            return getMenuByType($type);
        }
        public static function getMenuById($id) {
            return getMenuById($id);
        }
        public static function getFullMenu() {
            return getFullMenu();
        }
        public static function showFeaturedMenu() {
            $menu = getFeaturedMenu();
            foreach($menu as $key=>$item) {                
                echo "
                <div><a href=\"\"><div class=\"dish\">
                <img src=".$item['image']." alt=\"Menu Picture\">
                <div class=\"dish__info\">
                    <div class=\"dish__title\"><h3>".$item['title']."</h3></div>
                    <div class=\"dish__subtitle\"><p>".$item['subtitle']."</p></div>
                </div>
                <div class=\"dish__price\"><p>".$item['price']."/-</p></div>
                </div></a></div> 
                ";

            }
        }
    }
?>