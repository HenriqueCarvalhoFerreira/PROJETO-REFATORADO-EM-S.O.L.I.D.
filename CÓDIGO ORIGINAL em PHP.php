<?php

class Pizzaria {
    public function fazerPedido($tipoPizza, $quantidade) {
        if ($tipoPizza === "mussarela") {
            return "Pedido de $quantidade pizzas de mussarela.";
        } elseif ($tipoPizza === "calabresa") {
            return "Pedido de $quantidade pizzas de calabresa.";
        } else {
            return "Tipo de pizza não disponível.";
        }
    }

    public function imprimirComprovante($pedido) {
        echo "Comprovante: $pedido\n";
    }
}

// Uso
$pizzaria = new Pizzaria();
$pedido = $pizzaria->fazerPedido("mussarela", 2);
$pizzaria->imprimirComprovante($pedido);
?>
