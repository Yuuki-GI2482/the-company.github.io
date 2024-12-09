<?php
require 'Database.php';

class User extends Database {
    public function store($request) {
        // Assign variables to hold the data from the form
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        // Encrypt the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Create the query directly (without any escaping)
        $sql = "INSERT INTO users (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";

        // Execute the query
        if ($this->conn->query($sql)) {
            header('Location: ../views');
            exit;
        } else {
            die('Error creating the user: ' . $this->conn->error);
        }
    }

    public function login($request) {
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

                header('Location: ../views/dashboard.php');
                exit;
            } else {
                die('Password is incorrect');
            }
        } else {
            die('Username not found');
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        header('Location: ../views');
        exit;
    }

    public function getAllProducts() {
        // Fetching data from the products table
        $sql = "SELECT id, product_name, price, quantity FROM products";
    
        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die('Error retrieving all products: ' . $this->conn->error);
        }
    }
    

    public function getProduct($id) {
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            die('Product not found');
        }
    }

    public function update($request) {
        session_start();
        $id = $_SESSION['id'];
        $product_name = $request['product_name'];
        $quantity = $request['quantity'];
       
        $sql = "UPDATE users SET product_name = '$product_name', quantity = '$quantity' WHERE id = $id";

        if ($this->conn->query($sql)) {
            $_SESSION['product_name'] = "$product_name";

            header('Location: ../views/dashboard.php');
            exit;
        } else {
            die('Error updating the user: ' . $this->conn->error);
        }
    }
    
    public function updateProduct($request) {
        session_start();

        $id = $_SESSION['id'];
    
        $product_name = $request['product_name'];
        $quantity = $request['quantity'];  
    
   
        $sql = "UPDATE users SET product_name = '$product_name', quantity = $quantity WHERE id = $id";
    

        if ($this->conn->query($sql)) {
            $_SESSION['full_name'] = $product_name;
    
            header('Location: ../views/dashboard.php');
            exit;
        } else {
            die('Error updating the user: ' . $this->conn->error);
        }
    }



    public function delete() {
        session_start();
        $id = $_SESSION['id'];

        $sql = "DELETE FROM users WHERE id = $id";

        if ($this->conn->query($sql)) {
            $this->logout();
        } else {
            die('Unable to delete your account: ' . $this->conn->error);
        }
    }
}
?>