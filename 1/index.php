<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous">
<script>
    $(document).ready(function (e) {
        //срабатывает при отправке
        $("#feedback_form").on('submit', function (e) {
            e.preventDefault();
            //получаем содержимое формы
            var $inputs = $(this).find("input, select, button, textarea");

            $.ajax({
                type: 'POST',
                url: 'add_file.php',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $inputs.prop("disabled", true);
                },
                success: function (response) {
                    if (response != '') {
                        $inputs.prop("disabled", false);
                        alert("Сообщение доставлено. Спасибо за обращение");
                        document.getElementById("pers_name").value = "";
                        document.getElementById("pers_email").value = "";
                        document.getElementById("pers_message").value = "";
                        document.getElementById("file").value = "";
                    } else {
                        alert('Произошла непредвиденная ошибка')
                    }
                },
                fail: function (response) {
                    alert('Произошла непредвиденная ошибка')
                }
            });
        });
    });
</script>

<style>
    input {
        margin: 2px 0 2px 0;
    }

    ,
    textarea {
        margin: 2px 0 2px 0;
    }
</style>

<form id="feedback_form" enctype="multipart/form-data">
    <div data-styles-apllied="true" class="form-group">
        <div class="alert alert-secondary">Форма обратной связи</div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Имя
                <span style="color: red" class="form-required control-label">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="pers_name" id="pers_name"
                       placeholder="Введите Ваше имя" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email
                <span style="color: red" class="form-required starrequired">*</span>
            </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="pers_email" id="pers_email" placeholder="Email"
                       required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Сообщение
                <span style="color: red" class="form-required starrequired">*</span>
            </label>
            <div class="col-sm-10">
                        <textarea class="form-control" id="pers_message"
                                  name="pers_message" placeholder="Напишите нам" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="image_uploads" class="col-sm-2">Файл(*.png, *.jpg)</label>
            <input type="file" name="file" class="form-control-file"
                   accept=".jpg, .png" id="file">
        </div>
        <div>
            <input name="submit" class="btn btn-outline-primary" type="submit" value="Отправить"/>
        </div>
    </div>
</form>



