<?php
        $connection = mysqli_connect('localhost', 'root', '', 'currency_converter');

        if(!$connection) {
            die('Connection failed');
        }
