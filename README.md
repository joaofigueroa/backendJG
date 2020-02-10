# backendJG

Esse projeto faz parte da trilha de aprendizado de backend da startUp Jovens Gênios, sendo que seus requisitos podem ser encotrados nesse [repositório](https://github.com/Jovens-Genios/Trilha-de-Aprendizado-Backend). 

A implementação do FrontEnd relacionado a esse projeto se encontra nesse [repositório](https://github.com/joaofigueroa/FrontJG), onde existem instruções para seu devido funcionamento.


Para seu devido funcinamento reproduzimos abaixo parte das instruções encontradas no [repositório](https://github.com/Jovens-Genios/Trilha-de-Aprendizado-Backend) com os requisitos do projeto.

1. Navege até a pasta  raiz do docker

2.  Instale as dependências do composer.json

Inicialize seus containers na raiz do diretório /docker:

```
	docker-compose up -d
```

Você não precisa ter o Composer instalado na sua máquina para este passo, utilizaremos um container efêmero Docker. Bastando rodar o seguinte comando no terminal, na raiz da pasta app:

```
	docker-compose exec app composer install
```

Este comando instala todos os pacotes usando o Composer no container Docker e consequentemente na sua pasta local (por conta do [volume bind](https://docs.docker.com/storage/volumes)).

3. Configurações no Laravel

*   Gere uma chave para sua aplicação, com o comando:
```
	docker-compose exec app php artisan key:generate
```

Reinicie o container app, para que essa alteração na variável .env tenha efeito: 
```
	docker-compose stop app
	docker-compose up -d app
```

Pronto! Agora para rodar comandos no seu container Laravel, basta seguir o seguinte padrão (estando no diretório onde se encontra o arquivo docker-compose.yml):

```
	docker-compose exec app comando
```
Não se esqueça de fazer o migrate para criar as tabelas necessárias para aplicação.

4. phpMyAdmin

Você pode gerenciar seu banco de dados local graficamente com o phpMyAdmin. Nesta infraestrutura, é inicializado um container phpMyAdmin para vocÊ. Para acessá-lo, visite http://localhost:3030 na sua máquina. 

As credenciais de acesso ao banco de dados se encontram nas variáveis "MYSQL_USER" e "MYSQL_PASSWORD" do serviço de banco de dados no docker-compose.yml.

Dentro da pasta docker, você encontrá uma pasta chamada 'data'. Lá encontra-se disponível o .csv usado para implementação deste projeto. 

### Como acessar a aplicação Laravel

Com tudo rodando, você consegue acessar sua aplicação Laravel localmente em http://localhost/app. Agora é só se sujar na lama e testar sua aplicação!
