<?php

$myPDO = new PDO("pgsql:host=localhost;dbname=crypto_class");


class EmbarrasingPost {
    public static function print_all(){
        global $myPDO;

        $result = $myPDO->query("SELECT * FROM embarrasing_posts");

        while($row = $result->fetch(\PDO::FETCH_ASSOC)){
            print_r($row);
        }
    }

    public static function chunk_results($username, $chunk_size, $offset){
        global $myPDO;

        $sql = "
            SELECT
              embarrasing_posts.*
            FROM
              embarrasing_posts
            JOIN
              users
            ON
              embarrasing_posts.user_id = users.id
            WHERE
              users.username = ?
            ORDER BY
              embarrasing_posts.id
            DESC
            LIMIT ? OFFSET ?;
        ";

        $stmt = $myPDO->prepare($sql);
        $stmt->execute([$username, $chunk_size, $offset]);

        $output = [];

        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $output[]= $row;
        }
        return $output;
    }

    public static function all_by_user($username){
        global $myPDO;

        $sql = "
            SELECT
              embarrasing_posts.*
            FROM
                embarrasing_posts
            JOIN
                users
            ON
                embarrasing_posts.user_id = users.id
            WHERE
                users.username = ?
            ORDER BY
                embarrasing_posts.id
            DESC;
        ";

        $stmt = $myPDO->prepare($sql);
        $stmt->execute([$username]);

        $output = [];

        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $output[]= $row;
        }
        return $output;
    }

    public static function add_post($username, $title, $body){
        global $myPDO;

        if (($user_id = User::get($username)['id']) == null){
            return false;
        }

        $sql = "
            INSERT INTO
                embarrasing_posts (user_id, title, body)
            VALUES
                (?, ?, ?);
            ";
        
        $stmt = $myPDO->prepare($sql);

        $stmt->execute([$user_id, $title, $body]);
        return true;
        
    }
}