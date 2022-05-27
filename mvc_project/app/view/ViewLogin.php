<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewLogin extends ViewPadrao{

    public static function getHtmlLogin(){
        $sHtml = '<section class="vh-90">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <form method="POST">
                                        <h3 class="mb-5">Login</h3>
                                
                                        <div class="form-outline mb-4">
                                                <input type="text" id="user" name="user" class="form-control form-control-lg" placeholder="Nome de Usuário" required/>             
                                        </div>
                                
                                        <div class="form-outline mb-4">
                                                <input type="password" id="pass" name="pass" class="form-control form-control-lg" placeholder="Senha" required/>
                                        </div>
                                
                                        <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block" >Entrar</button>
                                
                                        <hr class="my-4">           
                                        Ainda não possui uma conta? <a href="index.php?pg=register" class="ml-2 "><b>Registre-se</b></a>
                                    </form>
                                </div>                  
                            </div>                       
                        </div>
                    </div>
                </section>';

      return $sHtml;
    }

}
