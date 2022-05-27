<?php

/**
 * Rederiza o conteúdo da página solicitada
 * @param string $sPage
 * @return string
 */
function render($sPage)
{
    switch ($sPage) {
        case 'home':
            return (new App\Controller\ControllerHome)->render();
        case 'produtos':
            return (new App\Controller\ControllerProdutos)->render();
        case 'admin':
            return (new App\Controller\ControllerAdmin)->render();
        case 'login':
            return (new App\Controller\ControllerLogin)->render();
        case 'register':
            return (new App\Controller\ControllerRegister)->render();
        case 'carrinho':
            return (new App\Controller\ControllerCarrinho)->render();    
    }

    return 'Página não encontrada!';
}
