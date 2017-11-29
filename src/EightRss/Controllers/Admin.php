<?php
/**
 * Created by PhpStorm.
 * User: Eight
 * Date: 14/11/2017
 * Time: 12:52
 */

namespace EightRss\Controllers;

use App\Resources\Functions;
use App\Resources\Materialize;
use EightRss\Models\User;
use EightRss\Models\Flux;

class Admin extends Functions
{
    public function start()
    {
        $f = new Flux();
        $user = new User();
        $m = new Materialize();
        $alert = "";
        $error = "";

        if ($user->isConnected() && $user->isAdmin()) {
            if (isset($_POST['submit_add_flux'])) {
                if ($_POST['url'] == "") {
                    $error = "Aucune URL n'a été rentrée";
                } else {
                    if (!preg_match('#((https?|http)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i',$_POST['url'])) {
                        $error = "L'URL rentrée est invalide";
                    }
                    else{
                        $f->addFlux();
                        $alert = "Le flux a bien été ajouté";
                    }
                }
            }
            if (isset($_POST['submit_modify_flux'])) {
                $f->modifyFlux();
                $alert = "Le flux a bien été modifié";
            }
            if (isset($_POST['submit_delete_flux'])) {
                $f->deleteFlux();
                $alert = "Le flux a bien été supprimé";
            }
            // Formulaire d'ajout de flux
            $form = $m->inputMtz('name', 'Nom du flux', 'text');
            $form .= $m->inputMtz('url', 'Lien du flux RSS', 'text');
            $form .= $m->submitMtz('submit_add_flux', 'Ajouter un flux', 'center');

            //Formulaire de modification de flux
            $form2 = $m->inputMtz('name', 'Nom du flux', 'text');
            $form2 .= $m->inputMtz('url', 'Lien du flux RSS', 'text');
            $form2 .= $m->submitMtz('submit_modify_flux', 'Modifier un flux', 'center');
            //Formulaire de suppression de flux
            $form3 = $m->submitMtz('submit_delete_flux', 'Supprimer un flux', 'center');
            $this->display('admin', array(
                'user' => $user,
                'flux' => $f,
                'form' => $form,
                'form2' => $form2,
                'form3' => $form3,
                'alert' => $alert,
                'error' => $error
            ));
        } else {
            $this->redirect('/home');
        }
    }
}