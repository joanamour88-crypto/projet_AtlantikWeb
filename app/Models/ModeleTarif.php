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
        return  $this->select('t.TARIF, t.NOTYPE, t.NOPERIODE, t.LETTRECATEGORIE')
        ->where('t.NOLIAISON', $noliaison)
        ->get()
        ->getResult();
    }

    public function getCategorie()
    {
        return $this->select('c.LETTRECATEGORIE, c.LIBELLE')
                ->from('categorie c')
                ->groupby('c.LETTRECATEGORIE, c.LIBELLE')
                ->get()
                ->getResult();
    }

    public function getType()
    {
        return $this->select('ty.NOTYPE, ty.LETTRECATEGORIE, ty.LIBELLE')
        ->from('type ty')
        ->groupby(', ty.NOTYPE, ty.LETTRECATEGORIE, ty.LIBELLE')
        ->get()
        ->getResult();
    }

    public function getPeriode()
    {
        return $this->select('p.NOPERIODE, p.DATEDEBUT, p.DATEFIN')
            ->from('periode p')
            ->groupby('p.NOPERIODE, p.DATEDEBUT, p.DATEFIN')
            ->get()
            ->getResult();
    }
}