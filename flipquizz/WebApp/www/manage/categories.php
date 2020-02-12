<div id="categories">
    <h2>Categories Managment</h2>
    <p>Here you can see all the categories associated with your quizzes.</p>

    <h3>List of categories</h3>

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
    <h3>Add new category</h3>

    <form action="form_category_add_save.php" method="post">
        <label for="category_name">Category name</label>
        <input type="text" name="category_name" id="" required>
        <br>
        <label for="category_description">Category description</label>
        <input type="text" name="category_description" id="" required>
        <br>
        <button type="submit">Add Category</button>
    </form>
</div>
<?php
// Implémenter le formulaire d'ajout de catégorie
// Le formulaire doit afficher une liste déroulante permettant de lier la catégorie à un quiz existant.
// Boucler sur les quzi existants pour créer chaque option du select
// <select name="quiz_id">
// foreach(quizzes) 
// <option value="{quiz_id}">{quiz_theme}</option>
// fin foreach
// </select>
// Une fois le formulaire implémenté, coder la page de traitement.
?>