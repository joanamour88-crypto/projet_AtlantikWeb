<?php namespace App\Controllers;

use App\Models\Modele;

helper(['url','assets','form']);

class Visiteur extends BaseController
{
    public function Accueil()
    {
        return view('Templates/Header')
        . view('Visiteur/vue_Accueil')
        . view('Templates/Footer');
    }

    public function SeConnecter()
    {
        return view('Templates/Header')
        . view('Visiteur/vue_SeConnecter')
        . view('Templates/Footer');
    }

    public function CréationCompte()
    {
        $data['TitreDeLaPage'] = 'Création Nouveau Compte';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Visiteur/vue_CreeUnCompte', $data)
            . view('Templates/Footer');
        }
        $reglesValidation = [
            'txtNom' => 'required|string|max_length[25]',
            'txtPrenom' => 'required|string|max_length[10]',
            'txtAdresse' => 'required|string|max_length[30]',
            'txtCodePostale' => 'required|numeric',
            'txtVille' => 'required|string|max_length[10]',
            'txtTelFixe' => 'required|string|max_length[14]',
            'txtTelMobile' => 'required|string|max_length[14]',
            'txtMail' => 'required|string|max_length[30]',
            'txtMdp' => 'required|string|max_length[15]',
        ];
        if (!$this->validate($reglesValidation)) {
            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header')
            . view('Visiteur/vue_CreeUnCompte', $data)
            . view('Templates/Footer');
        }
        $donneesAInserer = array(
            'nom' => $this->request->getPost('txtNom'),
            'prenom' => $this->request->getPost('txtPrenom'),
            'adresse' => $this->request->getPost('txtAdresse'),
            'codepostale' => $this->request->getPost('txtAdresse'),
            'ville' => $this->request->getPost('txtAdresse'),
            'telfixe' => $this->request->getPost('txtAdresse'),
            'telmobile' => $this->request->getPost('txtAdresse'),
            'mail' => $this->request->getPost('txtAdresse'),
            'mdp' => $this->request->getPost('txtAdresse'),
        );
        $modelCreaCompte = new ModeleCreaCompte();
        $donnees['creationcompte'] = $modelCreaCompte->insert($donneesAInserer, false);
        return view('Templates/Header')
            .view('Visiteur/vue_RapportCreationCompte', $donnees)
            .view('Templates/Footer');
    }
}