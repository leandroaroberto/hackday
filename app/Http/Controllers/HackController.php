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
        $dados = $this->getSites();
        return view('index')->with(['dados' => $dados]);
        //return view('index');

    }

    public function getSites($where = null)
    {
        try {

            $schema = 'sites';  
            //$query = 'SELECT%20distinct%28nome%29%2C%20id%2C%20logradouro%2C%20cidade%2C%20estado%2C%20pais%2C%20lat%2C%20lng%2C%20situacao%20FROM%20hackday_time3_sandbox.v_'.$schema;
            $query = 'SELECT%20id%2Cnome%2Clogradouro%2Cnumero%2Ccidade%2Cestado%2Cpais%2Clat%2Clng%2Csituacao%20FROM%20hackday_time3_sandbox.v_'.$schema;
            $query = $where != null ? $query . $where : $query;
            $client = new Client(['base_uri' => 'https://portal.stg.eugenio.io/api/']);
            $res = $client->request('GET', 'v1/data/query?apikey=' . self::API_KEY . '&sql=' . $query, [
            ]);

            $responde = $res->getBody();
            $arrayDecoded = json_decode($responde);
            $cleanedArray = $this->removeDuplicities($arrayDecoded);

            

            return $cleanedArray;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getSite($where = null)
    {
        try {
            //$query = 'SELECT%20%2A%20FROM%20hackday_time3_sandbox.v_siteiddetail';

            $query = 'SELECT%20%2A%20FROM%20hackday_time3_sandbox.v_siteiddetail%20WHERE%20idsite%20%3D%20' . $where;

            $client = new Client(['base_uri' => 'https://portal.stg.eugenio.io/api/']);
            $res = $client->request('GET', 'v1/data/query?apikey=' . self::API_KEY . '&sql=' . $query, [
            ]);

            $responde = $res->getBody();
            $arrayDecoded = json_decode($responde,true);

            $cleanedArray = $this->removeDuplicities($arrayDecoded);

            return $cleanedArray;
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
        $id_equipamento = $id;
        // dd($request->all());
        return view('site', compact(['id_equipamento']));
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
        $tabela = view("tabela1",compact('dados'))->render();
        return $tabela;
    }


    public function getDataSite($id)
    {
        
        $dados = $this->getSite($id);        
        $tabela = view("tabela2",compact('dados'))->render();
        return $tabela;
    }


    private function removeDuplicities($array)
    {

        // $data= json_decode( json_encode($array), true);

        // dd($data);
        // $cleaned = array_unique($data);
        

        $cleaned = array_unique($array, SORT_REGULAR);


        return $cleaned;


    }

}
