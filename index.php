<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filter_parking = $_GET["filter_parking"] ?? "both";
    $filter_vote = $_GET["input_vote"] ?? "";
    $filtered_hotels = $hotels;

    if($filter_parking !== "both") {
        $temp_hotels = [];
        foreach ($filtered_hotels as $hotel) {
            if ($filter_parking == $hotel["parking"]) {
                $temp_hotels[] = $hotel;
            }
        }
        $filtered_hotels = $temp_hotels;
    }

    if(!empty($filter_vote)) {
        $temp_hotels = [];
        foreach ($filtered_hotels as $hotel) {
            if ($hotel["vote"] >= $filter_vote) {
                $temp_hotels[] = $hotel;
            }
        }
        $filtered_hotels = $temp_hotels;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 class="my-5">Hotels</h1>
        <section class="row my-5">


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Filter
                    </div>
                    <div class="card-body">
                        <!-- FORM -->
                        <form method="GET" class="row">
                            <div class="col-9 mb-3">
                                <label for="input_vote" class="form-label">Vote</label>
                                <input type="number" class="form-control" id="input_vote" name="input_vote" min="0"
                                    max="5" value="<?= $filter_vote ?>">
                            </div>

                            <div class="col-3 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="filter_parking"
                                        id="filter_parking-1">
                                    <label class="form-check-label" for="filter_parking-1">
                                        With parking
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0" name="filter_parking"
                                        id="filter_parking-0">
                                    <label class="form-check-label" for="filter_parking-0">
                                        Without parking
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="both" name="filter_parking"
                                        id="filter_parking-2">
                                    <label class="form-check-label" for="filter_parking-2">
                                        Both
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary my-3">Cerca</button>
                                <button type="button" class="btn btn-info my-3">
                                    <a href="./index.php" class="text-decoration-none text-white">
                                        Rimuovi filtri
                                    </a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        <!-- RESULT TABLE -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($filtered_hotels as $hotel) : ?>
                <tr>
                    <td><?= $hotel["name"] ?></td>
                    <td><?= $hotel["description"] ?></td>
                    <td><?= $hotel["parking"] == 1 ? "Yes" : "No" ?></td>
                    <td><?= $hotel["vote"] ?></td>
                    <td><?= $hotel["distance_to_center"] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>