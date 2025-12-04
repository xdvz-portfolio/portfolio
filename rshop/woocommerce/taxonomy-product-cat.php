<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Определяем основные категории товаров
 */
$main_categories = array(
    'kozha',       // Кожа
    'instrumenty', // Инструменты
    'himiya',      // Химия
    'furnitura',   // Фурнитура
    'nitki'        // Нитки
);

/**
 * Отображает блок с категориями и их изображениями
 * 
 * @param array $categories Массив с данными категорий
 * @param string $base_url URL-путь к директории с изображениями
 */
function rshop_display_category_blocks($categories, $base_url) {
    ?>
    <div class="section-categories">
        <div class="section-categories__wrapper">
            <div class="section-categories__row">
                <?php foreach ($categories as $category) : ?>
                    <div class="section-categories__item grow">
                        <a href="<?php echo esc_url($category['url']); ?>" class="section-categories__link">
                            <img src="<?php echo esc_url($base_url . $category['image']); ?>" alt="<?php echo esc_attr($category['alt']); ?>"/>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}

if (is_product_category($main_categories)) {
    
    get_header('shop');
    
    // Массивы с данными о категориях
    if (is_product_category('kozha')) {
        $leather_categories = array(
            array(
                'url' => '/category/kozha/avtomobilnaya-mebelnaya/',
                'image' => '/assets/category-images/koja/auto.png',
                'alt' => 'Автомобильная кожа'
            ),
            array(
                'url' => '/category/kozha/ovchina-koza/',
                'image' => '/assets/category-images/koja/ovchina.png',
                'alt' => 'Кожа овчина, коза'
            ),
            array(
                'url' => '/category/kozha/dlya-golovnyh-uborov/krs-bychina/',
                'image' => '/assets/category-images/koja/krs.png',
                'alt' => 'Кожа КРС, Бычина'
            ),
            array(
                'url' => '/category/kozha/dlya-golovnyh-uborov/svinaya/',
                'image' => '/assets/category-images/koja/svinnaya.png',
                'alt' => 'Кожа свинная'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/liczevaya/',
                'image' => '/assets/category-images/koja/licevaya.png',
                'alt' => 'Кожа лицевая'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/print-tisnenie-lak-pull-ap/',
                'image' => '/assets/category-images/koja/printlak.png',
                'alt' => 'Кожа принт, тиснение, лак, пулл ап'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/nubuk-velyur/',
                'image' => '/assets/category-images/koja/nubuk.png',
                'alt' => 'Кожа нубук, велюр'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/rastitelnoe-dublenie/',
                'image' => '/assets/category-images/koja/dublenie.png',
                'alt' => 'Кожа растительное дубление'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/krast/',
                'image' => '/assets/category-images/koja/krast.png',
                'alt' => 'Кожа краст'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/shorno-sedalnaya/',
                'image' => '/assets/category-images/koja/shorno-sed.png',
                'alt' => 'Кожа шорно седельная'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/remennaya/',
                'image' => '/assets/category-images/koja/remennaya.png',
                'alt' => 'Кожа ременная'
            ),
            array(
                'url' => '/category/kozha/galanterejnaya/remennye-zagotovki/',
                'image' => '/assets/category-images/koja/remennie.png',
                'alt' => 'Ременные заготовки'
            ),
            array(
                'url' => '/category/kozha/obuvnaya/dlya-verha-obuvi/',
                'image' => '/assets/category-images/koja/dlya-verha.png',
                'alt' => 'Кожа для верха обуви'
            ),
            array(
                'url' => '/category/kozha/obuvnaya/podkladochnaya/',
                'image' => '/assets/category-images/koja/podkladochnaya.png',
                'alt' => 'Кожа подкладочная'
            )
        );
        
        rshop_display_category_blocks($leather_categories, get_stylesheet_directory_uri());
    }
    
    if (is_product_category('instrumenty')) {
        $tools_categories = array(
            array(
                'url' => '/category/instrumenty/rezhushhij-instrument/',
                'image' => '/assets/category-images/instrumenti/rejushiy.png',
                'alt' => 'Режущий инструмент'
            ),
            array(
                'url' => '/category/instrumenty/igly/',
                'image' => '/assets/category-images/instrumenti/igly.png',
                'alt' => 'Иглы'
            ),
            array(
                'url' => '/category/instrumenty/lekala-razmetka/',
                'image' => '/assets/category-images/instrumenti/lekala.png',
                'alt' => 'Лекала'
            ),
            array(
                'url' => '/category/instrumenty/probojniki-shila/',
                'image' => '/assets/category-images/instrumenti/shila.png',
                'alt' => 'Шила'
            ),
            array(
                'url' => '/category/instrumenty/prochie-prinadlezhnosti/',
                'image' => '/assets/category-images/instrumenti/prochee.png',
                'alt' => 'Прочий инструмент'
            )
        );
        
        rshop_display_category_blocks($tools_categories, get_stylesheet_directory_uri());
    }
    
    if (is_product_category('himiya')) {
        $chemistry_categories = array(
            array(
                'url' => '/category/himiya/kraska-pronikayushhaya/',
                'image' => '/assets/category-images/himiya/pronikaushaya.png',
                'alt' => 'Краска проникающая'
            ),
            array(
                'url' => '/category/himiya/kraska-voskovaya/',
                'image' => '/assets/category-images/himiya/vosk.png',
                'alt' => 'Воск'
            ),
            array(
                'url' => '/category/himiya/kraska-dlya-urezov/',
                'image' => '/assets/category-images/himiya/urezov.png',
                'alt' => 'Краска для урезов'
            ),
            array(
                'url' => '/category/himiya/kraska-poliuretanovaya/',
                'image' => '/assets/category-images/himiya/poliuretanovaya.png',
                'alt' => 'Краска полиуретановая'
            ),
            array(
                'url' => '/category/himiya/klej/',
                'image' => '/assets/category-images/himiya/kley.png',
                'alt' => 'Клей'
            ),
            array(
                'url' => '/category/himiya/finish/',
                'image' => '/assets/category-images/himiya/finish.png',
                'alt' => 'Финиш'
            )
        );
        
        rshop_display_category_blocks($chemistry_categories, get_stylesheet_directory_uri());
    }
    
    if (is_product_category('furnitura')) {
        $furniture_categories = array(
            array(
                'url' => '/category/furnitura/zamki/',
                'image' => '/assets/category-images/furnitura/zamki.png',
                'alt' => 'Замки'
            ),
            array(
                'url' => '/category/furnitura/kolcza-ramki-karabiny/',
                'image' => '/assets/category-images/furnitura/kolca.png',
                'alt' => 'Кольца, рамки, карабины'
            ),
            array(
                'url' => '/category/furnitura/knopki-lyuversy-holniteny-pukli/',
                'image' => '/assets/category-images/furnitura/knopki.png',
                'alt' => 'Кнопки, люверсы, хольнитерны, пукли'
            ),
            array(
                'url' => '/category/furnitura/molnii/',
                'image' => '/assets/category-images/furnitura/molnii.png',
                'alt' => 'Молнии'
            ),
            array(
                'url' => '/category/furnitura/pryazhki/',
                'image' => '/assets/category-images/furnitura/pryajki.png',
                'alt' => 'Пряжки'
            ),
            array(
                'url' => '/category/furnitura/czepi/',
                'image' => '/assets/category-images/furnitura/cepi.png',
                'alt' => 'Цепи'
            ),
            array(
                'url' => '/category/furnitura/stropy/',
                'image' => '/assets/category-images/furnitura/stropi.png',
                'alt' => 'Стропы'
            ),
            array(
                'url' => '/category/furnitura/kozhkarton/',
                'image' => '/assets/category-images/furnitura/kojkarton.png',
                'alt' => 'Кожкартон'
            ),
            array(
                'url' => '/category/furnitura/prochee/',
                'image' => '/assets/category-images/furnitura/prochee.png',
                'alt' => 'Прочая фурнитура'
            )
        );
        
        rshop_display_category_blocks($furniture_categories, get_stylesheet_directory_uri());
    }
    
    if (is_product_category('nitki')) {
        $thread_categories = array(
            array(
                'url' => '/category/nitki/dlya-mashinnogo-shva/',
                'image' => '/assets/category-images/nitki/mashinniy-shov.png',
                'alt' => 'Нитки для машинного шва'
            ),
            array(
                'url' => '/category/nitki/dlya-ruchnogo-shva/',
                'image' => '/assets/category-images/nitki/ruchnoy-shov.png',
                'alt' => 'Нитки для ручного шва'
            )
        );
        
        rshop_display_category_blocks($thread_categories, get_stylesheet_directory_uri());
    }
    
    get_footer('shop');
} else {
    wc_get_template('archive-product.php');
}







