class Pizzaria:
    def fazer_pedido(self, tipo_pizza, quantidade):
        if tipo_pizza == "mussarela":
            return f"Pedido de {quantidade} pizzas de mussarela."
        elif tipo_pizza == "calabresa":
            return f"Pedido de {quantidade} pizzas de calabresa."
        else:
            return "Tipo de pizza não disponível."

    def imprimir_comprovante(self, pedido):
        print(f"Comprovante: {pedido}")
