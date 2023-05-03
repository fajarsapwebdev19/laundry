<?php
    if(empty($_GET['page']))
    {
        require 'menu/home.php';
    }
    elseif($_GET['page'] == "order_kiloan")
    {
        require 'menu/order_kiloan.php';
    }
    elseif($_GET['page'] == "order_satuan")
    {
        require 'menu/order_satuan.php';
    }
    elseif($_GET['page'] == "pay_satuan")
    {
        require 'menu/pay_satuan.php';
    }
    elseif($_GET['page'] == "pay_kiloan")
    {
        require 'menu/pay_kiloan.php';
    }
    elseif($_GET['page'] == "profile")
    {
        require 'menu/profile.php';
    }
?>