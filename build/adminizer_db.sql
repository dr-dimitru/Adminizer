-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsqlmoo16
-- Generation Time: Jun 12, 2012 at 10:50 AM
-- Server version: 5.1.56
-- PHP Version: 4.4.9
-- 
-- Database: `adminizer`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_accessLevels`
-- 

CREATE TABLE `adminizer_accessLevels` (
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

CREATE TABLE `adminizer_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `access` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `adminizer_admin`
-- 

INSERT INTO `adminizer_admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 777);

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_content`
-- 

CREATE TABLE `adminizer_content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `ru` varchar(4000) DEFAULT NULL,
  `en` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

-- 
-- Dumping data for table `adminizer_content`
-- 

INSERT INTO `adminizer_content` VALUES (1, 'login_word', 'Вход', 'Login');
INSERT INTO `adminizer_content` VALUES (2, 'logout_word', 'Выход', 'Logout');
INSERT INTO `adminizer_content` VALUES (3, 'post_word', 'Статьи', 'Posts');
INSERT INTO `adminizer_content` VALUES (4, 'name_word', 'Имя', 'Name');
INSERT INTO `adminizer_content` VALUES (5, 'password_word', 'Пароль', 'Password');
INSERT INTO `adminizer_content` VALUES (6, 'login_action_word', 'Войти', 'Login');
INSERT INTO `adminizer_content` VALUES (7, 'login_annotation', 'Введите Логин и Пароль для входа', 'Enter admin''s Login and Password to login');
INSERT INTO `adminizer_content` VALUES (8, 'login_error_message', 'Неправильная пара Логин/Пароль', 'Incorrect Password or Name');
INSERT INTO `adminizer_content` VALUES (9, 'adminizer_welcome', '<p>Наиболее легко изменяемая и настраиваемая система управления контентом в мире</p><p>Попробуйте сейчас: <a href="/admin" onclick=" _gaq.push([''_trackEvent'', ''demo'', ''go_to_demo'', ''Test admin side'']);" data-original-title="Попробуйте сейчас! Логин и пароль: <b>guest</b>">CMS</a>. Пароль и логин: <strong>guest</strong></p>', '<p>Most easily customizable CMS in the world<p><p>Try it right now: <a href="/admin" onclick=" _gaq.push([''_trackEvent'', ''demo'', ''go_to_demo'', ''Test admin side'']);" data-original-title="Try it now! Login and pass: <b>admin</b>">CMS</a>. Password and login: <strong>guest</strong></p>');
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
INSERT INTO `adminizer_content` VALUES (64, 'registration_email_text', 'Поздравляем с регистрацией на Adminizer.VeliovGroup.com<br> 	<strong>Ваш логин:</strong> %1$s<br> 	<strong>Пароль:</strong> %2$s<br>', 'You have been registered at Adminizer.VeliovGroup.com<br> 	<strong>Yours login:</strong> %1$s<br> 	<strong>Yours Password:</strong> %2$s<br>');
INSERT INTO `adminizer_content` VALUES (65, 'registration_email_subject', 'Регистрация на проекте Veliov Group: Adminizer', 'Registration at Veliov Group: Adminizer');
INSERT INTO `adminizer_content` VALUES (66, 'meta_description', 'Adminizer CMS: Мы совместили Bootstrap front-end toolkit и систему управления сайтом от Veliov Group. Adminizer - это легко изменяемая и адаптируемая система управления сайтом', 'We''re combine Bootstrap frontend toolkit from Twitter and CMS by Veliov Group. And we''re got Adminizer CMS: Most easily customizable Content Management System in the world');
INSERT INTO `adminizer_content` VALUES (78, 'view_on_gh_word', 'Посмотреть проект на GitHub', 'View project on GitHub');
INSERT INTO `adminizer_content` VALUES (79, 'download_admin_word', 'Скачать Adminizer <small>(v0.1)</small>', 'Download Adminizer <small>(v0.1)</small>');
INSERT INTO `adminizer_content` VALUES (80, 'try_it_word', 'Попробуйте в действии', 'Try it now!');
INSERT INTO `adminizer_content` VALUES (67, 'site_title', 'Adminizer CMS: Наиболее легко изменяемая и настраиваемая система управления контентом в мире', 'Adminizer CMS: Most easily customizable Content Management System in the world');
INSERT INTO `adminizer_content` VALUES (69, 'footer_text', '<h6><a href="./?ru=1">Русская Версия</a> | <a href="./?en=1">English Version</a></h6> 	<h6>© <a href="http://veliovgroup.com">Veliov Group</a> 2012. Все права защищены.</h6> 	<h6>Абсолютные права принадлежат владельцу сайта.</h6> 	<h6>Напишите нам: info(AT)veliov.com</h6> 	<h6>Наши web-проекты прекрасно выглядят на вашем iPad''е | Разработка под Webkit и полезные сервисы</h6> 	<h6><a href="http://adminizer.veliovgroup.com">Adminizer.VeliovGroup.com</a></h6>', '<h6><a href="./?ru=1">Русская Версия</a> | <a href="./?en=1">English Version</a></h6> 	<h6>© <a href="http://veliovgroup.com">Veliov Group</a> 2012. All Rights Reserved.</h6> 	<h6>Absolute rights belongs to site owner.</h6> 	<h6>Email us: info(AT)veliov.com</h6> 	<h6>Our web-projects is perfect for your iPad | Webkit development and useful services</h6> 	<h6><a href="http://adminizer.veliovgroup.com">Adminizer.VeliovGroup.com</a></h6>');
INSERT INTO `adminizer_content` VALUES (70, 'deleted_word', 'Удалено', 'DELETED');
INSERT INTO `adminizer_content` VALUES (71, 'permissions_denied', 'У Вас не достаточно прав на совершение этого действия', 'Permission denied');
INSERT INTO `adminizer_content` VALUES (72, 'success_login', 'Вы успешно вошли!', 'Successfully logged in!');
INSERT INTO `adminizer_content` VALUES (73, 'success_logout', 'Вы успешно вышли', 'You''re successfully logged out');
INSERT INTO `adminizer_content` VALUES (74, 'edit_word', 'Редактировать', 'Edit');
INSERT INTO `adminizer_content` VALUES (77, 'read_all_word', 'Читать далее', 'Continue');
INSERT INTO `adminizer_content` VALUES (81, 'login_email_word', 'Логин (email)', 'Login (email)');
INSERT INTO `adminizer_content` VALUES (82, 'promo_code_annotation', 'Если Вам не известен Промо-код оставьте это поле пустым', 'If you don''t know Promo-code - left this field blank');
INSERT INTO `adminizer_content` VALUES (83, 'incorrect_login_message', 'Вы ввели неверный логин или Вы не зарегистрированны в системе!', 'Incorrect login or you''re not registered!');
INSERT INTO `adminizer_content` VALUES (84, 'empty_login_message', 'Введите логин (Ваш email) для входа', 'Enter yours login (email)');
INSERT INTO `adminizer_content` VALUES (85, 'incorrect_pass_message', 'Вы ввели неверный пароль!', 'Incorrect password!');
INSERT INTO `adminizer_content` VALUES (86, 'others_promo_message', 'Вы ввели неверный или чужой промо-код', 'You entered an invalid or someone else''s promo-code');
INSERT INTO `adminizer_content` VALUES (87, 'non_exsist_promo_message', 'Вы ввели неверный или несуществующий промо-код', 'You entered an invalid or non-existent promo-code');
INSERT INTO `adminizer_content` VALUES (88, 'user_success_login', '<div class="alert alert-success">Вы успешно вошли! <a href="index.php">Продолжить работу с сайтом</a></div>', '<div class="alert alert-success">You''re successfully logged in! <a href="index.php">Continue</a></div>');
INSERT INTO `adminizer_content` VALUES (89, 're_password_word', 'Повторите пароль', 'Retype password');
INSERT INTO `adminizer_content` VALUES (90, 'registration_word', 'Регистрация', 'Sign up');
INSERT INTO `adminizer_content` VALUES (91, 'registration_action_word', 'Зарегистрироваться', 'Registration');
INSERT INTO `adminizer_content` VALUES (92, 'incorrect_pass_repass', 'Пароль и подтверждение пароля разные!', 'Password and confirmation password are different!');
INSERT INTO `adminizer_content` VALUES (93, 'incorrect_email_message', 'Поле Логин (email) заполненно не корректно. Прим.: name@domen.ru', 'Login (email) field is incorrect, Ex.: name@domen.ru');
INSERT INTO `adminizer_content` VALUES (94, 'name_error_message', 'Поле имя должно быть заполнено и содержать не менее 3-х символов.', '"Name" field must be filled out and contain at least 3 characters.');
INSERT INTO `adminizer_content` VALUES (95, 'password_error', 'Введите пароль для для регистрации.', 'Enter a password to sign up.');
INSERT INTO `adminizer_content` VALUES (96, 'user_success_signup', '<div class="alert alert-success">Вы успешно зарегистрированы! <a href="index.php">Продолжить работу с сайтом</a></div>', '<div class="alert alert-success">You''re successfully signup! <a href="index.php">Continue</a></div>');
INSERT INTO `adminizer_content` VALUES (97, 'registered_message', 'Такой "Логин (email)" уже зарегистрирован, если Вы забыли пароль воспользуйтесь "Восстановлением пароля"', 'This "Login (email)" already registered, if you forget yours password use password recovery tool.');
INSERT INTO `adminizer_content` VALUES (98, 'pass_recovery_word', 'Восстановление пароля', 'Password recovery');
INSERT INTO `adminizer_content` VALUES (99, 'password_recovery_email_text', 'Восстановление пароля на Adminizer.VeliovGroup.com<br /> <strong>Ваш логин:</strong> %1$s<br /> <strong>Новый Пароль:</strong> %2$s<br />', 'Password recovery at Adminizer.VeliovGroup.com<br /> <strong>Login:</strong> %1$s<br /> <strong>New Password:</strong> %2$s<br />');
INSERT INTO `adminizer_content` VALUES (100, 'password_recovery_email_subject', 'Восстановление пароля на Adminizer.VeliovGroup.com', 'Password recovery at Adminizer.VeliovGroup.com');
INSERT INTO `adminizer_content` VALUES (101, 'user_success_recovery', '<div class="alert alert-success">Новый пароль выслан Вам на указанный email</div>', '<div class="alert alert-success">You successfully restored your password, go check your email!</div>');
INSERT INTO `adminizer_content` VALUES (102, 'pass_recovery_action_word', 'Восстановить пароль', 'Get new password');

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_lang_table`
-- 

