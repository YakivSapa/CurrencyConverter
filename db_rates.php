<?php
// Data Base logic
// print_r($ratesA);
foreach ($ratesA as  $key => $value) {
    $currency = $value["currency"];
    $code = $value["code"];
    $mid = $value["mid"];

    // $query = "INSERT INTO exchange_rates (currency, code, mid) VALUES ('$currency', '$code', '$mid');";
    $query = "UPDATE exchange_rates SET mid = '$mid' WHERE code = '$code';";
    $query_result = mysqli_query($connection, $query);
};

foreach ($ratesB as $key => $value) {
    $currency = $value["currency"];
    $code = $value["code"];
    $mid = $value["mid"];

    // $query = "INSERT INTO exchange_rates (currency, code, mid) VALUES ('$currency', '$code', '$mid');";
    $query = "UPDATE exchange_rates SET mid = '$mid' WHERE code = '$code';";
    $query_result = mysqli_query($connection, $query);
};
