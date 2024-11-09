<?php
include 'baseClient.php';



?>
    <h1 style="text-align: center; margin-top: 20px;">New produit</h1>
    <p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos labore accusamus nam distinctio molestiae ipsam et ipsum cum, sint animi quia nulla atque laboriosam facere reprehenderit. Provident at fugit quisquam.</p>
    <?php
    $recupProduit = mysqli_query($conn,"SELECT * FROM produit");
    while($produit = mysqli_fetch_array($recupProduit)){
        ?>
        <div class="container " style="padding-left: 90px;">
            <div class="flex-lg-row-reverse">
                <span class="card mt-5 me-5 float-lg-start float-md-start  d-flex align-items-center " style="width: 18rem; flex-direction: column;" >
                    <img src="uploadTest/<?= $produit['image']; ?>" class="card-img-top" alt="amsterdam" height="250px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $produit['id_produit']; ?></h5>
                        <h5 class="card-title"><?= $produit['Designation']; ?></h5>
                        <p class="card-text"><?= $produit['Prix']; ?></p>
                        <a href="contact.php?recupid=<?= $produit['id_produit']; ?>" class="btn btn-warning">Commander</a>
                    </div>
                </span>
            </div>
        </div>
        <?php
    }
    ?>
<div class="container-fluid">
</div>
