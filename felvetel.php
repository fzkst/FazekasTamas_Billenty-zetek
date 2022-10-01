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
                <a class="nav-link active" aria-current="page" href="#">Felvétel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Listázás</a>
            </li>   
        </ul>
    </nav>

    <main class="container">
        <h1>Billentyűzet felvétele</h1><br>
        <form action="felvetel.php" method="post" name="billentyuzet_felvetel" onsubmit="return validalas()">
            <div class="mb-3">
                <label class="form-label" for="termek">Termék neve</label>
                <input class="form-control" type="text" name="termek" id="termek" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="megjelenes_eve">Megjelenés éve</label>
                <input class="form-control" type="number" name="megjelenes" id="megjelenes" min="1950" max="2022" required>
            </div>
            <label class="" for="">Kapcsolódás</label><br><br>
            <div class="mb-3 form-check">                
                <input class="form-check-input" type="radio" name="kapcsolodas" id="kapcsolodas" value="vezetékes" required>
                <label class="form-check-label" for="vezetekes">vezetékes</label><br>
                <input class="form-check-input" type="radio" name="kapcsolodas" id="kapcsolodas" value="vezeték nélküli">
                <label class="form-check-label" for="vezeteknelkuli">vezeték nélküli</label>                
            </div>
            <div class="mb-3">
                <label class="form-label" for="meret">Méret</label>
                <select class="form-select" name="meret" id="meret" required>
                    <option value="full-size 100%">Full-size (100%)</option>
                    <option value="tenkeyless 80%">TenKeyLess (80%)</option>
                    <option value="compact 60%">Compact (60%)</option>
                </select>
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="mechanic">Mechanikus</label>                             
                <input class="form-check-input" type="checkbox" name="mechanik">
            </div>
            <div>
                <button class="btn btn-primary mb-3" type="submit">Felvétel</button>
            </div>
        </form>
        <?php
            if (isset($_POST) && !empty($_POST)) {
                $hiba = "";
                if (!isset($_POST['termek']) || empty($_POST['termek'])) {
                    $hiba .= "A 'termék' mező kitöltése kötelező. ";
                }
                if (!isset($_POST['megjelenes']) || empty($_POST['megjelenes'])) {
                    $hiba .= "A 'megjelenés éve' mező kitöltése kötelező. ";
                } else if (!is_numeric($_POST['megjelenes']) || round($_POST['megjelenes']) != $_POST['megjelenes']){
                    $hiba .= "A megjelenés éve csak egész szám lehet. ";
                } else if ($_POST['megjelenes'] < 1900 || $_POST['megjelenes'] > date("Y")) {
                    $hiba .= "A megjelenés éve 1950 és ". date("Y"). " közé kell hogy essen. ";
                }
                if (!isset($_POST['kapcsolodas']) || empty($_POST['kapcsolodas'])) {
                    $hiba .= "A kapcsolodás típusát ki kell választani. ";
                }
                if (!isset($_POST['meret']) || empty($_POST['meret'])) {
                    $hiba .= "A billentyűzet méretét ki kell választani. ";
                }             
                $_POST['mechanik'] = isset($_POST['mechanik']) ? "igen" : "nem";                                              
                ?>
                <?php if ($hiba == ""): ?>
                <?php
                    $file = fopen("adatok.csv", "a");
                    $sor = implode(";", $_POST) . PHP_EOL;
                    fwrite($file, $sor);
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Sikeres felvétel.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php else: ?>                
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $hiba ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <?php
             }
        ?>
    </main>
</body>
</html>