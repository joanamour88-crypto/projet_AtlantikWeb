<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleTarif extends Model{
    protected $table = 'tarifer t';
    protected $primaryKey = 'NOPERIODE, LETTRECATEGORIE, NOTYPE, NOLIAISON';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';

    protected $allowFields = ['NOPERIODE', 'LETTRECATEGORIE', 'NOTYPE', 'NOLIAISON', 'TARIF'];

    public function getAllTarif($noliaison)
    {
        return 
        $this->join('categorie c', 't.LETTRECATEGORIE = c.LETTRECATEGORIE', 'inner')
        ->join('periode p', 't.NOPERIODE = p.NOPERIODE', 'inner')
        ->join('type ty', 't.NOTYPE = ty.NOTYPE', 'inner')
        ->join('liaison l', 't.NOLIAISON = l.NOLIAISON', 'inner')
        ->join('port po', 'l.NOPORT_DEPART = po.NOPORT', 'inner')
        ->join('port por', 'l.NOPORT_ARRIVEE = por.NOPORT', 'inner')
        ->select('t.TARIF, c.LETTRECATEGORIE AS LETCATCAT, c.LIBELLE AS LIBCAT, DATEDEBUT, DATEFIN, ty.LETTRECATEGORIE AS LETCATTYP, ty.LIBELLE AS LIBTYP, ty.NOTYPE, po.NOM AS PORTDEPART, por.NOM AS PORTARRIVEE')
        ->where('t.NOLIAISON =' . $noliaison)
        ->get()
        ->getResult();
    }

    public function getCategorie()
    {
        return $this->join('categorie c', 't.LETTRECATEGORIE = c.LETTRECATEGORIE', 'inner')
        ->select('c.LETTRECATEGORIE AS LETCATCAT')
        ->get()
        ->getResult();
    }

    public function getType($noliaison)
    {
        return $this->join('type ty', 't.NOTYPE = ty.NOTYPE', 'inner')
        ->select('ty.LETTRECATEGORIE AS LETCATTYP, ty.LIBELLE AS LIBTYP, ty.NOTYPE')
        ->where('t.NOLIAISON =' . $noliaison)
        ->get()
        ->getResult();
    }

    public function getPeriode($noliaison)
    {
        return $this->join('periode p', 't.NOPERIODE = p.NOPERIODE', 'inner')
        ->select('DATEDEBUT, DATEFIN')
        ->where('t.NOLIAISON =' . $noliaison)
        ->get()
        ->getResult();
    }

    public function getNombrePeriode($noliaison)
    {
        return $this->join('periode p', 't.NOPERIODE = p.NOPERIODE', 'inner')
        ->select('count(DATEDEBUT) AS nbperiode')
        ->where('t.NOLIAISON =' . $noliaison)
        ->get()
        ->getResult();
    }
}