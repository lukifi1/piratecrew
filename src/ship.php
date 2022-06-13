<html>
<head>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<?php

use Doctrine\DBAL\DriverManager;

require_once '../vendor/autoload.php';

$connectionParams = [
    'dbname' => 'PIRATESHIP',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];

$conn = DriverManager::getConnection($connectionParams);
$queryBuilder = $conn->createQueryBuilder();

$stmt = $conn->prepare('select * from ship where pk_ship_id = 1');
$stmt2 = $conn->prepare('select p.name from ship join pirate p on ship.pk_ship_id = p.fk_pk_ship_id');

$result = $stmt->executeQuery();
$result2 = $stmt2->executeQuery();

echo '<article id="flex"><section>';
echo '</table>';
echo '<br>';
echo '<table><tr><th>Ships</th></tr>';
while (($row = $result->fetchAssociative()) !== false) {
    echo '<tr><td>' . $row['name'] . '</td></tr>';
}
echo '</table></section>';

echo '<section><table>';
echo '<br>';
echo '<table><tr><th>Members</th></tr>';
while (($row = $result2->fetchAssociative()) !== false) {
    echo '<tr><td>' . $row['name'] . '</td></tr>';
}
echo '</table>';
echo '</section></article>'
?>
<br>
<a href=".."><button>back</button></a>
</body>
</html>
