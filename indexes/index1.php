<?php /** @noinspection ALL */
include("connection-sample.php");
$site          = "http://uk-vodokanal.kz";
$header_check  = get_headers($site);
$response_code = $header_check[0];
echo $response_code;
echo "<br>";
if ($response_code <> "HTTP/1.1 200 OK")
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO watch (site, trying_from, server_respond)
    VALUES ($site, $trying_from, $response_code')";
        use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

} else {
    echo "site is up";
}
?>
