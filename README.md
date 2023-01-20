POC para validacao da manipulação de mapas atendendo os seguintes pontos:

  - Pontos explorados
    - Criação de mapa com marcadores na tela;
    - Criação de multiplas camadas selecionaveis na tela;
    - Criação de marcadores a partir de JSON;
    - Criação de mapa com função de coletar LAT/LONG quando selecionado ponto na tela;
    - Criação de mapa com função de enviar para PHP(via Livewire) coordenadas coletadas no JS;
  
 - Próximos passos:
    - Carregar Banco PostgreSQL com extensão PostGIS para tratamento de informações espaciais;
    - Popular base com pontos de interesse diversos para testes posteriores;
    - Dado um ponto selecionado no mapa, consultar ponto de interesse mais próximo;
    - Calcular Distância[LINHA RETA] entre ponto selecionado e ponto de interesse mais proximo;
    - Calcular Distância[ROTA RODOVIARIA] entre ponto selecionado e ponto de interesse mais proximo;
