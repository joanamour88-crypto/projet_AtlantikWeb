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
        return $this->select('NOTRAVERSEE, NOLIAISON, b.NOM as nombateau, TIME(DATEHEUREDEPART) as heure')
        ->join('bateau b', 'b.NOBATEAU = t.NOBATEAU', 'inner')
        ->get()
        ->getResult();
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