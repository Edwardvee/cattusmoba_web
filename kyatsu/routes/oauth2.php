<?php
declare(strict_types=1);
namespace Dasomnya\OAuth2\Providers {
    /**
     * We must verify that the client secret is valid
     * 
     */
    interface OAuth2ProviderInterface {
        public static function validateProvider(array | string $json_file);
    }

    enum GoogleOAuth2Provider implements OAuth2ProviderInterface {
        public static function validateProvider(array | string $json_file) {
            return (array_key_exists("web", $json_file) && array_key_exists("client_id", $json_file["web"]) && (str_contains($json_file["web"]["client_id"], "googleusercontent.com")));
        }
    }

    /**
     * Registered OAuth2 providers
     */
    enum OAuth2Provider: string {
        case GOOGLE = GoogleOAuth2Provider::class;
    }
}
namespace Dasomnya\OAuth2 {
    use Dasomnya\OAuth2\Providers\OAuth2Provider;
    use JsonException;
    use FFI\Exception;

    /**
     * Gathers OAuth2 provider client information according to client secret
     */
    class secretServiceProvider {
        private array $json_file;
        private OAuth2Provider $provider;
        protected $token_uri = "https://www.googleapis.com/oauth2/v4/token";
        public function __construct() {
            $this->getJSONFile();
            $this->setProvider();
            $this->validateJSONInput();
        }
        /**
         * Opens and decodes client secret JSON with tokens
         */
        private function getJSONFile(string $path = __DIR__, string $filename = "client-secret.json") {
            $this->json_file = json_decode(file_get_contents($path . '\\' . $filename), true);
            if ($this->json_file == (null || false)) {
                throw new JsonException();
            }
        }
        /**Validates the received client secret and finds 
         * its matches in the registered OAuth2 registered providers
         */
        private function setProvider() {
            if ((OAuth2Provider::GOOGLE->value)::validateProvider($this->json_file)) {
                $this->provider = OAuth2Provider::GOOGLE;
                $this->json_file = $this->json_file["web"];
            } else {
                throw new Exception("El proveedor de OAuth2 recibido no es valido o compatible con el sistema actual", 422);
            }
        }
        /**
         * Validates that the client secret contains the necessary keys
         * for making the OAuth2 access
         */
        private function validateJSONInput(): bool {
            switch ($this->provider) {
                case OAuth2Provider::GOOGLE :
                    self::get("client_id");
                    self::get("project_id");
                    self::get("auth_uri");
                    self::get("token_uri");
                    self::get("auth_provider_x509_cert_url");
                    self::get("client_secret");
                    self::get("redirect_uris");
                    break;
                default:
                    throw new Exception("El proveedor de OAAuth2 seleccionado no posee todos los datos requeridos para funcionar", 422);
                    break;
            }
            return true;
        }
        /**
         * Used by child classes if they need some client secret entry
         */
        protected function get($name) {
            if (!array_key_exists($name, $this->json_file)) {       
                die($name);    
                trigger_error("Se intento acceder a un atributo no existente en el JSON de OAuth2", E_USER_ERROR);
            }
            return $this->json_file[$name];
        }
    }
}


namespace Dasomnya\OAuth2 {

    use Exception;
    use Throwable;
    class requestAuthorizationRequest extends secretServiceProvider {
        public function __construct() {
            parent::__construct();
            $url = parent::get("auth_uri");
            $params = array(
                "response_type" => "code",
                "client_id" => parent::get("client_id"),
                "redirect_uri" => (parent::get("redirect_uris"))[0],
                "scope" => "openid email"
            );
            $request_to = $url . '?' . http_build_query($params);
            header("Location: " . $request_to);
        }
    }

    class notifyAuthorizationRequest extends secretServiceProvider {
        private string $request_uri;
        private $context;
        public $id_token;
        public $access_token;
        public function __construct(int | string $code) {
            parent::__construct();
            $this->request_uri = $this->token_uri . "?" . $this->create_url_params($code);
            $this->context = $this->context_create();
            $this->hit_and_run($this->request_uri, $this->context);
        }

        private function create_url_params(int | string $code): string {
            return http_build_query(array(
                "grant_type" => "authorization_code",
                "client_id" => parent::get("client_id"),
                "client_secret" => parent::get("client_secret"),
                "redirect_uri" => (parent::get("redirect_uris"))[0],
                "code" => $code
            ));
        }

        private function context_create(): mixed {
            $opts = array(
                'http'=>array(
                'method'=>"POST",
                'header'=>"Accept: application/json\r\n" . 
                                "Content-Length: 0\r\n",
                "protocol_version" => "1.1",
                )
            );
            return stream_context_create($opts);
        }

        private function hit_and_run(string $request_uri, $context): void {
            try {
                $content = file_get_contents($request_uri, false, $context);
            } catch (Throwable $e) {
                throw new Exception("Fallo al notificar el codigo de autorizacion. Reinicie los Query Parameters", http_response_code(), $e);
            }
            if(!$id_token = @json_decode($content)) {
                throw new Exception(json_last_error_msg(), json_last_error());
            }
            $decoded = json_decode($content);
            $id_1 = explode(".", $decoded->id_token)[1];
            $this->id_token = $id_1; //(base64_decode($id_1));
            $this->access_token = $decoded->access_token;
        }
    }

}