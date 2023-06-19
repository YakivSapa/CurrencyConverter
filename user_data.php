<?php
// User form data.
if (isset($_POST)) {
    if (!$_POST['user_amount']) {
        echo "You have to enter proper amount to convert currency";
    } else {
        $fromCode = $_POST['first_code'];
        $toCode = $_POST['second_code'];
        $userAmount = $_POST['user_amount'];


        $query = "SELECT mid FROM exchange_rates WHERE code = '$fromCode';";
        $query_result = mysqli_query($connection, $query);
        $result = $query_result->fetch_array();
        $result = $result[0];
        $toPLN = $userAmount * $result;

        $query = "SELECT mid FROM exchange_rates WHERE code = '$toCode';";
        $query_result = mysqli_query($connection, $query);
        $result = $query_result->fetch_array();
        $result = $result[0];
        $fromPLN = $toPLN / $result;

        $query = "INSERT INTO history (amount, from_code, to_code, result) VALUES ('$userAmount', '$fromCode', '$toCode', '$fromPLN');";
        $query_result = mysqli_query($connection, $query);
    };
};
