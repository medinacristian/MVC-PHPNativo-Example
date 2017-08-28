<?php

class UsuariosController extends ControladorBase {
  
  public function __construct() {
    parent::__construct();
  }
  
  
  public function index() {
    
    //Creamos el objeto usuario
    $usuario = new Usuario();
    
    //Conseguimos todos los usuarios
    $allUsers = $usuario->getAll();
    
    //Cargamos la vista index y le pasamos los valores
    $this->view("index", array(
        "allusers" => $allUsers,
        "Hola" => "EJEMPLO MVC POO PHP"
    ));
  }
  
  public function crear(){
    if(isset($_POST["nombre"])){
      
      //Creamos un usuario
      $usuario = new Usuario();
      $usuario->setNombre($_POST["nombre"]);
      $usuario->setApellido($_POST["apellido"]);
      $usuario->setEmail($_POST["email"]);
      $usuario->setPassword(sha1($_POST["password"]));
      $save=$usuario->save();

    }
    
    $this->redirect("Usuarios","index");
  }
  
  public function borrar(){
    if(isset($_GET["id"])){
      $id = (int) $_GET["id"];
      
      $usuario = new Usuario();
      $usuario->deleteById($id);
    }
    $this->redirect();
  }
  
  public function hola(){
    $usuarios = new Usuario();
    $usu=$usuarios->getUnUsuario();
    var_dump($usu);
  }
  
}