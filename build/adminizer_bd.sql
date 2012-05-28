-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Generation Time: May 26, 2012 at 11:17 AM
-- Server version: 5.1.56
-- PHP Version: 4.4.9
-- 
-- Database: `adminizer`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_accessLevels`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_accessLevels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `description_ru` varchar(20) DEFAULT NULL,
  `description_en` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `adminizer_accessLevels`
-- 

INSERT INTO `adminizer_accessLevels` VALUES (1, 1, 'Виден всем', 'Visible to all');
INSERT INTO `adminizer_accessLevels` VALUES (2, 2, 'Виден избранным', 'Visible to selected ');

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_admin`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `access` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `adminizer_admin`
-- 

INSERT INTO `adminizer_admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 777);

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_content`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `ru` varchar(4000) DEFAULT NULL,
  `en` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

-- 
-- Dumping data for table `adminizer_content`
-- 

INSERT INTO `adminizer_content` VALUES (1, 'login_word', 'Войти', 'Login');
INSERT INTO `adminizer_content` VALUES (2, 'logout_word', 'Выход', 'Logout');
INSERT INTO `adminizer_content` VALUES (3, 'post_word', 'Статьи', 'Posts');
INSERT INTO `adminizer_content` VALUES (4, 'name_word', 'Имя', 'Name');
INSERT INTO `adminizer_content` VALUES (5, 'password_word', 'Пароль', 'Password');
INSERT INTO `adminizer_content` VALUES (6, 'login_action_word', 'Войти', 'Login');
INSERT INTO `adminizer_content` VALUES (7, 'login_annotation', 'Введите Логин и Пароль для входа', 'Enter admin''s Login and Password to login');
INSERT INTO `adminizer_content` VALUES (8, 'login_error_message', 'Неправильная пара Логин/Пароль', 'Incorrect Password or Name');
INSERT INTO `adminizer_content` VALUES (9, 'adminizer_welcome', 'Наиболее легко изменяемая и настраиваемая система управления контентом в мире', 'Most easily customizable CMS in the world');
INSERT INTO `adminizer_content` VALUES (52, 'drop_box_message', '<h4 class="alert-heading">Перетащите картинки в это поле</h4>Для загрузки картинок перетащите их в это поле, одновременно можно загрузить до 9 файлов.', '<h4 class="alert-heading">Drag&Drop images here to upload.</h4> You may upload up to 9 files simultaneously');
INSERT INTO `adminizer_content` VALUES (10, 'add_new_word', 'Добавить', 'Add New');
INSERT INTO `adminizer_content` VALUES (11, 'save_word', 'Сохранить', 'Save');
INSERT INTO `adminizer_content` VALUES (12, 'sections_word', 'Разделы', 'Sections');
INSERT INTO `adminizer_content` VALUES (13, 'select_section_word', 'Выберите раздел', 'Please select section');
INSERT INTO `adminizer_content` VALUES (14, 'delete_word', 'Удалить', 'Delete');
INSERT INTO `adminizer_content` VALUES (15, 'delete_warning', 'Вы собираетесь удалить "%s". Данное действи не возможно отменить!', 'You are about to delete %s. This action is impossible to cancel!');
INSERT INTO `adminizer_content` VALUES (16, 'section_error_message', 'Все поля обязательны к заполнению', 'All fields is required');
INSERT INTO `adminizer_content` VALUES (17, 'access_public', 'Виден всем', 'Visible to all');
INSERT INTO `adminizer_content` VALUES (18, 'access_private', 'Виден избранным', 'Visible to superusers');
INSERT INTO `adminizer_content` VALUES (20, 'management_word', 'Управление Контентом', 'Content Management');
INSERT INTO `adminizer_content` VALUES (21, 'settings_word', 'Настройки Сайта', 'Site Settings');
INSERT INTO `adminizer_content` VALUES (22, 'privacy_levels', 'Уровни доступа', 'Privacy Levels');
INSERT INTO `adminizer_content` VALUES (23, 'change_warning_message', 'Изменяйте данные настройки с осторожностью!', 'Change this setting with caution!');
INSERT INTO `adminizer_content` VALUES (24, 'users_management_word', 'Пользователи', 'Users Management');
INSERT INTO `adminizer_content` VALUES (25, 'adminds_management_word', 'Администраторы', 'Admins');
INSERT INTO `adminizer_content` VALUES (26, 'logged_out_warning', 'Сессия работы с сайтом окончена или Вы вышли из аккаунта, пожалуйста перейдите на <a href="index.php">Главную страницу</a> и войдите повторно для продолжения работы', 'You are permanently logged out please go to <a href="index.php">Main Page</a> and login again');
INSERT INTO `adminizer_content` VALUES (27, 'registered_word', 'Зарегистрирован', 'Registered');
INSERT INTO `adminizer_content` VALUES (28, 'users_word', 'Пользователей', 'Registered Users');
INSERT INTO `adminizer_content` VALUES (29, 'send_email_word', 'Отправить письмо', 'Send Confirmation Email');
INSERT INTO `adminizer_content` VALUES (31, 'password_word', 'Пароль', 'Password');
INSERT INTO `adminizer_content` VALUES (32, 'email_ph', 'vasya_pupkin@domen.ru', 'john_black@domen.com');
INSERT INTO `adminizer_content` VALUES (33, 'name_ph', 'Имя (ФИО)', 'Full Name');
INSERT INTO `adminizer_content` VALUES (34, 'phone_ph', '+7(000)123 2323', '+1(000)123 3232');
INSERT INTO `adminizer_content` VALUES (35, 'access_code_word', 'Промо-коды', 'Promo-code');
INSERT INTO `adminizer_content` VALUES (36, 'access_code_main_word', 'Основные настройки', 'Main Settings');
INSERT INTO `adminizer_content` VALUES (37, 'promo_on_registration_word', 'Ввод при регистрации', 'Enter on registration');
INSERT INTO `adminizer_content` VALUES (38, 'promo_on_login_word', 'Ввод при входе', 'Enter on login');
INSERT INTO `adminizer_content` VALUES (39, 'promo_active_word', 'Использовать промо-коды', 'Activate promo-codes');
INSERT INTO `adminizer_content` VALUES (40, 'promo_generator_word', 'Генератор промо-кодов', 'Promo-codes generator');
INSERT INTO `adminizer_content` VALUES (41, 'promo_add_code_word', 'Добавить промо-код', 'Add promo-code');
INSERT INTO `adminizer_content` VALUES (42, 'promo_insert_promo_code', 'Введите промо-код', 'Insert promo-code here');
INSERT INTO `adminizer_content` VALUES (43, 'promo_code_word', 'Промо-код', 'Promo-code');
INSERT INTO `adminizer_content` VALUES (44, 'promo_used_word', 'Использован', 'Used');
INSERT INTO `adminizer_content` VALUES (45, 'promo_owner_word', 'Владелец', 'Owner');
INSERT INTO `adminizer_content` VALUES (46, 'qty_word', 'Количество', 'Quantity');
INSERT INTO `adminizer_content` VALUES (47, 'length_word', 'Длина', 'Length');
INSERT INTO `adminizer_content` VALUES (48, 'generate_word', 'Сгенерировать', 'Generate');
INSERT INTO `adminizer_content` VALUES (49, 'promo_user_level', 'Уровень доступа при использовании', 'Access level within promo-code');
INSERT INTO `adminizer_content` VALUES (50, 'title_word', 'Название', 'Title');
INSERT INTO `adminizer_content` VALUES (51, 'text_word', 'Текст, контент', 'Text goes here');
INSERT INTO `adminizer_content` VALUES (54, 'gallery_word', 'Галлерея', 'Gallery');
INSERT INTO `adminizer_content` VALUES (55, 'picture_word', 'медиа-файл', 'media-file');
INSERT INTO `adminizer_content` VALUES (53, 'media_lib_word', 'Медиатека', 'Media Library');
INSERT INTO `adminizer_content` VALUES (56, 'select_media_text', 'Выберите картинки для этого поста', 'Select media for this post');
INSERT INTO `adminizer_content` VALUES (57, 'more_word', 'Ещё...', 'More...');
INSERT INTO `adminizer_content` VALUES (58, 'site_content_word', 'Контент', 'Content');
INSERT INTO `adminizer_content` VALUES (59, 'usage_word', 'Использование', 'Usage');
INSERT INTO `adminizer_content` VALUES (61, 'no_page', 'Такой страницы не существует', 'No such page');
INSERT INTO `adminizer_content` VALUES (62, 'site_settings_usage', 'Из любого места вашего проекта вызовите функцию <code>getSiteSettings(''some_key'')</code> из класса <code>$main_class</code>. Смотрите пример ниже: 				<pre class="prettyprint linenums"> &lt;?= $main_class->getSiteSettings(''footer_sign''); ?&gt; //Зезультат: Powered by Adminizer</pre>', 'At any place of your project just call for <code>getSiteSettings(''some_key'')</code> function from <code>$main_class</code> class. See example below: 				<pre class="prettyprint linenums"> &lt;?= $main_class->getSiteSettings(''footer_sign''); ?&gt; //result: Powered by Adminizer</pre>');
INSERT INTO `adminizer_content` VALUES (63, 'site_content_usage', 'Из любого места вашего проекта вызовите функцию <code>getContent(''some_key'')</code> из класса <code>$main_class</code>. Вы автоматически получите контент из текущего языка. Смотрите пример ниже: 				<pre class="prettyprint linenums"> &lt;?= $main_class->getContent(''login_word''); ?&gt; //Результат: Войти</pre>', 'At any place of your project just call for <code>getContent(''some_key'')</code> function from <code>$main_class</code> class. It automatically gets content from current language. See example below: 				<pre class="prettyprint linenums"> &lt;?= $main_class->getContent(''login_word''); ?&gt; //result: Login</pre>');
INSERT INTO `adminizer_content` VALUES (64, 'registration_email_text', 'Поздравляем с регистрацией<br> 	<strong>Ваш логин:</strong> %1$s<br> 	<strong>Пароль:</strong> %2$s<br>', 'You have been registered<br> 	<strong>Yours login:</strong> %1$s<br> 	<strong>Yours Password:</strong> %2$s<br>');
INSERT INTO `adminizer_content` VALUES (65, 'registration_email_subject', 'Регистрация', 'Registration');
INSERT INTO `adminizer_content` VALUES (66, 'meta_description', '', '');
INSERT INTO `adminizer_content` VALUES (67, 'site_title', 'Adminizer CMS by Veliov Group', 'Adminizer CMS by Veliov Group');
INSERT INTO `adminizer_content` VALUES (69, 'footer_text', '<h6><a href="./?ru=1">Русская Версия</a> | <a href="./?en=1">English Version</a></h6>', '<h6><a href="./?ru=1">Русская Версия</a> | <a href="./?en=1">English Version</a></h6>');
INSERT INTO `adminizer_content` VALUES (70, 'deleted_word', 'Удалено', 'DELETED');
INSERT INTO `adminizer_content` VALUES (71, 'permissions_denied', 'У Вас не достаточно прав на совершение этого действия', 'Permission denied');
INSERT INTO `adminizer_content` VALUES (72, 'success_login', 'Вы успешно вошли!', 'Successfully logged in!');
INSERT INTO `adminizer_content` VALUES (73, 'success_logout', 'Вы успешно вышли', 'You''re successfully logged out');
INSERT INTO `adminizer_content` VALUES (74, 'edit_word', 'Редактировать', 'Edit');
INSERT INTO `adminizer_content` VALUES (75, 'read_all_word', 'Читать далее', 'Continue');

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_lang_table`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_lang_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(10) DEFAULT NULL,
  `fb_lang` varchar(10) DEFAULT NULL,
  `text_lang` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `adminizer_lang_table`
-- 

INSERT INTO `adminizer_lang_table` VALUES (1, 'ru', 'ru_RU', 'Русский');
INSERT INTO `adminizer_lang_table` VALUES (2, 'en', 'en_US', 'English');

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_media`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;


