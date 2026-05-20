<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleReservation extends Model{
    protected $table = 'reservation';
    protected $primaryKey = 'NORESERVATION';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['NORESERVATION','NOTRAVERSEE', 'NOCLIENT', 'DATEHEURE', 'MONTANTTOTAL', 'PAYE', 'MODEREGLEMENT'];

    public function getAllReservation($noclient)
    {
        return $this->select('NORESERVATION, DATEHEURE, p.NOPORT as portdep, po.NOPORT as portarr, t.DATEHEUREDEPART, MONTANTTOTAL, PAYE')
        ->join('traversee t', 'r.NOTRAVERSEE = t.NOTRAVERSEE', 'inner')
        ->join('liaison l', 't.NOLIAISON = l.NOLIAISON', 'inner')
        ->join('port p', 'l.NOPORT_DEPART = p.NOPORT', 'inner')
        ->join('port po', 'l.NOPORT_ARRIVEE = po.NOPORT', 'inner')
        ->where('NOCLIENT', $noclient)
        ->get()
        ->getResult();
    }
}