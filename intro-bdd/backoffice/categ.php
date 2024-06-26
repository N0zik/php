<?php
require '../bdd.php';
session_start();
$db = Database::connect();
 $query = "SELECT * FROM categories WHERE parent = 0";
 $categories = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-commerce test </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>
<div class="container">
    <div class="row">   
    <nav class='col-md-2'>
        <div class='sidebar-sticky'>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Produits</a>
                </li>
                <li class="nav-item">
                    <a href="categ.php" class="nav-link">Catégories</a>
                </li>
            </ul>
        </div>
    </nav>

<main class='col-md-9'>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter une catégorie
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une catégorie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form action="addCategREQ.php" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la catégorie</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Enregistrer </button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom de la caatégorie</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categ) { ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($categ['id']); ?></th>
                    <td><?= htmlspecialchars($categ['nom']); ?></td>
                    <td>

                        <a href="ssCateg.php?id=<?= $categ['id']; ?>" class="btn btn-primary">Voir les sous-catégories</a>
                        <a href="edit.php?id=<?= $produit['id']; ?>" class="btn btn-primary">Modifier</a>
                        <a href="delete.php?id=<?= $produit['id']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    </main>
</div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>