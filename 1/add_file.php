<?php

$name = $_POST['pers_name'];
$email = $_POST['pers_email'];
$message = $_POST['pers_message'];

//генерация текста
$text = 'Имя: ' . $name . "\n" .
    'Email: ' . $email . "\n" .
    'Сообщение: ' . $message;

$uploadStatus = 1;

$uploadedFile = '';
if (!empty($_FILES["file"]["name"])) {
    //получаем путь
    $targetPath= 'files\\';

    //устанавливаем название файла
    $i=0;
    //если несколько записей с одинаковым названием, то меняем инкремент
    while(file_exists($targetPath .$name . '_'.$i.'_' . basename($_FILES["file"]["name"]))) {
        $i++;
    }
    $fileName = $name . '_'.$i.'_' .basename($_FILES["file"]["name"]);


    // загружаем. Если удачно, то записываем путь в текст и записываем текст
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath . $fileName)) {
        $uploadedFile = $targetPath . $fileName;
        $text .= "\n".'Путь до прекрепляемого сообщения: ' . $uploadedFile;

    }
}
//если несколько записей с одинаковым названием, то меняем инкремент
$i=0;
while(file_exists('messages/'.$name.'_'.$i. '.txt')) {
    $i++;
}
//если не загружен текст, то ошибку
if (!file_put_contents('messages/'.$name.'_'.$i. '.txt', $text)) $uploadedFile='';

echo json_encode($uploadedFile);