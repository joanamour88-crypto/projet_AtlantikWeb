<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleHoraires extends Model{
    protected $table = 'traversee t';
    protected $primaryKey = 'NOTRAVERSEE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowFields = ['NOTRAVERSEE', 'NOLIAISON', 'NOBATEAU', 'DATEHEUREDEPART', 'DATEHEUREARRIVEE', 'CLOTUREEMBARQUEMENT'];

    public function getSecteur()
    {
        return  $this->select('s.NOSECTEUR, s.NOM')
        ->from('secteur s')
        ->groupby('s.NOSECTEUR')
        ->get()
        ->getResult();
    }
}