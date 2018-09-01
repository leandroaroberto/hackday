<?php

namespace hackday\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HackController extends Controller
{

    const API_KEY = '1BkpLh7hc5O8XIEuJHMPZFnhdaG1slLu';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$token = $this->getSites();        
        //return view('index')->with(['token' => $token]);
        return view('index');
    }

    /*private function getToken(){

        try {
            $token = null;
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json',
            ];
            $client = new Client(['base_uri' => 'https://portal.dev.eugenio.swlogicalis.com/api/']);
            $res = $client->request('POST', 'v1/auth/', [
                'headers' => $headers,
                'json' => [
                    'username' => 'famorim@artit.com.br',
                    'password' => 'Artit@123',
                    'tenant' => 'artit',
                ],
            ]);
            
            $responde = $res->getBody();
            $arrayDecoded = json_decode($responde);
            return $arrayDecoded->access_token;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }*/


//    public function getToken(){
//
//        try {
//            $token = null;
//            $headers = [
//                'Accept' => 'application/json',
//                'Authorization' => 'Bearer ' . $token,
//                'Content-Type' => 'application/json',
//            ];
//
//
//            $client = new Client(['base_uri' => 'https://portal.stg.eugenio.io/api/']);
//            $res = $client->request('GET', 'v1/data/query?apikey=1BkpLh7hc5O8XIEuJHMPZFnhdaG1slLu&sql=SELECT%20%2A%20FROM%20hackday_time3_sandbox.v_teste', [
//            ]);
//
//            $responde = $res->getBody();
//            $arrayDecoded = json_decode($responde);
//            //dd($arrayDecoded);
//            return $arrayDecoded;
//            //return $arrayDecoded->access_token;
//        } catch (\Exception $e) {
//            return $e->getMessage();
//        }
//    }

    public function getSites($where = null)
    {
        try {

            $schema = 'sites';
            $query = 'SELECT%20%2A%20FROM%20hackday_time3_sandbox.v_' . $schema;
            $query = $where != null ? $query . $where : $query;

            $client = new Client(['base_uri' => 'https://portal.stg.eugenio.io/api/']);
            $res = $client->request('GET', 'v1/data/query?apikey=' . self::API_KEY . '&sql=' . $query, [
            ]);

            $responde = $res->getBody();
            $arrayDecoded = json_decode($responde);

            return $arrayDecoded;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getSite($where = null)
    {
        try {
            $query = 'SELECT%20%2A%20FROM%20hackday_time3_sandbox.v_sites_id';

            $query = $where != null ? $query . $where : $query;

            $client = new Client(['base_uri' => 'https://portal.stg.eugenio.io/api/']);
            $res = $client->request('GET', 'v1/data/query?apikey=' . self::API_KEY . '&sql=' . $query, [
            ]);

            $responde = $res->getBody();
            $arrayDecoded = json_decode($responde);

            return $arrayDecoded;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getDataEugenio()
    {
        //return "Dados da Api do Eugenio: " . rand(100, 2);
        $dados = $this->getSites();
        //dd($dados);
        $tabela = view("tabela1",compact('dados'))->render();
        return $tabela;
    }

}
