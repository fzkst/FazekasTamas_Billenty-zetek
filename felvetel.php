<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billentyűzetek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>
<body>
    <main class="container">
        <h1>Billentyűzetek felvétele</h1><br>
        <form action="felvetel.php" method="post" name="billentyuzet_felvetel" onsubmit="return validalas">
            <div>
                <label for="termek">Termék</label>
                <input type="text" name="termek" id="termek">
            </div>
            <div>
                <label for="megjelenes_eve">Megjelenés éve</label>
                <input type="number" name="megjelenes" id="megjelenes" min="1950" max="2022">
            </div>
            <div>
                <p>Kapcsolódás:</p>
                <input type="radio" name="kapcsolodas" id="kapcsolodas" value="vezetekes">
                <label for="vezetekes">vezetékes</label>
                <input type="radio" name="kapcsolodas" id="kapcsolodas" value="vezeteknelkuli">
                <label for="vezeteknelkuli">vezeték nélküli</label>
                
            </div>
        </form>
    </main>
</body>
</html>