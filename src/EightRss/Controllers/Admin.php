<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:52
 */

namespace EightRss\Controllers;

use App\Functions;
use EightRss\Models\User;
use EightRss\Models\Flux;

class Admin extends Functions
{
    public function start()
    {
        $f = new Flux();
        $user = new User();
        if ($user->isConnected() && $user->isAdmin()) {
            if(isset($_POST['submit_add_flux'])){
                $f->addFlux();
            }
            if(isset($_POST['submit_modify_flux'])){
                $f->modifyFlux();
            }
            if(isset($_POST['submit_delete_flux'])){
                $f->deleteFlux();
            }
            if(isset($_POST['submit_delete_theme'])){
                $f->deleteTheme();
            }
            // Formulaire d'ajout de flux
            $form = $this->inputMtz('name','Nom du flux', 'text');
            $form .= $this->inputMtz('url','Lien du flux RSS', 'text');
            $form .= $this->submitMtz('submit_add_flux','Ajouter un flux','center');

            //Formulaire de modification de flux
            $form2 = $this->inputMtz('name','Nom du flux', 'text');
            $form2 .= $this->inputMtz('url','Lien du flux RSS', 'text');
            $form2 .= $this->submitMtz('submit_modify_flux','Modifier un flux','center');

            //Formulaire de suppression de flux
            $form3 = $this->submitMtz('submit_delete_flux','Supprimer un flux','center');

            //Formulaire d'ajout d'un thème
            $form4 = $this->inputMtz('name','Nom du thème', 'text');
            $form4 .= $this->submitMtz('submit_add_theme','Ajouter un thème','center');

            //Formulaire de modification d'un thème
            $form5 = $this->inputMtz('name','Nom du thème', 'text');
            $form5 .= $this->submitMtz('submit_modify_theme','Modifier le thème','center');

            //Formulaire de suppression d'un thème
            $form6 = $this->submitMtz('submit_delete_theme','Supprimer un thème','center');
            $this->display('admin', array(
                'user' => $user,
                'form' => $form,
                'form2' => $form2,
                'form3' => $form3,
                'form4' => $form4,
                'form5' => $form5,
                'form6' => $form6,
                ));
        } else {
            $this->redirect('/home');
        }
    }
}