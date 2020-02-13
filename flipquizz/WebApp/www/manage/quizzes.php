 <h2>Quizzes Managment</h2>
 <p>Here you can see and manage your quizzes and add new ones.</p>

 <fieldset>
     <legend>Add new Quiz</legend>
     <form action="form_quiz_add_save.php" method="post" class="form_users">
         <label for="quiz_theme"><span>Quiz Theme *</span>
             <input type="text" name="quiz_theme" id="" required></label>
         <label for="quiz_textcolor"><span>Quiz Text Color *</span>
             <input type="color" name="quiz_textcolor" id=""></label>
         <label for="quiz_backcolor"><span>Quiz Back Color *</span>
             <input type="color" name="quiz_backcolor" id=""></label>
         <input type="submit" value="Add Quiz">
     </form>
 </fieldset>

 <fieldset>
     <legend>Your Quizzes</legend>
     <table>
         <tr>
             <th>Id</th>
             <th>Theme</th>
             <th>TextColor</th>
             <th>BackColor</th>
         </tr>
         <?php

            use Models\QuizManager;

            $quizzes = new QuizManager();

            foreach ($quizzes->getAll() as $quiz) {
                echo '<tr>';

                echo '<td>' . $quiz['quiz_id'] . '</td>';
                echo '<td>' . $quiz['quiz_theme'] . '</td>';
                echo '<td>' . $quiz['quiz_textcolor'] . '</td>';
                echo '<td>' . $quiz['quiz_backcolor'] . '</td>';

                echo '</tr>';
            }
            ?>
     </table>
 </fieldset>