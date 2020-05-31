<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/secondary.css">
    <title>O mnie</title>
</head>
<body>
    <?php
        echo 
        '<header>
            <h1>O mnie</h1>
            <p>Czyli żarty informatyczne i nie tylko</p>
        </header>
        <main>
            <ul>
                <li>';
                    include_once "itJokes.php"; 
                    echo $jokes[rand(0, count($jokes)-1)];
        echo
                '</li>
                <li>
                <div style="
                    background-image: url(authorImage.php);
                    width: 300px;
                    height: 300px;
                    background-position: center; background-size: cover;
                    margin-top: 10px;
                    margin-bottom: 10px;
                    margin: auto;
                    border: 10px solid rgb(39,38,67);
                    ">
                </div>';        
        echo    '</li>
            </ul>
            <form enctype="multipart/form-data" action="addingAJoke.php" method="POST">
                <ul>
                    <li>
                    <label for="joke">Wprowadź nowy żart do bazy</label>
                        <textarea id="joke" name="UPLOADED_JOKE" rows="4" cols="50" placeholder="Wprowadź przygotowany przez Ciebie żart"></textarea>
                    </li>
                    <li>
                        <input type="submit" value="Prześlij żart" name="submit">
                    </li>
                </ul>
            </form>
        </main>';

    ?>
</body>
</html>