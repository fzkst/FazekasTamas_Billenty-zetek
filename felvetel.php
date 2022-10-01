<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billentyűzetek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</head>
<body>
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link" href="index.php">Listázás</a>
        <a class="flex-sm-fill text-sm-center nav-link active" href="felvetel.php">Felvétel</a>  
    </nav>
    <main class="container">
        <h1>Billentyűzet felvétele</h1><br>
        <form action="felvetel.php" method="post" name="billentyuzet_felvetel" onsubmit="return validalas()">
            <div>
                <label for="termek">Termék neve</label>
                <input type="text" name="termek" id="termek" required>
            </div>
            <div>
                <label for="megjelenes_eve">Megjelenés éve</label>
                <input type="number" name="megjelenes" id="megjelenes" min="1950" max="2022" required>
            </div>
            <div>
                <span>Kapcsolódás</span>
                <input type="radio" name="kapcsolodas" id="kapcsolodas" value="vezetekes" required>
                <label for="vezetekes">vezetékes</label>
                <input type="radio" name="kapcsolodas" id="kapcsolodas" value="vezeteknelkuli">
                <label for="vezeteknelkuli">vezeték nélküli</label>                
            </div>
            <div>
                <label for="meret">Méret</label>
                <select name="meret" id="meret" required>
                    <option value="full_size">Full-size (100%)</option>
                    <option value="tenkeyless">TenKeyLess (80%)</option>
                    <option value="compact">Compact (60%)</option>
                </select>
            </div>
            <div>
                <label for="mechanic">Mechanikus</label>
                <input type="checkbox" name="mechanik" id="mechanik">
            </div>
            <div>
                <button type="submit">Felvétel</button>
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