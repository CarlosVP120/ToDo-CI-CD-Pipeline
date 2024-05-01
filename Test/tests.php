<?php
// Incluye PHPUnit
use PHPUnit\Framework\TestCase;

// Ejemplo de una prueba unitaria para la aplicación web
class AppTests extends TestCase
{
    // Prueba de ejemplo para verificar si la página principal devuelve el código de estado HTTP 200
    public function testHomePageStatus()
    {
        $url = 'http://localhost'; // Cambia esta URL según tu configuración local
        
        // Inicializa una solicitud HTTP a la página principal
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        // Verifica que la página principal devuelve un código de estado 200 (OK)
        $this->assertEquals(200, $httpCode);
    }
    
    // Prueba de ejemplo para verificar el contenido de una página específica
    public function testPageContent()
    {
        $url = 'http://localhost'; // Cambia esta URL según tu configuración local
        
        // Inicializa una solicitud HTTP a la página principal
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        
        // Verifica que la página contiene el texto esperado
        $expectedText = 'Bienvenido a mi aplicación web';
        $this->assertStringContainsString($expectedText, $response);
    }
}

// Ejecuta las pruebas si este archivo se ejecuta desde la línea de comandos
if (php_sapi_name() === 'cli') {
    require 'vendor/autoload.php'; // Incluye autoload de Composer si estás usando PHPUnit

    $suite = new PHPUnit\Framework\TestSuite('AppTests');
    $runner = new PHPUnit\TextUI\TestRunner();
    $result = $runner->run($suite);

    if ($result->wasSuccessful()) {
        echo "Todas las pruebas pasaron.\n";
    } else {
        echo "Algunas pruebas fallaron.\n";
    }
}
