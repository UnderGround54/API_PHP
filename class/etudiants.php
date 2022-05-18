<?php
class Etudiant{
   
    private $connect;
    private $table;
    function __construct($db)
    {
        $this->connect = $db;
        $this->table = 'etudiant';
    }

    public function selectAll(){
        $querry = "SELECT * FROM $this->table ORDER BY id_etudiant DESC";
        $statement = $this->connect->prepare($querry);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function select($id){
        $querry = "SELECT * FROM $this->table WHERE id_etudiant=$id";
        $statement = $this->connect->prepare($querry);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function add($data){
        $form_data = array(
            ':id_etudiant' => $data['id_etudiant'],
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':age' => $data['age']
        );

        $querry = "INSERT INTO $this->table (id_etudiant,nom,prenom,age) VALUES (:id_etudiant, :nom, :prenom, :age)";

        $statement = $this->connect->prepare($querry);
        return $statement->execute($form_data);
    }

    public function update($data){
        $form_data = array(
            ':id_etudiant' => $data['id_etudiant'],
            ':nom' => $data['nom'],
            ':prenom' => $data['prenom'],
            ':age' => $data['age']
        );
        $querry = "UPDATE $this->table SET nom=:nom, prenom=:prenom, age=:age WHERE id_etudiant=:id_etudiant";

        $statement = $this->connect->prepare($querry);
        return $statement->execute($form_data);
    }

    public function delete($id){
        $querry = "DELETE FROM $this->table WHERE id_etudiant=$id";
        $statement = $this->connect->prepare($querry);
        return $statement->execute();
    }

}
?>