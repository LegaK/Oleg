<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous">

<script>
    //конверт из строки в нормальный массив
    function convert_csv(data) {
        //удаляем \r из строки
        data = data.replace('\r', "");
        //выбираем первую строку, так как это хэдер листа
        let headers = data.slice(0, data.indexOf("\n")).split(',');
        //проходим по всем остальным строкам и получаем записи
        let rows = data.slice(data.indexOf("\n") + 1).split("\n");
        //подготавливаем рабочий массив и возвращаем
        rows = rows.map(function (row) {
            //получаем значения из строки с данными
            let values = row.split(',');
            //обращаемся к хэдеру, получаем название столбца и делаем новую запись
            //где ключ - название столбца, значение- значение в строке
            let el = headers.reduce(function (object, header, index) {
                object[header] = values[index];
                return object;
            }, {});
            return el;
        });
        let arr = [];
        arr['header'] = headers;
        arr['rows'] = rows;
        return arr;
    }

    function load_file() {
        //получаем выбранный файл
        let file = $('#file-selector')[0].files[0];
        //открываем файл для чтения
        let reader = new FileReader();
        //указываем что считать как текст
        reader.readAsText(file);

        //как только подготовлено к чтению, обращаемся к функции конвертации
        reader.onload = function () {
            //очищаем таблицу
            $('#csv_table').html('')
            let data = convert_csv(reader.result)
            //подготавливаем хедер
            let header = '<thead class="thead-light"><tr>';
            data['header'].map(function (header_val) {
                header += '<th scope="col">' + header_val + '</th>'
            })
            header += '</tr></thead>'

            //подготавливаем строки
            let rows = ''
            data['rows'].map(function (rows_val) {
                rows += '<tr>'
                for (key in rows_val) {
                    rows += '<td>' + rows_val[key] + '</td>';
                }
                rows += '</tr>'
            })
            $('#csv_table').append(header+rows);
        };
    }
</script>

<div class="alert alert-secondary">
    <div> В директории '2/files/' имеется файл test.csv</div>
    <input type="file" onchange="load_file()" accept=".csv" id="file-selector">
</div>

<div>
    <table id="csv_table" class="table table-bordered"></table>
</div>