/*esta linea es para crear base de datos*/
create database distribuidora_nelly;

/*esta linea es para seleccionar la base de datos*/
use distribuidora_nelly;

/*esta linea es para crear tabla de producto*/
create table producto (
codigo_producto int primary key AUTO_INCREMENT not null,
PLU_producto int null,
descripcion_producto varchar (200) not null,
marca_producto varchar (50) not null,
precio_producto int not null);

/*esta linea es para crear tabla de inventario*/
create table inventario (
codigo_inventario int primary key AUTO_INCREMENT not null,
fk_codigo_producto int not null,
cantidad_inventario int not null,
fecha date not null,
INDEX (fk_codigo_producto),
FOREIGN KEY (fk_codigo_producto) REFERENCES producto (codigo_producto));

/*esta linea es para crear tabla de cliente*/
create table cliente (
codigo_cliente int primary key auto_increment not null,
nombres_cliente varchar (50) not null,
apellidos_cliente varchar (50) not null,
celular_cliente varchar (50) null,
correo_electronico_cliente varchar (100) null);

/*esta linea es para crear tabla de venta*/
create table venta (
codigo_venta int primary key auto_increment not null,
fk_codigo_producto int not null,
fk_codigo_cliente int not null,
fecha_de_venta date not null,
cantidad_venta int not null,
valor_unidad_venta int not null,
valor_total_venta int not null,
INDEX (fk_codigo_producto),
FOREIGN KEY (fk_codigo_producto) REFERENCES producto (codigo_producto),
INDEX (fk_codigo_cliente),
FOREIGN KEY (fk_codigo_cliente) REFERENCES cliente (codigo_cliente));


