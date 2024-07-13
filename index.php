<?php

  if (isset($_POST['value'])) {
    $api_key = "f17558_178401b16e154_cc7";
    $endpoint = "https://v6.exchangerate-api.com/v6/{$api_key}/latest/BRL";
    
    // Para fazer uma request GET para uma API REST, podemos usar a função cURL ou file_get_contents

    $request = file_get_contents($endpoint);
    $parsed = json_decode($request, true);
    
    // echo '<pre>';
    // var_dump($parsed["conversion_rates"]);
    // echo '<pre>';
    
    $value = str_replace(',', '.', $_POST['value']);
    $dolar = $parsed["conversion_rates"]["USD"];
    $result = $dolar * floatval($value);   
  }

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Exchange</title>
</head>
<body>
  <form action="" method="POST">
    <p>
      <label for="value">R$</label>
      <input type="text" name="value" id="value">
    </p>
    <p>
      <button type="submit">Converter para USD</button>
    </p>
  </form>

  <?php
    if (isset($result)) {
      echo "<p>Cotação do Dólar: " . $dolar . "</p>";
      echo "<p>R$ " . number_format($value,2,',','.') . " equivale a US$ " . $result . "</p>";
    }
  ?>
</body>
</html>