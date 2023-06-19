<?php
include "db_connection.php";

error_reporting(E_ERROR | E_PARSE);
$error = "";

// Connection to API.
$urlContent = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/a/');
$urlContent2 = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/b/');
$apiCurrency = json_decode($urlContent, true);
$apiCurrency2 = json_decode($urlContent2, true);

// Exchange rates logic
$ratesArray = $apiCurrency[0];
$rates = $ratesArray['rates'];

$ratesArray2 = $apiCurrency2[0];
$rates2 = $ratesArray2['rates'];

// Data Base logic
$inserted_rows = 0;
foreach ($rates as $value) {
    $rates = $rates[$inserted_rows];
    $currency = $value["currency"];
    $code = $value["code"];
    $mid = $value["mid"];

    // $query = "INSERT INTO exchange_rates (currency, code, mid) VALUES ('$currency', '$code', '$mid');";
    $query = "UPDATE exchange_rates SET mid = '$mid' WHERE code = '$code';";
    $query_result = mysqli_query($connection, $query);
    $inserted_rows++;
};

$inserted_rows = 0;
foreach ($rates2 as $value) {
    $rates2 = $rates2[$inserted_rows];
    $currency = $value["currency"];
    $code = $value["code"];
    $mid = $value["mid"];

    // $query = "INSERT INTO exchange_rates (currency, code, mid) VALUES ('$currency', '$code', '$mid');";
    $query = "UPDATE exchange_rates SET mid = '$mid' WHERE code = '$code';";
    $query_result = mysqli_query($connection, $query);
    $inserted_rows++;
};

// if (count($exchange_rates) == $inserted_rows) {
//     echo "success";
// } else {
//     echo "error";
// }
// $selected_currency = "";

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
        // $query_result = intval($result[0]);
        $toPLN = $userAmount * $result;
        // print_r($toPLN);

        $query = "SELECT mid FROM exchange_rates WHERE code = '$toCode';";
        $query_result = mysqli_query($connection, $query);
        $result = $query_result->fetch_array();
        $result = $result[0];
        $fromPLN = $toPLN / $result;

        $query = "INSERT INTO history (amount, from_code, to_code, result) VALUES ('$userAmount', '$fromCode', '$toCode', '$fromPLN');";
        $query_result = mysqli_query($connection, $query);

        // print_r($fromPLN);
    };

    // $currentRate = $rates['mid'];
    // $result = $userAmount * $currentRate;
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1 class="title">Currency Converter</h1>
    <div class="container">
        <div id="content">
            <div id="calculator">
                <p>Choose currency and proper amount to calculate conversion.</p>
                <form method="POST">
                    <p>
                        From:
                        <select name="first_code">
                            <?php
                            $query = "SELECT code FROM exchange_rates;";
                            $query_result = mysqli_query($connection, $query);
                            while ($row = $query_result->fetch_assoc()) {
                                echo "<option>" . $row['code'] . "</option>";
                            }
                            ?>
                        </select>
                    </p>
                    <input id="user_amount" name="user_amount" type="number" placeholder="Amount">
                    <p>
                        To:
                        <select name="second_code">
                            <?php
                            $query = "SELECT code FROM exchange_rates;";
                            $query_result = mysqli_query($connection, $query);
                            while ($row = $query_result->fetch_assoc()) {
                                echo "<option>" . $row['code'] . "</option>";
                            }
                            ?>
                        </select>
                    </p>
                    <button type="submit">Calculate</button>
                    <p>
                        <?php if ($fromPLN) {
                            echo "Your conversion from " . $fromCode . " to " . $toCode . " is " . $fromPLN;
                        } ?>
                    </p>
                </form>
                <?php
                // if ($result) {
                //     echo "<div>" . $result . "</div>";
                // }
                ?>
            </div>
        </div>
    </div>

    <!-- Currency Table -->
    <h1 class="title">Exchange Rates</h1>
    <div class="container">
        <table>
            <tr>
                <th>Currency</th>
                <th>Code</th>
                <th>Rate</th>
            </tr>
            <?php
            $query = "SELECT * FROM exchange_rates;";
            $query_result = mysqli_query($connection, $query);
            if ($query_result->num_rows > 0) {
                // output data of each row
                while ($row = $query_result->fetch_assoc()) {
                    echo "<tr><td>" . $row['currency'] . "</td><td> " . $row['code'] . "</td><td> " . $row['mid'] . "</td></tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </div>

    <!-- History -->
    <h1 class="title">Exchange History</h1>
    <div class="container">
        <table>
            <tr>
                <th>Amount</th>
                <th>From</th>
                <th>To</th>
                <th>Result</th>
            </tr>
            <?php
            $query = "SELECT * FROM history;";
            $query_result = mysqli_query($connection, $query);
            if ($query_result->num_rows > 0) {
                // output data of each row
                while ($row = $query_result->fetch_assoc()) {
                    echo "<tr><td>" . $row['amount'] . "</td><td> " . $row['from_code'] . "</td><td> " . $row['to_code'] . "</td><td> " . $row['result'] . "</td></tr>";
                };
            } else {
                echo "0 results";
            };
            ?>
        </table>
    </div>

</body>

</html>