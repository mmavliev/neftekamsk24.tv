<!DOCTYPE html>

<html lang="ru">

<head>
    <?php wp_head();?>
    <title>
        <?php
     if(is_single()){
        echo get_the_title();
        echo " - Нефтекамск 24";
    } else if(is_tag()) {
        echo 'Посты с тэгом ';
        echo single_tag_title();
    } else if(is_404()){
        echo "Страница не найдена";
    } else if(is_page_template('about.php')){
        echo "Информация О Нас - Нефтекамск 24";
    } else if(is_page_template('weather.php')){
        echo "Погода в Нефтекамске - Нефтекамск 24";
    } else if(is_page_template('allprojects.php')){
        echo "Все передачи Нефтекамск 24";
    } else if(is_page_template('allnews.php')){
        echo "Все Новости Нефтекамск 24";
    } else if(is_category()){
        $categories = get_the_category();
            echo 'Все выпуски передачи "';
            echo get_queried_object()->name;
            echo '"';
    } else {
        echo 'Нефтекамск 24 - новости города Нефтекамск';
    }
    ?>
    </title>
    <?php
    echo '<meta name="description" content="';
    if(is_single()){
        echo get_the_excerpt();
    } else if(is_tag()) {
        echo 'Посты с тэгом ';
        echo single_tag_title();
        echo " на сайте Нефтекамск 24. Нефтекамск 24 - новости города Нефтекамск";
    } else if(is_page_template('about.php')){
        echo "Информация о канале Нефтекамск 24. Информация о коллективе Нефтекамск 24. Лицензии телеканала Нефтекамск 24. Костяк телестудии Нефтекамск 24. Нефтекамск 24 программа. Где работает Нефтекамск 24?";
    } else if(is_page_template('allprojects.php')){
        echo "Все Проекты Нефтекамск 24. Нефтекамск 24 проекты. Последние проекты Нефтекамск 24. Нефтекамск 24 проекты.";
    } else if(is_page_template('allnews.php')){
        echo "Все Новости Нефтекамск 24. Все о Нефтекамске. Нефтекамск 24 главные новости. Последние новости Нефтекамск 24. Нефтекамск 24 новости. Нефтекамск 24 свежие новости";
    } else if(is_category()){
        $categories = get_the_category();
                    echo 'Все выпуски передачи "';
                    echo get_queried_object()->name;
                    echo '", Смотреть все выпуски "';
                    echo get_queried_object()->name;
                    echo '" Нефтекамск24, ';
                    echo ' Передача "';
                    echo get_queried_object()->name;
                    echo '"';
    } else {
        echo 'Нефтекамск 24 - новости города Нефтекамск. Свежие новости города Нефтекамск. Только самое интересное и актуальное 24 часа в сутки.';
    }
    echo '"/>';
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <nav class="navbar bc">
        <a href="<?php echo get_bloginfo('url') ?>" style="margin-left:1rem;">
            <img src="<?php echo get_template_directory_uri()?>/images/fulllogo.png" id="logo"></a>
        <form action="<?php bloginfo( 'url' ); ?>" method="get" class="form display-none">
            <input type="text" name="s" placeholder="Введите слово для поиска"
                value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>" id="main-input" />
            <input type="submit" value="Найти" hidden />
        </form>
        <div class="buttons">
            <span id="customize-btn" data-toggle="modal" data-target="#customModal" class="lc"><i class="fas fa-cog"
                    style="height:31px"></i></span>
            <span id="opensearch" class="lc"><i class="fas fa-search" style="height:31px"></i></span>
            <span class="openbtn" data-toggle="modal" data-target="#modalMenu">
                <span class="bar top"></span>
                <span class="bar middle"></span>
                <span class="bar bottom"></span>
            </span>
        </div>
    </nav>

    <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenu" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header menu-head">
                    <h5 class="modal-title lc">Меню сайта</h5>
                    <span class="openbtn" data-toggle="modal" data-target="#modalMenu">
                        <span class="bar-active bar top top-active"></span>
                        <span class="bar-active bar middle-active"></span>
                        <span class="bar-active bar bottom-active"></span>
                    </span>
                </div>
                <div class="modal-body menu">
                    <div class="aside-section aside-right">
                        <ul class="aside-list hf">
                            <li><a href="<?php echo get_bloginfo('url') ?>" class="aside-anchor hf">Главная</a></h2>
                            </li>
                            <?php
                                $category_id = get_cat_ID('Новости');
                                $categories = get_categories(array(
                                'exclude'=>array($category_id),
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ));
                            foreach( $categories as $category ){
                                echo ' <li><a href="'.get_category_link( $category->term_id ).'" class="aside-anchor hf mr-3">'.$category->name.'</a></li>';
                                    }
                                ?>
                            <li><a href="/prognoz/" class="aside-anchor hf mr-3">Прогноз погоды</a></li>
                            <li><a href="/predlojit/" class="aside-anchor hf mr-3">Предложить новость</a></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer row">
                    <div class="phone col-sm">
                        <h6>Редакция<br>новостей</h6>
                        <a href="tel:83478372464">8 (34783) 7-24-64</a>
                        <p class="c-bc">время выхода: 19:00,<br>22:00, 00:00, 7:00, 8:00, 13:00</p>
                    </div>
                    <div class="phone col-sm">
                        <h6>Рекламный<br>отдел</h6>
                        <a href="tel:83478370545" class="lc">8 (34783) 7-05-45</a>
                        <p class="c-bc">понедельник — пятница<br> с 9:00 до 18:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customizeModal"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bc">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Настроить сайт</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col"><span class="hf">Заголовки:</span></div>
                        <div class="w-100"></div>
                        <div class="col">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <label class="tc" for="email">Шрифт </label>
                                </a>
                                <div class="dropdown-menu head-font" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item mons active" id="head-mons">Monserrat</a>
                                    <a class="dropdown-item open-sans" id="head-sans">Open Sans</a>
                                    <a class="dropdown-item oswald" id="head-oswald">Oswald</a>
                                    <a class="dropdown-item playfair" id="head-playfair">Playfair Display</a>

                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                                <label for="customRange2" class="tc">Жирность</label>
                                <select id="font-weight-head">
                                    <option selected>3</option>
                                    <option>2</option>
                                    <option>1</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col"><span class="hf">Текст:</span></div>
                        <div class="w-100"></div>
                        <div class="col">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <label class="tc" for="email">Шрифт</label>
                                </a>

                                <div class="dropdown-menu text-font" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item mons active" id="text-mons">Monserrat</a>
                                    <a class="dropdown-item open-sans" id="text-sans">Open Sans</a>
                                    <a class="dropdown-item oswald" id="text-oswald">Oswald</a>
                                    <a class="dropdown-item playfair" id="text-playfair">Playfair Display</a>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                                <label for="customRange2" class="tc">Жирность</label>
                                <select id="font-weight-text">
                                    <option>3</option>
                                    <option selected>2</option>
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                                <label for="customRange2" class="tc">Размер</label>
                                <select id="font-size-range">
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                    <option>15</option>
                                    <option selected>16</option>
                                    <option>17</option>
                                    <option>18</option>
                                    <option>19</option>
                                    <option>20</option>
                                    <option>21</option>
                                    <option>22</option>
                                    <option>23</option>
                                    <option>24</option>
                                    <option>25</option>
                                    <option>26</option>
                                    <option>27</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col">
                            <div>
                                <label class="tc" for="subject">Цвет 1</label>
                                <input type="color" value="#000000" class="in1" id="main-color-input">
                            </div>
                            <div>
                                <label class="tc" for="subject">Цвет 2</label>
                                <input type="color" value="#FF1111" class="in1" id="link-color-input">
                            </div>
                            <div>
                                <label class="tc" for="subject">Цвет 3</label>
                                <input type="color" value="#ffffff" class="in1" id="bg-color-input">
                            </div>
                        </div>
                    </div>
                    <div class="col form-group text-center">
                        <button type="button" class="btn btn-primary d-inline-block" id="generate">Случайные
                            цвета</button>
                    </div>
                    <div class="col form-group text-center">
                        <button type="button" class="btn btn-primary d-inline-block" id="reset-color">Сбросить
                            настройки</button>
                    </div>
                </div>
                <a class="usite lc" href="http://usite.tech">Usite</a>
            </div>
        </div>
    </div>