<header class="b-main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="logo" class="b-logo">
                    <a href="/">
                        <i class="fa fa-rss" aria-hidden="true"></i>
                    </a>

                </div>
                <nav class="b-main-navigation">
                    <ul id="js-main-navigation" class="b-main-navigation__items">
                        <li class="b-main-navigation__item">
                            <a href="<?= $this->Url->build('/') ?>" class="b-main-navigation__link is-active">
                                <i class="fa fa-home b-main-navigation__icon" aria-hidden="true"></i>
                                <span class="b-main-navigation__text">Inicio</span>
                            </a>
                        </li>
                        <li class="b-main-navigation__item">
                            <a href="<?= $this->Url->build('/users') ?>" class="b-main-navigation__link">
                                <i class="fa fa-user b-main-navigation__icon" aria-hidden="true"></i>
                                <span class="b-main-navigation__text">Usuarios</span>
                            </a>
                        </li>
                        <li class="b-main-navigation__item">
                            <a href="<?= $this->Url->build('/posts') ?>"
                               class="b-main-navigation__link">
                                <i class="fa fa-bookmark b-main-navigation__icon" aria-hidden="true"></i>
                                <span class="b-main-navigation__text">Posts</span>
                            </a>
                        </li>
                        <?php if ($this->request->session()->read('Auth.User.id')):; ?>
                            <li class="b-main-navigation__item">
                                <a href="<?= $this->Url->build('/users/logout') ?>" class="b-main-navigation__link">
                                    <i class="fa fa-sign-out b-main-navigation__icon" aria-hidden="true"></i>
                                    <span class="b-main-navigation__text">Logout</span>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="b-main-navigation__item">
                                <a href="<?= $this->Url->build('/users/login') ?>" class="b-main-navigation__link">
                                    <i class="fa fa-sign-in b-main-navigation__icon" aria-hidden="true"></i>
                                    <span class="b-main-navigation__text">Login</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>