CREATE TABLE `adminizer_lang_table` (
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

CREATE TABLE `adminizer_media` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_posts`
-- 

CREATE TABLE `adminizer_posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `text` text,
  `when` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `access` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `media` varchar(200) DEFAULT NULL,
  `qr_code` varchar(100) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `tags` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;


-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_promo_settings`
-- 

CREATE TABLE `adminizer_promo_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `adminizer_promo_settings`
-- 

INSERT INTO `adminizer_promo_settings` VALUES (1, 'active', 1);
INSERT INTO `adminizer_promo_settings` VALUES (2, 'on_registration', 1);
INSERT INTO `adminizer_promo_settings` VALUES (3, 'on_login', 1);
INSERT INTO `adminizer_promo_settings` VALUES (5, 'user_level', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_promocodes`
-- 

CREATE TABLE `adminizer_promocodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `used` int(11) DEFAULT '0',
  `owner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `adminizer_promocodes`
-- 

INSERT INTO `adminizer_promocodes` VALUES (1, '96762324773231551794439929191513', 0, NULL);
INSERT INTO `adminizer_promocodes` VALUES (2, 'WQER-2342-SADC-43DS', 0, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_section`
-- 

CREATE TABLE `adminizer_section` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `lang` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- Dumping data for table `adminizer_section`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_site_settings`
-- 

CREATE TABLE `adminizer_site_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `value` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Dumping data for table `adminizer_site_settings`
-- 

INSERT INTO `adminizer_site_settings` VALUES (1, 'primary_url', '');
INSERT INTO `adminizer_site_settings` VALUES (2, 'site_email', '');
INSERT INTO `adminizer_site_settings` VALUES (4, 'no-reply_email', '');
INSERT INTO `adminizer_site_settings` VALUES (9, 'google_analytics', '');
INSERT INTO `adminizer_site_settings` VALUES (10, 'meta_tags', '');
INSERT INTO `adminizer_site_settings` VALUES (11, 'meta_creator', '');
INSERT INTO `adminizer_site_settings` VALUES (16, 'default_loader', '<div style="min-width:80px" class="progress progress-striped active"><div class="bar" style="width: 100%"></div></div>');
INSERT INTO `adminizer_site_settings` VALUES (13, 'footer_sign', 'Powered by © <a href="http://adminizer.veliovgroup.com">Adminizer</a>');

-- --------------------------------------------------------

-- 
-- Table structure for table `adminizer_users`
-- 

CREATE TABLE `adminizer_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `access` int(11) DEFAULT NULL,
  `when` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
