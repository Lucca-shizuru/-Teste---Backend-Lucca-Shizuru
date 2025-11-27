# Teste Backend PHP - CodeIgniter 3

Desenvolvido por: **Seu Nome**

## 🏗️ Arquitetura e Padrões
Este projeto foi desenvolvido visando escalabilidade e manutenção, aplicando conceitos de **Clean Code** e **SOLID** adaptados ao ecossistema PHP:
- **Repository Pattern:** Acesso a dados isolado nos Models.
- **DTOs (Data Transfer Objects):** Camada de transporte para sanitização de inputs.
- **Entities:** Representação orientada a objetos das tabelas.
- **Service Layer:** Integração com API externa (ViaCEP) desacoplada do Controller.

## 🚀 Como Rodar
1. **Requisitos:** Servidor Apache (XAMPP/WAMP) e PHP 7.4 ou 8.x.
2. **Banco de Dados:**
   - Crie um banco chamado `teste_php`.
   - Importe o arquivo `teste_php.sql` localizado na raiz deste projeto.
   - Se necessário, ajuste as credenciais em `application/config/database.php` (Padrão: root / sem senha).
3. **Acesso:**
   - Acesse via navegador: `http://localhost/NomeDaSuaPasta/index.php/`
   - **Login:** admin@admin.com
   - **Senha:** admin

## ⚙️ Notas Técnicas
- A aplicação foi configurada para utilizar `index.php` na URL para garantir compatibilidade máxima com servidores Apache sem necessidade de configuração extra de `.htaccess` (mod_rewrite).
