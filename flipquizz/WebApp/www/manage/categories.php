<div id="categories">
    <h2>Categories Managment</h2>
    <p>Here you can see all the categories associated with your quizzes.</p>

    <form action="form_category_add_save.php" method="post">
        <fieldset>
            <legend>Add new category</legend>
            <label for="category_name"><span>Category name *</span>
                <input type="text" name="category_name" id="" required></label>
            <label for="category_description"><span>Category description *</span>
                <input type="text" name="category_description" id="" required></label>
            <input type="submit" value="Add Category">
        </fieldset>
    </form>

    <fieldset>
        <legend>List of categories</legend>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <?php
            // Lister les catégories existantes.
            // Pour chaque catégorie, afficher le nom du quiz (requête SQL avec jointure)
            use Models\CategoryManager;
            //use Models\QuizManager;

            $categories = new CategoryManager();
            //$quizzes = new QuizManager();

            foreach ($categories->getAll() as $category) {
                echo '<tr>';
                echo '<td>' . $category['category_id'] . '</td>';
                echo '<td>' . $category['category_name'] . '</td>';
                echo '<td>' . $category['category_description'] . '</td>';
                echo '</tr>';
            }

            ?>
        </table>
    </fieldset>


</div>
<?php
// Implémenter le formulaire d'ajout de catégorie
// Le formulaire doit afficher une liste déroulante permettant de lier la catégorie à un quiz existant.
// Boucler sur les quiz existants pour créer chaque option du select
// <select name="quiz_id">
// foreach(quizzes) 
// <option value="{quiz_id}">{quiz_theme}</option>
// fin foreach
// </select>
// Une fois le formulaire implémenté, coder la page de traitement.
?>