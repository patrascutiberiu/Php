<?php

$quizzes = new Models\Quizzes;

$categories = new Models\Categories;

$questions = new Models\Questions;

//$nb_quizzes = $quizzes->count();

//d($nb_quizzes);
?>



<h2>Welcome to your Dashboard</h2> 
<section id="home">
 
    <div class="count_quizzes">
        <?= $quizzes->count(); ?> Quizzes
    </div>

    <div class="count_categories">
        <?= $categories->count(); ?> Categories
    </div>

    <div class="count_questions">
        <?= $questions->count(); ?> Questions
    </div>
    <article class="affichage">
        <?php

        $latest = $quizzes->getLatest();

        echo $latest['quiz_theme'];

        ?>
    </article>
</section>