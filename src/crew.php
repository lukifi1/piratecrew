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

$stmt = $conn->prepare('select * from pirate');
$result = $stmt->executeQuery();

echo '</table>';
echo '<br>';
echo '<table><tr><th>All Members</th></tr>';
while (($row = $result->fetchAssociative()) !== false) {
    echo '<tr><td>' . $row['name'] . '</td></tr>';
}
echo '</table>';
?>
<br>
<a href="..">
    <button>back</button>
</a>
</body>
</html>
