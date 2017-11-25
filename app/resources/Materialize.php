<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 15/11/2017
 * Time: 21:01
 */

namespace App\Resources;


class Materialize
{
    public function registerMtz()
    {
        $form = $this->inputMtz('email', 'Email', 'text');
        $form .= $this->inputMtz('login', 'Login', 'text');
        $form .= $this->inputMtz('lastname', 'Nom', 'text');
        $form .= $this->inputMtz('firstname', 'Prénom', 'text');
        $form .= $this->inputMtz('telephone', 'Téléphone', 'text');
        $form .= $this->inputMtz('address', 'Adresse', 'text');
        $form .= $this->inputMtz('password', 'Mot de passe', 'password');
        $form .= $this->inputMtz('password', 'Confirmer mot de passe', 'password');
        $form .= $this->submitMtz('submit', 'S\'inscrire', 'center');
        return $form;
    }

    public function loginMtz()
    {
        $form = $this->inputMtz('login', 'Login', 'text');
        $form .= $this->inputMtz('password', 'Mot de passe', 'password');
        $form .= $this->checkboxMtz('rememberMe', 'Se souvenir de moi');
        $form .= $this->submitMtz('submit', 'Se connecter', 'center');
        return $form;
    }

    public function inputMtz($name, $label, $type)
    {
        $html = '<div class="row">';
        $html .= '<div class="input-field col s12">';
        $html .= '<input name="'.$name.'" id="' . $name . '" type="' . $type . '" class="validate"/>';
        $html .= '<label for="' . $name . '">' . $label . '</label>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    public function checkboxMtz($name, $label)
    {
        $html = '<p>';
        $html .= '<input type="checkbox" id="' . $name . '" />';
        $html .= '<label for="' . $name . '">' . $label . '</label>';
        $html .= '</p>';
        return $html;
    }

    public function submitMtz($name, $label, $class)
    {
        $html = '<div class="row">';
        $html .= '<div class="input-field col s12 ' . $class . '">';
        $html .= '<input name="' . $name . '"id="' . $name . '" type="submit" value="' . $label . '" class="btn validate"/>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }
}