/*este bloque es para insertar en tabla producto*/
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	1	,	42185	,	"colonia refrescante con fresa mara y limon"	,	"love nature"	,	70000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	2	,	35436	,	"colonia refrescante radiant rose"	,	"love nature"	,	50000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	3	,	42183	,	"colonia refrescante con lavanda"	,	"love nature"	,	70000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	4	,	42186	,	"colonia refrescante para el fresh citrus"	,	"love nature"	,	54900	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	5	,	40775	,	"jabon liquido para cuerpo y cabello con manzana"	,	"love nature"	,	33000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	6	,	33338	,	"shampoo dos en uno para todo tipo de cabello"	,	"love nature"	,	45000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	7	,	43907	,	"crema corporal aclaradora con vitaminas E Y B3"	,	"essentials"	,	32900	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	8	,	43906	,	"crema facial aclaradora con vitaminas E Y B3 y FPS10"	,	"essentials"	,	20000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	9	,	43908	,	"limpiador facial aclarador con vitaminas E Y B3"	,	"essentials"	,	12900	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	10	,	43911	,	"crema facial aclaradora con vitaminas E Y B3"	,	"essentials"	,	22000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	11	,	31602	,	"crema nutritiva para manos y cuerpo "	,	"milk y honey "	,	24900	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	12	,	32643	,	"spray revitalizante antitranspirante "	,	"feet up"	,	32900	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	13	,	38613	,	"gel facial energizante 2 en 1 hidratante y posafeitado "	,	"north for men"	,	20000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	14	,	38912	,	"colonia refrescante "	,	"north for men"	,	26900	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	15	,	38914	,	"be happy feel good perfume"	,	"feel good"	,	55000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	16	,	32619	,	"acondicionador para cabello seco con trigo y coco"	,	"love nature"	,	30000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	17	,	35870	,	"espuma de afeitar y limpiadora 2 en 1 "	,	"north for men"	,	29999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	18	,	38481	,	"gel de ducha "	,	"sweet daydream"	,	45000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	19	,	37772	,	"joyce jade "	,	"eau de toilette"	,	34999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	20	,	43926	,	"desodorante antitranspirante en roll on aclarante"	,	"ativelle"	,	19000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	21	,	35926	,	"shampoo anticaida fall defence"	,	"hairx"	,	24999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	22	,	34818	,	"gel de ducha con aceite de oliva y aloe vera"	,	"love nature"	,	54000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	23	,	38614	,	"gel de ducha exfoliante para hombre"	,	"north for men"	,	36000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	24	,	35878	,	"gel de ducha y shampoo "	,	"north for men"	,	29999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	25	,	34501	,	"limpiador intimo en gel con flor"	,	"feminelle"	,	19999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	26	,	35931	,	"acondicionador anticaida "	,	"hairx"	,	24999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	27	,	35910	,	"limpiadora facial energizante con durazno y naranja "	,	"love nature"	,	14999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	28	,	33197	,	"gel calmante para piernas y pies cansados"	,	"feet up"	,	19999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	29	,	41674	,	"mascarilla de arcilla para control de grasa facial"	,	"pure skin"	,	23000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	30	,	41673	,	"crema facial matificante y refrescante "	,	"pure skin"	,	12999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	31	,	42881	,	"mascarilla de carbon "	,	"pure skin"	,	23000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	32	,	34897	,	"locion hidratante corporal y facial para despues del sol"	,	"pure skin"	,	30000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	33	,	32647	,	"gel exfoliante facial limpieza profunda"	,	"pure skin"	,	25000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	34	,	34914	,	"spay protector termico para cabello "	,	"hairx"	,	40000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	35	,	41311	,	"desodorante antitranspirante en spay"	,	"activelle"	,	33000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	36	,	35759	,	"gel facial y corporal para despues del sol"	,	"sun 360"	,	40000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	37	,	34820	,	"tonico refrescante con aloe vera y agua de coco"	,	"love nature"	,	14999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	38	,	31495	,	"perfume volare forever eau"	,	"volare"	,	72000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	39	,	34061	,	"crema para manos "	,	"loving care "	,	31000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	40	,	34920	,	"gel fijador para cabello"	,	"north for men"	,	23000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	41	,	34098	,	"aceite de aguacate para cuerpo y cabello"	,	"love nature"	,	40000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	42	,	38907	,	"aceite de almendras dulces para cuerpo y cabello"	,	"love nature"	,	32999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	43	,	33973	,	"mascarilla facial revitalizante"	,	"novage"	,	30000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	44	,	34926	,	"crema de manos hidratante con aceite de arnica "	,	"oriflame"	,	17000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	45	,	30399	,	"perfume miss giodani eau"	,	"giodani gold"	,	89999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	46	,	34822	,	"2 en 1 mascarilla y exfoliante "	,	"love nature"	,	16999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	47	,	35665	,	"perfuma glacier eau de toilette"	,	"glacier"	,	59999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	48	,	34090	,	"crema corporal con melon y agua de coco"	,	"love nature"	,	34000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	49	,	40804	,	"jabon de barra con manzana"	,	"love nature"	,	13000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	50	,	38874	,	"pasta de dientes blanqueadora"	,	"optifresh"	,	16999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	51	,	32626	,	"aceite de coco para el cabello"	,	"love nature"	,	30000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	52	,	41303	,	"desodorante antitranspirante en roll on antimanchas"	,	"love nature"	,	19000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	53	,	41694	,	"mascarilla facial tipo batido en moras oscuras"	,	"love nature"	,	21000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	54	,	35957	,	"shampoo para cabello radiante "	,	"milk y honey "	,	29999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	55	,	42737	,	"reloj aniversary watch"	,	"giodani gold"	,	129999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	56	,	38337	,	"separadores de dedos para pedicura"	,	"feet up"	,	9000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	57	,	41958	,	"mascarilla nutritiva de aguacate para cabello"	,	"love nature"	,	10000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	58	,	33447	,	"exfoliante de manos"	,	"milk y honey "	,	25000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	59	,	43126	,	"esponja de baño navideña"	,	"oriflame"	,	14000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	60	,	44271	,	"set de tres pares de aretes"	,	"oriflame"	,	50000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	61	,	34843	,	"tonico purificante con arbol de té y limon "	,	"love nature"	,	19999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	62	,	8590	,	"esponja de baño"	,	"oriflame"	,	9000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	63	,	38610	,	"jabon en barra exfoliante para hombre"	,	"north for men"	,	16000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	64	,	32649	,	"crema facial matificante y refrescante anti imperfecciones"	,	"pure skin"	,	23000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	65	,	41676	,	"gel facial anti imperfecciones"	,	"pure skin"	,	12999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	66	,	34849	,	"aceite purificante con arbol de te y limon"	,	"love nature"	,	16999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	67	,	41957	,	"mascarilla hidratante de banano para el cabello"	,	"love nature"	,	10000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	68	,	41959	,	"mascarilla revitalizante de mango para el cabello"	,	"love nature"	,	10000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	69	,	37570	,	"mascarilla facial accion dual"	,	"pure skin"	,	9000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	70	,	8617	,	"esponja para limpieza facial"	,	"oriflame"	,	6999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	71	,	26825	,	"removedor de impurezas faciales 2 en 1 "	,	"oriflame"	,	7999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	72	,	41561	,	"esponja konjac"	,	"love nature"	,	25000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	73	,	42298	,	"banda para hacer peinados"	,	"oriflame"	,	12000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	74	,	28741	,	"plantillas de gel para pies"	,	"oriflame"	,	15000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	75	,	32620	,	"hot oil para cabello seco de trigo y coco "	,	"love nature"	,	10000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	76	,	38491	,	"jabon en barra magic"	,	"magic garden"	,	10000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	77	,	42873	,	"jabon en barra sprendid"	,	"sprendid bouquet"	,	10000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	78	,	41008	,	"jabon en barra be happy"	,	"feel good"	,	16000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	79	,	43909	,	"jabon en barra aclarador con vitaminas E y B3"	,	"essentials"	,	6999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	80	,	34092	,	"jabon en barra con melon y agua de coco"	,	"love nature"	,	9000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	81	,	40804	,	"jabon en barra con manzana - kids"	,	"love nature"	,	13000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	82	,	38947	,	"labian mate"	,	"oncolour"	,	20000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	83	,	42780	,	"mascara para pestañas doble efecto"	,	"the one"	,	29999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	84	,	40697	,	"mascara para pestañas a prueba de agua"	,	"the one"	,	19999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	85	,	34108	,	"spay fijador de maquillaje "	,	"the one"	,	35000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	86	,	39914	,	"corrector en barra"	,	"oncolour"	,	25000	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	87	,	34855	,	"corrector purificante con arbol de te y limon"	,	"love nature"	,	16999	);
INSERT INTO producto (codigo_producto, PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (	88	,	41758	,	"endurecedor de uñas "	,	"the one"	,	23000	);


/*este bloque es para insertar en tabla inventario*/
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	1	,	1	,	1	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	2	,	2	,	1	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	3	,	3	,	1	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	4	,	4	,	1	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	5	,	5	,	2	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	6	,	6	,	1	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	7	,	7	,	4	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	8	,	8	,	5	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	9	,	9	,	1	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	10	,	10	,	1	,	"2022-11-17"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	11	,	11	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	12	,	12	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	13	,	13	,	4	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	14	,	14	,	3	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	15	,	15	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	16	,	16	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	17	,	17	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	18	,	18	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	19	,	19	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	20	,	20	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	21	,	21	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	22	,	22	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	23	,	23	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	24	,	24	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	25	,	25	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	26	,	26	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	27	,	27	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	28	,	28	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	29	,	29	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	30	,	30	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	31	,	31	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	32	,	32	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	33	,	33	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	34	,	34	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	35	,	35	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	36	,	36	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	37	,	37	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	38	,	38	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	39	,	39	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	40	,	40	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	41	,	41	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	42	,	42	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	43	,	43	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	44	,	44	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	45	,	45	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	46	,	46	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	47	,	47	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	48	,	48	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	49	,	49	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	50	,	50	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	51	,	51	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	52	,	52	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	53	,	53	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	54	,	54	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	55	,	55	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	56	,	56	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	57	,	57	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	58	,	58	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	59	,	59	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	60	,	60	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	61	,	61	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	62	,	62	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	63	,	63	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	64	,	64	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	65	,	65	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	66	,	66	,	4	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	67	,	67	,	3	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	68	,	68	,	3	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	69	,	69	,	3	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	70	,	70	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	71	,	71	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	72	,	72	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	73	,	73	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	74	,	74	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	75	,	75	,	2	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	76	,	76	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	77	,	77	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	78	,	78	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	79	,	79	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	80	,	80	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	81	,	81	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	82	,	82	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	83	,	83	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	84	,	84	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	85	,	85	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	86	,	86	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	87	,	87	,	1	,	"2022-11-18"	);
INSERT INTO inventario (codigo_inventario, fk_codigo_producto, cantidad_inventario, fecha) VALUES (	88	,	88	,	1	,	"2022-11-18"	);


