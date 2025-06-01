-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 07:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base`
--

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `categoria` varchar(120) NOT NULL,
  `valor_venda` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `categoria`, `valor_venda`) VALUES
(1, 'Notebook Gamer Xtreme i7', 'Eletrônicos', 5899.99),
(2, 'Smartphone Ultra Max 256GB', 'Eletrônicos', 3299.50),
(3, 'Smart TV LED 55 polegadas 4K', 'Eletrônicos', 2999.00),
(4, 'Fones de ouvido Bluetooth Premium', 'Eletrônicos', 450.00),
(5, 'Câmera Digital Profissional DSLR', 'Eletrônicos', 4100.00),
(6, 'Máquina de Café Espresso Automática', 'Eletrodomésticos', 1500.00),
(7, 'Liquidificador Power Turbo 1200W', 'Eletrodomésticos', 280.00),
(8, 'Forno Micro-ondas Digital 30L', 'Eletrodomésticos', 650.00),
(9, 'Geladeira Frost Free Inverter', 'Eletrodomésticos', 3800.00),
(10, 'Ar Condicionado Split Inverter 9000 BTU', 'Eletrodomésticos', 2100.00),
(11, 'Camiseta Algodão Egípcio Tamanho M', 'Vestuário', 79.90),
(12, 'Calça Jeans Slim Fit Masculina', 'Vestuário', 150.00),
(13, 'Vestido Floral Verão Tamanho P', 'Vestuário', 120.00),
(14, 'Tênis Esportivo Corrida Masculino', 'Calçados', 300.00),
(15, 'Sandália Anabela Feminina Couro', 'Calçados', 95.00),
(16, 'Livro: O Senhor dos Anéis - A Sociedade do Anel', 'Livros', 65.00),
(17, 'Kit Canetas Gel Coloridas (12 unidades)', 'Papelaria', 25.00),
(18, 'Mochila Escolar Resistente', 'Acessórios', 85.00),
(19, 'Mouse Sem Fio Ergonômico', 'Informática', 70.00),
(20, 'Teclado Mecânico RGB Gamer', 'Informática', 350.00),
(21, 'Monitor LED 24 polegadas Full HD', 'Informática', 800.00),
(22, 'Webcam Full HD com Microfone', 'Informática', 180.00),
(23, 'Impressora Multifuncional Tanque de Tinta', 'Informática', 1200.00),
(24, 'Sofá de 3 Lugares Confort Plus', 'Móveis', 1900.00),
(25, 'Mesa de Centro Rústica Madeira', 'Móveis', 400.00),
(26, 'Cadeira de Escritório Ergonômica', 'Móveis', 750.00),
(27, 'Armário de Cozinha Compacto', 'Móveis', 900.00),
(28, 'Cama Box Casal com Colchão Ortopédico', 'Móveis', 2500.00),
(29, 'Conjunto de Panelas Antiaderente (5 peças)', 'Utensílios Domésticos', 280.00),
(30, 'Faca de Chefe Aço Inox 8 polegadas', 'Utensílios Domésticos', 110.00),
(31, 'Jogo de Copos de Vidro (6 unidades)', 'Utensílios Domésticos', 45.00),
(32, 'Kit Ferramentas Completo para Casa', 'Ferramentas', 320.00),
(33, 'Furadeira de Impacto Elétrica 750W', 'Ferramentas', 250.00),
(34, 'Serra Tico-Tico Profissional', 'Ferramentas', 480.00),
(35, 'Parafusadeira/Furadeira a Bateria', 'Ferramentas', 390.00),
(36, 'Maleta de Ferramentas com Rodas', 'Ferramentas', 550.00),
(37, 'Barra de Proteína Sabor Chocolate', 'Alimentos', 12.00),
(38, 'Café Gourmet Torrado e Moído 250g', 'Alimentos', 28.00),
(39, 'Azeite Extra Virgem Italiano 500ml', 'Alimentos', 55.00),
(40, 'Macarrão Integral Espaguete 500g', 'Alimentos', 8.00),
(41, 'Chocolate Amargo 70% Cacau 100g', 'Alimentos', 15.00),
(42, 'Sabonete Líquido Hidratante 500ml', 'Higiene Pessoal', 22.00),
(43, 'Shampoo para Cabelos Oleosos 300ml', 'Higiene Pessoal', 35.00),
(44, 'Creme Dental Clareador com Flúor', 'Higiene Pessoal', 18.00),
(45, 'Protetor Solar Facial FPS 50', 'Higiene Pessoal', 60.00),
(46, 'Desodorante Roll-on Sem Perfume', 'Higiene Pessoal', 16.00),
(47, 'Brinquedo Educativo Blocos de Montar', 'Brinquedos', 90.00),
(48, 'Carrinho de Controle Remoto Off-Road', 'Brinquedos', 180.00),
(49, 'Boneca Interativa com Acessórios', 'Brinquedos', 130.00),
(50, 'Quebra-Cabeça 1000 Peças Cenário Natural', 'Brinquedos', 55.00),
(51, 'Bicicleta Infantil Aro 16', 'Bicicletas', 450.00),
(52, 'Capacete Ciclismo Adulto Ajustável', 'Esportes', 120.00),
(53, 'Bola de Futebol Campo Profissional', 'Esportes', 80.00),
(54, 'Raquete de Tênis de Mesa Profissional', 'Esportes', 70.00),
(55, 'Corda de Pular com Contador', 'Esportes', 30.00),
(56, 'Halteres Emborrachados (par) 5kg', 'Fitness', 150.00),
(57, 'Tapete de Yoga Antiderrapante', 'Fitness', 60.00),
(58, 'Kit Bandas Elásticas de Resistência', 'Fitness', 40.00),
(59, 'Smartwatch Fitness Monitor Cardíaco', 'Wearables', 600.00),
(60, 'Pulseira Inteligente com GPS', 'Wearables', 250.00),
(61, 'Bolsa Feminina de Couro Genuíno', 'Moda e Acessórios', 380.00),
(62, 'Óculos de Sol Polarizado Masculino', 'Moda e Acessórios', 220.00),
(63, 'Relógio Analógico Clássico Masculino', 'Moda e Acessórios', 290.00),
(64, 'Cinto Masculino de Couro Reversível', 'Moda e Acessórios', 85.00),
(65, 'Carteira Feminina Porta Cartões', 'Moda e Acessórios', 70.00),
(66, 'Conjunto de Pratos de Cerâmica (4 peças)', 'Decoração', 160.00),
(67, 'Vaso de Flores Decorativo Vidro', 'Decoração', 50.00),
(68, 'Quadro Decorativo Abstrato Grande', 'Decoração', 180.00),
(69, 'Luminária de Mesa LED Flexível', 'Decoração', 90.00),
(70, 'Almofada Decorativa com Textura', 'Decoração', 40.00),
(71, 'Cobertor de Microfibra Casal', 'Cama, Mesa e Banho', 110.00),
(72, 'Jogo de Lençol 4 Peças Queen Size', 'Cama, Mesa e Banho', 250.00),
(73, 'Toalha de Banho Gigante Algodão', 'Cama, Mesa e Banho', 60.00),
(74, 'Tapete de Banheiro Antiderrapante', 'Cama, Mesa e Banho', 35.00),
(75, 'Cortina Blackout para Quarto', 'Cama, Mesa e Banho', 140.00),
(76, 'Ração Premium para Cães Adultos 15kg', 'Pet Shop', 190.00),
(77, 'Cama Pet Confortável Tamanho G', 'Pet Shop', 120.00),
(78, 'Coleira Anti-pulgas para Gatos', 'Pet Shop', 45.00),
(79, 'Brinquedo Interativo para Pets', 'Pet Shop', 30.00),
(80, 'Shampoo para Cães e Gatos Hipoalergênico', 'Pet Shop', 50.00),
(81, 'Bateria Automotiva 60 Amperes', 'Automotivo', 450.00),
(82, 'Óleo de Motor Sintético 5W-30', 'Automotivo', 70.00),
(83, 'Kit Lâmpadas LED para Farol', 'Automotivo', 150.00),
(84, 'Cera Polidora para Carros', 'Automotivo', 40.00),
(85, 'Pneu Aro 15 Esportivo', 'Automotivo', 600.00),
(86, 'Drone com Câmera HD e GPS', 'Drones e RC', 800.00),
(87, 'Carro de Controle Remoto Escalada', 'Drones e RC', 190.00),
(88, 'Avião de Controle Remoto Elétrico', 'Drones e RC', 350.00),
(89, 'Bateria Extra para Drone', 'Drones e RC', 120.00),
(90, 'Kit Reparo de Hélice para Drone', 'Drones e RC', 25.00),
(91, 'Cabo HDMI 4K Ultra HD 2 Metros', 'Cabos e Adaptadores', 40.00),
(92, 'Adaptador USB-C para HDMI', 'Cabos e Adaptadores', 60.00),
(93, 'Extensão Elétrica 5 Metros com Filtro', 'Cabos e Adaptadores', 55.00),
(94, 'Carregador Portátil Power Bank 10000mAh', 'Cabos e Adaptadores', 90.00),
(95, 'Hub USB 3.0 com 4 Portas', 'Cabos e Adaptadores', 75.00),
(96, 'Caixa de Som Bluetooth Potente', 'Áudio', 300.00),
(97, 'Headset Gamer com Microfone Retrátil', 'Áudio', 220.00),
(98, 'Microfone Condensador para Estúdio', 'Áudio', 500.00),
(99, 'Barra de Som para TV com Subwoofer', 'Áudio', 750.00),
(100, 'Fones de Ouvido Intra-auriculares com Fio', 'Áudio', 80.00),
(101, 'Tinta Acrílica para Parede Branco Neve 18L', 'Materiais de Construção', 250.00),
(102, 'Cimento Portland CPII 50kg', 'Materiais de Construção', 35.00),
(103, 'Tijolo Cerâmico 6 Furos', 'Materiais de Construção', 0.80),
(104, 'Argamassa ACIII para Porcelanato', 'Materiais de Construção', 25.00),
(105, 'Rejunte Acrílico Flexível Cinza', 'Materiais de Construção', 18.00),
(106, 'Mangueira de Jardim Flexível 20 Metros', 'Jardinagem', 70.00),
(107, 'Vaso de Planta Plástico Grande', 'Jardinagem', 25.00),
(108, 'Terra Adubada Orgânica 5kg', 'Jardinagem', 15.00),
(109, 'Luvas de Jardinagem Reforçadas', 'Jardinagem', 20.00),
(110, 'Tesoura de Poda Profissional', 'Jardinagem', 65.00),
(111, 'Kit Pincéis de Maquiagem Profissional', 'Beleza', 120.00),
(112, 'Base Líquida HD Média Cobertura', 'Beleza', 80.00),
(113, 'Máscara de Cílios Volume Intenso', 'Beleza', 45.00),
(114, 'Batom Matte Longa Duração Vermelho', 'Beleza', 30.00),
(115, 'Perfume Feminino Floral Frutal 50ml', 'Beleza', 180.00),
(116, 'Pijama Feminino Longo Algodão', 'Moda Praia e Íntima', 90.00),
(117, 'Sutiã Rendado Com Bojo Tamanho G', 'Moda Praia e Íntima', 60.00),
(118, 'Cueca Boxer Algodão Masculina (3 unidades)', 'Moda Praia e Íntima', 75.00),
(119, 'Biquíni Cortininha Estampado', 'Moda Praia e Íntima', 110.00),
(120, 'Short de Praia Masculino Estampado', 'Moda Praia e Íntima', 80.00),
(121, 'Barra de Cereal Integral Sabor Frutas', 'Alimentos Naturais', 7.00),
(122, 'Suco de Uva Integral Orgânico 1L', 'Alimentos Naturais', 18.00),
(123, 'Grão de Bico Cozido 500g', 'Alimentos Naturais', 10.00),
(124, 'Castanha do Pará 100g', 'Alimentos Naturais', 30.00),
(125, 'Mel Puro de Abelhas 500g', 'Alimentos Naturais', 40.00),
(126, 'Piscina Inflável Infantil 1000 Litros', 'Lazer', 200.00),
(127, 'Jogo de Tabuleiro Estratégico', 'Lazer', 120.00),
(128, 'Rede de Descanso com Suporte', 'Lazer', 250.00),
(129, 'Barraca de Camping 4 Pessoas', 'Lazer', 350.00),
(130, 'Kit Churrasco Inox (5 peças)', 'Lazer', 150.00),
(131, 'Vitamina C Efervescente 30 Comprimidos', 'Saúde e Bem-Estar', 45.00),
(132, 'Ômega 3 Óleo de Peixe (60 Cápsulas)', 'Saúde e Bem-Estar', 70.00),
(133, 'Probiótico Digestivo (30 Cápsulas)', 'Saúde e Bem-Estar', 60.00),
(134, 'Chá de Camomila Orgânico (20 Sachês)', 'Saúde e Bem-Estar', 15.00),
(135, 'Medidor de Pressão Arterial Automático', 'Saúde e Bem-Estar', 180.00),
(136, 'Cartucho de Tinta Original Preto', 'Suprimentos para Escritório', 90.00),
(137, 'Resma de Papel Sulfite A4 (500 folhas)', 'Suprimentos para Escritório', 28.00),
(138, 'Grampeador Metálico Grande', 'Suprimentos para Escritório', 35.00),
(139, 'Tesoura Escolar Sem Ponta', 'Suprimentos para Escritório', 10.00),
(140, 'Cola Bastão Atóxica (2 unidades)', 'Suprimentos para Escritório', 12.00),
(141, 'Bola de Basquete Oficial Tamanho 7', 'Esportes', 90.00),
(142, 'Luvas de Goleiro Profissionais', 'Esportes', 110.00),
(143, 'Patins In Line Ajustável Tamanho 38-41', 'Esportes', 280.00),
(144, 'Skate Completo Iniciante', 'Esportes', 190.00),
(145, 'Caneleira de Futebol Juvenil', 'Esportes', 40.00),
(146, 'Guitarra Elétrica Stratocaster Sunburst', 'Instrumentos Musicais', 900.00),
(147, 'Violão Acústico Clássico', 'Instrumentos Musicais', 450.00),
(148, 'Teclado Musical Eletrônico 61 Teclas', 'Instrumentos Musicais', 600.00),
(149, 'Baixo Elétrico 4 Cordas Preto', 'Instrumentos Musicais', 850.00),
(150, 'Microfone para Karaokê com Fio', 'Instrumentos Musicais', 70.00),
(151, 'Piscina de Bolinhas Infantil', 'Brinquedos', 150.00),
(152, 'Carrinho de Mão de Brinquedo', 'Brinquedos', 50.00),
(153, 'Jogo de Chá Infantil', 'Brinquedos', 45.00),
(154, 'Cubo Mágico Profissional', 'Brinquedos', 30.00),
(155, 'Kit Slime Colorido', 'Brinquedos', 25.00),
(156, 'Smartwatch Fitness com GPS e NFC', 'Wearables', 750.00),
(157, 'Fone de Ouvido Bluetooth Esportivo', 'Wearables', 180.00),
(158, 'Óculos de Realidade Virtual para Smartphone', 'Eletrônicos', 150.00),
(159, 'Projetor Portátil Mini LED', 'Eletrônicos', 400.00),
(160, 'Robô Aspirador de Pó Inteligente', 'Eletrodomésticos', 900.00),
(161, 'Máquina de Lavar Roupas 12kg', 'Eletrodomésticos', 2100.00),
(162, 'Air Fryer Digital 4 Litros', 'Eletrodomésticos', 400.00),
(163, 'Cafeteira Elétrica Programável', 'Eletrodomésticos', 220.00),
(164, 'Tostadeira Elétrica 2 Fatias', 'Eletrodomésticos', 90.00),
(165, 'Conjunto de Taças de Vinho Cristal (6 unidades)', 'Utensílios Domésticos', 180.00),
(166, 'Jogo de Talheres Inox (24 peças)', 'Utensílios Domésticos', 150.00),
(167, 'Forma de Silicone para Assar Bolo', 'Utensílios Domésticos', 35.00),
(168, 'Descascador de Legumes Giratório', 'Utensílios Domésticos', 20.00),
(169, 'Abridor de Latas e Garrafas Multifuncional', 'Utensílios Domésticos', 28.00),
(170, 'Kit de Jardinagem Infantil', 'Jardinagem', 50.00),
(171, 'Pulverizador Manual para Plantas', 'Jardinagem', 40.00),
(172, 'Enxada Tramontina com Cabo', 'Jardinagem', 60.00),
(173, 'Regador de Plástico 5 Litros', 'Jardinagem', 25.00),
(174, 'Sementes de Hortaliças Variadas', 'Jardinagem', 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `status`) VALUES
(1, 'Acesso público', 'public@access.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(2, 'Maria Oliveira', 'maria.oliveira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(3, 'Pedro Souza', 'pedro.souza@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(4, 'Ana Santos', 'ana.santos@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(5, 'Carlos Pereira', 'carlos.pereira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(6, 'Fernanda Costa', 'fernanda.costa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(7, 'Rafael Martins', 'rafael.martins@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(8, 'Juliana Lima', 'juliana.lima@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(9, 'Lucas Rocha', 'lucas.rocha@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(10, 'Patrícia Mendes', 'patricia.mendes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(11, 'Felipe Almeida', 'felipe.almeida@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(12, 'Mariana Gomes', 'mariana.gomes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(13, 'Guilherme Ferreira', 'guilherme.ferreira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(14, 'Beatriz Ribeiro', 'beatriz.ribeiro@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(15, 'Daniel Costa', 'daniel.costa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(16, 'Amanda Fernandes', 'amanda.fernandes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(17, 'Thiago Barbosa', 'thiago.barbosa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(18, 'Carolina Dias', 'carolina.dias@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(19, 'Eduardo Castro', 'eduardo.castro@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(20, 'Isabela Cardoso', 'isabela.cardoso@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(21, 'Bruno Moreira', 'bruno.moreira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(22, 'Larissa Gonçalves', 'larissa.goncalves@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(23, 'Rodrigo Nunes', 'rodrigo.nunes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(24, 'Camila Paz', 'camila.paz@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(25, 'André Correia', 'andre.correia@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(26, 'Gabriela Barros', 'gabriela.barros@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(27, 'Vinicius Duarte', 'vinicius.duarte@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(28, 'Sofia Oliveira', 'sofia.oliveira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(29, 'Leonardo Costa', 'leonardo.costa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(30, 'Giovanna Pires', 'giovanna.pires@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(31, 'Diego Santana', 'diego.santana@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(32, 'Vitória Mendes', 'vitoria.mendes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(33, 'Daniela Martins', 'daniela.martins@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(34, 'Gustavo Lima', 'gustavo.lima@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(35, 'Laura Rocha', 'laura.rocha@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(36, 'Marcelo Mendes', 'marcelo.mendes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(37, 'Clara Almeida', 'clara.almeida@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(38, 'Arthur Gomes', 'arthur.gomes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(39, 'Helena Ferreira', 'helena.ferreira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(40, 'Ricardo Ribeiro', 'ricardo.ribeiro@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(41, 'Suelen Costa', 'suelen.costa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(42, 'Paulo Fernandes', 'paulo.fernandes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(43, 'Aline Barbosa', 'aline.barbosa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(44, 'Roberto Dias', 'roberto.dias@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(45, 'Priscila Castro', 'priscila.castro@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(46, 'Marcelo Cardoso', 'marcelo.cardoso@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(47, 'Renata Moreira', 'renata.moreira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(48, 'Vitor Gonçalves', 'vitor.goncalves@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(49, 'Vanessa Nunes', 'vanessa.nunes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(50, 'Jorge Paz', 'jorge.paz@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(51, 'Simone Correia', 'simone.correia@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(52, 'Fernando Barros', 'fernando.barros@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(53, 'Cristina Duarte', 'cristina.duarte@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(54, 'Diego Santana', 'diego.santana@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(55, 'Érica Mendes', 'erica.mendes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(56, 'Fábio Martins', 'fabio.martins@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(57, 'Gisele Lima', 'gisele.lima@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(58, 'Hugo Rocha', 'hugo.rocha@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(59, 'Ingrid Mendes', 'ingrid.mendes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(60, 'Jefferson Almeida', 'jefferson.almeida@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(61, 'Kelly Gomes', 'kelly.gomes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(62, 'Luis Ferreira', 'luis.ferreira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(63, 'Monica Ribeiro', 'monica.ribeiro@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(64, 'Nathan Costa', 'nathan.costa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(65, 'Olivia Fernandes', 'olivia.fernandes@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(66, 'Pablo Barbosa', 'pablo.barbosa@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(67, 'Quiteria Dias', 'quiteria.dias@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(68, 'Renato Castro', 'renato.castro@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(69, 'Silvia Cardoso', 'silvia.cardoso@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo'),
(70, 'Thiago Moreira', 'thiago.moreira@example.com', 'efa1f375d76194fa51a3556a97e641e61685f914d446979da50a551a4333ffd7', 'ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
