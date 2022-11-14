<section class="form">
  <div class="container">
    <h1 class="catalog-title">Добавление продукта</h1>
    <form method="post" action="..\product_add.php" enctype="multipart/form-data">
        <p>Наименование</p>
        <label for="id1">
            <input type="text" name="title" id="id1" class="specie">
        </label>

        <p>Цена</p>
            <label for="id2">
                <input type="text" name="price" id="id2">
            </label>

        <p>Тип</p>
            <label for="id3">
                <select name="type" id="id3">
                    <option value="furniture">Мебель</option>
                    <option value="lightning">Освещение</option>
                    <option value="textile">Текстиль</option>
                    <option value="other">Другое</option>
                </select>
            </label>

        <p>Цвет<p>
            <label for="id4">
                <select name="color[]" multiple size="6" id="id4">
                    <option value="yellow">Желтый</option>
                    <option value="red">Красный</option>
                    <option value="green">Зеленый</option>
                    <option value="black">Черный</option>
                    <option value="white">Белый</option>
                    <option value="orange">Оранжевый</option>
                </select></p>
        <p>Описание</p>
            <label for="id5">
                <textarea name="features" rows="5" id="id5"></textarea>
            </label>
        </p>
        <p>Изображение</p>
            <label for="image" id="id6">
                <input name="img_url" type="file">
            </label>

        <p><input type="submit" value="Создать!"></p>
    </form>
  </div>
</section>
