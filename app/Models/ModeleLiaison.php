<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleLiaison extends Model{
    protected $table = 'liaison l';
    protected $primaryKey = 'NOLIAISON';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';

    protected $allowFields = ['NOPORT_DEPART', 'NOSECTEUR', 'NOPORT_ARRIVEE', 'DISTANCE'];

    public function getAllLiaison()
    {
        return 
        $builder = $this->join('secteur s', 'l.NOSECTEUR = s.NOSECTEUR', 'inner')
        ->join('port p', 'l.NOPORT_DEPART = p.NOPORT', 'inner')
        ->join('port po', 'l.NOPORT_ARRIVEE = po.NOPORT', 'inner')
        ->select('NOLIAISON, p.NOM AS PORTDEPART, s.NOM AS NOMSECTEUR, po.NOM AS PORTARRIVEE, DISTANCE')
        ->get()->getResult();
    }
}