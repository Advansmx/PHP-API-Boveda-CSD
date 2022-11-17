<?php


namespace Advans\Api\BovedaCSD;

class BovedaCSD {

    protected Config $config;

    public function __construct(Config $config) {
        $this->config = $config;
    }

    public function version(): string {
        return $this->call('version');
    }

    public function cargarCSD(string $public_key, string $private_key) {
        return $this->call('', 'POST', [
            'public_key' => $public_key,
            'private_key' => $private_key,
        ]);
    }

    public function sellar(string $data, string $serial) {
        return $this->call($serial, 'POST', $data);
    }

    public function consultarBySerial(string $serial) {
        return $this->call($serial);
    }

    public function consultarByRFC(string $rfc) {
        return $this->call($rfc);
    }

    protected function call($method, $verb = 'GET', $params = null): string {
        $verb = strtoupper($verb);
        $url = $this->config->base_url . $method;
        $curl = curl_init();
        $postfields = null;
        if ($verb == 'POST') {
            $postfields = gettype($params) == 'array' ? json_encode($params) : $params;
        }
        curl_setopt_array($curl, [
            CURLOPT_URL => $url . ($verb == 'GET' && $params ? '?' . http_build_query($params) : ''),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $verb,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->config->key
            ],
        ]);
        if (!($result = @curl_exec($curl))) {
            throw new BovedaCSDException('Error de conexión');
        }
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($http_code != 200 || $result === false) {
            throw new BovedaCSDException('El servicio regresó un código de error ' . $http_code . ' ' . $result);
        }
        return $result;
    }
}