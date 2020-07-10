//lista area 1
$(document).ready(function () {
    var area_1 = [ 
      "Administração","Administração Pública","Agrimensura","Agroecologia","Agronegócios e Agropecuária","Agronomia",
      "Alimentos","Análise e Desenvolvimento de Sistemas","Animação","Aquicultura","Arqueologia","Arquitetura e Urbanismo",
      "Arquivologia","Artes","Artes Visuais","Astronomia","Automação Industrial","Banco de Dados","Biblioteconomia","Biocombustíveis",
      "Biomedicina","Biossistemas","Biotecnologia","Biotecnologia e Bioquímica","Ciência da Computação","Ciência da Terra","Ciência e Economia",
      "Ciência e Tecnologia","Ciência e Tecnologia","Ciência e Tecnologia das Águas/do Mar","Ciência e Tecnologia de Alimentos","Ciências Aeronáuticas",
      "Ciências Agrárias","Ciências Agrárias","Ciências Atuariais","Ciências Biológicas", "Ciências Contábeis","Ciências da Natureza e suas Tecnologias",
      "Ciências do Consumo","Ciências Econômicas","Ciências Humanas","Ciências Naturais e Exatas","Ciências Sociais","Cinema e Audiovisual",
      "Comércio Exterior","Computação","Comunicação das Artes do Corpo","Comunicação em Mídias Digitais","Comunicação Institucional",
      "Comunicação Organizacional","Conservação e Restauro","Construção Civil","Construção Naval","Cooperativismo","Cultura, Linguagens e Tecnologias Aplicadas",
      "Dança","Defesa e Gestão Estratégica Internacional","Design","Design de Games","Design de Interiores","Design de Moda","Direito","Ecologia",
      "Educação Física","Educomunicação","Eletrônica Industrial","Eletrotécnica Industrial","Energia e Sustentabilidade","Energias Renováveis",
      "Enfermagem","Engenharia Acústica","Engenharia Aeronáutica","Engenharia Agrícola","Engenharia Ambiental e Sanitária","Engenharia Biomédica",
      "Engenharia Bioquímica, de Bioprocessos e Biotecnologia","Engenharia Cartográfica e de Agrimensura","Engenharia Civil","Engenharia da Computação",
      "Engenharia de Alimentos","Engenharia de Biossistemas","Engenharia de Controle e Automação","Engenharia de Energia","Engenharia de Inovação",
      "Engenharia de Materiais","Engenharia de Minas","Engenharia de Pesca","Engenharia de Petróleo","Engenharia de Produção","Engenharia de Segurança no Trabalho",
      "Engenharia de Sistemas","Engenharia de Software","Engenharia de Telecomunicações","Engenharia de Transporte e da Mobilidade",
      "Engenharia Elétrica","Engenharia Eletrônica","Engenharia Física","Engenharia Floresta","Engenharia Hídrica","Engenharia Industrial Madeireira",
      "Engenharia Mecânica","Engenharia Mecatrônica","Engenharia Metalúrgica","Engenharia Naval","Engenharia Nuclear","Engenharia Química","Engenharia Têxtil",
      "Escrita Criativa","Esporte","Estatística","Estética e Cosmética","Estudos de Gênero e Diversidade","Estudos de Mídia","Eventos","Fabricação Mecânica",
      "Farmácia","Filosofia","Física","Fisioterapia","Fonoaudiologia","Fotografia","Gastronomia","Geofísica","Geografia","Geologia","Geoprocessamento",
      "Gerontologia","Gestão Ambiental","Gestão Comercial","Gestão da Informação","Gestão da Produção Industrial","Gestão da Qualidade","Gestão da Tecnologia da Informação",
      "Gestão de Cooperativas","Gestão de Recursos Humanos","Gestão de Segurança Privada","Gestão de Seguros","Gestão de Turismo","Gestão Desportiva e de Lazer",
      "Gestão em Saúde","Gestão Financeira","Gestão Hospitalar","Gestão Pública","História","História da Arte","Hotelaria","Humanidades","Informática Biomédica",
      "Irrigação e Drenagem","Jogos Digitais","Jornalismo","Letras","Libras","Linguagens e Códigos e suas Tecnologias","Linguística","Logística",
      "Luteria","Manutenção de Aeronaves","Manutenção Industrial (T/L)","Marketing","Matemática","Matemática e Computação e suas Tecnologias",
      "Materiais","Mecatrônica Industrial","Medicina","Medicina Veterinária","Meteorologia","Mineração","Museologia","Música","Musicoterapia",
      "Nanotecnologia","Naturologia","Negócios Imobiliários","Nutrição","Obstetrícia","Oceanografia","Odontologia","Oftálmica","Optometria",
      "Papel e Celulose","Pedagogia","Petróleo e Gás","Pilotagem Profissional de Aeronaves","Processos Gerenciais","Processos Metalúrgicos",
      "Processos Químicos","Produção Audiovisual","Produção Cênica","Produção Cultural","Produção de Bebidas","Produção Editorial","Produção Fonográfica",
      "Produção Multimídia","Produção Publicitária","Produção Sucroalcooleira","Produção Têxtil","Psicologia","Psicopedagogia","Publicidade e Propaganda",
      "Química","Quiropraxia","Rádio, TV e Internet","Radiologia","Redes de Computadores","Relações Internacionais","Relações Públicas",
      "Rochas Ornamentais","Saneamento Ambiental","Saúde","Saúde Coletiva","Secretariado","Secretariado Executivo","Segurança da Informação",
      "Segurança no Trabalho","Segurança Pública","Serviço Social","Serviços Judiciários e Notariais","Silvicultura","Sistemas Biomédicos",
      "Sistemas de Informação","Sistemas de Telecomunicações","Sistemas Elétricos","Sistemas Embarcados","Sistemas para Internet","Teatro",
      "Tecnologia da Informação","Teologia","Terapia Ocupacional","Tradutor e Intérprete","Transporte","Turismo","Zootecnia"
    
      ]; 
    var combobox = $("#area_1");
    for (var i = 0; i < area_1.length; i++) {
        combobox.append($('<option>', {value: area_1[i], text: area_1[i]}));
    }
    combobox.show();
  });
  
  
  //lista nivel 1
  $(document).ready(function () {
    var nivel_1 = [ "Auxiliar/Operacional","Técnico","Estágio","Junior/Treinee",
                    "Pleno","Sênior","Supervisão","Gerência","Diretoria"]; 
    var combobox = $("#nivel_1");
    for (var i = 0; i < nivel_1.length; i++) {
        combobox.append($('<option>', {value: nivel_1[i], text: nivel_1[i]}));
    }
    combobox.show();
  });
  