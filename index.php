<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Rocket</title>
    <link rel="stylesheet/less" type="text/css" href="styles.less" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
  </head>
  <body>
    <div class="container">
      <header>
        <ul class="header__top-menu">
          <li>О компании</li>
          <li>Доставка</li>
          <li>Оплата</li>
          <li>Сервис</li>
          <li>Возврат</li>
          <li>Статьи</li>
          <li>Контакты</li>
        </ul>
        <hr class="horizontal-line">
        <ul class="header__items">
          <li>
            <img src="img/logo.png" alt="logo">
          </li>
          <li class="items__input">
            <div class="item__border">
              <img src="img/search.png" alt="search">
              <input type="text" name="search" placeholder="Поиск по товарам">
              <img src="img/next.png" alt="press" style="cursor:pointer">
            </div>
          </li>
          <li class="items__contacts">
            <h6>8 (800) 707-99-24</h6>
            <p>9.00 - 20.00 ежедневно</p>
          </li>
          <li class="items__market">
            <ul class="market__items">
              <li>
                <img class="gray" src="img/statistic.png" alt="stat">
                <p class="gray">0</p>
              </li>
              <li>
                <img src="img/heart-red.png" alt="like">
                <p>7</p>
              </li>
              <li>
                <img src="img/basket-red.png" alt="basket">
                <p>17</p>
              </li>
            </ul>
          </li>
        </ul>
        <hr class="horizontal-line">
        <nav>
          <ul class="header__nav">
            <li class="nav__logo">
              <p>Продукция</p>
              <img src="img/energoteh.png" alt="energoteh">
            </li>
            <li>Стабилизаторы 220В</li>
            <li>Стабилизаторы 380В</li>
            <li>Генераторы 220В</li>
            <li>Генераторы 380В</li>
            <li>ИБП и батареи</li>
            <li>Прочая техника</li>
            <li>Услуги</li>
            <li>Акции</li>
          </ul>
          <hr class="horizontal-line">
          <ul class="nav__menu">
            <li>Главная</li>
            <li style="cursor: auto;">→</li>
            <li>Статьи</li>
          </ul>
        </nav>
        <hr class="horizontal-line">
      </header>
      <main>
        <h2>Полезная информация</h2>
        <ul class="main__pagination">
          <li><a href="?page=1">1</a></li>
          <li><a href="?page=2">2</a></li>
          <li><a href="?page=3">3</a></li>
          <li><a href="?page=4">4</a></li>
          <li class="pagination__hidden pagination__hidden-up"><a href="?page=5">5</a></li>
          <li class="pagination__hidden pagination__hidden-up"><a href="?page=6">6</a></li>
          <li class="pagination__hidden pagination__hidden-up"><a href="?page=7">7</a></li>
          <li class="pagination__hidden pagination__hidden-up"><a href="?page=8">8</a></li>
          <li class="pagination__hidden pagination__hidden-up"><a href="?page=9">9</a></li>
          <li id="pagination-up" class="pagination_item" onclick="paginationUp()">...</li>
          <li><a href="?page=10">10</a></li>
        </ul>
        <div class="main__items">
          <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db_name = 'mybase';
            $link = mysqli_connect($host, $user, $pass, $db_name);

            if (!$link) {
            echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
            exit;
            }

            $limit = 6;
            $offset = isset($_GET['page']) ? $_GET['page'] : 1;
            $page = $limit * ($offset - 1);
            $request = 'SELECT * FROM `production` LIMIT '.$limit.' OFFSET '.($page);
            $sql = mysqli_query($link, $request);

            while ($result = mysqli_fetch_array($sql)) {
            echo "<div class='item'>
                    <img src='img/item.png' alt='image'>
                    <div>
                      <h3>{$result['heading']}, {$result['id']}</h3>
                      <p>{$result['about']}</p>
                    </div>
                  </div>";
          };
          ?>
        </div>
        <ul class="main__pagination">
          <li><a href="?page=1">1</a></li>
          <li><a href="?page=2">2</a></li>
          <li><a href="?page=3">3</a></li>
          <li><a href="?page=4">4</a></li>
          <li class="pagination__hidden pagination__hidden-bottom"><a href="?page=5">5</a></li>
          <li class="pagination__hidden pagination__hidden-bottom"><a href="?page=6">6</a></li>
          <li class="pagination__hidden pagination__hidden-bottom"><a href="?page=7">7</a></li>
          <li class="pagination__hidden pagination__hidden-bottom"><a href="?page=8">8</a></li>
          <li class="pagination__hidden pagination__hidden-bottom"><a href="?page=9">9</a></li>
          <li id="pagination-bottom" class="pagination_item" onclick="paginationBottom()">...</li>
          <li><a href="?page=10">10</a></li>
        </ul>
      </main>
      <hr class="horizontal-line footer-line">
      <footer>
        <ul class="footer__items">
          <li class="footer__item">
            <ul class="footer__item__contacts">
              <li>121471, г.Москва ул. Рябиновая 55 стр. 28</li>
              <li>prestizh06@mail.ru</li>
              <li class="bold">8 (800) 707-99-24 </li>
              <li class="bottom-line">контакты</li>
            </ul>
          </li>
          <li class="footer__item">
            <ul class="footer__item__mode">
              <li>Режим работы:</li>
              <li>Пн-чт с 8.00 до 19.00</li>
              <li>Пт с 8.00 до 17.00</li>
              <li>Сб с 10.00 до 15.00</li>
              <li>Вс (по предварительной договоренности).</li>
            </ul>
          </li>
          <li class="footer__item__about">
            <ul class="item__about">
              <li>О компании</li>
              <li>Акции</li>
              <li>Доставка</li>
            </ul>
            <ul>
              <li>Оплата</li>
              <li>Сервис</li>
              <li>Возврат</li>
            </ul>
            <p>Политика обработки персональных данных</p>
          </li>
          <li class="footer__item__logo">
            <ul>
              <li>
                <img src="img/rocket-logo.png" alt="rocket">
              </li>
              <li><p>Разработка и продвижение сайтов</p></li>
            </ul>
          </li>
        </ul>
      </footer>
    </div>
    <script src="script.js"></script>
  </body>
</html>
