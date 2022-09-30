<!DOCTYPE html>
<html lang="en">
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
                <input type="checkbox" name="mechanik" id="mechanik" required>
            </div>
            <div>
                <button type="submit">Felvétel</button>
            </div>
        </form>
    </main>
</body>
</html>