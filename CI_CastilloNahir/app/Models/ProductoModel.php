<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
	protected $table ='producto';
	protected $primaryKey ='id_producto';

	protected $useAutoIncrement=true;


	protected $returnType= 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre_p','descripcion','precio','stock','categoria_id','imagen','estado_p'];

	protected $useaTimestamps = false;
	protected $createdField = '' ;
	protected $updatedField= '';
	protected $deletedField = '';

	 public function getProductoAll(){
    $db = \Config\Database::connect();
    $builder = $db->table('producto');
    $builder->select('*');
    $builder->join('producto_categoria', 'producto_categoria.id_categoria = producto.categoria_id');
    $query = $builder->get();
    return $query->getResultArray();
  }

}  