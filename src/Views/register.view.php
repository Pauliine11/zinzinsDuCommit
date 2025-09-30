<?php 
require_once(__DIR__ . '/partials/head.view.php');
?>

<h1 class="mt-5">Formulaire d'inscription</h1>

<section id="contact" class="contact">
    <form method="POST">
        <div class="container mt-5 formularStyle">

            <div class="form-group">
                <label for="pseudo" class="form-label" >Pseudo :</label>
                <input type="text" class="form-control" name="pseudo">
                <?php
                    if(isset($arrayError['pseudo'])){
                      ?>
                      <p class="text-danger"><?= $arrayError['pseudo']?></p>
                      <?php  
                    }
                ?>
            </div>

            <div class="form-group">
                <label for="email" class="form-label mt-3">E-mail :</label>
                <input type="email" class="form-control" name="email">
                <?php
                    if(isset($arrayError['email'])){
                      ?>
                      <p class="text-danger"><?= $arrayError['email']?></p>
                      <?php  
                    }
                ?>
            </div>

            <div class="form-group">
                <label for="password" class="form-label mt-3">Mot de passe :</label>
                <input type="password" class="form-control"  id="password" name="password">
                <?php
                    if(isset($arrayError['password'])){
                      ?>
                      <p class="text-danger"><?= $arrayError['password']?></p>
                      <?php  
                    }
                ?>
            </div>

            <div class="form-group">
                <label for="description" class="form-label mt-3">Parle moi de ton côté zinzin:</label>
                <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
                <?php 
                if(isset($arrayError['description'])){
                    ?>
                        <p class="text-danger"><?= $arrayError['description']?></p>
                    <?php
                }
                ?>
            </div>
            <button type="submit" name="register" class="colorBtn btn mt-3">S'inscrire</button>
        </div>
    </form>
</section>

<?php 
require_once(__DIR__ . '/partials/footer.view.php');
?>