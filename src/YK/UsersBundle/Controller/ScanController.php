<?php

namespace YK\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ScanController extends Controller{

    public function downloadAction($index){
        //$webPath = $this->get('kernel')->getRootDir().'/../web';
        $a = 1;
        //$index = $_POST['nombre'];
        //echo $index;
        while ($a <= $index) {
            if ($a < 10) {
                $a = "0".$a;
            }
            $url = 'http://ww1.japscan.com/lel/Radiant/Scan-Radiant-Tome-7-VF/' . $a . '.jpg' ;
            //echo $url;
            $parse_url = parse_url($url) ;
            $path_info = pathinfo($parse_url['path']) ;
            $file_extension = $path_info['extension'] ;
            $p = dirname(__DIR__ , '4');
            $save_path = $p . '/web/uploads/images/scan/tome7/';
            //var_dump(__DIR__);
            $file_name = 'Radiant-7-' . $a . "." . $file_extension ;
            file_put_contents($save_path . $file_name , fopen($url, 'r'));
            set_time_limit(0);
            $a++;
        }
        return $this->render('YKUsersBundle:Default:scan.html.twig');

    }

}
