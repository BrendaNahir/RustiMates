<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleVentaModel extends Model
{
	protected $table ='detalle_venta';

	protected $returnType= 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['id_venta','producto_id','detalle_cantidad','detalle_precio'];

	protected $useaTimestamps = false;
	protected $createdField = '' ;
	protected $updatedField= '';
	protected $deletedField = '';


	public function DetalleVentaId($id){
		$db = \Config\Database::connect();
    	$builder = $db->table('detalle_venta');
    	$builder->select('*');
    	$builder->where('id_venta',$id);
    	$builder->join('venta', 'venta.venta_id = detalle_venta.id_venta');
    	$builder->join('producto', 'producto.id_producto = detalle_venta.producto_id');
    	$builder->join('usuarios', 'usuarios.id = venta.usuarios_id');
    	$query = $builder->get();
    	return $query->getResultArray();
	}

}  