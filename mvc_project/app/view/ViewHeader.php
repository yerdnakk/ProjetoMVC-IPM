<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHeader extends ViewPadrao{

    public static function getLoginHtml(){
        $sHtml = '<li class="nav-item">
                    <a class="nav-link d-flex align-items-center" aria-current="page" href="index.php?pg=login" id="shop">
                    <span class="p-2"><i class="fa-solid fa-user fa-x1"></i></span>
                    Login
                    </a>
                </li>';

        return $sHtml;
    }

    public static function getLogoutHtml(){
        $sHtml = '<li class="nav-item">
                    <a class="nav-link d-flex align-items-center" aria-current="page" href="index.php?pg=login&act=logout" id="shop">
                    <span class="p-2"><i class="fa-solid fa-right-from-bracket"></i></span>
                    Logout
                    </a>
                </li>';

        return $sHtml;
    }

    public static function getCarrinhoHtml(){
        $sHtml = '<li class="nav-item">
                    <a class="nav-link d-flex align-items-center" aria-current="page" href="index.php?pg=carrinho" id="shop">
                    <span class="p-2"><i class="fa-solid fa-cart-shopping"></i></span>
                    Carrinho
                    </a>
                </li>';

        return $sHtml;
    }

    public static function getAdminHtml(){
        $sHtml = '<li class="nav-item">
                    <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" aria-current="page" href="index.php?pg=admin" id="shop">
                        <span class="p-2"><i class="fa-solid fa-user fa-x1"></i></span>
                        Admin
                    </a>
                 </li>';

        return $sHtml;
    }

    public static function getHomeHtml(){
        $sHtml = '<li class="nav-item">
          <a class="nav-link d-flex align-items-center" aria-current="page" href="index.php?pg=home" id="shop">
            <span class="p-2"><i class="fa-solid fa-house fa-xl"></i></span>
            Home
          </a>
        </li>';

        return $sHtml;
    }
}
