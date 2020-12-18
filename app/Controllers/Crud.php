<?php namespace App\Controllers;

	use App\Models\CrudModel;
use CodeIgniter\Config\View;

class Crud extends BaseController
{
	public function index()
	{
		return view('inicio');
	}

	public function agenda(){
		$Crud = new CrudModel();
		$datos = $Crud->obtieneNombres();
		$cat = $Crud->getCategorias();

		//Obtenemos mensaje 
		$mensaje = session('mensaje');

		$data =[
			"Datos" => $datos,
			"Categorias" => $cat,
			"Mensaje" => $mensaje
		];
		return view('agenda',$data);
	}

	public function crear(){
		//Obtenemos variables del formulario
		$datos = [
			"Nombre" => $_POST['Nombre'],
			"Paterno" => $_POST['AppP'],
			"Materno" => $_POST['AppM'],
			"id_categoria" => $_POST['Categoria'],
			"Telefono" => $_POST['Telefono'],
			"Email" => $_POST['Email'],
		];

		$Crud = new CrudModel();
		$respuesta = $Crud->insertar($datos);
		if($respuesta > 0){
			return redirect()->to(base_url().'/agenda')->with('mensaje','1');
		}
		else{
			return redirect()->to(base_url().'/agenda')->with('mensaje','2');
		}
	}

	public function actualizar(){
		//Obtenemos variables del formulario
		$datos = [
			"Nombre" => $_POST['Nombre'],
			"Paterno" => $_POST['AppP'],
			"Materno" => $_POST['AppM'],
			"id_categoria" => $_POST['Categoria'],
			"Telefono" => $_POST['Telefono'],
			"Email" => $_POST['Email'],
		];

		$idContact = $_POST['id_contacto'];

		$Crud = new CrudModel();
		$respuesta = $Crud->actualizar($datos,$idContact);

		if($respuesta > 0){
			return redirect()->to(base_url().'/agenda')->with('mensaje','3');
		}
		else{
			return redirect()->to(base_url().'/agenda')->with('mensaje','4');
		}
	}

	public function getNombre($idName){
		$Contacto = ['id_contacto' => $idName];
		$Crud = new CrudModel();
		$respuesta = $Crud->getContacto($Contacto);
		$cat = $Crud->getCategorias();

		$datos = ["datos" => $respuesta,
		"Categorias" => $cat];

		return view('actualizaa',$datos);
	}

	public function borrar($idName){
		$Crud = new CrudModel();
		$data = ['id_contacto' => $idName];

		$respuesta = $Crud->eliminaContacto($data);

		if($respuesta){
			return redirect()->to(base_url().'/agenda')->with('mensaje','5');
		}
		else{
			return redirect()->to(base_url().'/agenda')->with('mensaje','6');
		}
	}

	//------------------------------Categorias--------------------------------------

	public function categoria(){
		$Crud = new CrudModel();
		$cat = $Crud->getCategorias();

		//Obtenemos mensaje 
		$mensaje = session('mensaje');

		$data =[
			"Datos" => $cat,
			"Categorias" => $cat,
			"Mensaje" => $mensaje
		];
		return view('categorias',$data);
	}

	public function crearc(){
		//Obtenemos variables del formulario
		$datos = [
			"Categoria" => $_POST['Categoria'],
			"Descripcion" => $_POST['Descripcion'],
			"fechaInsertc" => $_POST['Fecha'],
		];

		$Crud = new CrudModel();
		$respuesta = $Crud->insertarc($datos);
		if($respuesta > 0){
			return redirect()->to(base_url().'/categorias')->with('mensaje','1');
		}
		else{
			return redirect()->to(base_url().'/categorias')->with('mensaje','2');
		}
	}

	public function getCategoria($idCat){
		$Categoria = ['id_categoria' => $idCat];
		$Crud = new CrudModel();
		$respuesta = $Crud->getCategoria($Categoria);

		$datos = ["datos" => $respuesta];

		return view('actCat',$datos);
	}

	public function actualizarc(){
		//Obtenemos variables del formulario
		$datos = [
			"Categoria" => $_POST['Categoria'],
			"Descripcion" => $_POST['Descripcion'],
			"fechaInsertc" => $_POST['Fecha'],
		];

		$Categoria = $_POST['id_categoria'];

		$Crud = new CrudModel();
		$respuesta = $Crud->actualizarc($datos,$Categoria);

		if($respuesta > 0){
			return redirect()->to(base_url().'/categorias')->with('mensaje','3');
		}
		else{
			return redirect()->to(base_url().'/categorias')->with('mensaje','4');
		}
	}

	public function borrarc($idCategoria){
		$Crud = new CrudModel();
		$data = ['id_categoria' => $idCategoria];

		$respuesta = $Crud->eliminaCategoria($data);

		if($respuesta){
			return redirect()->to(base_url().'/categorias')->with('mensaje','5');
		}
		else{
			return redirect()->to(base_url().'/categorias')->with('mensaje','6');
		}
	}

}