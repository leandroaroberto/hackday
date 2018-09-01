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
        $result = $this->getSites();

        //$novo_array = $this->removeDuplicities($result);
        //dd($result);
        return view('index');
    }

    public function getSites($where = null)
    {
        try {

            $schema = 'sites';  
            $query = 'SELECT%20distinct%28nome%29%2C%20id%2C%20logradouro%2C%20cidade%2C%20estado%2C%20pais%2C%20lat%2C%20lng%2C%20situacao%20FROM%20hackday_time3_sandbox.v_'.$schema;
            $query = $where != null ? $query . $where : $query;
            $client = new Client(['base_uri' => 'https://portal.stg.eugenio.io/api/']);
            $res = $client->request('GET', 'v1/data/query?apikey=' . self::API_KEY . '&sql=' . $query, [
            ]);

            $responde = $res->getBody();
            $arrayDecoded = json_decode($responde);
            $cleanedArray = $this->removeDuplicities($arrayDecoded);

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
        $dados = $this->getSites();        
        $dados_equipamentos = $this->getSite();
        $tabela = view("tabela1",compact('dados'))->render();
        return $tabela;
    }

    private function removeDuplicities($array)
    {

        $cleaned = array_unique($array);

        return $cleaned;


    }

}
