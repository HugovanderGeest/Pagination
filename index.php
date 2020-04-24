<?php
require 'includes/functions.php';
$connection = dbConnect();

$page = 1;

if (isset($_GET['page'])) {
        $page = (int) $_GET['page'];
}

$pagesize = 10;
$result = getCountries($connection, $page, $pagesize);
?>
<!doctype html>
<html lang="nl">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="Hugo van der Geest" />
        <title>Hugo van der Geest | bap-pagination</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
</head>

<body>
        <div class="kop">
                <h1>All the lands!</h1>
                <h6>Hugo van der Geest</h6>
        </div>
        <section class="countries">
                <?php foreach ($result['statement'] as $country) : ?>
                        <div class="country">
                                <h2><?php echo $country['name'] ?></h2>
                                <?php
                                echo "Region: ";
                                echo $country['region'];
                                echo "<br><br>Population: ";
                                echo $country['population'];
                                echo "<br><br>Surface: ";
                                echo $country['surface_area'];
                                echo "<br><br>Code: ";
                                echo $country['code'];
                                ?>
                        </div>
                <?php endforeach ?>
        </section>
        <div class="pagination">
                <?php for ($i = 1; $i <= $result['pages']; $i++) : ?>
                        <a href="index.php?page=<?php echo $i ?>" class="pagination__number"><?php echo $i ?></a>
                <?php endfor; ?>
        </div>
</body>

</html>