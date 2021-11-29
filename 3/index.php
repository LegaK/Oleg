<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous">

<div class="alert alert-secondary" role="alert">
    <?
    $sum = 0;
    for ($i = 1; $i < 1000; $i++) {
        //проверяем чтобы число делилось на 3 или 5
        if ($i % 3 == 0 || $i % 5 == 0) {
            $sum += $i;
        }
    }
    echo 'Сумма: ' . $sum;
    ?>
</div>