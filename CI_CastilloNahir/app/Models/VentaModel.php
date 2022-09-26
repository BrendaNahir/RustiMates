<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model
{
	protected $table ='venta';
	protected $primaryKey ='venta_id';

	protected $useAutoIncrement=true;


	protected $returnType= 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['usuarios_id','venta_fecha'];

	protected $useaTimestamps = false;
	protected $createdField = '' ;
	protected $updatedField= '';
	protected $deletedField = '';


public function getVentasAll(){
    $db = \Config\Database::connect();
    $builder = $db->table('venta');
    $builder->select('*');
    $builder->join('usuarios', 'usuarios.id = venta.usuarios_id');
    $query = $builder->get();
    return $query->getResultArray();
  }

}



