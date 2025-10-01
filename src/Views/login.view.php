<?php 
require_once(__DIR__ . '/partials/head.view.php');
?>

<h1 class="mt-5">Connexion</h1>

<section id="contact" class="contact">
    <form method="POST">
        <div class="container mt-5 formularStyle">

            <div class="form-group">
                <label for="email" class="form-label mt-3">E-mail :</label>
                <input type="email" class="form-control" name="email">
                <?php
                    if(isset($this->arrayError['email'])){
                      ?>
                      <p class="text-danger"><?= $this->arrayError['email']?></p>
                      <?php  
                    }
                ?>
            </div>

            <div class="form-group">
                <label for="password" class="form-label mt-3">Mot de passe :</label>
                <input type="password" class="form-control"  id="password" name="password">
                <?php
                    if(isset($this->arrayError['password'])){
                      ?>
                      <p class="text-danger"><?= $this->arrayError['password']?></p>
                      <?php  
                    }
                ?>
            </div>
            <button type="submit" name="login" class="colorBtn btn mt-3">Se connecter</button>
        </div>
    </form>
</section>

<?php 
require_once(__DIR__ . '/partials/footer.view.php');
?>