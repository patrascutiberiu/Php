<div id="questions">
    <h2>Quizzes Managment</h2>
    <p>Here you can see and manage your quizzes and add new ones.</p>

    <h3>Your Quizzes</h3>
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

            foreach($questions->getAll() as $question){
                echo '<tr>';
                echo '<td>'.$question['question_id'].'</td>';
                echo '<td>'.$question['question_content'].'</td>';
                echo '<td>'.$question['question_answer'].'</td>';
                echo '<td>'.$question['question_level'].'</td>';
                //echo '<td>'..'</td>';
                echo '</tr>';
            }
        ?>
    </table>
    <h3>Add new Quiz</h3>
    <form action="form_question_add_save.php" method="post">
    <label for="question_content">Question Content</label>
         <input type="text" name="question_content" id="" required>
         <br>
         <label for="question_answer">Question Answer</label>
         <input type="text" name="question_answer" id="">
         <br>
         <label for="question_level">Question Level</label>
         <input type="text" name="question_level" id="">
         <br>
         <button type="submit">Add Question</button>
    </form>




</div>

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