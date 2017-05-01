  <div class="modal">
    <button class="modal__close" type="button" name="button">Закрыть</button>

    <h2 class="modal__heading">Добавление задачи</h2>

    <form class="form" class="" action="index.php?add" method="post" enctype="multipart/form-data">
      <div class="form__row">
        <label class="form__label" for="name">Название <sup>*</sup></label>
        <?php if(isset($data['errors']['name'])): ?>
          <input class="form__input form__input--error" type="text" name="name" id="name" value="" placeholder="Введите название">
          <span class="form__error error-massage"><?=$data['errors']['name']; ?></span>
        <?php else: ?>
          <input class="form__input" type="text" name="name" id="name" value="<?=$data['last_data']['name']; ?>" placeholder="Введите название">
        <?php endif; ?>
      </div>

      <div class="form__row">
        <label class="form__label" for="project">Проект <sup>*</sup></label>
        <?php if (isset($data['errors']['project'])): ?>
          <select class="form__input form__input--select form__input--error" name="project" id="project">
            <option value="">Выбрать проект...</option>
            <option value="Входящие">Входящие</option>
          </select>
          <span class="form__error error-massage"><?=$data['errors']['project']; ?></span>
        <?php else: ?>
          <select class="form__input form__input--select" name="project" id="project">
            <option value="">Выбрать проект...</option>
            <option value="Входящие" <?php @$data['last_data']['project']=="Входящие" ? print "selected" : false;?>>Входящие</option>
          </select>
        <?php endif ?>
      </div>

      <div class="form__row">
        <label class="form__label" for="date">Дата выполнения <sup>*</sup></label>
        <?php if (isset($data['errors']['date'])): ?>
          <input class="form__input form__input--date form__input--error" type="text" name="date" id="date" value="" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
          <span class="form__error error-massage"><?=$data['errors']['date']; ?></span>
        <?php else: ?>
          <input class="form__input form__input--date" type="text" name="date" id="date" value="<?=$data['last_data']['date']; ?>" placeholder="Введите дату в формате ДД.ММ.ГГГГ">
        <?php endif ?>
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