/*este bloque es para insertar en tabla cliente*/
INSERT INTO cliente (codigo_cliente, nombres_cliente, apellidos_cliente, celular_cliente, correo_electronico_cliente) VALUES (	1	,	"Maria Angelica"	,	"Guzman"	,	3217662788	,	"angelitaguzman@hotmail.com"	);
INSERT INTO cliente (codigo_cliente, nombres_cliente, apellidos_cliente, celular_cliente, correo_electronico_cliente) VALUES (	2	,	"Natalia"	,	"Buitrago"	,	3022894663	,	"natabuitrago@gmail.com"	);
INSERT INTO cliente (codigo_cliente, nombres_cliente, apellidos_cliente, celular_cliente, correo_electronico_cliente) VALUES (	3	,	"Erika Milena"	,	"Zipa"	,	3224839655	,	"erika.zipa@gmail.com"	);
INSERT INTO cliente (codigo_cliente, nombres_cliente, apellidos_cliente, celular_cliente, correo_electronico_cliente) VALUES (	4	,	"Niyireth Andrea"	,	"Marin Huertas"	,	3193125978	,	"niyi.marin@gmail.com"	);
INSERT INTO cliente (codigo_cliente, nombres_cliente, apellidos_cliente, celular_cliente, correo_electronico_cliente) VALUES (	5	,	"Diana"	,	"Esquivel"	,	3155814634	,	"diana.1985@gmail.com"	);


