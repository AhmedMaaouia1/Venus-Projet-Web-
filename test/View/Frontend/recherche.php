<?php 
require_once  'C:/xampp/htdocs/ESSAI 1 INTEGRATION/test/Controller/topicC.php';
$topicC=new topicC();

$topics=$topicC->affichertopic();
if(isset($_POST['topic']) && isset($_POST['search'])){
$list=$topicC->affichercomments($_POST['topic']);
}
?>


<div class="form-container">
    <form action="" method = "POST">
        <div class="row">
            <div class="col-25">
                <label>Search: </label>
            </div>
            <div class="col-75">
                <select titre="topic" id="topic">
                    <?php foreach ($topics as $topic) {
                        ?>
                    <option 
                    value="<?= $topic['idtopic']?>"
                    <?php if (isset($_POST['search']) && $topic['idtopic']=$_POST['topic']) { ?>
                        selected
                    <?php } ?>
                    >
                    <?= $topic['titre'] ?>
                    <?= $topic['descrip'] ?>
                    <?= $topic['contenu'] ?>
                    </option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                </div>
                <div class="row">
                    <input type="submit" value="Search" name ="search">
                </div>
    </form>
                </div>
