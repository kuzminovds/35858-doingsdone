  <div class="modal">
    <button class="modal__close" type="button" name="button">Закрыть</button>

    <h2 class="modal__heading">Вход на сайт</h2>

    <form class="form" class="" action="guest.php?login" method="post">
      <div class="form__row">
        <label class="form__label" for="email">E-mail <sup>*</sup></label>
        <?php if (isset($data['login_errors']['email'])): ?>
          <input class="form__input form__input--error" type="text" name="email" id="email" value="" placeholder="Введите e-mail">
          <p class="form__message"><?=$data['login_errors']['email']; ?></p>
        <?php else: ?>
          <input class="form__input" type="text" name="email" id="email" value="<?=$data['login_data']['email']; ?>" placeholder="Введите e-mail">
        <?php endif ?>
      </div>

      <div class="form__row">
        <label class="form__label" for="password">Пароль <sup>*</sup></label>
        <?php if (isset($data['login_errors']['password'])): ?>
          <input class="form__input form__input--error" type="password" name="password" id="password" value="" placeholder="Введите пароль">
          <p class="form__message"><?=$data['login_errors']['password']; ?></p>
        <?php else: ?>
          <input class="form__input" type="password" name="password" id="password" value="" placeholder="Введите пароль">
        <?php endif ?>
      </div>

      <div class="form__row">
        <label class="checkbox">
          <input class="checkbox__input visually-hidden" type="checkbox" checked>
          <span class="checkbox__text">Запомнить меня</span>
        </label>
      </div>

      <div class="form__row form__row--controls">
        <input class="button" type="submit" name="" value="Войти">
      </div>
    </form>
  </div>