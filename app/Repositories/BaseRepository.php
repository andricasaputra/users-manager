<?php  

namespace App\Repositories;

class BaseRepository
{
	protected $client;
	protected $crawler;
	protected $form;
	protected $username;
	protected $password;
	protected $loginUri;
	protected $homeUri;
	protected $inputLoginXpath;
	protected $image;
	protected $input = [];
    protected $api;
    protected $admin;

	protected function __construct()
	{
		$this->loginUri = config('simasn.url.login');
		$this->homeUri = config('simasn.url.home');
		$this->inputLoginXpath = config('simasn.input.loginXpath');
		$this->input['username'] = config('simasn.input.name.username');
		$this->input['password'] = config('simasn.input.name.password');
	}

    protected function prepare()
    {
    	$this->client = app('Client');
        $this->crawler = $this->client->request('GET', $this->loginUri);
        $this->form = $this->crawler->filterXPath($this->inputLoginXpath)->form();

        

        return $this;
    }

    protected function login()
    {
    	$this->form[$this->input['username']] = $this->username;
        $this->form[$this->input['password']] = $this->password;
        $this->client->submit($this->form);
        $this->crawler = $this->client->request('GET', $this->homeUri);

        return $this;
    }

    protected function getData($forget = null)
    {
    	$imageSrc = $this->crawler->filter('img')->eq(3)->attr('src');
        $imageName = explode('/', $imageSrc);
        $image = end($imageName);

        $body = [
            'nama' => $this->crawler->filter('#namaku')->attr('value'),
            'nip' => $this->crawler->filter('#nip')->attr('value'),
            'ttl' => $this->crawler->filter('#tmp_lhr')->attr('value'),
            'alamat' => $this->crawler->filter('#alamat')->text(),
            'jabatan' => $this->crawler->filter('#nama_jab')->attr('value'),
            'tmt_jabatan' => $this->crawler->filter('#tmt_jab')->attr('value'),
            'unit_kerja' => $this->crawler->filter('#unker')->attr('value'),
            'gol_capeg' => $this->crawler->filter('#gol_capeg')->attr('value'),
            'tmt_capeg' => $this->crawler->filter('#tmt_capeg')->attr('value'),
            'gol_akhir' => $this->crawler->filter('#gol_akhir')->attr('value'),
            'tmt_akhir' => $this->crawler->filter('#tmt_golakr')->attr('value'),
            'nama_fungsional' => $this->crawler->filter('#nama_fung')->attr('value'),
            'image' => $image
        ];

        if (isset($forget)) unset($body[$forget]);
        
        return $body;
    }
}