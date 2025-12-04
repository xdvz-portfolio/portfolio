<?php
/*
 * Template name: Запрос (подключить)
 * */

get_header();
?>
    <div class="section request message">
        <div class="container_center anim_cont">

            <h1 class="message__title sectionTitle wow fadeInUp">Заявка</h1>

            <div class="messageList wow fadeInUp" id="list">
                <div class="messageContainer">
                    <div class="messageList__left">
                        <div class="messageList__title">Получить тестовый <small>(на 3 дня)</small> или полный доступ.</div>
                        <form class="messageList__form" id="messageList__form">
                            <div class="messageList__row">
                                <div class="messageList__item">
                                    <label for="first_name">Название компании</label>
                                    <input id="first_name" name="first_name" type="text" placeholder="Название">
                                </div>
                                <div class="messageList__item">
                                    <label for="last_name">ФИО</label>
                                    <input id="last_name" name="last_name" type="text" placeholder="Иванов Иван Иванович">
                                </div>
                            </div>
                            <div class="messageList__row">
                                <label for="email">Электронная почта</label>
                                <input id="email" name="email" type="email" value="" placeholder="kafeshka@mail.com">
                            </div>
                            <div class="messageList__row">
                                <label for="phone">Номер телефона</label>
                                <input id="phone" name="phone" type="tel" value="" placeholder="7 999 999 99 99">
                            </div>
                            <div class="messageList__row">
                                <label for="region">Регион</label>
                                <select id="region" name="region" data-live-search="true" multiple></select>
                            </div>
                            <div class="messageList__row">
                                <div class="messageList__item">
                                    <label for="company">Сфера деятельности</label>
                                    <input id="company" name="company" type="text" placeholder="Сфера">
                                </div>
                                <div class="messageList__item no-search">
                                    <label for="company-type">Тип предприятия</label>
                                    <select id="company-type" name="company-type"></select>
                                </div>
                                <!--                            <div class="messageList__item">-->
                                <!--                                <label for="company">Название компании</label>-->
                                <!--                                <input id="company" name="company" type="text" placeholder="ООО Кафешка">-->
                                <!--                            </div>-->
                            </div>

                            <div class="messageList__row">
                                <div class="messageList__item no-search">
                                    <label for="tariff">Выбранный тариф</label>
                                    <select id="tariff" name="tariff"></select>
                                </div>

                                <div class="messageList__item no-search">
                                    <label for="period">Выбранный период</label>
                                    <select id="period" name="period"></select>
                                </div>
                            </div>
                            <div class="messageList__row">
                                <label for="">Размер предприятия (количество объектов)</label>
                                <input type="radio" name="company-size" value="1-5" id="company-size5" placeholder="">
                                <label class="label__radio" for="company-size5">1 - 5</label>

                                <input type="radio" name="company-size" value="6-50" id="company-size50" placeholder="">
                                <label class="label__radio" for="company-size50">6 - 50</label>

                                <input type="radio" name="company-size" value="51-200" id="company-size200" placeholder="">
                                <label class="label__radio" for="company-size200">51 - 200</label>

                                <input type="radio" name="company-size" value="201-1000" id="company-size1000" placeholder="">
                                <label class="label__radio" for="company-size1000">201 - 1000</label>

                                <input type="radio" name="company-size" value="1001+" id="company-size1001" placeholder="">
                                <label class="label__radio" for="company-size1001">1001+</label>
                            </div>
                            <div class="messageList__row">
                                <input id="rules" name="rules" type="checkbox" value="1" checked="">
                                <label class="label__check" for="rules">Я даю свое согласие на обработку персональных данных в соответствии с <a href="policy.html"><span>Политикой конфиденциальности</span></a>, а также соглашаюсь с условиями <a href="agreement.html"><span>Пользовательского соглашения.</span></a></label>
                            </div>
                            <div class="messageList__row">
                                <a href="#list" class="btn send__btn" id="submitForm" data-scroll-to>Отправить</a>
                            </div>
                        </form>
                    </div>
                    <div class="messageList__right">
                        <div class="messageList__title title_cafe">ООО "Кафешка"</div>
                        <form class="messageList__form" id="messageList__form">
                            <div class="messageList__row">
                                <label for="ogrn">ОГРН</label>
                                <input id="ogrn" name="email" type="text" value="" placeholder="3333333333">
                            </div>
                            <div class="messageList__row">
                                <label for="kpp">КПП</label>
                                <input id="kpp" name="phone" type="text" value="" placeholder="3333333333">
                            </div>
                            <div class="messageList__row">
                                <label for="ryk">Руководитель</label>
                                <input id="ryk" name="phone" type="text" value="" placeholder="Иванов Иван Иванович">
                            </div>
                            <div class="messageList__row">
                                <label for="dir">Должность руководителя</label>
                                <input id="dir" name="phone" type="text" value="" placeholder="Директор">
                            </div>
                            <div class="messageList__row">
                                <label for="adr">Юридический адрес</label>
                                <input id="adr" name="phone" type="text" value="" placeholder="199666, Иркутск, ул. Кафей">
                            </div>
                            <div class="messageList__row">
                                <label for="namekafe">Наименование объекта</label>
                                <input id="namekafe" name="phone" type="text" value="" placeholder="Кафе Кафешка ">
                            </div>
                            <div class="messageList__row">
                                <label for="adr1">Фактический адрес</label>
                                <input id="adr1" name="phone" type="text" value="" placeholder="199666, Иркутск, ул. Кафей">
                            </div>
                            <div class="messageList__row">
                                <label class="label_text">Информацию о других объектах и банковские реквизиты вы сможете предоставить в личном кабинете в разделе “Аккаунт” -> “Сведения о компании.”</label>

                            </div>
                        </form>
                        <!--                    <div class="messageList__title">мб включит правильную музыку в нужное время в нужном месте.</div>-->
                        <!--                    <div class="messageList__img"><img src="img/message__img.png" alt=""></div>-->
                        <div class="messageList__logo">
                            mb
                        </div>
                    </div>
                </div>

