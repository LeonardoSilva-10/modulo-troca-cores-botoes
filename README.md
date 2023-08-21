## Módulo para troca de cor dos botões via console

## Instalação do módulo
Basta Clonar o módulo para a pasta app/code/
`git clone git@github.com:LeonardoSilva-10/modulo-troca-cores-botoes.git`
Ou realizar o download: https://github.com/LeonardoSilva-10/modulo-troca-cores-botoes.git
(os diretórios do módulo são Leonardo/Test)

## Execução do módulo:

``php bin/magento setup:upgrade``<br>
``php bin/magento deploy:mode:set developer``

#### Para a execução da função que altera a cor do botão, é necessário <br> passar os paramêtros cor hexadecimal (sem o #) e ID da loja como o exemplo abaixo:
``php bin/magento color:change FF5733 1`` <br>
``php bin/magento cache:clean``

#### Para alterar a cor salva é necessário deletar (usando o ID da loja), após realizar essa alteração execute o comando acima novamente para salvar uma nova cor, por exemplo:
``php bin/magento color:delete 1`` <br>
``php bin/magento color:change 3396FF 1`` <br>
``php bin/magento cache:clean``

## Requisitos

### Magento >= 2.4.4
