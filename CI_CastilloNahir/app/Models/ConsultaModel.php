<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
	protected $table ='consulta';
	protected $primaryKey ='id_consulta';

	protected $useAutoIncrement=true;


	protected $returnType= 'array';
	protected $useSoftDeletes = false;

	protected $allowedFields = ['nombre_consulta','email_consulta','motivo_consulta','mensaje_consulta','estado_consulta'];

	protected $useaTimestamps = false;
	protected $createdField = '' ;
	protected $updatedField= '';
	protected $deletedField = '';

	 public function getConsultaAll(){
    $db = \Config\Database::connect();
    $builder = $db->table('consulta');
    $builder->select('*');
    $query = $builder->get();
    return $query->getResultArray();
  }


}  