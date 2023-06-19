<?php
include "db_connection.php";
include "api_connection.php";
include "db_rates.php";
include "user_data.php";

error_reporting(E_ERROR | E_PARSE);
$error = "";

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
                echo "<tr><td>0 results</td><td></td><td></td><td></td></tr>";
            };
            ?>
        </table>
    </div>

</body>

</html>