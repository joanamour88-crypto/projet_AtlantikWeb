<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleTarif extends Model{
    protected $table = 'tarifer t';
    protected $primaryKey = 'NOPERIODE, LETTRECATEGORIE, NOTYPE, NOLIAISON';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';

    protected $allowFields = ['NOPERIODE', 'LETTRECATEGORIE', 'NOTYPE', 'NOLIAISON', 'TARIF'];

    public function getAllTarif()
    {
        return 
        $this->join('categorie c', 't.LETTRECATEGORIE = c.LETTRECATEGORIE', 'inner')
        ->join('periode p', 't.NOPERIODE = p.NOPERIODE', 'inner')
        ->join('type ty', 't.NOTYPE = ty.NOTYPE', 'inner')
        ->join('liaison l', 't.NOLIAISON = l.NOLIAISON', 'inner')
        ->join('port po', 'l.NOPORT_DEPART = po.NOPORT', 'inner')
        ->join('port por', 'l.NOPORT_ARRIVEE = por.NOPORT', 'inner')
        ->select('c.LETTRECATEGORIE AS LETCATCAT, c.LIBELLE AS LIBCAT')
        ->select('DATEDEBUT, DATEFIN')
        ->select('ty.LETTRECATEGORIE AS LETCATTYP, ty.LIBELLE AS LIBTYP, ty.NOTYPE')
        ->select('po.NOM AS PORTDEPART, por.NOM AS PORTARRIVEE')
        ->get();
    }
}