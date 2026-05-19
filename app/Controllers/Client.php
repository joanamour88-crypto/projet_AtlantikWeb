<?php 
namespace App\Controllers;
use App\Models\ModeleClient;
use App\Models\ModeleLiaison;
use App\Models\ModeleTarif;
use App\Models\ModeleHoraires;
use App\Models\ModeleReservation;
use App\Models\ModeleEnregistrer;

helper(['url','assets','form']);
$session = session();

class Client extends BaseController
{
    /////////////////////////// UC 9 ///////////////////////////
    public function ModifCompte()
    {
        $data['TitreDeLaPage'] = 'ModificationCompte';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Client/vue_ModifierCompte', $data)
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
            . view('Client/vue_ModifierCompte', $data)
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
        $donnees['modifcompte'] = $modelClient->update($donneesAInserer, true);
        return view('Templates/Header')
            .view('Client/vue_ModifierCompte', $donnees)
            .view('Templates/Footer');
    }
}