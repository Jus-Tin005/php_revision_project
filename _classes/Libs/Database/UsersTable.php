<?php
namespace Libs\Database;

use PDOException;

class UsersTable{
    private $db = null;

    public function __construct(MySQL $db){
        $this->db = $db->connect();
    }

   /*
   
    To do = 1.check data before inserting
            2.write getAll() with try-catch exception

            Next.build factory class if codes with Dependency Injection
    
   */

    public function insert($data){
        try{
            $query = "
                INSERT INTO users (
                    name, email, phone, address,
                    password, role_id, created_at
                ) VALUES(
                    :name, :email, :phone, :address,
                    :password, :role_id, NOW()
                )
            ";

            $statement = $this->db->prepare($query);
            $statement->execute($data);

            return  $this->db->lastInsertId();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function getAll(){
        $statement = $this->db->query("
            SELECT users.*, roles.name AS role, roles.value
            FROM users LEFT JOIN roles
            ON users.role_id = roles.id
        ");

        return $statement->fetchAll();
    }
}