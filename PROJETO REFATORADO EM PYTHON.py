from abc import ABC, abstractmethod

# S - Single Responsibility Principle
class Pedido:
    def __init__(self, tipo_pizza, quantidade):
        self.tipo_pizza = tipo_pizza
        self.quantidade = quantidade

    def detalhes(self):
        return f"Pedido de {self.quantidade} pizzas de {self.tipo_pizza}."


# O - Open/Closed Principle
class Pizza(ABC):
    @abstractmethod
    def descricao(self):
        pass


class PizzaMussarela(Pizza):
    def descricao(self):
        return "Pizza de mussarela"


class PizzaCalabresa(Pizza):
    def descricao(self):
        return "Pizza de calabresa"


class Pizzaria:
    def __init__(self):
        self.menu = {
            "mussarela": PizzaMussarela(),
            "calabresa": PizzaCalabresa(),
        }

    # L - Liskov Substitution Principle
    def fazer_pedido(self, tipo_pizza, quantidade):
        pizza = self.menu.get(tipo_pizza)
        if pizza:
            pedido = Pedido(tipo_pizza, quantidade)
            return pedido.detalhes()
        else:
            return "Tipo de pizza não disponível."

    # I - Interface Segregation Principle
    def imprimir_comprovante(self, pedido):
        print(f"Comprovante: {pedido.detalhes()}")

# D - Dependency Inversion Principle
class Impressora:
    def imprimir(self, texto):
        print(texto)

# Uso
pizzaria = Pizzaria()
pedido = pizzaria.fazer_pedido("mussarela", 2)
impressora = Impressora()
impressora.imprimir(pedido)
