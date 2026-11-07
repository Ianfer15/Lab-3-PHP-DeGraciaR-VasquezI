
<?php
class Empleado {
    private $nombre;
    private $cedula;
    private $edad;
    private $sueldoBruto;
    private $seguroSocial;
    private $impuestoRenta;
    private $sueldoNeto;

    public function __construct($nombre, $cedula, $edad, $sueldoBruto) {
        $this->nombre = $nombre;
        $this->cedula = $cedula;
        $this->edad = $edad;
        $this->sueldoBruto = $sueldoBruto;
        $this->seguroSocial = 0;
        $this->impuestoRenta = 0;
        $this->sueldoNeto = 0;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getSueldoBruto() {
        return $this->sueldoBruto;
    }

    public function getSeguroSocial() {
        return $this->seguroSocial;
    }

    public function getImpuestoRenta() {
        return $this->impuestoRenta;
    }

    public function getSueldoNeto() {
        return $this->sueldoNeto;
    }

    public function CalcularSS() {
        $this->seguroSocial = $this->sueldoBruto * 0.125;
    }

    public function CalcularIR() {
        $sueldoAnual = $this->sueldoBruto * 12;

        if ($sueldoAnual < 11000) {
            $this->impuestoRenta = 0;
        } elseif ($sueldoAnual < 50000) {
            $this->impuestoRenta = ($sueldoAnual * 0.15) / 12;
        } else {
            $this->impuestoRenta = ($sueldoAnual * 0.25) / 12;
        }
    }

    public function setSueldoNeto() {
        $this->sueldoNeto = $this->sueldoBruto
            - $this->seguroSocial
            - $this->impuestoRenta;
    }
}

$nombre = readline("Ingrese el nombre del empleado: ");
$cedula = readline("Ingrese la cedula del empleado: ");
$edad = (int) readline("Ingrese la edad del empleado: ");
$sueldoBruto = (float) readline("Ingrese el sueldo bruto mensual: ");

$empleado = new Empleado($nombre, $cedula, $edad, $sueldoBruto);

$empleado->CalcularSS();
$empleado->CalcularIR();
$empleado->setSueldoNeto();

echo "\nDATOS DEL EMPLEADO\n";
echo "Nombre: " . $empleado->getNombre() . "\n";
echo "Cedula: " . $empleado->getCedula() . "\n";
echo "Edad: " . $empleado->getEdad() . "\n";
echo "Sueldo bruto mensual: $" . number_format($empleado->getSueldoBruto(), 2) . "\n";
echo "Seguro social: $" . number_format($empleado->getSeguroSocial(), 2) . "\n";
echo "Impuesto sobre la renta mensual: $" . number_format($empleado->getImpuestoRenta(), 2) . "\n";
echo "Sueldo neto mensual: $" . number_format($empleado->getSueldoNeto(), 2) . "\n";
?>
