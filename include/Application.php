<?php

namespace LegadoDigital\App;

/**
 * Clase que mantiene el estado global de la aplicación.
 */

class Application
{
	private static $instance;

	/**
	 * @var Array que almacena los datos de configuración de la BD
	 */
	private $dbDataConnection;

	/**
	 * Sirve para comprobar si la aplicación ya ha sido inicializada.
	 * 
	 * @var boolean
	 */
	private $initialized = false;

	/**
	 * @var \mysqli Conexión de la Base de Datos.
	 */
	private $conn;

	/**
	 * Evita que se pueda instanciar la clase directamente.
	 */
	private function __construct() {
	}

	/**
	 * Evita que se pueda utilizar el operador clone.
	 */
	private function __clone()
	{
	    parent::__clone();
	}

	/**
	 * Evita que se pueda utilizar unserialize().
	 */
	private function __wakeup()
	{
	    return parent::__wakeup();
	}

	/**
	 * Permite obtener una instancia de la aplicación.
	 * 
	 * @return $instance Obtiene la única instancia de la aplicación
	 */
	public static function getSingleton() {
		if (!self::$instance instanceof self) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Inicializa la aplicación.
	 * 
	 * @param array $dbDataConnection datos de configuración de la BD
	 */
	public function init($dbDataConnection)
	{
        if (!$this->initialized) {
    	    $this->dbDataConnection = $dbDataConnection;
    		session_start();
    		$this->initialized = true;
        }
	}
	
	/**
	 * Cierra la aplicación.
	 */
	public function shutdown()
	{
	    $this->checkInitializedInstance();

	    if ($this->conn !== null) {
	        $this->conn->close();
	    }
	}
	
	/**
	 * Comprueba si la aplicación está inicializada. Si no lo está muestra un mensaje y termina la ejecución.
	 */
	private function checkInitializedInstance()
	{
	    if (!$this->initialized) {
	        echo "Aplicacion no inicializa";
	        exit();
	    }
	}
	
	/**
	 * Devuelve una conexión a la BD. Se encarga de que exista como mucho una conexión a la BD por petición.
	 * 
	 * @return \mysqli Conexión a MySQL.
	 */
	public function dbConnection()
	{
	    $this->checkInitializedInstance();

		if (!$this->conn) {
			$host = $this->dbDataConnection['host'];
			$user = $this->dbDataConnection['user'];
			$pass = $this->dbDataConnection['pass'];
			$db = $this->dbDataConnection['bd'];

			$this->conn = new \mysqli($host, $user, $pass, $db);

			if ($this->conn->connect_errno) {
				echo "Error de conexión a la BD: (" . $this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
				exit();
			}

			if (!$this->conn->set_charset("utf8mb4")) {
				echo "Error al configurar la codificación de la BD: (" . $this->conn->errno . ") " . utf8_encode($this->conn->error);
				exit();
			}
		}

		return $this->conn;
	}
}