/*este bloque es para insertar en tabla venta*/
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	1	,	6	,	4	,	"2022-11-18"	,	1	,	45000	,	45000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	2	,	7	,	5	,	"2022-11-18"	,	2	,	32900	,	65800	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	3	,	16	,	1	,	"2022-11-20"	,	1	,	30000	,	30000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	4	,	30	,	2	,	"2022-11-20"	,	2	,	12999	,	25998	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	5	,	59	,	4	,	"2022-11-18"	,	2	,	14000	,	28000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	6	,	64	,	4	,	"2022-11-18"	,	1	,	23000	,	23000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	7	,	15	,	3	,	"2022-11-18"	,	1	,	55000	,	55000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	8	,	23	,	3	,	"2022-11-18"	,	1	,	36000	,	36000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	9	,	27	,	2	,	"2022-11-18"	,	1	,	14999	,	14999	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	10	,	1	,	5	,	"2022-11-30"	,	1	,	70000	,	70000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	11	,	3	,	4	,	"2022-11-18"	,	1	,	70000	,	70000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	12	,	8	,	3	,	"2022-11-18"	,	5	,	20000	,	100000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	13	,	88	,	1	,	"2022-11-19"	,	1	,	23000	,	23000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	14	,	82	,	3	,	"2022-11-19"	,	1	,	20000	,	20000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	15	,	69	,	5	,	"2022-11-19"	,	3	,	9000	,	27000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	16	,	73	,	3	,	"2022-11-21"	,	1	,	12000	,	12000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	17	,	66	,	4	,	"2022-11-19"	,	3	,	16999	,	50997	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	18	,	78	,	1	,	"2022-11-19"	,	1	,	16000	,	16000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	19	,	47	,	2	,	"2022-11-25"	,	1	,	59999	,	59999	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	20	,	34	,	4	,	"2022-11-19"	,	1	,	40000	,	40000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	21	,	40	,	3	,	"2022-11-19"	,	1	,	23000	,	23000	);
INSERT INTO venta (codigo_venta, fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (	22	,	65	,	2	,	"2022-11-19"	,	2	,	12999	,	25998	);


/*procedimiento almacenado para consultar todos los productos*/
DELIMITER // 
CREATE PROCEDURE consultar_productos() 
BEGIN    
 SELECT *  FROM producto; 
 END //
 DELIMITER ;

call consultar_productos();


/*procedimiento almacenado para consultar todos los inventarios*/
DELIMITER // 
CREATE PROCEDURE consultar_inventarios() 
BEGIN    
 SELECT *  FROM inventario
 INNER JOIN producto on producto.codigo_producto = inventario.fk_codigo_producto;
 END //
 DELIMITER ;

call consultar_inventarios();


/*procedimiento almacenado para consultar todos los clientes*/
DELIMITER // 
CREATE PROCEDURE consultar_clientes() 
BEGIN    
 SELECT *  FROM cliente; 
 END //
 DELIMITER ;

call consultar_clientes();


/*procedimiento almacenado para consultar todas las ventas*/
DELIMITER // 
CREATE PROCEDURE consultar_ventas() 
BEGIN    
 SELECT *  FROM venta
 INNER JOIN producto on producto.codigo_producto = venta.fk_codigo_producto
 INNER JOIN cliente on cliente.codigo_cliente = venta.fk_codigo_cliente;
 END //
 DELIMITER ;

call consultar_ventas();


/*procedimiento almacenado para insertar un producto*/
DELIMITER // 
CREATE PROCEDURE Insertar_producto (IN PLU_producto INT, descripcion_producto varchar (200), marca_producto varchar (50), precio_producto int)
BEGIN	
	INSERT INTO producto (PLU_producto, descripcion_producto, marca_producto, precio_producto) VALUES (PLU_producto, descripcion_producto, marca_producto ,precio_producto);
END //
DELIMITER ;

call Insertar_producto(123, "prueba", "marca", 1000);


/*procedimiento almacenado para insertar un inventario*/
DELIMITER // 
CREATE PROCEDURE Insertar_inventario (IN fk_codigo_producto INT, cantidad_inventario INT, fecha date)
BEGIN	
	INSERT INTO inventario (fk_codigo_producto, cantidad_inventario, fecha) VALUES (fk_codigo_producto, cantidad_inventario, fecha);
END //
DELIMITER ;

call Insertar_inventario(12, 3, "2022-11-24");


/*procedimiento almacenado para insertar un cliente*/
DELIMITER // 
CREATE PROCEDURE Insertar_cliente (IN nombres_cliente varchar (50), apellidos_cliente varchar (50), celular_cliente varchar (50), correo_electronico_cliente varchar (100))
BEGIN	
	INSERT INTO cliente (nombres_cliente, apellidos_cliente, celular_cliente, correo_electronico_cliente) VALUES (nombres_cliente, apellidos_cliente, celular_cliente, correo_electronico_cliente);
END //
DELIMITER ;

call Insertar_cliente("Daniela", "Reina", "3204722169", "daniela.reina@gmail.com");


/*procedimiento almacenado para insertar una venta*/
DELIMITER // 
CREATE PROCEDURE Insertar_venta (IN fk_codigo_producto int, fk_codigo_cliente int, fecha_de_venta date, cantidad_venta int, valor_unidad_venta int, valor_total_venta int)
BEGIN	
	INSERT INTO venta (fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta) VALUES (fk_codigo_producto, fk_codigo_cliente, fecha_de_venta, cantidad_venta, valor_unidad_venta, valor_total_venta);
END //
DELIMITER ;

call Insertar_venta(6	,	4	,	"2022-11-24"	,	5	,	47000	,	235000	);


/*procedimiento almacenado para modificar un producto*/
DELIMITER // 
CREATE PROCEDURE modificar_producto (IN _codigo_producto INT, PLU_producto INT, descripcion_producto varchar (200), marca_producto varchar (50), precio_producto int)
BEGIN	
	UPDATE producto
	SET PLU_producto = PLU_producto, descripcion_producto = descripcion_producto, marca_producto = marca_producto, precio_producto = precio_producto
	WHERE codigo_producto = _codigo_producto;
END //
DELIMITER ;

call modificar_producto(1, 365, "prueba", "marca",	235000 );


/*procedimiento almacenado para modificar un inventario*/
DELIMITER // 
CREATE PROCEDURE modificar_inventario (IN _codigo_inventario INT, fk_codigo_producto INT, cantidad_inventario int, fecha date)
BEGIN	
	UPDATE inventario
	SET fk_codigo_producto = fk_codigo_producto, cantidad_inventario = cantidad_inventario, fecha = fecha
	WHERE codigo_inventario = _codigo_inventario;
END //
DELIMITER ;

call modificar_inventario(1, 2, 1, "2022-11-18");


/*procedimiento almacenado para modificar un cliente*/
DELIMITER // 
CREATE PROCEDURE modificar_cliente (IN _codigo_cliente INT, nombres_cliente varchar (50), apellidos_cliente varchar (50), celular_cliente varchar (50), correo_electronico_cliente varchar (100))
BEGIN
	UPDATE cliente
	SET nombres_cliente = nombres_cliente, apellidos_cliente = apellidos_cliente, celular_cliente = celular_cliente, correo_electronico_cliente = correo_electronico_cliente
	WHERE codigo_cliente = _codigo_cliente;
END //
DELIMITER ;

call modificar_cliente(3, "Niyireth Andrea", "Marin Huertas", "3193125978", "niyi.marin@gmail.com");


/*procedimiento almacenado para modificar una venta*/
DELIMITER // 
CREATE PROCEDURE modificar_venta (IN _codigo_venta INT, fk_codigo_producto INT, fk_codigo_cliente INT, fecha_de_venta DATE, cantidad_venta INT, valor_unidad_venta INT, valor_total_venta INT)
BEGIN
	UPDATE venta
	SET fk_codigo_producto = fk_codigo_producto, fk_codigo_cliente = fk_codigo_cliente, fecha_de_venta = fecha_de_venta, cantidad_venta = cantidad_venta, valor_unidad_venta = valor_unidad_venta,  valor_total_venta =  valor_total_venta 
	WHERE codigo_venta = _codigo_venta;
END //
DELIMITER ;

call modificar_venta(1, 1, 2, "2022-11-19", 1, 10000, 10000);


/*procedimiento almacenado para eliminar un inventario*/
DELIMITER // 
CREATE PROCEDURE eliminar_inventario (IN _codigo_inventario INT)
BEGIN	
	delete from inventario
    where codigo_inventario = _codigo_inventario;
END //
DELIMITER ;

call eliminar_inventario(3);


/*procedimiento almacenado para eliminar un producto*/
DELIMITER // 
CREATE PROCEDURE eliminar_producto (IN _codigo_producto INT)
BEGIN	
	delete from producto
    where codigo_producto = _codigo_producto;
END //
DELIMITER ;

call eliminar_producto(89);


/*procedimiento almacenado para eliminar una venta*/
DELIMITER // 
CREATE PROCEDURE eliminar_venta (IN _codigo_venta INT)
BEGIN	
	delete from venta
    where codigo_venta = _codigo_venta;
END //
DELIMITER ;

call eliminar_venta(10);


/*procedimiento almacenado para eliminar un cliente*/
DELIMITER // 
CREATE PROCEDURE eliminar_cliente (IN _codigo_cliente INT)
BEGIN	
	delete from cliente
    where codigo_cliente = _codigo_cliente;
END //
DELIMITER ;

call eliminar_cliente(6);


/*procedimiento almacenado para el total de ventas por fecha*/
DELIMITER // 
CREATE PROCEDURE Ventas_por_rango_de_fecha (IN _fecha_de_venta date)
BEGIN
	SELECT SUM(valor_total_venta) as total_venta FROM venta
    WHERE fecha_de_venta = _fecha_de_venta;
END //
DELIMITER ;
 
call Ventas_por_rango_de_fecha ('2022-01-01', '2022-11-23');