<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="/styles/registrationData.css">
    <style>
        main{
            height:100vh;
        }
    </style>
</head>
<body>
    <?php

    if (isset($_POST['submit'])) {
        if (empty($_POST['user-name'])||empty($_POST['user-last-name'])||empty($_POST['user-email'])) {
            {
                echo 
                '<header>
                    <h1>Rejestracja</h1>
                    <p>Wystąpił błąd podczas rejestracji</p>
                </header>
                <main>
                    <p>Musisz wypełnić wszystkie pola formularza.</p>
                    Powrót do formularza: <a href="index.html">Klik</a>
                </main>';
            }
        }
        else{
            
            $firstName = trim($_POST["user-name"]); 
            $lastName = trim($_POST['user-last-name']); 
            $sex = trim($_POST['user-sex']);
            $eMail = trim($_POST['user-email']); 

            echo 
            "<header>
                <h1>Rejestracja</h1>
                <p>Zarejestrowano pomyślnie</p>
            </header>
            <main>
                <ul>
                    <li>
                        Imię: $firstName
                    </li>
                    <li>
                        Nazwisko: $lastName
                    </li>
                    <li>
                        Płeć: $sex
                    </li>
                    <li>
                        E-mail: $eMail
                    </li>";
            
        //     if (is_uploaded_file($_FILES['UPLOADED_FILE']['tmp_name'])) {
        //         echo "Plik został odebrany";
        //     } else {
        //         echo "Plik nie został odebrany";
        //     }
        // }
            
            $namesOfExistingFiles = array(0);
            if (is_uploaded_file($_FILES['UPLOADED_FILE']['tmp_name'])) {
                $allowedExtensions = array('jpg', 'png', 'bmp');
                $path = "../uploads/";
                $extension = pathinfo($_FILES['UPLOADED_FILE']['name'], PATHINFO_EXTENSION);
        
                if (!in_array($extension, $allowedExtensions)) {
                    echo "<li>Wprowadziłeś plik z niepoprawnym rozszerzeniem. Spróbuj ponownie.</li>";
                } else {
                    switch ($_FILES['UPLOADED_FILE']['error']) {
                        case 0:
                            echo "<li>Zdjęcie zostało przesłane prawidłowo.</li>";
                            break;
                        
                        case 2:
                            echo "<li>Rozmiar pliku jest zbyt duży.</li>";
                            break;
        
                        case 4:
                            echo "<li>Plik nie został wysłany</li>"; 
                            break;
                        
                        default:
                            echo "<li>Wystąpił błąd podczas wysyłania pliku na serwer.</li>";
                            break;
                    }
                    $newFileName = max($namesOfExistingFiles)+1;
                    $_FILES['UPLOADED_FILE']['name'] = $newFileName.".$extension";
                    move_uploaded_file($_FILES['UPLOADED_FILE']['tmp_name'],__DIR__.$path.$_FILES['UPLOADED_FILE']['name']);
                }
            }
        }
    } else {
        header("Location: ../../index.html");
    }
    ?>
</body>
</html>