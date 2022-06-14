<html>
<head>
    <link rel="stylesheet" href="src/css.css">
    <script>
        function reload() {
            window.location = window.location.href.split("?")[0];
        }
    </script>
</head>
<body>
<h1>Welcome to the Pirate-Crew Constructor</h1>

<article id="flex">
    <section>
        <h4>Create a new Ship↓</h4>
        <form method="GET">
            <input name="ship">
            <button onclick="reload()" type="submit">create</button>
        </form>
        <h4>Delete a Ship↓</h4>
        <form method="GET">
            <input name="shipdel">
            <button onclick="reload()" type="submit">delete</button>
        </form>
    </section>
    <section id="padding">
        <h4>Create a new Member↓</h4>
        <form method="GET">
            <input name="member">
            <button onclick="reload()" type="submit">create</button>
        </form>
        <h4>Delete a Member↓</h4>
        <form method="GET">
            <input name="memberdel">
            <button onclick="reload()" type="submit">delete</button>
        </form>
    </section>
</article>

<a href="src/ship.php">
    <button>Ships</button>
</a>
<a href="src/crew.php">
    <button>Crew Members</button>
</a>
<br><br>
<button onclick="reload()">Reload</button>
</body>
</html>
<?php
use Doctrine\DBAL\DriverManager;

require_once 'vendor/autoload.php';

if (isset($_GET['ship'])) {
    create($_GET['ship']);
}
if (isset($_GET['shipdel'])) {
    delete($_GET['shipdel']);
}

if (isset($_GET['member'])) {
    createM($_GET['member']);
}

if (isset($_GET['memberdel'])) {
    deleteM($_GET['memberdel']);
}

function create($name)
{
    $connectionParams = [
        'dbname' => 'PIRATESHIP',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ];

    $conn = DriverManager::getConnection($connectionParams);
    $queryBuilder = $conn->createQueryBuilder();

    $queryBuilder
        ->insert('ship')
        ->values(["name" => '?',])
        ->setParameter(0, $name)
        ->executeQuery();
    echo '<span id="green">created!</span>';
}

function delete($name)
{
    $connectionParams = [
        'dbname' => 'PIRATESHIP',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ];

    $conn = DriverManager::getConnection($connectionParams);
    $queryBuilder = $conn->createQueryBuilder();
	
	$stmt = $conn->prepare('ALTER TABLE ship AUTO_INCREMENT = 1');
	
	$stmt->executeQuery();

    $queryBuilder
        ->delete('ship')
        ->where("name = '$name'")
        ->executeQuery();
    echo '<span id="red">deleted!</span>';
}

function createM($name)
{
    $connectionParams = [
        'dbname' => 'PIRATESHIP',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ];

    $conn = DriverManager::getConnection($connectionParams);
    $queryBuilder = $conn->createQueryBuilder();

    $queryBuilder
        ->insert('pirate')
        ->values(["name" => '?',
            "fk_pk_ship_id" => 1])
        ->setParameter(0, $name)
        ->executeQuery();
    echo '<span id="green">created!</span>';
}

function deleteM($name)
{
    $connectionParams = [
        'dbname' => 'PIRATESHIP',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ];

    $conn = DriverManager::getConnection($connectionParams);
    $queryBuilder = $conn->createQueryBuilder();

    $queryBuilder
        ->delete('pirate')
        ->where("name = '$name'")
        ->executeQuery();
    echo '<span id="red">deleted!</span>';
}