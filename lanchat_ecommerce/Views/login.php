<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Identification</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Identification</h1>
        <fieldset>
            <label for="Pseudo_User"></label>
            <input type="text" id="Pseudo_User" name="Pseudo_User" value="" placeholder="">
        </fieldset>
        <fieldset>
            <label for="Password_User"></label>
            <input type="text" name="Password_User" id="Password_User" placeholder="">
        </fieldset>
    </form>
    <script>
        var pseudoUser = document.querySelector('#Pseudo_User');
        var PasswordUser = document.querySelector('#Password_User');
        console.log(pseudoUser);
        console.log(PasswordUser);

        pseudoUser.addEventListener('input',function(){
            console.log(pseudoUser.value);
        });

        PasswordUser.addEventListener('input',function(){
            console.log(PasswordUser.value);
        });
    </script>
</body>

</html>