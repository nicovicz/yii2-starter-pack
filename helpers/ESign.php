<?php
namespace app\helpers;
use Yii;
use yii\httpclient\Client;
class ESign
{
    const BASE_URL = 'http://192.168.51.77';
    public static function checkUser()
    {
        $client = new Client(['baseUrl' => static::BASE_URL]);
        $username = 'admin';
        $password = 'waitforit';

        $request = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('/api/user/status/3174080202730004'); 
        $request->headers->set('Authorization', 'Basic ' . base64_encode("$username:$password"));

        $response = $request->send();

        if ($response->isOk) {
           var_dump($response->data);
        }

        var_dump($response->isOk);
       
    }

    public static function verify($file)
    {
        $client = new Client(['baseUrl' => static::BASE_URL]);
        $username = 'admin';
        $password = 'waitforit';

        $request = $client->createRequest()
            ->setMethod('POST')
           
            ->addFile('signed_file', $file)
            ->setUrl('/api/sign/verify'); 
        $request->headers->set('Authorization', 'Basic ' . base64_encode("$username:$password"));

        $response = $request->send();

        if ($response->isOk) {
           var_dump($response->data);
        }
        
    }

    public static function sign()
    {
        $client = new Client(['baseUrl' => static::BASE_URL]);
        $username = '';
        $password = '';

        $request = $client->createRequest()
            ->setMethod('POST')
            ->setData([
                'nik'=>'',
                'passphrase'=>'',
                'tampilan'=> 'visible',
                'page'=> 1,
                'image'=>true,
            
                'xAxis'=>0,
                'yAxis'=>50,
                'width'=>550,
                'height'=>0
            ])
            ->addFile('file', Yii::getAlias('@app').'/storages/CHANGE REQUEST VTA ONLINE UNTUK PENYESUAIAN NOMOR SURAT.pdf')
            ->addFile('imageTTD', Yii::getAlias('@app').'/storages/spec.png')
            ->setUrl('/api/sign/pdf'); 
        $request->headers->set('Authorization', 'Basic ' . base64_encode("$username:$password"));
       

        $response = $request->send();

        if ($response->isOk) {
          $file = Yii::getAlias('@app').'/storages/'.time().'.pdf';
          file_put_contents($file,$response->content);
          static::verify($file);
          die;
        }

        var_dump($response);
       
    }
}