<?php
include "db_connection.php";

error_reporting(E_ERROR | E_PARSE);
$error = "";

$selected_currency = "";
if (isset($_POST)) {
    // User form data.
    $fromCode = $_POST['first_code'];
    $userAmount = $_POST['user_amount'];

    // Connection to API.
    $urlContent = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/a/');
    $urlContent2 = file_get_contents('http://api.nbp.pl/api/exchangerates/tables/b/');
    //   . $_POST['first_code']
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
    <h1 id="title">Currency Converter</h1>
    <div class="container">
        <div id="content">
            <div id="calculator">
                <p>Please provide proper amount below to convert --- to Polish Zloty</p>
                <form method="POST">
                    <p>
                        From:
                        <select name="first_code">
                            <option>EUR</option>
                            <option>USD</option>
                        </select>
                    </p>
                    <input id="user_amount" name="user_amount" placeholder="Amount">
                    <button type="submit">Calculate</button>
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
                    echo "<tr><td>" . $row["currency"] . "</td><td> " . $row["code"] . "</td><td> " . $row["mid"] . "</td</tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </div>

</body>

</html>