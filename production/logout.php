<?php
/*
   +----------------------------------------------------------------------+
   | Mateusz Lipecki - LOGIN skrypt                                       |
   +----------------------------------------------------------------------+
   | Peter-Lacke Polska                                                   |
   +----------------------------------------------------------------------+
   | Version: 1.3.1                                                       |
   +----------------------------------------------------------------------+
*/

require 'includes/config.php';
require 'includes/header.php';

session_destroy();
echo '<p class="success">Zostałeś wylogowany!</p>';
