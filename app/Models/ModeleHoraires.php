<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleHoraires extends Model{
    protected $table = 'traversee t';
    protected $primaryKey = 'NOTRAVERSEE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowFields = ['NOTRAVERSEE', 'NOLIAISON', 'NOBATEAU', 'DATEHEUREDEPART', 'DATEHEUREARRIVEE', 'CLOTUREEMBARQUEMENT'];

    public function getAllTraversees()
    {
        return $this->select('NOTRAVERSEE, NOLIAISON, t.NOBATEAU, b.NOM as nombateau, TIME(DATEHEUREDEPART) as heure, DATE(DATEHEUREDEPART) as date')
        ->join('bateau b', 'b.NOBATEAU = t.NOBATEAU', 'inner')
        ->groupby('NOTRAVERSEE')
        ->get()
        ->getResult();
    }

    public function getCategorie()
    {
        return $this->select('LETTRECATEGORIE, LIBELLE')
        ->from('categorie')
        ->groupby('LETTRECATEGORIE')
        ->get()
        ->getresult();
    }

    public function getCapaMax()
    {
        return $this->select('c.LETTRECATEGORIE, c.NOBATEAU, c.CAPACITEMAX')
        ->join('contenir c', 'c.NOBATEAU = t.NOBATEAU', 'inner')
        ->groupby('c.LETTRECATEGORIE, c.NOBATEAU')
        ->get()
        ->getresult();
    }

    public function getEnregistrer()
    {
        return $this->select('r.NOTRAVERSEE, e.LETTRECATEGORIE, e.QUANTITERESERVEE')
        ->join('reservation r', 'r.NOTRAVERSEE = t.NOTRAVERSEE')
        ->join('enregistrer e', 'e.NORESERVATION = r.NORESERVATION', 'inner')
        ->get()
        ->getresult();
    }

    public function getSecteur()
    {
        return $this->select('s.NOSECTEUR, s.NOM')
        ->from('secteur s')
        ->groupby('s.NOSECTEUR')
        ->get()
        ->getResult();
    }

    public function getLiaison($nosecteur)
    {
        return $this->select('l.NOLIAISON, l.NOSECTEUR, p.NOM as NOM_DEPART, po.NOM as NOM_ARRIVEE')
        ->from('liaison l')
        ->join('port p', 'l.NOPORT_DEPART = p.NOPORT', 'inner')
        ->join('port po', 'l.NOPORT_ARRIVEE = po.NOPORT', 'inner')
        ->where('l.NOSECTEUR', $nosecteur)
        ->groupby('l.NOLIAISON, l.NOSECTEUR, p.NOM, po.NOM')
        ->get()
        ->getResult();
    }

    public function getDate()
    {
        return $this->select('NOLIAISON, date(DATEHEUREDEPART) AS dates')
        ->groupby('date(DATEHEUREDEPART)')
        ->get()
        ->getResult();
    }
}