<!--                {% include "partials/sent_notification.html" %}-->
            </div>

        </div>
    </div>
<?php
get_template_part( 'template-parts/mbc' );
?>
    <script src="<?php bloginfo('template_url'); ?>/mb-base/public/js/app.js"></script>
    <script type="text/javascript">

        //dadata start

        var token = "e4ab373144ce45f889e7199dfb1884b7449716ca";

        function join(arr /*, separator */) {
            var separator = arguments.length > 1 ? arguments[1] : ", ";
            return arr.filter(function(n){return n}).join(separator);
        }

        function typeDescription(type) {
            var TYPES = {
                'INDIVIDUAL': 'Индивидуальный предприниматель',
                'LEGAL': 'Организация'
            }
            return TYPES[type];
        }

        function showSuggestion(suggestion) {
            console.log(suggestion);
            var data = suggestion.data;
            if (!data)
                return;

            $("#type").text(
                typeDescription(data.type) + " (" + data.type + ")"
            );

            if (data.name) {
                $("#name_short").val(data.name.short_with_opf || "");
                $("#namekafe").val(data.name.full_with_opf || "");
            }

            if (data.ogrn){
                $("#ogrn").val(data.ogrn);
            }

            if (data.kpp){
                $("#kpp").val(data.kpp);
            }

            if (data.management.name){
                $("#ryk").val(data.management.name)
            }
            if (data.management.post){
                $("#dir").val(data.management.post)
            }



            if (data.address) {
                var address = "";
                if (data.address.data.qc == "0") {
                    address = join([data.address.data.postal_code, data.address.value]);
                } else {
                    address = data.address.data.source;
                }
                $("#adr").val(address);
            }
        }

        $("#first_name").suggestions({
            token: token,
            type: "PARTY",
            count: 5,
            /* Вызывается, когда пользователь выбирает одну из подсказок */
            onSelect: showSuggestion
        });


        //dadata end




        const urlParams = new URLSearchParams(window.location.search);

        $(document)['ready'](function () {
            var tariffTypeValue = parseInt(urlParams.get('type'));
            var companyTypeValue = parseInt(urlParams.get('companyType'));
            var paymentPeriodValue = urlParams.get('payment');

            var animation = LoadAnim('SentSuccess', 'public/json/letter-fly.json', 0.3);
            var checkAnim = LoadAnim('SentSuccess2', 'public/json/check.json', 1);

            var formSubmit = $('#submitForm');
            var form = $("#messageList__form");
            formSubmit.on('click', function (event) {
                event.preventDefault();
                if(!form.valid()) return;

                var jsonData = getFormData($(form));
                jsonData['ticket-type'] = 1;
                jsonData['header'] = 'Запрос на подключение с сайта';
                if (jsonData['tariff'] === 'Тест-Плей') {
                    jsonData['ticket-type'] = 4;
                    jsonData['header'] = 'Запрос на тест-плей';
                }
                jsonData['period'] = paymentPeriodValue === 'true' ? 'Год' : 'Квартал' ;
                $.ajax({
                    url: 'request.php',
                    method: 'POST',
                    data: JSON.stringify(jsonData),
                    dataType: "html",
                    contentType: "application/json;charset=utf-8",
                    success: function(data, status, xhr) {
                        console.log(data);
                        form.trigger('reset');
                        SendBtnClick();
                        animation.play();
                    },
                    error: function(err, textStatus, errorThrown) {
                        console.log(err);
                    }
                });
            });

            var phoneMask = IMask($('#phone').get(0), {
                mask: '0 (000) 000-000[0]',
                lazy: false,
                signed: false,
                placeholderChar: '_'
            });

            var region = $('#region').select2({
                width: '100%',
                placeholder: 'Выберите регион',
                allowClear: true
            });

            var companyType = $('#company-type').select2({
                width: '100%',
                placeholder: 'Выберите тип компании',
                allowClear: false
            });

            var tariff = $('#tariff').select2({
                width: '100%',
                placeholder: 'Выберите тариф',
                allowClear: false
            });

            var period = $('#period').select2({
                width: '100%',
                placeholder: 'Выберите период',
                allowClear: false
            });

            var companyTypesList = COMPANY_TYPES;
            var tariffTypesList = TARIFFS;
            var PERIOD_TYPES = [
                {id: 'Год', text: 'Год'},
                {id: 'Квартал', text: 'Квартал'}
            ];
            var periodTypesList = PERIOD_TYPES;

            var i;

            if (paymentPeriodValue !== null) {
                periodTypesList = [];
                PERIOD_TYPES.forEach(function (p) {
                    p['selected'] = p['id'] === paymentPeriodValue;
                    periodTypesList.push(p);
                });
            }

            if (companyTypeValue !== null && !isNaN(companyTypeValue)) {
                companyTypesList = [];
                i = 0;
                COMPANY_TYPES.forEach(function (ct) {
                    ct['selected'] = i === companyTypeValue;
                    i ++;
                    companyTypesList.push(ct);
                });
            }

            if (tariffTypeValue !== null && !isNaN(tariffTypeValue)) {
                tariffTypesList = [];
                i = 0;
                TARIFFS.forEach(function (ct) {
                    ct['selected'] = i === tariffTypeValue;
                    i ++;
                    tariffTypesList.push(ct);
                });
            }

            region.select2({
                data: RUSSIA_CITIES,
                maximumSelectionLength: 9
            });
            companyType.select2({
                data: companyTypesList,
                dropdownCssClass: 'no-search'
            });
            tariff.select2({
                data: tariffTypesList,
                dropdownCssClass: 'no-search'
            });
            period.select2({
                data: periodTypesList,
                dropdownCssClass: 'no-search'
            });

            form.validate({
                errorPlacement: function(error, element) {
                    //just nothing, empty
                },
                rules: {
                    first_name: {
                        "required": !![],
                        "minlength": 3
                    },
                    last_name: {
                        "required": !![],
                        "minlength": 3
                    },
                    company: {
                        "required": !![],
                        "minlength": 3
                    },
                    region: "required",
                    tariff: "required",
                    period: "required",
                    "company-size": "required",
                    rules: "required",
                    email: {
                        "required": !![],
                        "email": !![]
                    },
                    phone: {
                        "required": !![],
                        validPhoneMask: [phoneMask]
                    }
                },
                messages: {
                    "first_name": "",
                    "last_name": "",
                    "company": "",
                    "region": "",
                    "rules": "",
                    "email": "",
                    "phone": "",
                    "tariff": "",
                    "company-type": "",
                    "company-size": ""
                }
            });

            $('input, select', form).bind('keyup blur click change', function () {
                if (form.validate().checkForm()) {
                    formSubmit.removeClass('disabled');
                } else {
                    formSubmit.addClass('disabled');
                }
            });

            animation.play();
            checkAnim.play();
        });
    </script>
<?php
get_footer();