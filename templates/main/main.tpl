<div class="row">

        <div class="cols col-12">
            <form action="/main/form" method="post" enctype="multipart/form-data" class="form">
                <? if (strlen($Error) > 0) : ?>
                <div class="alert alert-error"><?=$Error ?></div>
                <? endif; ?>
            <table>
                <tr>
                    <td> Введите имя и фамилию</td>
                    <td><input type="text" name="username" id="name"><span id="valid"></span></td>
                </tr>
                <tr>
                    <td>Введите ваш возраст</td>
                    <td><input type="number" min="17" max="65" name="usergender" id="gender"> <span id="val"></span></td>
                </tr>
                <tr>
                    <td>Выберите файл-резюме</td>
                    <td> <input type="file" name="file" id="file"><span id="v"></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" id="submit" name="submit" class="btn btn-primary">Отправить</button></td>
                </tr>
            </table>

            </form>
        </div>

</div>
