<?php 
class AutorRepository implements Repository{
    public static function listAll(){
  
        $db = DB :: getInstance();
        $sql = "SELECT * FROM autor WHERE id = :id";
        $query =$db->prepare($sql);
        $query->execute();

        $list = array();
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $row){
            $autor= new Autor;
            $autor->setId($row->id);
            $autor->setNome($row->nome);
            $autor->setDataInclusao($row->data_inclusao);
            $autor->setDataAlteracao($row->data_alteracao);
            $autor->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $autor->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
                $list[]=$autor;
        }
        return $list;
    }
       
    public static function get($id){
        $db = DB :: getInstance();
        $sql = "SELECT * FROM autor WHERE id = :id";
        $query =$db->prepare($sql);
        $query->bindParam(':id',$id,PDO::PARAM_INT);
        $query->execute();
            if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_OBJ);
            $autor = new Autor;
            $autor->setId($row->id);
            $autor->setNome($row->nome);
            $autor->setDataInclusao($row->data_inclusao);
            $autor->setDataAlteracao($row->data_alteracao);
            $autor->setInclusaoFuncionarioId($row->inclusao_funcionario_id);
            $autor->setAlteracaoFuncionarioId($row->alteracao_funcionario_id);
            return $autor;
        }
return null;
    } 
    public static function insert($obj){}
    public static function update($obj){}
    public static function delete($id){}
}