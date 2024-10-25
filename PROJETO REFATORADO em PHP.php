<?php

// S - Single Responsibility Principle
class Pedido {
    private $tipoPizza;
    private $quantidade;

    public function __construct($tipoPizza, $quantidade) {
        $this->tipoPizza = $tipoPizza;
        $this->quantidade = $quantidade;
    }

    public function detalhes() {
        return "Pedido de {$this->quantidade} pizzas de {$this->tipoPizza}.";
    }
}

// O - Open/Closed Principle
abstract class Pizza {
    abstract public function descricao();
}

class PizzaMussarela extends Pizza {
    public function descricao() {
        return "Pizza de mussarela";
    }
}

class PizzaCalabresa extends Pizza {
    public function descricao() {
        return "Pizza de calabresa";
    }
}

class Pizzaria {
    private $menu;

    public function __construct() {
        $this->menu = [
            "mussarela" => new PizzaMussarela(),
            "calabresa" => new PizzaCalabresa(),
        ];
    }

    // L - Liskov Substitution Principle
    public function fazerPedido($tipoPizza, $quantidade) {
        if (array_key_exists($tipoPizza, $this->menu)) {
            $pedido = new Pedido($tipoPizza, $quantidade);
            return $pedido->detalhes();
        } else {
            return "Tipo de pizza não disponível.";
        }
    }

    // I - Interface Segregation Principle
    public function imprimirComprovante($pedido) {
        echo "Comprovante: {$pedido->detalhes()}\n";
    }
}

// D - Dependency Inversion Principle
class Impressora {
    public function imprimir($texto) {
        echo $texto . "\n";
    }
}

// Uso
$pizzaria = new Pizzaria();
$pedido = $pizzaria->fazerPedido("mussarela", 2);
$impressora = new Impressora();
$impressora->imprimir($pedido);
?>
