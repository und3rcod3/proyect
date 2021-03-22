<?php
function DetectAndroidVersion($let){
    $x = explode(" ", $let);
    $xx = $x[1];
    
    $versiones = array(
      "1.0"=>"Apple Pie",
      "1.1"=>"Banana Bread",
      "1.5"=>"Cupcake",
      "1.6"=>"Donut",
      "2.0"=>"Eclair",
      "2.1"=>"Eclair",
      "2.2"=>"Froyo",
      "2.3"=>"Gingerbread",
      "2.3.6"=>"Gingerbread",
      "3.0"=>"HoneyCumb",
      "4.0"=>"Ice Cream Sandwich",
      "4.1"=>"JellyBean",
      "4.2.2"=>"JellyBean",
      "4.3"=>"JellyBean",
      "4.4"=>"KitKat",
      "4.4.2"=>"KitKat",
      "4.4.4"=>"KitKat",
      "5.0"=>"Lollipop",
      "5.0.1"=>"Lollipop",
      "5.1"=>"Lollipop",
      "5.1.1"=>"Lollipop",
      "6"=>"MarshMallow",
      "6.0"=>"MarshMallow",
      "6.1"=>"MarshMallow",
      "6.0.1"=>"MarshMallow",
      "7.0"=>"Nougat",
      "7.0.1"=>"Nougat",
      "7.1"=>"Nougat",
      "7.1.1"=>"Nougat",
      "8.0"=>"Oreo",
      "8.0.0"=>"Oreo",
      "8.0.1"=>"Oreo",
      "8.1"=>"Oreo",
      "8.1.0"=>"Oreo",
      "8.1.1"=>"Oreo",
      "9"=>"Pie",
      "9.0"=>"Pie",
      "9.1"=>"Pie",
      "9.0.1"=>"Pie",
      "9.1.1"=>"Pie",
      "10"=>"Diez",
      "11"=>"Once",
      "12"=>"Doce");
  
    $valor = array_search($xx, $versiones, true);
        return $valor;
}
