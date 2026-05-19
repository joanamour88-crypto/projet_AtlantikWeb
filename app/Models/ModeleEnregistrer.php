<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleEnregistrer extends Model{
    protected $table = 'enregistrer e';
    protected $returnType = 'object';
    protected $allowedFields = ['NORESERVATION','LETTRECATEGORIE', 'NOTYPE', 'QUANTITERESERVEE', 'QUANTITEEMBARQUEE'];

    public function getReservation($noreservation)
    {
        return $this->select('ty.LIBELLE, e.LETTRECATEGORIE, e.NOTYPE, e.QUANTITERESERVEE, r.MONTANTTOTAL')
        ->join('reservation r', 'r.NORESERVATION = e.NORESERVATION', 'inner')
        ->join('type ty', 'e.LETTRECATEGORIE = ty.LETTRECATEGORIE and e.NOTYPE = ty.NOTYPE')
        ->where('e.NORESERVATION', $noreservation)
        ->get()
        ->getResult();
    }
}

