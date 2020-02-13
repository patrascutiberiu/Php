<h2>Add User</h2>
<?php
//il est deja demarrer sur l'index.php
//session_start();

if (!empty($_SESSION['error'])) {
?>
    <div class="console">
        <?= $_SESSION['error']; ?>
    </div>

    <?php
    //toujour mettre a null pour vider la session
    ?>
    <div class="console">
        <?= $_SESSION['error'] = null; ?>
    </div>
<?php
    //unset'$_SESSION['error'];
}

if (!empty($_SESSION['success'])) {
?>
    <div class="console">
        <?= $_SESSION['success']; ?>
    </div>
<?php
    $_SESSION['success'] = null;
}

?>

<?php
if (!empty($_GET['edit'])) {
    $userEditName = basename($_GET['edit']);
    $userEdit = $accounts->getUser($userEditName);
    if (!empty($userEdit)) {
        header('location: index.php?page=users');
    }

?>

    <form action="form_add_user_save.php" method="POST">
        <fieldset>
            <legend>Add User</legend>
            <label for="username"><span>User name *</span>
                <input type="text" name="username" id="username" required></label>
            <label for="password"><span>Password *</span>
                <input id="passwordField" type="password" value="" id="user_password" name="password" required>
                <a id="passwordShow" href="#">Show/Hide</a></label>
            <label for="email"><span>Email *</span>
                <input type="email" name="email" id="email" required></label>
            <input type="submit" value="Valid">
        </fieldset>
    </form>
<?php
} else {
?>
    <form action="form_add_user_save.php" method="POST">
        <fieldset>
            <legend>Add User</legend>
            <label for="username"><span>User name *</span>
                <input type="text" name="username" id="username" required></label>
            <label for="password"><span>Password *</span>
                <input id="passwordField" type="password" value="" id="user_password" name="password" required>
                <a id="passwordShow" href="#">Show/Hide</a></label>
            <label for="email"><span>Email *</span>
                <input type="email" name="email" id="email" required></label>
            <input type="submit" value="Add User">
        </fieldset>
    </form>
    </div>
<?php
}
?>


<fieldset>
    <legend>List of Users</legend>

    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        //require_once dirname(__DIR__,2).'/Loader.php';

        $accounts = new Models\AccountManager;

        //boucle plus rapide que while
        //copie du tableau
        foreach ($accounts->getAccounts() as $user) {
            // echo '<pre>';
            // echo $user['username'];
            // echo '</pre>';
        ?>
            <tbody>
                <tr>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <a href="?page=usersedit=<?= $user['username']; ?>">Edit</a>
                        <a href="#" data-username="<?= $user['username']; ?>">Delete</a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>

    </table>
</fieldset>