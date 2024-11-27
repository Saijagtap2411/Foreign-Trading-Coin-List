<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function fetchCryptoData() {
    $apiUrl = "https://api.binance.com/api/v3/ticker/price";

    // Initialize cURL
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'User-Agent: Mozilla/5.0 (compatible; PHP script)',
    ]);

    // Execute the request
    $response = curl_exec($ch);

    // Handle errors
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch);

    return $response;
}

// Fetch and decode data
$data = json_decode(fetchCryptoData(), true);

// Remove filtering to include all coins
echo json_encode($data); // Return all coins with their price data
?>
