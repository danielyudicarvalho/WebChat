# Parallax

<!--- Exemplos de badges. Acesse https://shields.io para outras opções. Você pode querer incluir informações de dependencias, build, testes, licença, etc. --->
![GitHub repo size](https://img.shields.io/github/repo-size/hsborges/progweb-template)
![GitHub contributors](https://img.shields.io/github/contributors/hsborges/progweb-template)

WebChat é um mensageiro online que permite trocar mensagens online entre usuarios cadastrados.

Após se cadastrar, o usuário é levado para a página principal onde é possivel escrever e receber mensagens.
Se já for cadastrado, o usuário precisa apenas se autentificar na aplicação.

## Pré-requisitos
Antes de iniciar, certifique-se de cumprir os seguintes requisitos:

* Você deve possuir a última versão do php e composer instalados.
* Você deve possuir uma máquina Windows, Linus ou MAC. (Deixe claro qual SO é possível rodar a aplicação, Linux é obrigatório).
* Você deve utilizar um navegador de preferencia Google Chrome
* Deve possuir o GIT instalado na máquina e uma conta GitHub,
 de preferencia algum conhecimento em GIT


## Como executar

Para fazer o deploy da aplicação siga os seguintes passos:

Linux/macOS/Windows:

* Depois de se certificar de cumprir os pré-requisitos acesse https://github.com/danielyudicarvalho/webchat
* Crie um diretorio vazio qualquer em sua máquina
* No diretorio envie o comando <git clone https://github.com/danielyudicarvalho/webchat.git> pelo terminal
* Uma vez com o projeto clonado na propria máquina, abra o terminal no diretorio e envie o comando <composer install> para instalar todas as dependencias
* Ainda no terminal, no diretorio, envie o comando <composer dumpautoload> para configurar o autoload do composer PHP
* Para rodar a aplicação em versão de teste, envie o comando <php -S localhost:8080 -t public> no terminal no diretorio do projeto
* Abra o navegador e acesse a URL <localhost:8080>

## Usando WebChat

Para usar o WebChat é bem simples, siga os seguintes passos:

* Abra o navegador e digite o seguinte endereço: `http://localhost/8080`
* Ao abrir a aplicação você poderá:
  * Realizar o signUp para se cadastrar, ou...
  * Entrar com usuário e senha no e clicar SignIn se já estiver registrado
* Após se autentificar, será redirecionado para a página principal onde terá um campo de mensagens recebidas,
  um campo de text para escrever mensagens e, ao lado, uma lista de usuários logados.
* Para enviar uma mensagem basta apenas escrever o que deseja no campo e clicar Enter e sua mensagem aparecerá no campo
  junto das outras mensagens.
* Para sair basta clicar em logout.

* Não é possivel entrar direto na página principal sem ter uma conta ou não estar logado, se tentar será direcionado à
  página inicial
* Também não é possível cadastrar um nome já cadastrado.

## Contribuidores

As seguintes pessoas contribuiram para este projeto:

* [Daniel](https://github.com/danielyudicarvalho)

## Licença de uso


Este projeto usa a seguinte licença: [GPL](https://www.gnu.org/licenses/gpl-3.0.pt-br.html).