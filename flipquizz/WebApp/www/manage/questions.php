<div id="questions">
    <h2>Question Managment</h2>
    <p>Here you can see all the questions associated with your quizzes.</p>

    <form action="form_question_add_save.php" method="post">
        <fieldset>
            <legend>Add new Question</legend>
            <label for="question_content"><span>Question Content *</span>
                <input type="text" name="question_content" id="" required></label>
            <label for="question_answer"><span>Question Answer *</span>
                <input type="text" name="question_answer" id=""></label>
            <label for="question_level"><span>Question Level *</span>
                <input type="number" name="question_level" id="" min="0" max="5"></label>
            <label for="category_id"><span>Quiz Theme and Category Name *</span>
                <select name="category_id" id="">
                    <?php

                    $categories = new Models\CategoryManager;

                    foreach ($categories->getCategoryQuiz() as $category) {

                    ?>

                        <option value="<?= $category['category_id'] ?>"><?= $category['quiz_theme']; ?> - <?= $category['category_name']; ?></option>

                    <?php
                    }
                    ?>
                </select></label>
            <input type="submit" value="Add Question">
        </fieldset>
    </form>

    <?php
    // Implémenter le formulaire d'ajout de question
    // Le formulaire doit afficher une liste déroulante permettant de lier la question à une catégorie existante.
    // Boucler sur les catégories existantes pour créer chaque option du select
    // <select name="category_id">
    // foreach(categories) 
    // <option value="{category_id}">{quiz_theme} - {category_name}</option>
    // fin foreach
    // </select>
    // Une fois le formulaire implémenté, coder la page de traitement.
    ?>

    <fieldset>
        <legend>List of questions with their associated answer</legend>
        <table>
            <tr>
                <th>Id</th>
                <th>Content</th>
                <th>Answer</th>
                <th>Level</th>
            </tr>
            <?php

            use Models\QuestionManager;

            $questions = new QuestionManager();

            foreach ($questions->getLatestQuestions() as $question) {
                echo '<tr>';
                echo '<td>' . $question['question_id'] . '</td>';
                echo '<td>' . $question['question_content'] . '</td>';
                echo '<td>' . $question['question_answer'] . '</td>';
                echo '<td>' . $question['question_level'] . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    </fieldset>
</div>