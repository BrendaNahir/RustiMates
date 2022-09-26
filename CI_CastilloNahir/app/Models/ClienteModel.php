<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
	protected $table ='usuarios';
	protected $primaryKey ='id';

	protected $useAutoIncrement=true;


	protected $returnType= 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre','apellido','dni','provincia','direccion','email','pass','perfil_id'];

	protected $useaTimestamps = false;
	protected $createdField = '' ;
	protected $updatedField= '';
	protected $deletedField = '';

}  