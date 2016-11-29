<?php

  ini_set('display_errors', 0);
  error_reporting(E_ALL);


function getimg($imgin,$idname) 
{
$image = file_get_contents($imgin); 

file_put_contents("./editor/attached/file/$idname.jpg", $image); 
return '/editor/attached/file/'.$idname.'.jpg';
}



require_once 'lib/SocialAuther/autoload.php';
 

$adapterConfigs = array(
    'vk' => array(
        'client_id'     => '5539881',
        'client_secret' => 'XvCriLcuUGlo74DV07wB',
        'redirect_uri'  => 'http://rusoturismo.ru/index.php?provider=vk'
    ),
   
    'facebook' => array(
        'client_id'     => '615019518529554',
        'client_secret' => '38238457d13438156837e8c9a4b2cd11',
        'redirect_uri'  => 'http://web.adatum.ru/index.php?provider=facebook'
    )
);

$adapters = array();
foreach ($adapterConfigs as $adapter => $settings) {
    $class = 'SocialAuther\Adapter\\' . ucfirst($adapter);
    $adapters[$adapter] = new $class($settings);
}

if (isset($_GET['provider']) && array_key_exists($_GET['provider'], $adapters) && !isset($_SESSION['user'])) {
    $auther = new SocialAuther\SocialAuther($adapters[$_GET['provider']]);

    if ($auther->authenticate()) {

        $result = mysql_query(
            "SELECT *  FROM `users` WHERE `provider` = '{$auther->getProvider()}' AND `social_id` = '{$auther->getSocialId()}' LIMIT 1"
        );

        $record = mysql_fetch_array($result);
		$dateup = date("Y-m-d");
		$prev = "1";
		$getsocialId = $auther->getSocialId();
		$getauther = $auther->getAvatar();
		$getauther = getimg($getauther,$getsocialId);
        if (!$record) {
            $values = array(
                $auther->getProvider(),
                $auther->getSocialId(),
                $auther->getName(),
                $auther->getEmail(),
                $auther->getSocialPage(),
                $auther->getSex(),
                date('Y-m-d', strtotime($auther->getBirthday())),
                $getauther,
				$dateup,
				$prev
            );

            $query = "INSERT INTO `users` (`provider`, `social_id`, `name`, `email`, `social_page`, `sex`, `birthday`, `avatar`,`datereg`,`prev`) VALUES ('";
            $query .= implode("', '", $values) . "')";
            $result = mysql_query($query);
        } else {
            $userFromDb = new stdClass();
            $userFromDb->provider   = $record['provider'];
            $userFromDb->socialId   = $record['social_id'];
            $userFromDb->name       = $record['name'];
            $userFromDb->email      = $record['email'];
            $userFromDb->socialPage = $record['social_page'];
            $userFromDb->sex        = $record['sex'];
            $userFromDb->birthday   = date('m.d.Y', strtotime($record['birthday']));
            $userFromDb->avatar     = $record['avatar'];
        }

        $user = new stdClass();
        $user->provider   = $auther->getProvider();
        $user->socialId   = $auther->getSocialId();
        $user->name       = $auther->getName();
        $user->email      = $auther->getEmail();
        $user->socialPage = $auther->getSocialPage();
        $user->sex        = $auther->getSex();
        $user->birthday   = $auther->getBirthday();
        $user->avatar     = $auther->getAvatar();
		$getsocialId = $auther->getSocialId();
		$getauther = $auther->getAvatar();
		$getauther = getimg($getauther,$getsocialId);
        if (isset($userFromDb) && $userFromDb != $user) {
            $idToUpdate = $record['id_user'];
            $birthday = date('Y-m-d', strtotime($user->birthday));
			$dateup = date("Y-m-d");
            mysql_query( "UPDATE `users` SET `social_id` = '{$user->socialId}', `name` = '{$user->name}', `email` = '{$user->email}', `social_page` = '{$user->socialPage}', `sex` = '{$user->sex}', `birthday` = '{$birthday}', `avatar` = '{$getauther}', `date` = '{$dateup}' WHERE `id_user`='{$idToUpdate}'" );
			// mysql_query( "UPDATE `users` SET `avatar` = '{$idToUpdate}' WHERE `id_user`='20'" );      
	  }

        $_SESSION['user'] = $user;
    }

    header("location:index.php");
}
?>