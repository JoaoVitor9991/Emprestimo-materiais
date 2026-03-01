1. Consultar Horários Ocupados
Use este arquivo para desabilitar os horários que já possuem agendamento no seu calendário.

URL: consultar_horarios.php

Método: GET

Parâmetros necessários: id_barbeiro e data (Formato: YYYY-MM-DD)

Exemplo de chamada: consultar_horarios.php?id_barbeiro=1&data=2026-03-10

Retorno: Um JSON com os horários que você deve bloquear no Front.


2. Processar Novo Agendamento

URL: processar_agendamento.php

Método: POST

Campos obrigatórios (Atributo name no HTML):

nome_cliente: Texto com o nome do cliente.

numero_tel: Telefone/WhatsApp.

data_hora: Data e hora combinadas (Ex: 2026-03-10 14:00:00).

id_barbeiro: ID do barbeiro selecionado.

id_servico: ID do serviço selecionado.


3. Cancelar Agendamento
Se você criar uma área de cancelamento, use este link.

URL: cancelar_agendamento.php

Método: GET

Parâmetro: token (Aquele código aleatório que o sistema gera no cadastro).

Exemplo: cancelar_agendamento.php?token=a1b2c3d4...

4. Dados para os Selects (Barbeiros e Serviços)
Se você precisar carregar a lista de barbeiros ou serviços do banco para montar os seus campos de seleção, pode usar a lógica que deixei de exemplo no arquivo:

Arquivo de consulta rápida: teste.php (Lá tem o print_r de como os dados vêm do banco).


Observações do Back:
Banco de Dados: Certifique-se de que o seu banco local se chama barbearia.

Conexão: O arquivo de configuração está em back-end/conexao/Conexao.php.