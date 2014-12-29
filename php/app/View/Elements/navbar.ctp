<?php
$currentcontroller = $this->params ['controller'];
if ($currentcontroller === "cities" or $currentcontroller === "points" or $currentcontroller === "costcenters") {
	$currentcontroller="districts";
}
else if ($currentcontroller === "categories" or $currentcontroller === "subcategories" or $currentcontroller === "types"){
	$currentcontroller="categories";
}
$links = array (
		'url1' => array (
				'title' => 'Home',
				'controller' => 'pages' 
		),
		/*'url2' => array (
				'title' => 'Rifiuti',
				'controller' => 'refuses' 
		),
		'url3' => array (
				'title' => 'Tipologie Rifiuti',
				'controller' => 'categories' 
		),
		'url4' => array (
				'title' => 'Centri di costo',
				'controller' => 'cities' 
		),
		/*'url5' => array (
				'title' => 'Citt&agrave',
				'controller' => 'cities' 
		),
		'url6' => array (
				'title' => 'Punti fisici',
				'controller' => 'points' 
		),
		
		'url7' => array (
				'title' => 'Centri di Costo',
				'controller' => 'costcenters' 
		),*/
		);
$user = $this->Session->read ( 'Auth.User' );
if ($user ['role'] == 'admin') {
	$links ['url9'] = array (
			'title' => 'Gestione Utenti',
			'controller' => 'users',
			'action' => 'index' 
	);
	/*$links ['url4'] = array (
			'title' => 'Centri di costo',
			'controller' => 'districts' 
	);*/
}
		
?>
<u1>
<?php 
foreach ($links as $link){
	$html="<li";
	if ($currentcontroller===$link['controller'] ){
		$html.=' class="uhere"';
	}
	else {
		$html.=' class="unothere"';
	}
	$html.='> <a href="'. $this->webroot . $link['controller'] .'">' . $link['title'] .'</a></li>';
	echo $html;
}

/*foreach ($links as $link) {
	$this->Menu->add('link_list',array($link['title'],$link['url']));
}
echo $this->Menu->generate('link_list');*/		
?>
</u1>