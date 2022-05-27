<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewRegister extends ViewPadrao{

    public static function getHtmlRegister(){
        $sHtml = '<section class="vh-90">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    <form method="POST">
                                        <h3 class="mb-5">Cadastro</h3>
                                
                                        <div class="form-outline mb-4">
                                                <input type="text" id="user" name="user" class="form-control form-control-lg" placeholder="Nome de Usuário" required/>             
                                        </div>
                                
                                        <div class="form-outline mb-4">
                                                <input type="password" id="pass" name="pass" class="form-control form-control-lg" placeholder="Senha" required/>
                                        </div>

                                        <div class="form-check mb-4">
                                            <input type="checkbox" id="admin" name="admin"/>
                                            <label class="form-check-label" for="admin">
                                                Administrador
                                            </label>
                                        </div>
                                
                                        <button type="submit" name="submit" class="btn btn-dark btn-lg btn-block" >Cadastrar</button>'.
                                        self::getHtmlBackLogin().'      
                                    </form>
                                </div>                  
                            </div>                       
                        </div>
                    </div>
                </section>';

      return $sHtml;
    }

    private static function getHtmlBackLogin(){
        $sLogin = '<a class="btn btn-secondary btn-lg btn-block" href="index.php?pg=login">Voltar</a>';

        return $sLogin;
    }

}
