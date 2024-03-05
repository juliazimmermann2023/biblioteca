<?php
class Funcionario
{
    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $senha;
    private $email;
    private $data_inclusao;
    private $data_alteracao;
    private $inclusao_funcionario_id;
    private $alteracao_funcionario_id;
    
    public function getId(){
        return $this->id;}
    public function setId($id){
        $this-> id = $id;}

    public function getNome(){
        return $this->nome;}
    public function setNome($nome){
        $this-> nome = $nome;}

    public function getCpf(){
        return $this->cpf;}
    public function setCpf($cpf){
        $this-> cpf = $cpf;}

    public function getTelefone(){
        return $this->telefone;}
    public function setTelefone($telefone){
        $this-> telefone = $telefone;}

    public function getSenha(){
        return $this->senha;}
    public function setSenha($senha){
        $this-> senha = $senha;}

    public function getEmail(){
        return $this->email;}
    public function setEmail($email){
        $this-> email = $email;}

    public function getDataInclusao(){
        return $this->data_inclusao;}
    public function setDataInclusao($data_inclusao){
        $this-> data_inclusao = $data_inclusao;}

    public function getdataAlteracao(){
        return $this->data_alteracao;}
    public function setdataAlteracao($data_alteracao){
        $this-> data_alteracao = $data_alteracao;}

    public function getInclusaoFuncionarioId(){
        return $this->inclusao_funcionario_id;}
    public function setInclusaoFuncionarioId($inclusao_funcionario_id){
        $this-> inclusao_funcionario_id= $inclusao_funcionario_id;}

    public function getAlteracaoFuncionarioId(){
        return $this->alteracao_funcionario_id;}
    public function setAlteracaoFuncionarioId($alteracao_funcionario_id){
        $this-> alteracao_funcionario_id = $alteracao_funcionario_id;}
 
}
?>