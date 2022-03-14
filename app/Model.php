<?php
namespace App;

use mysqli;
use PDO;
use PDOException;

class Model{

    public function connect()
    {
        $servername = "localhost";
        $database = "DataBaseName";
        $username = "username";
        $password = "password";
        $charset = "utf8mb4";

        try {

            $dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {
            echo 'Connection failed: '. $e->getMessage();
        }
        
    }

    public function Insert($pdo,$key,$value)   
    {
        $sql = "INSERT INTO Todos ($key[0],$key[1])VALUES ('".$value[0]."','".$value[1]."')";
        
        if ($pdo->query($sql) === TRUE) {
            return;
        } else {
            echo "Error: " . $sql . "<br>" . $pdo->error;
            return;
        }
    }

    public function select($pdo, $key)
    {
        $result = $pdo->query("SELECT ".$key[0].",".$key[1].",".$key[2]." FROM Todos")->fetchAll();
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return $result;
        }
    }

    public function delete($pdo, $id)
    {
        try{
            $sql = "DELETE FROM Todos WHERE id=".$id;

            $pdo->exec($sql);
            return;
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function update($pdo,$id,$value)
    {
        try{
            $sql = "UPDATE Todos SET Toggle='".$value."' WHERE id=".$id;

            $stmt = $pdo->prepare($sql);

            $stmt->execute();
            return;
            // echo $stmt->rowCount() . " records UPDATED successfully";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}
