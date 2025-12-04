<?php
/*
 * Template name: Главная
 * */

get_header();
?>

    <header class="fscreen" id="up">
        <div class="container_center anim_cont">

            <h1 class="fscreen__title wow fadeInUp">Музыка. <span>Бизнес.</span> Облако.</h1>
            <div class="fscreen__subtitle wow fadeInUp">мб - сервис доставки лицензионной музыки и инструментарий для аудиомаркетинга
                <div class="fscreen__container">
                    <ul class="fscreen__list">
                        <li class="fscreen__list__item">ресторана.</li>
                        <li class="fscreen__list__item">магазина.</li>
                        <li class="fscreen__list__item">кафе.</li>
                        <li class="fscreen__list__item">фитнес-клуба.</li>
                        <li class="fscreen__list__item">шоппинг-молла.</li>
                        <li class="fscreen__list__item">автосалона.</li>
                        <li class="fscreen__list__item">пиццерии.</li>
                        <li class="fscreen__list__item">супермаркета.</li>
                        <li class="fscreen__list__item">ресторана.</li>
                    </ul>
                </div>
            </div>

            <div class="fscreen__img wow fadeInUp"><img src="<?php bloginfo('template_url'); ?>/img/header/header-background.png" alt="Header"></div>

            <div class="fscreen__btn wow fadeInUp">
                <a href="/request?type=0" class="btn">Тест-плей на 3 дня</a>
            </div>
        </div>
    </header>
