<?php

    require_once 'sever.php';

    class Database extends Config{
        public function insert($username,
        $phone, 
        $room, 
        $room_bill,
        $electricity_bill,
        $water_bill,
        $parking_fee){
            $sql = "INSERT INTO customer
            (username,
            phone, 
            room, 
            room_bill,
            electricity_bill,
            water_bill,
            parking_fee)
            VALUES(:username,
            :phone, 
            :room, 
            :room_bill,
            :electricity_bill,
            :water_bill,
            :parking_fee)";
            $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'phone' => $phone,
            'room' => $room,
            'room_bill' => $room_bill,
            'electricity_bill' => $electricity_bill,
            'water_bill' => $water_bill,
            'parking_fee' => $parking_fee
        ]);
        return true;
        }
        
        public function read(){
            $sql = "SELECT * FROM customer ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
?>