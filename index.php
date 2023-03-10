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

    // Creo Array con le varie caratteristiche per stamparle nella table
    foreach ($hotels as $hotel_list) {
    };

    $hotel_data = array_keys($hotel_list);

    // Bonus 1:
    if (isset($_GET["park"])) {
        $select_park = $_GET["park"];
    } else {
        $select_park = "";
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div class="container pt-5">
        <!-- FORM -->
        <form method="GET" action="" class="py-5">
            <label for="park" class="fw-bold">Parking</label>
            <select class="form-select" name="park" id="park">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
            <button class="btn btn-primary my-3">Cerca</button>
            <button type="button" class="btn btn-info my-3">
                <a href="./index.php" class="text-decoration-none text-white">
                    Rimuovi filtri
                </a>
            </button>
        </form>

        <!-- RESULT TABLE -->
            <table class="table">
                <thead>
                    <tr>
                        <?php foreach($hotel_data as $single_data) : ?>
                            <th scope="col"> <?= ucfirst($single_data) ?> </th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <!-- Se selezionato input parcheggio "yes" -->
                <tbody>
                    <?php foreach($hotels as $hotel_list) : ?>
                        <?php if($select_park === "yes" && ($hotel_list["parking"]) === true ) : ?>
                            <tr>
                                <?php foreach($hotel_list as $hotel_feature) : ?>
                                    <td> <?= $hotel_feature ?> </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>

                <!-- Se selezionato input parcheggio "no" -->
                <tbody>
                    <?php foreach($hotels as $hotel_list) : ?>
                        <?php if($select_park === "no" && ($hotel_list["parking"]) === false ) : ?>
                            <tr>
                                <?php foreach($hotel_list as $hotel_feature) : ?>
                                    <td> <?= $hotel_feature ?> </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>

                <!-- Se non viene selezionato niente -->
                <tbody>
                    <?php foreach($hotels as $hotel_list) : ?>
                        <?php if(empty($select_park)) : ?>
                            <tr>
                                <?php foreach($hotel_list as $hotel_feature) : ?>
                                    <td> <?= $hotel_feature ?> </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
    </div>
</body>
</html>


<!-- if(!empty($select_park) && $select_park === "yes") -->



