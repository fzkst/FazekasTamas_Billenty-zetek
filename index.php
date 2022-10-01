<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billentyűzetek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <nav class="ms-4">
        <ul class="nav my-3 mx-5 nav-pills">
            <li class="nav-item">
                <a class="nav-link"  href="felvetel.php">Felvétel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Listázás</a>
            </li>   
        </ul>
    </nav>
    <main class="container">
        <h1>Billentyűzetek</h1>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Termék</th>
                    <th>Megjelenés éve</th>
                    <th>Kapcsolódás</th>
                    <th>Méret</th>
                    <th>Mechanikus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file = fopen("adatok.csv", "r");
                $i = 0;
                ?>
                <?php while ($sor = fgets($file)) : ?>
                    <?php
                    $i++;
                    $adatok = explode(';', trim($sor));
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $adatok[0] ?></td>
                        <td><?php echo $adatok[1] ?></td>
                        <td><?php echo $adatok[2] ?></td>
                        <td><?php echo $adatok[3] ?></td>
                        <td><?php echo $adatok[4] ?></td>
                    </tr>                
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Termék</th>
                    <th>Megjelenés éve</th>
                    <th>Kapcsolódás</th>
                    <th>Méret</th>
                    <th>Mechanikus</th>
                </tr>
            </tfoot>
        </table>
    </main>
</body>
</html>