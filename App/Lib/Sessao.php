<?php

namespace App\Lib;

class Sessao
{
    public static function gravaLogin($idUser)
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['idUser'] = $idUser;
    }

    public static function limpaLogin()
    {
        $_SESSION['loggedin'] = false;
        unset($_SESSION['idUser']);
    }
    public static function gravaMensagem($mensagem)
    {
        $_SESSION['mensagem'] = $mensagem;
    }

    public static function limpaMensagem()
    {
        unset($_SESSION['mensagem']);
    }

    public static function retornaMensagem()
    {
        return (isset($_SESSION['mensagem'])) ? $_SESSION['mensagem'] : "";
    }

    public static function gravaFormulario($form)
    {
        $_SESSION['form'] = $form;
    }

    public static function limpaFormulario()
    {
        unset($_SESSION['form']);
    }

    public static function retornaValorFormulario($key)
    {
        return (isset($_SESSION['form'][$key])) ? $_SESSION['form'][$key] : "";
    }

    public static function existeFormulario()
    {
        return (isset($_SESSION['form'])) ? $_SESSION['form'] : "";
    }

    public static function gravaErro($erro)
    {
        if (!isset($_SESSION['erro']) || !is_array($_SESSION['erro'])) {
            $_SESSION['erro'] = array();
        }
        $_SESSION['erro'][] = $erro;
    }

    public static function retornaErro()
    {
        return (isset($_SESSION['erro'])) ? $_SESSION['erro'] : false;
    }

    public static function limpaErro()
    {
        unset($_SESSION['erro']);
    }
}
