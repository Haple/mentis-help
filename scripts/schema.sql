use mentis;

create table paciente(
    IDPaciente int(99) auto_increment not null primary key,
    nomePaciente varchar(255) not null,
    emailPaciente varchar(255) not null,
    CPFPaciente varchar(99) not null,
    sexoPaciente varchar(255) not null,
    estado_civilPaciente varchar(255) not null,
    nascimentoPaciente date not null,
    senhaPaciente varchar(255) not null
);

create table psicologo(
    IDPsicologo int(99) auto_increment not null primary key,
    nomePsicologo varchar(255) not null,
    emailPsicologo varchar(255) not null,
    CPFPsicologo varchar(99) not null,
    CRP varchar(99) not null,
    sexoPsicologo varchar(255) not null,
    nascimentoPsicologo date not null,
    senhaPsicologo varchar(255) not null,
    descricaoPsicologo varchar(255) not null
);

create table adicionar_horario(
    IDadd_horario int(99) auto_increment not null primary key,
    Ref_IDPaciente int(99),
    Ref_IDPsicologo int(99),
    NomePsicologo varchar(255),
    disponibilidade varchar(255) DEFAULT 'Disponível',
    dia date not null,
    hora time not null,
    link varchar(999),
    foreign key (Ref_IDPaciente) references paciente(IDPaciente),
    foreign key (Ref_IDPsicologo) references psicologo(IDPsicologo)
);

create table consulta(
    IDconsulta int(99) auto_increment not null primary key,
    IDPsicologo_c int(99),
    IDPaciente_c int(99),
    IDHorario int(99),
    nomePsicologo_c varchar(255),
    emailPsicologo_c varchar(255),
    dia_c date,
    hora_c time,
    link_c varchar(999),
    foreign key (IDPsicologo_c) references psicologo(IDPsicologo),
    foreign key (IDPaciente_c) references paciente(IDPaciente),
    foreign key (IDHorario) references adicionar_horario(IDadd_horario)
);