<?php
@include_once('Database.php');

$db = new Database('currency-api');

//This is aPHP(5)script example on how eurofxref-daily.xml can be parsed
//Read eurofxref-daily.xml file in memory
//For the next command you will need the config
//option allow_url_fopen=On (default)

// https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml?5b46d07f7fb57bdaebe102ef3a693562
//
$XML = simplexml_load_file("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");

//the file is updated at around 16:00 CET
if($db->connect()) {
    foreach($XML->Cube->Cube->Cube as $rate){
        $sql = '';
        $args = [];

        if($db->find('currency', 'abbr', $rate['currency'])) {
            $sql = "UPDATE currency SET value = :value, updated_at = :date WHERE abbr = :abbr";
            $args = [ ':value' => $rate['rate'], ':date' => date('Y-m-d H:i:s'), ':abbr' => $rate['currency'] ];
        } else {
            $sql = "INSERT INTO currency(abbr, value, updated_at)
                    VALUES(:abbr, :value, :date)";
            $args = [ ':abbr' => $rate['currency'], ':value' => $rate['rate'], ':date' => date('Y-m-d H:i:s') ];
        }

        $db->query($sql, $args);
    }
}



//$url = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
//$xml = simplexml_load_file($url) or die("feed not loading");
//$Rate = $xml->Cube->Cube->Cube['1']->Rate;
//echo $Rate;
//echo var_dump($xml);
//


$xml = new SimpleXMLElement('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml', 0, 1);
$json  = json_encode($xml);
$configData = json_decode($json, true);

$currencies = $configData['Cube']['Cube']['Cube'];
echo $json;






?>

<!DOCTYPE html>
<html>
<head>
    <title>Currency</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
</head>

<body>

<script>
    console.log("<?php echo $json; ?>");
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</body>


</html>




