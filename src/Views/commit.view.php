<?php
require_once(__DIR__ . "/partials/head.view.php");

?>
<h1>Un commit</h1>
<p><?= $myCommit->getText(); ?></p>
<p>Date de création <?= $myCommit->getCreationDate();?></p>


<?php
    if($myCommit->getModificationDate()){
        ?>
            <p>Date de modification <?= $myCommit->getModificationDate();?></p>
        <?php
    }
?>
<a href="/modifier?id=<?= $myCommit->getIdCommit();?>" class="btn btn-warning">Modifier</a>

<h2>Commentaire</h1>
<form method="POST">
    <div class="container formularStyle">
        <div class="form-group">
            <label for="comment" class="form-label mt-3">Commente moi ça !</label>
            <textarea class="form-control" id="comment" name="comment" style="height: 100px"></textarea>
            <?php 
            if(isset($arrayError['comment'])){
                ?>
                    <p class="text-danger"><?= $this->arrayError['comment']?></p>
                <?php
            }
            ?>
        </div>
        <button type="submit" name="addComment" class="btn mt-5 colorBtn">Commenter</button>
    </div>
</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");