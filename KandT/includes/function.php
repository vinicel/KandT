<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 01/03/2018
 * Time: 15:37
 */

function active($page, $text, $currentPage)
{
    $activeClass = '';
    if($page === $currentPage){
        $activeClass = ' class="active"';
    }
    ?>
    <li<?=$activeClass?>><a href="?<?=APP_PAGE_PARAM?>=<?=$page?>"><?=$text?></a></li>
    <?php
}