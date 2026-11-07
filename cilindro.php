
<?php
class Cilindro {
    private $radio;
    private $altura;

    public function __construct($radio, $altura) {
        $this->radio = $radio;
        $this->altura = $altura;
    }

    public function getRadio() {
        return $this->radio;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function calcularAreaLateral() {
        return 2 * pi() * $this->radio * $this->altura;
    }

    public function calcularAreaTotal() {
        return 2 * pi() * $this->radio * ($this->radio + $this->altura);
    }

    public function calcularVolumen() {
        return pi() * pow($this->radio, 2) * $this->altura;
    }
}

$radio = (float) readline("Ingrese el radio del cilindro: ");
$altura = (float) readline("Ingrese la altura del cilindro: ");

$cilindro = new Cilindro($radio, $altura);

echo "\nDATOS DEL CILINDRO\n";
echo "Radio: " . $cilindro->getRadio() . "\n";
echo "Altura: " . $cilindro->getAltura() . "\n";
echo "Area lateral: " . number_format($cilindro->calcularAreaLateral(), 2) . "\n";
echo "Area total: " . number_format($cilindro->calcularAreaTotal(), 2) . "\n";
echo "Volumen: " . number_format($cilindro->calcularVolumen(), 2) . "\n";
?>
