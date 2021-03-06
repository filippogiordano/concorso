<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d ( 'cake_dev', 'Concorso');//'CakePHP: the rapid development php framework' );
$cakeVersion = __d ( 'cake_dev', 'Sviluppata da: Ing. Filippo Giordano') //CakePHP %s', Configure::version () )?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription
			//echo $this->fetch('title'); ?>:
	</title>
	<?php
	echo $this->Html->meta ( 'icon' );
	
	echo $this->Html->css ( 'cake.generic' );
	
	echo $this->fetch ( 'meta' );
	echo $this->fetch ( 'css' );
	echo $this->fetch ( 'script' );
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		<?php
		$user = $this->Session->read ( 'Auth.User' );
		if (! empty ( $user )) {
			//echo 'User:', $user ['username'];//segue la nomenclatura della tabella users
			// user is logged in, show logout..user menu etc
			echo $this->Html->link ("Logout: ". ucwords($user['nominativo']),
			array (	'controller' => 'users',
					'action' => 'logout',
					'admin'=>0),
			array('id' => 'login')
			) ;
		} else {
			// the user is not logged in
			echo $this->Html->link ( 'Login',
					array ('controller' => 'users',
							'action' => 'login' ),
					array('id' => 'login') );
		}
		?>
			<h1><?php echo $this->Html->link($cakeDescription, "http://".$_SERVER["SERVER_NAME"]."/gestrif/" );// 'http://cakephp.org'); ?></h1>
			</br>
			<?php echo $this->element('navbar'); ?>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<p>
				<?php echo $cakeVersion . "</br>"; 
				echo $this->text->autoLinkEmails("filippo_giordano@msn.com");?>
			</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
