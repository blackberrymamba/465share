# 465Share
File sharing web application built with CodeIgniter

Prerequisites: MySQL, PHP 5.6+


## Setup:
1. Setup MySQL Database with default dump 465share.sql
2. Rename __config.php.default__ to __config.php__ and set application base url:
> $config['base_url'] = '';
3. Rename __database.php.default__ to __database.php__ and set database connection:
> 		$db['default'] = array(
>				'dsn'   => '',
>				'hostname' => '%HOSTNAME%',
>				'username' => '%USERNAME%',
>				'password' => '%PASSWORD%',
>				'database' => '%DATABASE%',
>				'dbdriver' => 'mysqli',
>				'dbprefix' => '',
>				'pconnect' => FALSE,
>				'db_debug' => (ENVIRONMENT !== 'production'),
>				'cache_on' => FALSE,
>				'cachedir' => '',
>				'char_set' => 'utf8',
>				'dbcollat' => 'utf8_general_ci',
>				'swap_pre' => '',
>				'encrypt' => FALSE,
>				'compress' => FALSE,
>				'stricton' => FALSE,
>				'failover' => array(),
>				'save_queries' => TRUE
>		);
>		
4. Set permissions of the uploads directory to 777
5. Default login and password: admin@admin.com -> password

![Login](https://github.com/blackberrymamba/465share/raw/master/001.png)
![Upload](https://github.com/blackberrymamba/465share/raw/master/002.png)
![Files](https://github.com/blackberrymamba/465share/raw/master/003.png)
