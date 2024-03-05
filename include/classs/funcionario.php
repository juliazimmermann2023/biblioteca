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

    public function getData_inclusao(){
        return $this->data_inclusao;}
    public function setData_inclusao($data_inclusao){
        $this-> data_inclusao = $data_inclusao;}

    public function getdata_alteracao(){
        return $this->data_alteracao;}
    public function setdata_alteracao($data_alteracao){
        $this-> data_alteracao = $data_alteracao;}

    public function getInclusao_funcionario_id(){
        return $this->inclusao_funcionario_id;}
    public function setInclusao_funcionario_id($inclusao_funcionario_id){
        $this-> inclusao_funcionario_id= $inclusao_funcionario_id;}

    public function getAlteracao_funcionario_id(){
        return $this->alteracao_funcionario_id;}
    public function setAlteracao_funcionario_id($alteracao_funcionario_id){
        $this-> alteracao_funcionario_id = $alteracao_funcionario_id;}
 
}
?>