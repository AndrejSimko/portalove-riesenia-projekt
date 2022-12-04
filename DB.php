<?php

namespace projekt;

class DB
{
    private $host;
    private $dbname;
    private $username;
    private $password;

    private $connection;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $this->connection = new \PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function insertMessage($first_name, $last_name, $email, $message)
    {
        $dateTime = date('Y-m-d H:i:s', time());
        $sql = "INSERT INTO message(first_name, last_name, email, message, created_at) 
                VALUE ('".$first_name."', '".$last_name."', '".$email."', '".$message."', '".$dateTime."')";
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function insertListing($name, $price, $details, $detail1, $detail2, $user_id, $category_id, $image_id)
    {
        $dateTime = date('Y-m-d H:i:s', time());
        $sql = "INSERT INTO listing(name, price, details, detail1, detail2, created_at, User_id, Category_id, Image_id) 
                VALUE ('".$name."', '".$price."', '".$details."', '".$detail1."', '".$detail2."', '".$dateTime."', '".$user_id."', '".$category_id."', '".$image_id."')";
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getListing()
    {
        $listingItems = [];
        $sql = "SELECT listing.id listing_id, listing.name, listing.price, listing.details, listing.detail1, listing.detail2, user.email, user.id user_id, category.category, 
        Category_id category_id, image.path image, image.alt_name, image.id image_id FROM `listing` 
        INNER JOIN user ON listing.User_id = user.id INNER JOIN category ON listing.Category_id = category.id INNER JOIN image ON listing.Image_id = image.id;";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $listingItems[] = [
                'listing_id' => $row['listing_id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'details' => $row['details'],
                'detail1' => $row['detail1'],
                'detail2' => $row['detail2'],
                'email' => $row['email'],
                'user_id' => $row['user_id'],
                'category' => $row['category'],
                'category_id' => $row['category_id'],
                'image' => $row['image'],
                'alt_name' => $row['alt_name'],
                'image_id' => $row['image_id']
            ];
        }

        return $listingItems;
    }

    public function getRecentListing()
    {
        $listingItems = [];
        $sql = "SELECT listing.id listing_id, listing.name, listing.price, listing.details, listing.detail1, listing.detail2, listing.created_at, user.email, user.id user_id, category.category, 
        Category_id category_id, image.path image, image.alt_name, image.id image_id FROM `listing` INNER JOIN user ON listing.User_id = user.id INNER JOIN category ON 
        listing.Category_id = category.id INNER JOIN image ON listing.Image_id = image.id ORDER BY created_at DESC;";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $listingItems[] = [
                'listing_id' => $row['listing_id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'details' => $row['details'],
                'detail1' => $row['detail1'],
                'detail2' => $row['detail2'],
                'email' => $row['email'],
                'user_id' => $row['user_id'],
                'category' => $row['category'],
                'category_id' => $row['category_id'],
                'image' => $row['image'],
                'alt_name' => $row['alt_name'],
                'image_id' => $row['image_id']
            ];
        }

        return $listingItems;
    }

    public function getCategory()
    {
        $listingItems = [];
        $sql = "SELECT id, category FROM `category`;";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $listingItems[] = [
                'id' => $row['id'],
                'category' => $row['category']
            ];
        }

        return $listingItems;
    }

    public function getImage()
    {
        $listingItems = [];
        $sql = "SELECT id, path, alt_name FROM `image`;";
        $query = $this->connection->query($sql);

        while ($row = $query->fetch()) {
            $listingItems[] = [
                'id' => $row['id'],
                'path' => $row['path'],
                'alt_name' => $row['alt_name']
            ];
        }

        return $listingItems;
    }

    public function createAccount($email, $password)
    {
        $hasPassword = sha1($password);
        $dateTime = date('Y-m-d H:i:s', time());
        $sql = "INSERT INTO user(id, email, password, is_admin, created_at, updated_at) VALUES (NULL, '".$email."', '".$hasPassword."', 0, '".$dateTime."', NULL)";
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function login($email, $password)
    {
        $hasPassword = sha1($password);
        $sql = "SELECT id AS userId, COUNT(id) AS num, email, password, is_admin FROM user WHERE email = '".$email."' AND password = '".$hasPassword."'";
        try {
            $query = $this->connection->query($sql);
            $result = $query->fetch(\PDO::FETCH_ASSOC);
            if(intval($result['is_admin']) === 1) {
                $_SESSION['is_admin'] = true;
            } else {
                $_SESSION['is_admin'] = false;
            }
            if(intval($result['num']) === 1) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = intval($result['userId']);
                return true;
            } else {
                $_SESSION['logged_in'] = false;
                return false;
            }
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteListing($listing_id)
    {
        $sql = "DELETE FROM listing WHERE id = '".$listing_id."'";
        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function editListing($id, $name, $price, $details, $detail1, $detail2, $category_id, $image_id)
    {
        $dateTime = date('Y-m-d H:i:s', time());
        $sql = "UPDATE listing SET name = '".$name."', price = '".$price."', details = '".$details."', detail1 = '".$detail1."', detail2 = '".$detail2."', 
        updated_at = '".$dateTime."', category_id = '".$category_id."', image_id = '".$image_id."' WHERE id = ".$id;

        try {
            $this->connection->exec($sql);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    

}