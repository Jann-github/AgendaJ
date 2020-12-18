<?php namespace App\Models;

    use CodeIgniter\Model;

class CrudModel extends Model{
    public function obtieneNombres(){
        $Nombres = $this->db->query("SELECT * FROM t_agenda");
        return $Nombres->getResult();
    }

    public function insertar($datos){
        $Contactos = $this->db->table('t_agenda');
        $Contactos->insert($datos);

        return $this->db->insertID();
    }

    public function getContacto($Dato){
        $Contacto = $this->db->table('t_agenda');
        $Contacto->where($Dato);

        return $Contacto->get()->getResultArray();
    }

    public function actualizar($data,$idContact){
        $Contacto = $this->db->table('t_agenda');
        $Contacto->set($data);
        $Contacto->where('id_contacto',$idContact);

        return $Contacto->update();
    }

    public function eliminaContacto($data){
        $Contacto = $this->db->table('t_agenda');
        $Contacto->where($data);

        return $Contacto->delete();
    }

    /*****categorias */
    public function getCategorias(){
        $Categorias = $this->db->query("SELECT * FROM t_categoria");
        return $Categorias->getResult();
    }

    public function insertarc($datos){
        $Categoria = $this->db->table('t_categoria');
        $Categoria->insert($datos);

        return $this->db->insertID();
    }

    public function getCategoria($Dato){
        $Categoria = $this->db->table('t_categoria');
        $Categoria->where($Dato);

        return $Categoria->get()->getResultArray();
    }

    public function actualizarc($data,$idCategoria){
        $Categoria = $this->db->table('t_categoria');
        $Categoria->set($data);
        $Categoria->where('id_categoria',$idCategoria);

        return $Categoria->update();
    }

    public function eliminaCategoria($data){
        $Categoria = $this->db->table('t_categoria');
        $Categoria->where($data);

        return $Categoria->delete();
    }

}