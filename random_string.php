<?php
    function generateRandomString($length = 2) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = 1;
        for ($i = 0; $i < $length; $i++) {
            // $randomString .= $characters[rand(0, $charactersLength - 1)];
            $randomString++;
        }
        return $randomString;
    }
?>