  <div class="modal">
    <button class="modal__close" type="button" name="button">Закрыть</button>

    <h2 class="modal__heading">Добавление задачи</h2>

    <form class="form" class="" action="index.php" method="post">
      <div class="form__row">
        <label class="form__label" for="name">Название <sup>*</sup></label>
        <?php if(isset($data['errors']['name'])): ?>
          <input class="form__input form__input--error" type="text" name="name" id="name" value="" placeholder="Введите название">
          <span class="form__error"><?=$data['errors']['name']; ?></span>
        <?php else: ?>
          <input class="form__input" type="text" name="name" id="name" value="<?=$data['last_data']['name']; ?>" placeholder="Введите название">
        <?php endif; ?>
      </div>

      <div class="form__row">
        <label class="form__label" for="project">Проект <sup>*</sup></label>
        <select class="form__input form__input--select" name="project" id="project">
          <option value="">Выбрать проект...</option>
          <option value="Входящие">Входящие</option>
        </select>
      </div>

      <div class="form__row">
        <label class="form__label" for="date">Дата выполнения <sup>*</sup></label>
        <input class="form__input form__input--date" type="text" name="date" id="date" value="<?=$_POST["date"]; ?>" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
      </div>

      <div class="form__row">
        <label class="form__label" for="file">Файл</label>

        <div class="form__input-file">
          <input class="visually-hidden" type="file" name="preview" id="preview" value="">

          <label class="button button--transparent" for="preview">
              <span>Выберите файл</span>
          </label>
        </div>
      </div>

      <div class="form__row form__row--controls">
        <input class="button" type="submit" name="" value="Добавить">
      </div>
    </form>
  </div>

