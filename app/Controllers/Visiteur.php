<?php 
namespace App\Controllers;
use App\Models\ModeleClient;
use App\Models\ModeleLiaison;
use App\Models\ModeleTarif;
use App\Models\ModeleHoraires;

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
        helper(['form']);
        $session = session();
        $data['TitreDeLaPage'] = 'Se connecter';
        if (!$this->request->is('post')) {
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
        $reglesValidation = [
            'txtMail' => 'required',
            'txtMotDePasse' => 'required',
        ];
        if (!$this->validate($reglesValidation)) {
            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
        $Mail = $this->request->getPost('txtMail');
        $MdP = $this->request->getPost('txtMotDePasse');
        $modClient = new ModeleClient();
        $condition = ['Mel'=>$Mail,'motdepasse'=>$MdP];
        $utilisateurRetourne = $modClient->where($condition)->first();

        //var_dump($utilisateurRetourne);
        //die();

        if ($utilisateurRetourne != null) {
            $session->set('MEL', $utilisateurRetourne->MEL);
            $session->set('PRENOM', $utilisateurRetourne->PRENOM);
            $data['Mail'] = $Mail;
            echo view('Templates/Header', $data);
            echo view('Visiteur/vue_ConnexionReussie');
        } else {
            $data['TitreDeLaPage'] = "Mail ou/et Mot de passe inconnu(s)";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
    }

    public function seDeconnecter()
    {
        session()->destroy();
        return redirect()->to('seconnecter');
    }

    public function CréationCompte()
    {
        $data['TitreDeLaPage'] = 'CréationCompte';
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
            'txtVille' => 'required|string|max_length[20]',
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
            'NOM' => $this->request->getPost('txtNom'),
            'PRENOM' => $this->request->getPost('txtPrenom'),
            'ADRESSE' => $this->request->getPost('txtAdresse'),
            'CODEPOSTAL' => $this->request->getPost('txtCodePostale'),
            'VILLE' => $this->request->getPost('txtVille'),
            'TELEPHONEFIXE' => $this->request->getPost('txtTelFixe'),
            'TELEPHONEMOBILE' => $this->request->getPost('txtTelMobile'),
            'MEL' => $this->request->getPost('txtMail'),
            'MOTDEPASSE' => $this->request->getPost('txtMdp'),
        );

        //var_dump($donneesAInserer);
        //die();
        $modelClient = new ModeleClient();
        $donnees['creationcompte'] = $modelClient->insert($donneesAInserer, false);
        return view('Templates/Header')
            .view('Visiteur/vue_RapportCreationCompte', $donnees)
            .view('Templates/Footer');
    }

    public function voirLiaison()
    {
        $modeleLiaison = new ModeleLiaison();
        $donnee['lesliaisons'] = $modeleLiaison->getAllLiaison();
        $donnee['TitreDeLaPage'] = "Liste des liaisons";
        return view('Templates/Header')
        . view('Visiteur/vue_AfficheLiaisons', $donnee)
        . view('Templates/Footer');
    }

    public function voirTarif($noliaison)
    {
        $modeleTarif = new ModeleTarif();
        $donnee['lestarifs'] = $modeleTarif->getAllTarif($noliaison);
        $donnee['lesperiodes'] = $modeleTarif->getPeriode();
        $donnee['lescategories'] = $modeleTarif->getCategorie();
        $donnee['lestypes'] = $modeleTarif->getType();
        $donnee['TitreDeLaPage'] = "Liste des Tarifs";

        return view('Templates/Header')
        . view('Visiteur/vue_AfficheTarifLiaison', $donnee)
        . view('Templates/Footer');
    }

    public function voirHoraires()
    {
        $modeleHoraires = new modeleHoraires();
        $donnee['lessecteurs'] = $modeleHoraires->getSecteur();
        $donnee['TitreDeLaPage'] = "Liste des Horaires";

        return view('Templates/Header')
        . view('Visiteur/vue_AfficheHorairesTraversees', $donnee)
        . view('Templates/Footer');
    }

    public function voirHorairesNumSect($nosecteur)
    {
        $modeleHoraires = new modeleHoraires();
        $donnee['lesliaisons'] = $modeleHoraires->getLiaison($nosecteur);
        $donnee['lessecteurs'] = $modeleHoraires->getSecteur();
        $donnee['lesdates'] = $modeleHoraires->getDate();
        $donnee['lescategories'] = $modeleHoraires->getCategorie(); 
        $donnee['lestraversees'] = $modeleHoraires->getAllTraversees();
        $donnee['lescapasmax'] = $modeleHoraires->getCapaMax();
        $donnee['lesenregistrer'] = $modeleHoraires->getEnregistrer();
        $donnee['TitreDeLaPage'] = "Liste des Horaires";
         /*
        $donnee['lesresultats'] = [];

        foreach($donnee['lestraversees'] as $unetraversee)
        {
            foreach($donnee['lescapasmax'] as $unecapa)
            {
                foreach($donnee['lesenregistrer'] as $unenregistrer)
                {
                    if($unetraversee->NOTRAVERSEE == $unenregistrer->NOTRAVERSEE and $unecapa->LETTRECATEGORIE == $unenregistrer->LETTRECATEGORIE)
                    {
                        $donnee['lesresultats'] = (int)($unecapa->CAPACITEMAX) - (int)($unenregistrer->QUANTITERESERVEE);
                    }
                    else
                    {
                        $donnee['lesresultats'] = $unecapa->CAPACITEMAX;
                    }
                }
            }
        }
        */

        return view('Templates/Header')
        . view('Visiteur/vue_AfficheHTNumSect', $donnee)
        . view('Templates/Footer');
    }
}