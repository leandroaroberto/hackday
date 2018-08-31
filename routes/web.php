<?php
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HackController@index')->middleware('auth');

Route::get('/bootstrap',function(){
    return redirect('/startbootstrap-sb-admin-2-gh-pages/index.html');
});


/**
 * Tutorials
 * https://www.chapterthree.com/blog/building-rest-api-clients-php-easy-way
 * https://stackoverflow.com/questions/38029422/php-guzzle-with-basic-auth-and-bearer-token
 * https://markoivancic.from.hr/set-the-authorization-bearer-header-in-guzzle-http-client/
 * https://stackoverflow.com/questions/46387679/using-guzzle-to-send-post-request-with-json
 * https://stackoverflow.com/questions/42822951/post-request-works-with-postman-but-not-with-guzzle
 * https://gist.github.com/odan/07c110028111647ee9615ae85cb7e71d
 */
Route::get('/eugenio', function () {
//    return view('welcome');
    try {
        $client = new Client(); //GuzzleHttp\Client
        $token = null;
        $headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ];
        $client = new GuzzleHttp\Client(['base_uri' => 'https://portal.dev.eugenio.swlogicalis.com/api/']);
        $res = $client->request('POST', 'v1/auth/', [
            'headers' => $headers,
            'json' => [
                'username' => 'famorim@artit.com.br',
                'password' => 'Artit@123',
                'tenant' => 'artit',
            ],
        ]);
        echo $res->getStatusCode();
        $responde = $res->getBody();
        $arrayDecoded = json_decode($responde);
        dd($arrayDecoded->access_token);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
//// "200"
//    echo $res->getHeader('content-type');
//// 'application/json; charset=utf8'
// {"type":"User"...'
    //
});