-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_posts`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `text` text,
  `when` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `access` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `media` varchar(200) DEFAULT NULL,
  `lang` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_promo_settings`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_promo_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `adminizer_promo_settings`
-- 

INSERT INTO `adminizer_promo_settings` VALUES (1, 'active', 0);
INSERT INTO `adminizer_promo_settings` VALUES (2, 'on_registration', 0);
INSERT INTO `adminizer_promo_settings` VALUES (3, 'on_login', 0);
INSERT INTO `adminizer_promo_settings` VALUES (5, 'user_level', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_promocodes`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_promocodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `used` int(11) DEFAULT '0',
  `owner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `adminizer_promocodes`
-- 

INSERT INTO `adminizer_promocodes` VALUES (1, '96762324773231551794439929191513', 0, NULL);
INSERT INTO `adminizer_promocodes` VALUES (2, 'WQER-2342-SADC-43DS', 0, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_section`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_section` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `lang` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `adminizer_section`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_site_settings`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_site_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `value` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `adminizer_site_settings`
-- 

INSERT INTO `adminizer_site_settings` VALUES (1, 'primary_url', '');
INSERT INTO `adminizer_site_settings` VALUES (2, 'site_email', '');
INSERT INTO `adminizer_site_settings` VALUES (4, 'no-reply_email', '');
INSERT INTO `adminizer_site_settings` VALUES (9, 'google_analystics', '');
INSERT INTO `adminizer_site_settings` VALUES (10, 'meta_tags', '');
INSERT INTO `adminizer_site_settings` VALUES (11, 'meta_creator', '');
INSERT INTO `adminizer_site_settings` VALUES (16, 'default_loader', '<div style="min-width:80px" class="progress progress-striped active"><div class="bar" style="width: 100%"></div></div>');
INSERT INTO `adminizer_site_settings` VALUES (13, 'footer_sign', 'Powered by &copy; <a href="http://adminizer.veliovgroup.com">Adminizer</a>');

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_users`
-- 

CREATE TABLE IF NOT EXISTS `adminizer_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `access` int(11) DEFAULT NULL,
  `when` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `adminizer_users`
-- 
