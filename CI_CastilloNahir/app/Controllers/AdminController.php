<?php

namespace App\Controllers;

class AdminController extends BaseController
{
	public function admin(){
		$data ['titulo'] = 'Index';
  echo view('plantilla/header',$data);
  echo view('plantilla/nav_admin',$data);
      echo view('contenido/principal');
}
	}