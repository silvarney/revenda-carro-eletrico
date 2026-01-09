# EV Motors - Tema WordPress para Revenda de Carros Elétricos

## 🚗⚡ Descrição

Tema moderno e responsivo desenvolvido especialmente para revenda de carros elétricos. Design inspirado na estética da OLX com foco em usabilidade e conversão.

## ✨ Características

### Design
- 🎨 Paleta de cores baseada na OLX (Roxo #6E0AD6, Laranja #FF6600, Verde #00A335)
- 📱 Totalmente responsivo
- ⚡ Performance otimizada
- 🎯 UX/UI focado em conversão

### Funcionalidades
- 🔍 Sistema de busca e filtros avançados
- 💜 Sistema de favoritos
- 📊 Comparador de carros
- 🧮 Calculadora de financiamento
- 📱 Integração com WhatsApp
- 🗺️ Google Maps
- 📈 Google Analytics & GTM
- 🌐 SEO otimizado

### Templates Disponíveis
- `index.php` - Home page com hero section e destaques
- `archive-carros.php` - Listagem de carros com filtros
- `single-carros.php` - Página individual do carro com especificações detalhadas
- `header.php` - Cabeçalho com navegação
- `footer.php` - Rodapé informativo com múltiplas seções

## 🚀 Instalação

1. Faça upload da pasta `ev-motors` para `/wp-content/themes/`
2. Ative o tema no painel do WordPress
3. Configure o menu em Aparência > Menus
4. Personalize em Aparência > Personalizar

## 📋 Requisitos

- WordPress 6.0+
- PHP 8.0+
- Plugin "Revenda Carros Elétricos" ativado

## 🎨 Personalização

### Cores
As cores principais estão definidas como variáveis CSS em `style.css`:

```css
:root {
	--primary: #6E0AD6;    /* Roxo principal */
	--secondary: #FF6600;  /* Laranja */
	--success: #00A335;    /* Verde */
	--text: #002F34;       /* Texto escuro */
	--bg: #F7F8F9;         /* Fundo claro */
}
```

### Menus
O tema suporta 2 localizações de menu:
- **Menu Principal**: Exibido no header
- **Menu do Rodapé**: Exibido no footer

### Tamanhos de Imagem
- `carro-thumb`: 400x300px (thumbnails de listagem)
- `carro-large`: 800x600px (imagens de destaque)

## 📱 Responsividade

Breakpoints:
- Desktop: > 768px
- Mobile: ≤ 768px

## 🔌 Integração com Plugin

O tema foi desenvolvido para trabalhar em conjunto com o plugin "Revenda Carros Elétricos", utilizando:
- Custom Post Type: `carros`
- Taxonomias: `marca-carro`, `tipo-carro`, `status-carro`
- Meta fields: `_rce_preco`, `_rce_ano`, `_rce_autonomia`

## 📂 Estrutura de Arquivos

```
ev-motors/
├── style.css           # Estilos principais
├── functions.php       # Funções do tema
├── index.php          # Home page
├── header.php         # Cabeçalho
├── footer.php         # Rodapé
├── archive-carros.php # Listagem de carros
├── single-carros.php  # Página individual
├── assets/
│   └── js/
│       └── main.js    # JavaScript customizado
└── README.md          # Este arquivo
```

## 🎯 Próximos Passos

Após instalar o tema:

1. **Adicionar carros**: Vá em Carros > Adicionar Novo
2. **Configurar taxonomias**: Adicione marcas e tipos em Carros > Marcas/Tipos
3. **Personalizar**: Vá em Aparência > Personalizar para ajustar logo, cores, etc.
4. **Criar páginas**: Crie páginas para Sobre, Contato, etc.
5. **Configurar menu**: Aparência > Menus

## 🌟 Funcionalidades Destacadas

### Hero Section
Seção de destaque na home com call-to-action

### Cards de Carros
Design moderno com:
- Imagem do carro
- Preço em destaque
- Especificações (ano, autonomia)
- Botões de ação

### Sistema de Busca
Filtros por:
- Texto livre
- Marca
- Ano
- Preço

### Página Individual
- Galeria de imagens
- Especificações detalhadas
- Botões de ação (WhatsApp, Favoritos, Comparar)
- Carros similares

## 💡 Dicas de Uso

1. **Imagens**: Use imagens de alta qualidade (mínimo 800x600px)
2. **SEO**: Preencha todos os campos de meta dados
3. **Performance**: Otimize imagens antes do upload
4. **Conteúdo**: Escreva descrições detalhadas dos carros

## 🆘 Suporte

Para suporte e dúvidas sobre o tema, consulte a documentação do projeto ou entre em contato.

## 📄 Licença

GPL v2 ou posterior

## 🔄 Changelog

### Versão 1.0.0 (2026-01-09)
- ✨ Lançamento inicial
- 🎨 Design moderno com paleta OLX
- 📱 Responsividade completa
- ⚡ Performance otimizada
- 🚗 Templates para carros elétricos
- 🔍 Sistema de busca e filtros
- 💜 Integração com plugin RCE

---

**Desenvolvido com ❤️ para promover mobilidade sustentável**
