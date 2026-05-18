<?php
namespace App\Models;
use CodeIgniter\Model;

class ModeleReservation extends Model{
    protected $table = 'reservation';
    protected $primaryKey = 'NORESERVATION';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['NOTRAVERSEE, NOCLIENT, DATEHEURE, MONTANTTOTAL, PAYE, MODEREGLEMENT'];
}