<!--    {% endblock %}-->
<!---->
<!--    {% block content %}-->
    <hr>


    <div class="about">
        <div class="container_center anim_cont">

            <div class="aboutList">
                <div class="aboutList__item"><img src="<?php bloginfo('template_url'); ?>/img/about/about-image.png" alt="About"></div>
                <div class="aboutList__item  wow fadeInUp">
                    <div class="aboutList__title sectionTitle">
                        Несколько кейсов - <span>одно решение</span>.
                    </div>
                    <img src="<?php bloginfo('template_url'); ?>/img/about/about-image.png" class="block__img" alt="About">
                    <div class="aboutList__text">
                        Доступ к сервису позволит без отчислений в РАО и ВОИС публично воспроизводить музыку на объектах предприятия, создавать плейлисты в пару кликов, отбирать готовые подборки, настраивать графики проигрывания в календаре либо доверить аудиомаркетинг музыкальным специалистам мб.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="features">
        <div class="container_center">

            <div class="featuresList anim_cont">

                <div class="featuresList__item wow fadeInUp">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon1.png" alt="Features"></div>
                        <div class="featuresList__title">Облако</div>
                        <div class="featuresList__text">Личный музыкальный кабинет мб – современный <br/>и при этом легкий в использовании плеер, с каталогом треков, готовыми подборками и удобными функциями.</div>
                    </div>
                </div>

                <div class="featuresList__item wow fadeInUp">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon2.png" alt="Features"></div>
                        <div class="featuresList__title">Музыка</div>
                        <div class="featuresList__text">Тысячи, тщательно отобранных для целей аудиомаркетинга музыкальных треков, с возможностью детального поиска по различным фильтрам. </div>
                    </div>
                </div>

                <div class="featuresList__item wow fadeInUp">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon3.png" alt="Features"></div>
                        <div class="featuresList__title">Легальность</div>
                        <div class="featuresList__text">Музыка из каталога сервиса получена по письменным разрешениям от правообладателей. Публичное исполнение треков освобождает Ваше предприятие от сторонних выплат.</div>
                    </div>
                </div>

                <div class="featuresList__item wow fadeInUp">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon4.png" alt="Features"></div>
                        <div class="featuresList__title">Поддержка</div>
                        <div class="featuresList__text">Музыкальная, техническая и юридическая поддержка, в том числе из личного кабинета, через электронную систему тикетов.</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="featuresSlider wow fadeInUp">

            <div class="featuresList__slider content horiz-scroll">

                <div class="featuresList__item">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon1.png" alt="Features"></div>
                        <div class="featuresList__title">Облако</div>
                        <div class="featuresList__text">Личный музыкальный кабинет мб - интуитивно понятный и современный плеер, с каталогом треков, готовыми подборками и удобным функционалом.</div>
                    </div>
                </div>

                <div class="featuresList__item">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon2.png" alt="Features"></div>
                        <div class="featuresList__title">Музыка</div>
                        <div class="featuresList__text">Тысячи тщательно подобранных  для целей аудиомаркетинга музыкальных треков с возможностью детального поиска по различным фильтрам. </div>
                    </div>
                </div>

                <div class="featuresList__item">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon3.png" alt="Features"></div>
                        <div class="featuresList__title">Легальность</div>
                        <div class="featuresList__text">Музыка получена по письменным разрешениям от правообладателей. Публичное исполнение треков освобождает Ваше предприятие от сторонних выплат.</div>
                    </div>
                </div>

                <div class="featuresList__item">
                    <div class="featuresList__content">
                        <div class="featuresList__img"><img src="<?php bloginfo('template_url'); ?>/img/features/icon4.png" alt="Features"></div>
                        <div class="featuresList__title">Поддержка</div>
                        <div class="featuresList__text">Музыкальная, техническая и юридическая поддрежка через электронную систему тикетов.</div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="mockups">
        <div class="container_center anim_cont">

            <div class="mockups__title sectionTitle  wow fadeInUp"><span>Любовь</span> может быть слепой, но она <span>не глухая.</span></div>
            <div class="mockups__text  wow fadeInUp">Аудиомаркетинг - это общение через эмоции. Музыка вовлекает людей в разговор и при предоставлении эксклюзивного контента создает незабываемые впечатления. мб- путеводитель Вашей компании в мир коммуникации с клиентами с помощью музыки.</div>
            <div class="mockups__img  wow fadeInUp"><img src="<?php bloginfo('template_url'); ?>/img/mockups/mockups.png" alt="mockups"></div>
            <div class="mockups__button  wow fadeInUp">
                <a href="/request" class="btn">Подключить</a>
                <a href="/features" class="btn btn__transpsrent">Возможности</a>
            </div>

        </div>
    </div>

    <div class="tariffs">
        <div class="container_center anim_cont">

            <div class="tariffs__title sectionTitle wow fadeInUp">Тарифы</div>
            <div class="tariffs__text wow fadeInUp">Тарификация мб зависит от сферы деятельности Вашей компании, количества подключаемых объектов, их размеров и того, чьи специалисты будут заниматься настройкой и поддержкой музыкальной программы.</div>

            <div data-parallax="scroll" data-speed="0.5" style="padding: 10px 0">
                <div class="tariffsList wow fadeInUp">
                    <div class="tariffsList__range">
                        <div id="slider-range-max"></div>
                        <span class="value">0</span>
                    </div>

                    <div class="rangeList">
                        <div class="rangeList__item">
                            <div class="rangeList__title">Тест-плей</div>
                            <div class="rangeList__text">
                                Бесплатный доступ<br> на 3 дня для любых<br> сфер бизнеса
                            </div>
                            <div class="rangeList__btn active">
                                <a href="/request?type=0&companyType=0&payment=true" class="btn btn__transpsrent">Попробовать</a>
                            </div>
                        </div>

                        <div class="rangeList__item rangeList__item-select">
                            <div class="rangeList__title">Рестораны и питание</div>
                            <div class="rangeList__text">
                                <ul>
                                    <li>Пиццерия</li>
                                    <li>Кафе, Столовая</li>
                                    <li>Быстрое питание</li>
                                    <li>Бар, Паб</li>
                                    <li>Закусочная</li>
                                </ul>
                            </div>
                            <div class="rangeList__btn">
                                <a href="/price?type=0" class="btn">Цены</a>
                            </div>
                        </div>

                        <div class="rangeList__item">
                            <div class="rangeList__title">Торговые предприятия</div>
                            <div class="rangeList__text">
                                <ul>
                                    <li>Супермаркет</li>
                                    <li>Шоппинг-молл</li>
                                    <li>Автосалон</li>
                                    <li>Бутик</li>
                                    <li>Гипермаркет</li>
                                </ul>
                            </div>
                            <div class="rangeList__btn">
                                <a href="/price?type=1" class="btn">Цены</a>
                            </div>
                        </div>

                        <div class="rangeList__item">
                            <div class="rangeList__title">Спорт и развлечения</div>
                            <div class="rangeList__text">
                                <ul>
                                    <li>Фитнес-центр</li>
                                    <li>Тренажерный зал</li>
                                    <li>Бассейн, Боулинг,</li>
                                    <li>Бильярд, Кинотеатр,</li>
                                    <li>Салон красоты</li>
                                </ul>
                            </div>
                            <div class="rangeList__btn">
                                <a href="/price?type=2" class="btn">Цены</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="tariffsSlider wow fadeInUp">
            <div class="rangeList__slider content horiz-scroll">


                <div class="rangeList__slideritem">
                    <div class="rangeList__item">
                        <div class="rangeList__title">Рестораны и питание</div>
                        <div class="rangeList__text">
                            <ul>
                                <li>Пиццерия</li>
                                <li>Кафе, Столовая</li>
                                <li>Быстрое питание</li>
                                <li>Бар, Паб</li>
                                <li>Закусочная</li>
                            </ul>
                        </div>
                        <div class="rangeList__btn">
                            <a href="/price?type=0" class="btn">Цены</a>
                        </div>
                    </div>
                </div>

                <div class="rangeList__slideritem">
                    <div class="rangeList__item">
                        <div class="rangeList__title">Торговые предприятия</div>
                        <div class="rangeList__text">
                            <ul>
                                <li>Супермаркет</li>
                                <li>Шоппинг-молл</li>
                                <li>Автосалон</li>
                                <li>Бутик</li>
                                <li>Гипермаркет</li>
                            </ul>
                        </div>
                        <div class="rangeList__btn">
                            <a href="/price?type=1" class="btn">Цены</a>
                        </div>
                    </div>
                </div>

                <div class="rangeList__slideritem">
                    <div class="rangeList__item">
                        <div class="rangeList__title">Спорт и развлечения</div>
                        <div class="rangeList__text">
                            <ul>
                                <li>Фитнес-центр</li>
                                <li>Тренажерный зал</li>
                                <li>Бассейн, Боулинг,</li>
                                <li>Бильярд, Кинотеатр,</li>
                                <li>Салон красоты</li>
                            </ul>
                        </div>
                        <div class="rangeList__btn">
                            <a href="/price?type=2" class="btn">Цены</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="pricing wow fadeInUp">
        <div class="container_center">

            <div class="pricingList">
                <div class="pricingList__item">
                    <div class="pricingList__title sectionTitle">Много объектов - <span>один</span> инструмент</div>
                    <div class="pricingList__text">Централизованное управление фоновой музыкой для всех объектов сети позволит оперативно из офиса вносить изменения в программу и график проигрывания, получить единый музыкальный стиль компании, а при необходимости воспроизводить музыку таргетированно.</div>
                </div>
                <div class="pricingList__item">
                    <div class="pricingList__title sectionTitle">Наши <span>пользователи</span> такие же, как и Вы.</div>
                    <div class="pricingList__text">Корпоративные клиенты всех форм и размеров используют мб. Среднее время простой настройки и запуска музыкального оформления - 25 минут. Правильная фоновая музыка способна привлечь клиентов, увеличить средний чек в ресторане на 25-35% и на 13-20% поднять продажи в сфере ритейла.</div>
                </div>
            </div>

        </div>
    </div>

    <div class="clients">
        <div class="container_center">

            <div class="clientsList wow fadeInUp">
                <div class="clientsList__left">Более 700 корпоративных клиентов</div>
                <div class="clientsList__right">
                    <img src="<?php bloginfo('template_url'); ?>/img/clients/client1.png" alt="client1">
                    <img src="<?php bloginfo('template_url'); ?>/img/clients/client4.png" alt="client4">
                    <img src="<?php bloginfo('template_url'); ?>/img/clients/client2.png" alt="client2">
                    <img src="<?php bloginfo('template_url'); ?>/img/clients/client3.png" alt="client3">
                    <img src="<?php bloginfo('template_url'); ?>/img/clients/client6.png" alt="client6">
                    <img src="<?php bloginfo('template_url'); ?>/img/clients/client5.png" alt="client5">
                </div>
            </div>

            <div class="clientslider wow fadeInUp">
                <div class="clientsList__slider">
                    <div>
                        <img src="<?php bloginfo('template_url'); ?>/img/clients/client1.png" alt="client1">
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url'); ?>/img/clients/client4.png" alt="client4">
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url'); ?>/img/clients/client2.png" alt="client2">
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url'); ?>/img/clients/client3.png" alt="client3">
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url'); ?>/img/clients/client6.png" alt="client6">
                    </div>
                    <div>
                        <img src="<?php bloginfo('template_url'); ?>/img/clients/client5.png" alt="client5">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="connect">
        <div class="container_center">
            <div class="connect__title sectionTitle wow fadeInUp">Как подключить.</div>

            <div class="blog-slider wow fadeInUp">
                <div class="blog-slider__wrp swiper-wrapper">
                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">
                            <div class="frame">
                                <div class="plane-container">
                                    <a href="http://customer.io/" target="_blank">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             width="1131.53px" height="379.304px" viewBox="0 0 1131.53 379.304" enable-background="new 0 0 1131.53 379.304"
                                             xml:space="preserve" class="plane">
									<polygon fill="#FFFFFF" points="72.008,0 274.113,140.173 274.113,301.804 390.796,221.102 601.682,367.302 1131.53,0.223  "/>
                                            <polygon fill="#E6E6E6" points="1131.53,0.223 274.113,140.173 274.113,301.804 390.796,221.102   "/>
								</svg>
                                    </a>

                                </div>
                            </div>
                            <div class="clouds">

                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px"
                                     height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud big front slowest">
							<path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
							c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
							C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
							S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
							</svg>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px"
                                     height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud distant smaller">
							<path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
							c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
							C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
							S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
							</svg>

                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px"
                                     height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud small slow">
							<path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
							c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
							C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
							S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
							</svg>

                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px"
                                     height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud distant super-slow massive">
							<path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
							c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
							C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
							S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
							</svg>

                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="762px"
                                     height="331px" viewBox="0 0 762 331" enable-background="new 0 0 762 331" xml:space="preserve" class="cloud slower">
							<path fill="#FFFFFF" d="M715.394,228h-16.595c0.79-5.219,1.201-10.562,1.201-16c0-58.542-47.458-106-106-106
							c-8.198,0-16.178,0.932-23.841,2.693C548.279,45.434,488.199,0,417.5,0c-84.827,0-154.374,65.401-160.98,148.529
							C245.15,143.684,232.639,141,219.5,141c-49.667,0-90.381,38.315-94.204,87H46.607C20.866,228,0,251.058,0,279.5
							S20.866,331,46.607,331h668.787C741.133,331,762,307.942,762,279.5S741.133,228,715.394,228z"/>
							</svg>

                            </div>
                        </div>
                        <div class="blog-slider__content">
                            <div class="blog-slider__title">Заявка</div>
                            <div class="blog-slider__text">Попробуйте тестовый доступ или свяжитесь с нами.  На данном этапе мы постараемся собрать от Вас максимальное количество необходимых данных для целей аудиомаркетинга, поможем подобрать оптимальный тариф.</div>
                            <a href="/request" class="btn">Связаться</a>
                        </div>
                    </div>

                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">
                            <div style="margin:0 auto;" id="SentSuccess"></div>
                        </div>
                        <div class="blog-slider__content">
                            <div class="blog-slider__title">Лицензионное соглашение</div>
                            <div class="blog-slider__text">Подписываем основной документ, по которому Ваше предприятие имеет право осуществлять публичное исполнение музыкальных произведений без  выплат в  сторонние организации.</div>
                            <a href="/message" class="btn">Ознакомиться</a>
                        </div>
                    </div>

                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">
                            <div class="rocket">
                                <div class="rocket-body">
                                    <div class="body"></div>
                                    <div class="fin fin-left"></div>
                                    <div class="fin fin-right"></div>
                                    <div class="window"></div>
                                </div>
                                <div class="exhaust-flame"></div>
                            </div>
                        </div>
                        <div class="blog-slider__content">
                            <div class="blog-slider__title">Настройка и запуск</div>
                            <div class="blog-slider__text">В зависимости от согласованного тарифа проводим первичную или расширенную настройку сервиса  и подготовку плейлистов и лент под цели Вашего бизнеса.</div>
                            <a href="/price" class="btn">Связаться</a>
                        </div>
                    </div>

                    <div class="blog-slider__item swiper-slide">
                        <div class="blog-slider__img">
                            <div class="gears">
                                <img src=<?php bloginfo('template_url'); ?>/img/big-gear1.png" alt="gear" class="big">
                                <img src="<?php bloginfo('template_url'); ?>/img/small-gear1.png" alt="gear" class="small">
                            </div>
                        </div>
                        <div class="blog-slider__content">
                            <div class="blog-slider__title">Обновления и поддержка</div>
                            <div class="blog-slider__text">Осуществляем музыкальную, техническую и юридическую поддержку. </div>
                            <a href="/message" class="btn">Ознакомиться</a>
                        </div>
                    </div>

                </div>
                <div class="blog-slider__pagination"></div>
            </div>

        </div>
    </div>

    <div class="questions">
        <div class="container_center">

            <div class="questions__title sectionTitle wow fadeInUp">Остались <span>вопросы?</span></div>

            <div class="questionsList anim_cont">
                <div class="questionsList__item wow fadeInUp">
                    <div class="questionsList__iconcont">
                        <div class="questionsList__icon">?</div>
                    </div>
                    <div class="questionsList__title show">Зачем платить за фоновую музыку?
                        <i class="mdi mdi-chevron-down show_icon"></i>
                    </div>
                    <div class="questionsList__text">При публичном исполнении музыкальных произведений происходит использование прав нескольких правообладателей: авторов, исполнителей и изготовителей фонограмм, или их правопреемников. В соответствии с законом РФ, публичное исполнение музыки осуществляется с выплатой вознаграждения правообладателям.</div>
                    <div class="questionsList__text questionsList__textmob">При публичном исполнении музыкальных произведений происходит использование прав нескольких правообладателей: авторов, исполнителей и изготовителей фонограмм, или их правопреемников. В соответствии с законом РФ, публичное исполнение музыки осуществляется с выплатой вознаграждения правообладателям.</div>
                </div>
                <div class="questionsList__item wow fadeInUp">
                    <div class="questionsList__iconcont">
                        <div class="questionsList__icon">?</div>
                    </div>
                    <div class="questionsList__title show">Как работает мб?
                        <i class="mdi mdi-chevron-down show_icon"></i>
                    </div>
                    <div class="questionsList__text">Подключаясь к мб, Вы получаете лицензионное соглашение, доступ к облаку с большим количеством музыки, настройку от музыкального редактора и юридическую поддержку, вплоть до защиты Ваших интересов в суде по вопросам авторских и смежных прав в отношении передаваемой музыки.</div>
                    <div class="questionsList__text questionsList__textmob">Подключаясь к мб, Вы получаете лицензионное соглашение, доступ к облаку с большим количеством музыки, настройку от музыкального редактора и юридическую поддержку, вплоть до защиты Ваших интересов в суде по вопросам авторских и смежных прав в отношении передаваемой музыки.</div>
                </div>
                <div class="questionsList__item wow fadeInUp">
                    <div class="questionsList__iconcont">
                        <div class="questionsList__icon">?</div>
                    </div>
                    <div class="questionsList__title show">Кому платить РАО или ВОИС?
                        <i class="mdi mdi-chevron-down show_icon"></i>
                    </div>
                    <div class="questionsList__text">Один из смыслов аудиомаркетинга состоит в проявлении индивидуальности бренда, связанной с музыкальным форматом. Специалисты мб не рекомендуют использование музыки из чартов теле-радио вещания. Если, к примеру, у Вас банкетный зал или караоке клуб, то избежать хитов не получится, в этом случае потребуется лицензионное соглашение с обеими организациями.</div>
                    <div class="questionsList__text questionsList__textmob">Один из смыслов аудиомаркетинга состоит в проявлении индивидуальности бренда, связанной с музыкальным форматом. Специалисты мб не рекомендуют использование музыки из чартов теле-радио вещания. Если, к примеру, у Вас банкетный зал или караоке клуб, то избежать хитов не получится, в этом случае потребуется лицензионное соглашение с обеими организациями.</div>
                </div>
                <div class="questionsList__item wow fadeInUp">
                    <div class="questionsList__iconcont">
                        <div class="questionsList__icon">?</div>
                    </div>
                    <div class="questionsList__title show">Насколько это легально?
                        <i class="mdi mdi-chevron-down show_icon"></i>
                    </div>
                    <div class="questionsList__text">мб предоставляет музыку для публичного исполнения и воспроизведения на основании лицензионных договоров с правообладателями. Гражданский кодекс допускает публичное исполнение музыки с Выплатой вознаграждений напрямую правообладателю.</div>
                    <div class="questionsList__text questionsList__textmob">мб предоставляет музыку для публичного исполнения и воспроизведения на основании лицензионных договоров с правообладателями. Гражданский кодекс допускает публичное исполнение музыки с Выплатой вознаграждений напрямую правообладателю.</div>
                </div>
                <div class="questionsList__item wow fadeInUp">
                    <div class="questionsList__iconcont">
                        <div class="questionsList__icon">?</div>
                    </div>
                    <div class="questionsList__title show">Как не платить за музыку слишком много?
                        <i class="mdi mdi-chevron-down show_icon"></i>
                    </div>
                    <div class="questionsList__text">мб позволяет создать правильное музыкальное оформление для бизнеса. Сервис устанавливает индивидуальную ценовую политику. У мб отсутствует необходимость регулярно формировать подробные отчеты об использовании музыкальных произведений.</div>
                    <div class="questionsList__text questionsList__textmob">мб позволяет создать правильное музыкальное оформление для бизнеса. Сервис устанавливает индивидуальную ценовую политику. У мб отсутствует необходимость регулярно формировать подробные отчеты об использовании музыкальных произведений.</div>
                </div>
                <div class="questionsList__item wow fadeInUp">
                    <div class="questionsList__iconcont">
                        <div class="questionsList__icon">?</div>
                    </div>
                    <div class="questionsList__title show">Какое оборудование потребуется?
                        <i class="mdi mdi-chevron-down show_icon"></i>
                    </div>
                    <div class="questionsList__text">мб - очень гибкий сервис. Для быстрого и простого старта достаточно иметь на объекте устройство, воспроизводящее mp3 файлы. Для клиентов без затруднительного доступа в интернет на объекте или тем, которым требуются расширенные настройки, мы рекомендуем пользоваться личным кабинетом для сохранения и настройки музыки.</div>
                    <div class="questionsList__text questionsList__textmob">мб - очень гибкий сервис. Для быстрого и простого старта достаточно иметь на объекте устройство, воспроизводящее mp3 файлы. Для клиентов без затруднительного доступа в интернет на объекте или тем, которым требуются расширенные настройки, мы рекомендуем пользоваться личным кабинетом для сохранения и настройки музыки.</div>
                </div>
            </div>

            <div class="questions__btn wow fadeInUp">
                <a href="/help" class="btn btn__transpsrent">Помощь</a>
            </div>

        </div>
    </div>
<?php
    get_template_part( 'template-parts/footer_try' );
    ?>
    <script type="text/javascript">
        $(document)['ready'](function () {
            var animation = LoadAnim('SentSuccess', 'public/json/license.json', 1);
            animation.play();
        });
    </script>

<?php
get_footer();
