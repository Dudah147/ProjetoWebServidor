<?php
    /* Este arquivo deve ser inicializado pelo prompt antes de testar a aplicação, pois contém a seed do banco de dados do site */

    class SeedBanco{
        private $con;

        public static function __construct(){
            self::$con = ConexaoBanco::get();
            self::criarBanco();
        }

        public static function criarBanco()
        {
            $dbase = "projetowebservidor";
            try {
                if (self::$con) {
                    $query = self::$con->prepare("CREATE DATABASE IF NOT EXISTS $dbase");
                    if ($query->execute()) {
                        self::criarTabelas();
                    } else {
                        throw new Exception('Não foi possível criar a base de dados');
                    }
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s') . " - Erro ao criar o banco: " . $e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        public static function pesquisarTabela(string $tabela)
        {
            try {
                if ($con = ConexaoBanco::get()) {
                    $query = $con->prepare("SELECT * FROM {$tabela} LIMIT 1");
                    $query->execute();
                    return True;
                }
            } catch (Exception $e) {
                if ($e->getMessage() == "Table 'projetowebservidor." . $tabela . "' doesn't exist") {
                    return False;
                } else {
                    $log = date('d.m.Y h:i:s') . " - Erro ao desconectar: " . $e->getMessage();
                    error_log($log . PHP_EOL, 3, './error/db_error.log');
                }
            }
        }

        public static function criarTabelas()
        {
            try {
                if (self::$con) {
                    if (self::pesquisarTabela('enderecos') == False) {
                        $query = self::$con->prepare("CREATE TABLE enderecos(id_endereco INT NOT NULL AUTO_INCREMENT,
                                        cpf_usuario VARCHAR(60) NOT NULL,
                                        cidade VARCHAR(60) NOT NULL,
                                        estado VARCHAR(60) NOT NULL,
                                        numero INT NOT NULL,
                                        bairro VARCHAR(60) NOT NULL,
                                        cep VARCHAR(60) NOT NULL,
                                        rua VARCHAR(60) NOT NULL,
                                        PRIMARY KEY (id_endereco)
                                    );");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela enderecos desejada');
                        }
                    }

                    if (self::pesquisarTabela('usuarios') == False) {
                        $query = self::$con->prepare("CREATE TABLE usuarios(cpf_usuario VARCHAR(60) NOT NULL,
                                        nome_usuario VARCHAR(60) NOT NULL,
                                        senha_usuario VARCHAR(60) NOT NULL,
                                        email_usuario VARCHAR(60) NOT NULL,
                                        nasc_usuario DATE NOT NULL,
                                        PRIMARY KEY (cpf_usuario)
                                    );");
                        $sql = self::$con->prepare("ALTER TABLE `enderecos` 
                                    ADD FOREIGN KEY (cpf_usuario)
                                    REFERENCES usuarios (cpf_usuario) ON DELETE CASCADE");
                        if (!$query->execute() && !$sql->execute()) {
                            throw new Exception('Não foi possível criar a tabela usuarios desejada');
                        }
                    }
                    if (self::pesquisarTabela('pedidos') == False) {
                        $query = self::$con->prepare("CREATE TABLE pedidos(id_pedido INT NOT NULL AUTO_INCREMENT,
                                cpf_usuario VARCHAR(60) NOT NULL,
                                valor_total_pedido DOUBLE NOT NULL,
                                data_pedido TIMESTAMP NOT NULL,
                                PRIMARY KEY (id_pedido),
                                FOREIGN KEY (cpf_usuario)
                                REFERENCES usuarios(cpf_usuario) ON DELETE CASCADE
                                )");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela pedidos desejada');
                        }
                    }

                    if (self::pesquisarTabela('sabores') == False) {
                        $query = self::$con->prepare("CREATE TABLE sabores(id_sabor INT NOT NULL AUTO_INCREMENT,
                                sabores VARCHAR(60) NOT NULL,
                                info_sabor VARCHAR(60) NOT NULL,
                                tipo_sabor VARCHAR(60) NOT NULL,
                                preco_sabor DOUBLE NOT NULL,
                                imagem_sabor VARCHAR(60) NOT NULL,
                                PRIMARY KEY (id_sabor)
                                );");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela sabores desejada');
                        }
                    }
                    if (self::pesquisarTabela('massa') == False) {
                        $query = self::$con->prepare("CREATE TABLE massa(id_massa INT NOT NULL AUTO_INCREMENT,
                                preco_massa DOUBLE NOT NULL,
                                info_massa VARCHAR(60) NOT NULL,
                                massa VARCHAR(60) NOT NULL,
                                PRIMARY KEY (id_massa)
                                );");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela massa desejada');
                        }
                    }
                    if (self::pesquisarTabela('borda') == False) {
                        $query = self::$con->prepare("CREATE TABLE borda(
                                id_borda INT NOT NULL AUTO_INCREMENT,
                                preco_borda DOUBLE NOT NULL,
                                borda VARCHAR(60) NOT NULL,
                                PRIMARY KEY (id_borda)
                                );");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela borda desejada');
                        }
                    }
                    if (self::pesquisarTabela('tamanho') == False) {
                        $query = self::$con->prepare("CREATE TABLE tamanho(id_tamanho INT NOT NULL AUTO_INCREMENT,
                                tamanho VARCHAR(60) NOT NULL,
                                preco_tamanho DOUBLE NOT NULL,
                                qtd_sabor INT NOT NULL,
                                info_tamanho VARCHAR(60) NOT NULL,
                                PRIMARY KEY (id_tamanho)
                                );");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela tamanho desejada');
                        }
                    }
                    if (self::pesquisarTabela('item') == False) {
                        $query = self::$con->prepare("CREATE TABLE item(
                                id_item INT NOT NULL AUTO_INCREMENT,
                                id_borda INT NOT NULL,
                                id_tamanho INT NOT NULL,
                                id_massa INT NOT NULL,
                                id_pedido INT NOT NULL,
                                valor_item DOUBLE NOT NULL,
                                PRIMARY KEY (id_item));");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela item desejada');
                        }
                        $query = self::$con->prepare("ALTER TABLE item ADD FOREIGN KEY(id_borda) REFERENCES borda(id_borda);");
                        $query->execute();
                        $query = self::$con->prepare("ALTER TABLE item ADD FOREIGN KEY(id_tamanho) REFERENCES tamanho(id_tamanho);");
                        $query->execute();
                        $query = self::$con->prepare("ALTER TABLE item ADD FOREIGN KEY(id_massa) REFERENCES massa(id_massa);");
                        $query->execute();
                    }
                    if (self::pesquisarTabela('item_sabores') == False) {
                        $query = self::$con->prepare("CREATE TABLE item_sabores(id_item_sabor INT NOT NULL AUTO_INCREMENT,
                                id_item INT NOT NULL,
                                id_sabor INT NOT NULL,
                                PRIMARY KEY (id_item_sabor));");
                        if (!$query->execute()) {
                            throw new Exception('Não foi possível criar a tabela item_sabores desejada');
                        }

                        $query = self::$con->prepare("ALTER TABLE item_sabores ADD FOREIGN KEY(id_item) REFERENCES item(id_item);");
                        $query->execute();
                        $query = self::$con->prepare("ALTER TABLE item_sabores ADD FOREIGN KEY(id_sabor) REFERENCES sabores(id_sabor);");
                        $query->execute();
                    }
                } else {
                    throw new Exception("Não foi possível conectar ao banco");
                }
                self::iniciarTabelas();
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s') . " - Erro ao criar as tabelas: " . $e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }

        public static function iniciarTabelas()
        {
            try {
                if (self::$con) {
                    //Inicializar tamanhos
                    $query = self::$con->prepare("INSERT INTO tamanho (tamanho, preco_tamanho, qtd_sabor, info_tamanho) VALUES ('Pequena', 34.90, 1, '4 Fatias - 25 cm (1 adulto)')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO tamanho (tamanho, preco_tamanho, qtd_sabor, info_tamanho) VALUES ('Grande', 57.90, 2, '8 Fatias - 35 cm (2 adultos + 1 criança)')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO tamanho (tamanho, preco_tamanho, qtd_sabor, info_tamanho) VALUES ('Gigante', 70.90, 3, '12 Fatias - 45 cm (3 adultos)')");
                    $query->execute();

                    //Inicializar massas
                    $query = self::$con->prepare("INSERT INTO massa (preco_massa, info_massa, massa) VALUES (0, 'Massa mais fina e crocante', 'Fina')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO massa (preco_massa, info_massa, massa) VALUES (0, 'Tradicional', 'Tradicional')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO massa (preco_massa, info_massa, massa) VALUES (10.00, 'Massa aerada com flocos de manteiga', 'Pan')");
                    $query->execute();

                    //inicializar bordas
                    $query = self::$con->prepare("INSERT INTO borda (borda, preco_borda) VALUES ('Sem borda recheada', 0)");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO borda (borda, preco_borda) VALUES ('Cheddar', 5.00)");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO borda (borda, preco_borda) VALUES ('Requeijão', 5.00)");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO borda (borda, preco_borda) VALUES ('Cream cheese', 8.00)");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO borda (borda, preco_borda) VALUES ('Chocolate Preto', 5.00)");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO borda (borda, preco_borda) VALUES ('Chocolate Branco', 5.00)");
                    $query->execute();

                    //Inicializar sabores
                    $query = self::$con->prepare("INSERT INTO sabores (sabores, info_sabor,tipo_sabor, preco_sabor, imagem_sabor) VALUES ('Alho e óleo', 'Muçarela, alho e óleo', 'Tradicional', 0, 'img/pizza.jpg')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO sabores (sabores, info_sabor,tipo_sabor, preco_sabor, imagem_sabor) VALUES ('Caipira', 'Muçarela, frango desfiado e milho', 'Tradicional', 0, 'img/pizza.jpg')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO sabores (sabores, info_sabor,tipo_sabor, preco_sabor, imagem_sabor) VALUES ('Calabresa', 'Muçarela e calabresa', 'Tradicional', 0, 'img/pizza.jpg')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO sabores (sabores, info_sabor,tipo_sabor, preco_sabor, imagem_sabor) VALUES ('Frango com catupiry', 'Muçarela, frago e catupiry', 'Especial', 5, 'img/pizza.jpg')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO sabores (sabores, info_sabor,tipo_sabor, preco_sabor, imagem_sabor) VALUES ('Strogonoff de frango', 'Muçarela, strogonoff e batata palha', 'Especial', 5, 'img/pizza.jpg')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO sabores (sabores, info_sabor,tipo_sabor, preco_sabor, imagem_sabor) VALUES ('Camarão', 'Muçarela e camarão', 'Premium', 15, 'img/pizza.jpg')");
                    $query->execute();
                    $query = self::$con->prepare("INSERT INTO sabores (sabores, info_sabor,tipo_sabor, preco_sabor, imagem_sabor) VALUES ('Mignon crispy', 'Muçarela, filé mignon e cebola crispy', 'Premium', 15, 'img/pizza.jpg')");
                    $query->execute();
                } else {
                    throw new Exception("Não foi possível conectar ao banco");
                }
            } catch (Exception $e) {
                $log = date('d.m.Y h:i:s') . " - Erro ao criar as tabelas: " . $e->getMessage();
                error_log($log . PHP_EOL, 3, './error/db_error.log');
            }
        }
    }
