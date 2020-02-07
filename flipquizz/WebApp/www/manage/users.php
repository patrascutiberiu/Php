<section id="users">
    
    <div class="users_add">
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
            $_SESSION['error'] = null;
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

        <form action="form_add_user_save.php" method="POST" class="form_users">
            <label for="username">User name</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <br>
            <input type="submit" value="Valid">
        </form>
    </div>

    <div class="users_list">
        <h2>List of Users</h2>
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
                <tbody class="users">
                    <tr>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td>
                            <a href="#">Edit</a>
                            <a href="#" data-username="<?= $user['username']; ?>">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>

        </table>
    </div>

</section>