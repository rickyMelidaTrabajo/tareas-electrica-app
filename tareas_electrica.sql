create database 	
use tareas_electrica

-- Se crea la tabla tecnicos -----------
create table tecnicos (
	id_tecnico int auto_increment,
    nombre varchar(100) not null,
    cargo_t varchar(50) not null,
	turno varchar(50) not null,
    primary key(id_tecnico)
)

-- Se crea la tabla usuarios
create table usuarios (
	id_usuario int(5) auto_increment,
    usuario varchar(50) not null,
    pass varchar(50) not null,
    tecns int not null,
    
    primary key(id_usuario),
    foreign key (tecns) references tecnicos(id_tecnico)
);

-- Se agregan tecnicos ----
insert into tecnicos(nombre, cargo_t, turno) 
			  values("Camilo Barreto","Senior", "Mañana"),
					("Miler Sosa", "Senior", "Tarde"),
                    ("Luis Cabrera", "Senior", "Noche"),
                    ("Ramon Coronel", "Junior", "Mañana"),
                    ("Santiago Mendez", "Junior", "Mañana"),
                    ("Ricardo Melida", "Junior", "Tarde" ),
                    ("Nicolas Acosta", "Junior", "Tarde"),
                    ("Lazaro Romero", "Junior", "Noche" );

-- Modificacion de tipo de dato de cargo
alter table tecnicos add cargo_t varchar(50)

update tecnicos set turno = "Manhana" where id_tecnico=5

select * from tareas
SELECT cargo_t from tecnicos where turno = 'Tarde' and nombre= 'Ricardo Melida'
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas


-- Creamos la tabla de las tareas
create table tareas (
	id_tarea int auto_increment,
    t_tarea varchar(200) not null,
    estado varchar(50) not null,
    des_tarea text not null,
    fecha date not null,
    
    hora_i time,
    hora_f time,
    horas_h time,
    turno varchar(50) not null,
    
    tecnicos varchar(100) ,
    cargo varchar(100),
    
    primary key(id_tarea)
);

-- Tabla de los tipos de tareas
create table t_tareas(
	id_tar int auto_increment, 
    tipo varchar(200) not null,
    
    primary key(id_tar)
)


-- Insertamos los tipos de tareas --
insert into t_tareas(tipo) 
		 values("Rutinas"),
			   ("Asistencia"),
               ("Mantenimiento"),
               ("Correctivo"),
               ("Salon de Eventos"),
               ("Marketing"),
               ("Businesss Center"),
               ("Gimnasio"),
               ("TIC");
               
-- Modificamos el tipo de tareas BC --
update t_tareas set tipo="Business_Center" where id_tar = 7

update tareas set img_antes="antes.png", img_despues="despues.png" where id_tarea=1

select * from tareas

truncate table tareas where estado= "Finalizado"

insert into tareas(t_tarea, estado, des_tarea, fecha, hora_i, hora_f, horas_h, turno, tecnicos, cargo)
values("rutinas", "Finalizado", "Rutinas de trafos y generadores","1992-02-12", "13:00", "15:30", "2:00",  "tarde", "Ricardo Mélida", "Junior");

select tecnicos, horas_h from tareas where horas_h != "00:00:00"

insert into tareas(t_tarea, estado, des_tarea,fecha,  turno)
values("rutinas", "pendiente", "tareas","2019-10-20" , "tarde");


select * from tareas order by id_tarea desc limit 1;

insert into usuarios(usuario, pass, tecns) 
		values('C_Barreto', 'camilobarreto', '1'),
			  ('M_Sosa', 'millersosa', '2'),
			  ('L_Cabrera', 'luiscabrera', '3'),
              ('R_Coronel', 'ramoncoronel', '4'),
              ('S_Mendez', 'santiagomendez', '5'),
              ('R_Melida', 'ricardomelida', '6'),
              ('N_Acosta', 'nicolasacosta', '7'),
              ('V_Velasquez', 'victorvelasquez', '8');
              
insert into tecnicos(nombre, turno, cargo_t) values('Victor Velazquez', 'Mañana', 'Junior')
              

SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) as horas FROM tareas where t_tarea = "asistencia"

SELECT tecnicos, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas where tecnicos = "Ramon Coronel"



SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas

select tecnicos, horas_h from tareas 


select tecnicos, horas_h from tareas where estado="Finalizado"

DATE_SUB(NOW(), INTERVAL 1 HOUR)

select * from tareas



truncate table tareas

delete from tecnicos where id_tecnico > 9