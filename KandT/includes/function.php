<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 01/03/2018
 * Time: 15:37
 */

function active($page, $text)
{
    $activeClass = '';
    if($page === basename($_SERVER['PHP_SELF'])){
        $activeClass = ' class="active"';
    }
    ?>
    <li<?=$activeClass?>><a href="<?=$page?>"><?=$text?></a></li>
    <?php
}