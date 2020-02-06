<?php

$quizzes = new Models\Quizzes;

$categories = new Models\Categories;

$questions = new Models\Questions;

//$nb_quizzes = $quizzes->count();

//d($nb_quizzes);
?>


<h2>Welcome to your Dashboard</h2>

<section class="home">
    <div class="quizzes">
        <?= $quizzes->count(); ?> Quizzes
    </div>

    <div class="cat">
        <?= $categories->count(); ?> Categories
    </div>

    <div class="question">
        <?= $questions->count(); ?> Questions
    </div>
    <article class="affichage">
        <?php

        $latest = $quizzes->getLatest();

        echo $latest['quiz_theme'];

        ?>
    </article>
</section>