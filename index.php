<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Hotel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista Hotel</h1>

        <!-- Form per filtrare gli hotel con parcheggio -->
        <form action="" method="GET">
            <div class="form-group">
                <label for="filterParking">Filtra per parcheggio:</label>
                <select class="form-control" id="filterParking" name="parking">
                    <option value="all">Mostra tutti</option>
                    <option value="true">Con parcheggio</option>
                    <option value="false">Senza parcheggio</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filtra</button>
        </form>

        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once 'hotels.php'; ?>
                <?php 

                $filterParking = isset($_GET['parking']) ? $_GET['parking'] : 'all';
                foreach ($hotels as $hotel): 
                    if ($filterParking === 'all' || ($filterParking === 'true' && $hotel['parking']) || ($filterParking === 'false' && !$hotel['parking'])):
                ?>
                        <tr>
                            <td><?php echo $hotel['name']; ?></td>
                            <td><?php echo $hotel['description']; ?></td>
                            <td><?php echo $hotel['parking'] ? 'Disponibile' : 'Non disponibile'; ?></td>
                            <td><?php echo $hotel['vote']; ?></td>
                            <td><?php echo $hotel['distance_to_center']; ?> km</td>
                        </tr>
                <?php 
                    endif; 
                endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
