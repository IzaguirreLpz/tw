SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bd_tw;

USE bd_tw;


DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `status_cliente` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO clientes VALUES("1","kirby","98765432","kirby_1888@hotmail.com","sitium","1","2017-09-20 20:58:45");
INSERT INTO clientes VALUES("2","marlen","9877634","marelene@hotmail.com","la osa","1","2017-09-21 16:35:50");
INSERT INTO clientes VALUES("3","marleny","9877634","marelene@hotmail.com","la osa","1","2017-09-21 16:37:26");
INSERT INTO clientes VALUES("4","marlenyi","9877634","marelene@hotmail.com","la osa","1","2017-09-21 16:40:35");
INSERT INTO clientes VALUES("5","ghjk","rtyhjk","yul@hotmail","yukl","1","2017-09-21 16:50:48");
INSERT INTO clientes VALUES("6","ghjki","rtyhjk","yul@hotmail","yukl","1","2017-09-21 16:51:11");

DROP TABLE IF EXISTS tbl_usuario;

CREATE TABLE `tbl_usuario` (
  `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_rol` bigint(20) DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `nombre_usuario` varchar(70) NOT NULL,
  `estado_usuario` varchar(100) NOT NULL,
  `activacion` int(11) DEFAULT NULL
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_usuario VALUES("1","2","ADMIN","yasielFU","ACTIVO","1","$2y$10$qIvuyBlfqbLKB1mhaqwF0.cKBfbzxQm7mz9tkau9MbL.WWQ32Fq5C","0","ACYJDUUQOIGCTUOP","1","0000-00-00 00:00:00","2017-05-31 00:00:00","anso@hotmail.com","2020-10-12 20:06:56","","0","2017-06-30","2020-10-12","2020-10-10 21:26:57");
INSERT INTO tbl_usuario VALUES("7","3","FIBI","FREE","ACTIVO","1","$2y$10$qIvuyBlfqbLKB1mhaqwF0.cKBfbzxQm7mz9tkau9MbL.WWQ32Fq5C","0","0f28cde5211b2d9c4fcfbcaf76c9e3b4","1","0000-00-00 00:00:00","2017-05-31 00:00:00","yonyruiz1988@gmail.com","2020-11-07 21:43:46","","0","2017-06-30","0000-00-00","2020-10-10 21:26:57");




DROP TABLE IF EXISTS detalle_factura;

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

INSERT INTO detalle_factura VALUES("6","14","10","1","130");
INSERT INTO detalle_factura VALUES("5","14","4","1","1");
INSERT INTO detalle_factura VALUES("4","14","10","1","130");
INSERT INTO detalle_factura VALUES("7","14","4","1","1");
INSERT INTO detalle_factura VALUES("8","14","2","1","122");
INSERT INTO detalle_factura VALUES("9","14","10","1","130");
INSERT INTO detalle_factura VALUES("10","14","4","1","1");
INSERT INTO detalle_factura VALUES("11","14","2","1","122");



DROP TABLE IF EXISTS facturas;

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `id_atencion` int(11) DEFAULT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO facturas VALUES("7","1","12","0000-00-00 00:00:00","14","1","2","575","1");
INSERT INTO facturas VALUES("8","8","21","0000-00-00 00:00:00","14","1","1","23","1");
INSERT INTO facturas VALUES("9","9","20","0000-00-00 00:00:00","14","1","2","142","2");
INSERT INTO facturas VALUES("10","10","23","0000-00-00 00:00:00","14","1","2","20","2");
INSERT INTO facturas VALUES("11","11","24","0000-00-00 00:00:00","15","1","2","141.45","2");
INSERT INTO facturas VALUES("12","12","25","0000-00-00 00:00:00","13","1","2","260","2");



DROP TABLE IF EXISTS hist_pass;

CREATE TABLE `hist_pass` (
  `id_usuario` int(11) NOT NULL,
  `pass` varchar(299) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO hist_pass VALUES("79","$2y$10$Lqsx6MhrQ6Vn5KLfkDjM/.PMMJRGN7oWVhSLrhloBaLHxfB4gAD96","2020-10-12 00:47:27");
INSERT INTO hist_pass VALUES("80","$2y$10$/BN3WtuAAz1HEctqk6WlzeSfDYni5ptYQggIRYPU9VdegYELljPj6","2020-10-12 00:49:40");
INSERT INTO hist_pass VALUES("81","$2y$10$OG8Vorf43CJh.bIpkeUez.bmOiduhvYgUHGZ.9AegvrvWjOfXgtF6","2020-10-12 18:33:56");
INSERT INTO hist_pass VALUES("82","$2y$10$3HDlJSF5W0kXjkgAbDv4jeggiHUwMFuaqso7RG/46F/n36E4/L7lu","2020-10-12 19:22:40");



DROP TABLE IF EXISTS menu;

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nombre` varchar(255) NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT 0,
  `link` varchar(255) NOT NULL,
  `li_class` varchar(50) DEFAULT NULL,
  `ul_class` varchar(50) DEFAULT NULL,
  `ul_cerrar` varchar(50) DEFAULT NULL,
  `estatus` enum('0','1') NOT NULL DEFAULT '1',
  `logo` varchar(200) NOT NULL,
  `pant_nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO menu VALUES("1","<span>Atenciónes</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-cogs","");
INSERT INTO menu VALUES("2","<span>Administracion</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-users","");
INSERT INTO menu VALUES("3","<span>Transacciones</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-university","");
INSERT INTO menu VALUES("4","<span>Seguridad</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-lock ","");
INSERT INTO menu VALUES("5","usuarios</a>","4","usuarios.php","  ","","","1","","Usuarios");
INSERT INTO menu VALUES("6","Permisos </a>","4","permisos.php","  ","","","0","","Permisos ");
INSERT INTO menu VALUES("7","Roles</a>","4","roles.php","  ","","","1","","Roles");
INSERT INTO menu VALUES("8","Pantallas</a>","4","pantallas.php","  ","","","1","","Pantallas");
INSERT INTO menu VALUES("9","Configuracion</a>","4","parametro.php","  ","","","1","","Configuracion");
INSERT INTO menu VALUES("10","Bitacora</a>","4","bitacoras.php","  ","","","1","","Bitacora");
INSERT INTO menu VALUES("11","Lista de Espera</a>","1","clientes_pend.php","  ","","","1","","lista de espera");
INSERT INTO menu VALUES("12","Atenciones</a>","1","atencion_meca.php","  ","","","1","","atenciones");
INSERT INTO menu VALUES("13","Servicios</a>","1","servicios.php","  ","","","1","","Lista servicios");
INSERT INTO menu VALUES("14","Clientes</a>","2","clientes.php","  ","","","1","","clientes");
INSERT INTO menu VALUES("15","Vehiculos </a>","2","vehiculos.php","  ","","","1","","Vehiculos");
INSERT INTO menu VALUES("16","Proveedores</a>","2","provedores.php","  ","","","1","","proveedores");
INSERT INTO menu VALUES("17","Productos </a>","2","productos.php","  ","","","1","","Productos");
INSERT INTO menu VALUES("18","Factura pendiente </a>","3","factura_pendiente.php","  ","","","1","","factura_pendiente");
INSERT INTO menu VALUES("19","Facturas </a>","3","facturas.php","  ","","","1","","Facturas");
INSERT INTO menu VALUES("20","Mov Inventario </a>","3","mov_inventario.php.php","  ","","","1","","mov_inventario");
INSERT INTO menu VALUES("21","Servicios </a>","1","servicios.php","","","","1","","Servicios");





DROP TABLE IF EXISTS permisos;

CREATE TABLE `permisos` (
  `per_id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `per_id_rol` int(11) NOT NULL,
  `per_id_pantalla` int(11) NOT NULL,
  `per_consulta` varchar(1) NOT NULL,
  `per_insercion` varchar(1) NOT NULL,
  `per_eliminacion` varchar(1) NOT NULL,
  `per_actualizacion` varchar(1) NOT NULL,
  `per_fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `per_fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `per_usu_modi` int(11) NOT NULL,
  PRIMARY KEY (`per_id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO permisos VALUES("1","3","12","0","0","0","0","2020-11-14 19:27:48","2020-11-14 19:27:48","1");
INSERT INTO permisos VALUES("2","3","14","0","1","0","0","2020-11-14 19:28:02","2020-11-14 19:28:02","1");
INSERT INTO permisos VALUES("3","3","19","0","0","1","0","2020-11-14 19:28:13","2020-11-14 19:28:13","1");
INSERT INTO permisos VALUES("4","3","5","0","0","0","1","2020-11-14 19:28:21","2020-11-14 19:28:21","1");
INSERT INTO permisos VALUES("5","3","15","0","1","1","0","2020-11-14 19:28:33","2020-11-14 19:28:33","1");
INSERT INTO permisos VALUES("6","3","16","0","0","0","0","2020-11-14 20:19:55","2020-11-14 20:19:55","1");



DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `status_producto` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `precio_producto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precio_costo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cant` int(11) NOT NULL DEFAULT 0,
  `tipo` tinyint(4) NOT NULL,
  `unidad` varchar(60) DEFAULT 'N/A',
  `categorias` varchar(60) DEFAULT 'N/A',
  `proveedor` varchar(50) DEFAULT 'N/A',
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO products VALUES("1","B000360","Aceite Mineral","1","2017-09-20 20:59:16","20.00","0.00","1","0","bote","N/A","N/A");
INSERT INTO products VALUES("2","B000363","Aceite Comun","1","2017-09-21 16:33:11","122.00","0.00","10","0","bote","N/A","N/A");
INSERT INTO products VALUES("4","B000362","Vidrio Lateral","1","0000-00-00 00:00:00","1.00","0.00","15","0","N/A","N/A","N/A");
INSERT INTO products VALUES("8","B000364","Vidrio Frontal","0","2017-10-08 00:11:57","230.00","0.00","12","0","N/A","N/A","N/A");
INSERT INTO products VALUES("10","B000366","Llanta Michelin","0","2017-10-10 18:35:44","130.00","0.00","8","1","N/A","N/A","N/A");



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `rol_id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(50) NOT NULL,
  `rol_descripcion` varchar(100) NOT NULL,
  `rol_fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `rol_fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`rol_id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO roles VALUES("1","ADMINISTRADOR","organiza","2018-08-27 15:56:59","2018-08-27 15:56:59");
INSERT INTO roles VALUES("2","DEPENDIENTE","teresita","2018-08-27 15:57:25","2018-08-27 15:57:25");
INSERT INTO roles VALUES("3","MECANICO","persona encargada","2018-10-09 14:11:52","2018-10-09 14:11:52");
INSERT INTO roles VALUES("4","ASISTENTE","marvin","2018-10-15 14:56:16","2018-10-15 14:56:16");
INSERT INTO roles VALUES("5","NUEVO","visitasa","2018-10-16 09:20:05","2018-10-16 09:20:05");



DROP TABLE IF EXISTS tbl_atenciones;

CREATE TABLE `tbl_atenciones` (
  `id_atencion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_auto` int(11) DEFAULT NULL,
  `status` varchar(11) NOT NULL,
  `fecha_visita` datetime NOT NULL DEFAULT current_timestamp(),
  `observacion` varchar(300) DEFAULT NULL,
  `fin_meca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_atencion`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO tbl_atenciones VALUES("1","13","1","","1","2020-10-25 00:39:56","","");
INSERT INTO tbl_atenciones VALUES("2","14","1","","1","2020-10-25 01:06:19","","");
INSERT INTO tbl_atenciones VALUES("3","13","1","","1","2020-10-29 01:18:53","","");



DROP TABLE IF EXISTS tbl_bitacoras;

CREATE TABLE `tbl_bitacoras` (
  `id_bitacora` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) DEFAULT NULL,
  `objeto` varchar(100) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=915 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bitacoras VALUES("1","35","pantalla usuarios","INGRESO","ingreso a pantalla usuarios","2018-01-17 01:45:14");
INSERT INTO tbl_bitacoras VALUES("2","35","pantalla usuarios","INGRESO","ingreso a pantalla usuarios","2018-01-17 01:45:52");
INSERT INTO tbl_bitacoras VALUES("3","35","pantalla usuarios","INGRESO","ingreso a pantalla usuarios","2018-01-17 01:45:58");
INSERT INTO tbl_bitacoras VALUES("4","49","tbl_usuario","INSERTAR","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol, fecha_creacion,activacion,fecha_cambio_contrasena) values(\'ATEST\', \'ATE\',\'$2y$10$d2bzwVbiLBHq6eWeJ1","2020-09-29 12:02:22");
INSERT INTO tbl_bitacoras VALUES("5","50","tbl_usuario","INSERTAR","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol, fecha_creacion,activacion,fecha_cambio_contrasena) values(\'TEA\', \'TEA\',\'$2y$10$1JZXSXy9QSNbw8XI1D9Q","2020-09-29 12:04:11");
INSERT INTO tbl_bitacoras VALUES("6","51","tbl_usuario","INSERTAR","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol, fecha_creacion,activacion,fecha_cambio_contrasena) values(\'DOS\', \'DOS\',\'$2y$10$LPzGkEn81bOoIDGc/HsC","2020-09-29 12:06:48");
INSERT INTO tbl_bitacoras VALUES("7","52","tbl_usuario","INSERTAR","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol, fecha_creacion,activacion,fecha_cambio_contrasena) values(\'TE\', \'TEW\',\'$2y$10$Byog8aJbDTnRD9x6Lh7uI","2020-09-29 22:17:02");
INSERT INTO tbl_bitacoras VALUES("8","29","pantalla principal","INGRESO","ingreso a pantalla principal","2020-09-30 05:00:30");
INSERT INTO tbl_bitacoras VALUES("9","6","recupera","INGRESO","Esta en la pantalla de verificacion de pregunta y respuesta","2020-10-03 22:51:16");
INSERT INTO tbl_bitacoras VALUES("10","6","recupera","INGRESO","Esta en la pantalla de verificacion de pregunta y respuesta","2020-10-03 22:52:10");
INSERT INTO tbl_bitacoras VALUES("11","6","pantalla principal","INGRESO","ingreso a pantalla principal","2020-10-08 22:12:50");
INSERT INTO tbl_bitacoras VALUES("12","35","pantalla principal","INGRESO","ingreso a pantalla principal","2020-10-08 22:26:36");
INSERT INTO tbl_bitacoras VALUES("13","6","pantalla principal","INGRESO","ingreso a pantalla principal","2020-10-08 22:59:23");
INSERT INTO tbl_bitacoras VALUES("14","6","pantalla principal","INGRESO","ingreso a pantalla principal","2020-10-08 22:59:26");
INSERT INTO tbl_bitacoras VALUES("15","35","pantalla principal","INGRESO","ingreso a pantalla principal","2020-10-08 22:59:39");
INSERT INTO tbl_bitacoras VALUES("16","35","pantalla usuarios","INGRESO","ingreso a pantalla usuarios","2020-10-08 22:59:47");
INSERT INTO tbl_bitacoras VALUES("17","53","tbl_usuario","INSERTAR","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol, fecha_creacion,activacion,fecha_cambio_contrasena) values(\'PRUEBA ANA yasiel ADD\', \'ADD\',\'$2y$10$ht","2020-10-10 00:02:25");
INSERT INTO tbl_bitacoras VALUES("18","54","tbl_usuario","INSERTAR","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol, fecha_creacion,activacion,fecha_cambio_contrasena) values(\'PRUEBA ANA yasiel ADD\', \'AS\',\'$2y$10$IvO","2020-10-10 00:02:44");
INSERT INTO tbl_bitacoras VALUES("19","","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'\', usuario=\'\', id_rol=\'\', correo_electronico=\'\', estado_usuario=\'\', activacion= \'\' WHERE id_usuario=\'\'","2020-10-11 04:12:50");
INSERT INTO tbl_bitacoras VALUES("20","","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'\', usuario=\'\', id_rol=\'\', correo_electronico=\'\', estado_usuario=\'\', activacion= \'\' WHERE id_usuario=\'\'","2020-10-11 04:12:56");
INSERT INTO tbl_bitacoras VALUES("21","","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'\', usuario=\'\', id_rol=\'2\', correo_electronico=\'yonyruiz1988@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\' WHERE id_usuario=\'21\'","2020-10-11 04:13:03");



DROP TABLE IF EXISTS tbl_categorias;

CREATE TABLE `tbl_categorias` (
  `id_categorias` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categorias`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_categorias VALUES("1","Fuidos","Aceites, Liquidos de frenos etc");
INSERT INTO tbl_categorias VALUES("2","Limpieza","Robins, Cera Etc");
INSERT INTO tbl_categorias VALUES("3","Lujo","Spoilers, Rines");
INSERT INTO tbl_categorias VALUES("4","Mantenimiento","Neumaticos, Bujias");
INSERT INTO tbl_categorias VALUES("5","Reparacion","Pintura y enderezado");



DROP TABLE IF EXISTS tbl_clientes;

CREATE TABLE `tbl_clientes` (
  `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `identidad` varchar(14) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `ape_cliente` varchar(50) NOT NULL,
  `genero` varchar(1) DEFAULT NULL COMMENT 'm masculino , f femenino',
  `celular` bigint(20) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `cor_cliente` varchar(50) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usr_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO tbl_clientes VALUES("13","0819199308422","juan carlos","izaguirre lopez","","95006958","22243459","la cerro ","","2020-10-21 23:08:27","2020-10-21 23:08:27");
INSERT INTO tbl_clientes VALUES("14","232323","MARVIN askk","test","M","99999999","22222222"," la rosa hermosa","mar@gmail.com","2020-10-23 19:03:56","2020-10-23 19:03:56");
INSERT INTO tbl_clientes VALUES("15","0801","ans","sds","","95062323","22223434","la rosa amarill","anl@gmail.com","2020-10-23 20:24:27","2020-10-23 20:24:27");
INSERT INTO tbl_clientes VALUES("16","0801","ans","sds","","95062323","22223434","la rosa amarill","anl@gmail.com","2020-10-23 20:24:39","2020-10-23 20:24:39");
INSERT INTO tbl_clientes VALUES("17","0801199222056","test","testiando","M","89172930","22112211","jskss","lakdo@gmail.com","2020-10-23 20:38:24","2020-10-23 20:38:24");
INSERT INTO tbl_clientes VALUES("18","0801199222056","test","testiando","M","89172930","22112211","sss","lakdo@gmail.com","2020-10-23 20:38:53","2020-10-23 20:38:53");



DROP TABLE IF EXISTS tbl_compras;

CREATE TABLE `tbl_compras` (
  `id_compra` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_proveedor` bigint(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `cantidad` varchar(30) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_entrega` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_compra`),

) ENGINE=InnoDB DEFAULT CHARSET=utf8;






DROP TABLE IF EXISTS tbl_facturas;

CREATE TABLE `tbl_facturas` (
  `id_factura` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_detafac` bigint(20) NOT NULL,
  `id_pago` bigint(20) NOT NULL,
  `NO_Factura` bigint(20) NOT NULL,
  `cantidad` varchar(30) NOT NULL,
  `sub_total` varchar(20) NOT NULL,
  `descuento` varchar(20) NOT NULL,
  `ISV` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usr_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_factura`),

) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS tbl_objeto_pantalla;

CREATE TABLE `tbl_objeto_pantalla` (
  `id_permiso` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_pantalla` int(11) NOT NULL,
  `permiso_insercion` int(11) NOT NULL,
  `permiso_eliminacion` int(11) NOT NULL,
  `permiso_actualizacion` int(11) NOT NULL,
  `permiso_consulta` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tbl_objeto_pantalla VALUES("1","2","3","0","0","1","0");
INSERT INTO tbl_objeto_pantalla VALUES("3","1","4","1","1","1","1");
INSERT INTO tbl_objeto_pantalla VALUES("4","2","2","1","1","1","1");
INSERT INTO tbl_objeto_pantalla VALUES("5","2","7","1","1","1","1");




DROP TABLE IF EXISTS tbl_pantallas;

CREATE TABLE `tbl_pantallas` (
  `id_objeto` int(6) NOT NULL AUTO_INCREMENT,
  `objeto` varchar(60) NOT NULL,
  `tipo_objeto` varchar(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) NOT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) NOT NULL,
  PRIMARY KEY (`id_objeto`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO tbl_pantallas VALUES("1","USUARIOS","","ADMINISTRACION DE USUARIOS","2017-10-22 17:54:47","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("2","PARAMETROS","","ADMINISTRACION DE PARAMETROS","2017-10-22 17:55:18","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("3","CLIENTES","","ADMINISTRACION DE CLIENTES","2017-10-22 17:55:35","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("4","MASCOTAS","","ADMINISTRACION DE MASCOTAS","2017-10-22 17:55:53","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("5","PROVEEDORES","","ADMINISTRACION DE PROVEEDORES","2017-10-22 17:56:14","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("6","TIPO DE SERVICIOS","","ADMINISTRACION DE TIPO SERVICIOS","2017-10-22 17:56:39","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("7","SERVICIOS","","ADMINISTRACION DE SERVICIOS","2017-10-22 17:57:04","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("8","PRODUCTOS","","ADMINISTRACION DE PRODUCTOS","2017-10-22 17:57:28","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("9","PANTALLAS","","ADMINISTRACION DE PANTALLAS","2017-10-22 17:57:56","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("10","VACUNAS","","ADMINISTRACION DE VACUNAS","2017-10-22 17:58:12","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("11","CONTROL DE VACUNAS","","ADMINISTRACION DEL CONTROL DE VACUNAS","2017-10-22 17:58:55","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("12","COMPRAS","","ADMINISTRACION DEL ORDEN DE COMPRAS","2017-10-22 18:01:16","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("13","FACTURAS","","ADMINISTRACION DE LA FACTURACION","2017-10-22 18:02:07","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("14","ROLES","","ADMINISTRACION DE ROLES DE LOS USUARIOS","2017-10-22 18:02:36","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("15","ROLES OBJETOS","","ADMINISTRACION DE PERMISOS DE PANTALLAS","2017-10-22 18:03:09","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("16","BACKUP","","ADMON DE COPIAS DE SEGURIDAD DEL SISTEMA","2017-10-22 18:03:51","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("17","CALENDARIO","","ADMINISTRACION DE LAS CITAS ","2017-10-22 18:04:24","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("18","CONSULTAS","","ADMINISTRACION DE ATENCION CONSULTAS","2017-10-22 18:05:31","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("19","PETUQUERIA ","","ADMINISTRACION DE LAS CITAS DE PELUQUERIA","2017-10-22 18:06:35","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("20","HISTORIAL MEDICO","","ADMINISTRACION DE CONSULTAS PREVIAS ","2017-10-22 18:07:04","","2017-10-23 12:08:26","");
INSERT INTO tbl_pantallas VALUES("21","RECETAS","","ADMINISTRACION DE RECETAS PARA LAS MASCOTAS","2017-10-22 18:07:30","","0000-00-00 00:00:00","");
INSERT INTO tbl_pantallas VALUES("22","FACTURAS PENDIENTES","","ADMINISTRACION DE LAS FACTURAS POR COBRAR","2017-11-01 01:36:45","","2017-11-05 00:28:29","");



DROP TABLE IF EXISTS tbl_parametros;

CREATE TABLE `tbl_parametros` (
  `id_parametro` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_parametro`),
 
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO tbl_parametros VALUES("1","VENCIMIENTO","90","2017-11-07 00:00:00");
INSERT INTO tbl_parametros VALUES("2","CORREO_ADMIN_USU","marvin@hotmail.com","2017-11-29 00:00:00");
INSERT INTO tbl_parametros VALUES("3","IMPUESTO","15","2020-11-04 00:19:28");
INSERT INTO tbl_parametros VALUES("4","DIRECCION","col san miguel taller rojo","2020-11-04 00:41:04");
INSERT INTO tbl_parametros VALUES("5","MIN_PASS","7","2017-10-02 00:00:00");
INSERT INTO tbl_parametros VALUES("6","MAX_PASS","10","2017-09-18 00:00:00");
INSERT INTO tbl_parametros VALUES("7","Nombre de la Empresa","TECNIWASH","2017-10-09 00:00:00");
INSERT INTO tbl_parametros VALUES("8","intentos","3","2017-11-21 00:00:00");
INSERT INTO tbl_parametros VALUES("9","PREGUNTAS","3","2017-11-07 00:00:00");
INSERT INTO tbl_parametros VALUES("10","moneda","L","2020-11-04 00:07:57");
INSERT INTO tbl_parametros VALUES("11","CIUDAD","Tegucigalpa, Distrito Central","2020-11-04 00:42:43");
INSERT INTO tbl_parametros VALUES("12","TEL","2230-4545","2020-11-04 00:44:27");
INSERT INTO tbl_parametros VALUES("13","CORREO_EMPRE","TEWNADM@gmail.com","2020-11-04 00:46:56");





DROP TABLE IF EXISTS tbl_preguntas;

CREATE TABLE `tbl_preguntas` (
  `id_pregunta` int(2) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(70) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) NOT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `modificado_por` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO tbl_preguntas VALUES("1","Fecha de Nacimiento?","2017-05-24 15:10:44","1","2017-06-06 14:38:11","1");
INSERT INTO tbl_preguntas VALUES("2","Color Favorito ?","2017-05-24 15:11:28","1","2017-06-06 14:38:21","1");
INSERT INTO tbl_preguntas VALUES("3","Cul sera tu trabajo ideal ?","2017-05-24 15:16:11","1","2020-10-11 01:42:09","");
INSERT INTO tbl_preguntas VALUES("4","Lugar de nacimiento de la madre ?","2017-07-24 15:18:31","1","2017-06-06 14:40:14","");
INSERT INTO tbl_preguntas VALUES("5","Mejor amigo(a) de la infancia ?","2017-07-24 15:18:53","1","2017-06-06 14:40:06","1");
INSERT INTO tbl_preguntas VALUES("6","Nombre de la primera mascota ?","2017-07-24 15:19:13","1","2017-06-06 14:39:58","");
INSERT INTO tbl_preguntas VALUES("7","Ocupacin del abuelo ?","2017-07-24 15:19:27","1","2020-10-11 01:42:09","");
INSERT INTO tbl_preguntas VALUES("8","Personaje histrico favorito ?","2017-07-24 15:19:51","1","2020-10-11 01:42:09","");
INSERT INTO tbl_preguntas VALUES("9","Profesor Favorito ?","2017-07-24 15:20:16","1","2017-06-06 14:39:31","");
INSERT INTO tbl_preguntas VALUES("10","Nombre de su pelcula favorita ?","2017-07-24 15:20:36","1","2020-10-11 01:42:09","");
INSERT INTO tbl_preguntas VALUES("11","Modelo de su primer auto ?","2017-07-24 15:21:31","1","2017-06-06 14:39:17","");
INSERT INTO tbl_preguntas VALUES("12","Evento que marc su vida ?","2017-07-24 15:23:11","1","2020-10-11 01:42:09","");
INSERT INTO tbl_preguntas VALUES("13","Fecha de Nacimiento??","2017-10-21 11:49:26","1","2017-06-06 14:39:12","");



DROP TABLE IF EXISTS tbl_productos;

CREATE TABLE `tbl_productos` (
  `id_productos` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `proveedor` varchar(45) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT 0.00,
  `cantidad` int(11) DEFAULT 0,
  `precio_costo` decimal(10,2) DEFAULT 0.00,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_productos VALUES("1","TW00001","PROD 1","producto prueba","1","122.00","19","12.00","2020-11-01 17:05:08");





DROP TABLE IF EXISTS tbl_proveedores;

CREATE TABLE `tbl_proveedores` (
  `id_proveedor` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom_empresa` varchar(50) NOT NULL,
  `num_tel1` bigint(20) NOT NULL,
  `num_tel2` bigint(20) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `RTN` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `representante` varchar(30) NOT NULL,
  `cor_empresa` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usr_registro` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO tbl_proveedores VALUES("1","JUAN PABLOA","22345676","98675875","Los Robles quin","022345674","independiente","PEDRO","juan@yahoo.com","2017-09-18 22:14:24","2017-09-18 22:14:24");
INSERT INTO tbl_proveedores VALUES("2","KIRBY SA","99852145","88625379","kirbylandia","080119922205812","kirby","KIRBY","kirby@kirby.com","2017-10-21 12:16:43","2017-10-21 12:16:43");
INSERT INTO tbl_proveedores VALUES("3","LAM","22345678","96992345","ASKAS","080134489893893","KSD","YO ","asas@hotmail.com","2017-10-22 18:36:22","2017-10-22 18:36:22");




DROP TABLE IF EXISTS tbl_respuestas;

CREATE TABLE `tbl_respuestas` (
  `id_usuario` bigint(20) NOT NULL,
  `id_pregunta` bigint(20) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_respuestas VALUES("29","1","1992","2020-10-11 19:05:59");
INSERT INTO tbl_respuestas VALUES("29","1","1992","2020-10-11 19:09:04");
INSERT INTO tbl_respuestas VALUES("29","1","1992","2020-10-11 19:11:34");
INSERT INTO tbl_respuestas VALUES("81","1","1993","2020-10-12 19:47:45");
INSERT INTO tbl_respuestas VALUES("81","2","rojo","2020-10-12 19:47:51");
INSERT INTO tbl_respuestas VALUES("81","3","programador","2020-10-12 19:47:57");
INSERT INTO tbl_respuestas VALUES("82","9","ciencia","2020-10-12 20:24:49");
INSERT INTO tbl_respuestas VALUES("82","7","pintor","2020-10-12 20:24:58");
INSERT INTO tbl_respuestas VALUES("82","5","rosy","2020-10-12 20:25:07");
INSERT INTO tbl_respuestas VALUES("1","1","rojo","2020-10-23 19:59:27");
INSERT INTO tbl_respuestas VALUES("1","2","rojo","2020-10-23 19:59:31");
INSERT INTO tbl_respuestas VALUES("1","3","rojo","2020-10-23 19:59:35");







DROP TABLE IF EXISTS tbl_tipopagos;

CREATE TABLE `tbl_tipopagos` (
  `id_pago` bigint(20) NOT NULL AUTO_INCREMENT,
  `tip_pago` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






DROP TABLE IF EXISTS tbl_vehiculos;

CREATE TABLE `tbl_vehiculos` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `cliente_id` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `usr_registro` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_vehiculos VALUES("1","TOYOTA","civic","14","rojo","1238","2020-11-04 18:02:06","2020-11-04 18:02:06");
INSERT INTO tbl_vehiculos VALUES("2","HONDA","COROLLA","14","NEGRO","12783","2020-11-04 18:02:32","2020-11-04 18:02:32");
INSERT INTO tbl_vehiculos VALUES("3","LANCER","asa","17","amarilloc","1234","2020-11-05 19:31:01","2020-11-05 19:31:01");
INSERT INTO tbl_vehiculos VALUES("4","COCEL","elote","15","verde","2345","2020-11-05 19:49:50","2020-11-05 19:49:50");
INSERT INTO tbl_vehiculos VALUES("5","asura","ssdf","13","verde","1234","2020-11-06 17:50:31","2020-11-06 17:50:31");



DROP TABLE IF EXISTS tmp;

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tmp VALUES("1","1","1","20.00","ghttbqs2jdekkvblm3r0fv6pbs","2020-11-01 19:25:55","0");
INSERT INTO tmp VALUES("2","8","1","230.00","ghttbqs2jdekkvblm3r0fv6pbs","2020-11-01 19:25:56","0");
INSERT INTO tmp VALUES("3","10","1","130.00","ghttbqs2jdekkvblm3r0fv6pbs","2020-11-01 19:25:57","0");
INSERT INTO tmp VALUES("34","10","1","130.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:53","0");
INSERT INTO tmp VALUES("33","1","1","20.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:52","0");
INSERT INTO tmp VALUES("32","1","1","20.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:42","0");
INSERT INTO tmp VALUES("31","1","1","20.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:41","0");
INSERT INTO tmp VALUES("30","1","1","20.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:41","0");
INSERT INTO tmp VALUES("24","1","1","20.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:12","0");
INSERT INTO tmp VALUES("25","2","1","122.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:13","0");
INSERT INTO tmp VALUES("26","4","1","1.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:13","0");
INSERT INTO tmp VALUES("27","8","1","230.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:45:14","0");
INSERT INTO tmp VALUES("35","1","1","20.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:46:40","0");
INSERT INTO tmp VALUES("36","1","4","20.00","8q2f39o19vtii0b5b3227f25ad","2020-11-05 02:46:47","0");
INSERT INTO tmp VALUES("37","10","1","130.00","","2020-11-05 14:43:26","8");
INSERT INTO tmp VALUES("40","1","1","20.00","","2020-11-05 14:57:25","8");
INSERT INTO tmp VALUES("64","1","1","20.00","","2020-11-06 19:05:00","11");
INSERT INTO tmp VALUES("63","2","1","122.00","","2020-11-06 19:04:53","11");
INSERT INTO tmp VALUES("61","4","1","1.00","","2020-11-06 18:57:26","13");
INSERT INTO tmp VALUES("62","2","1","122.00","","2020-11-06 19:00:38","13");
INSERT INTO tmp VALUES("46","2","1","122.00","","2020-11-05 19:52:19","9");
INSERT INTO tmp VALUES("47","10","1","130.00","","2020-11-05 19:52:28","9");
INSERT INTO tmp VALUES("59","1","1","20.00","","2020-11-06 18:47:20","12");
INSERT INTO tmp VALUES("58","8","1","230.00","","2020-11-06 18:47:14","12");
INSERT INTO tmp VALUES("57","10","1","130.00","","2020-11-06 18:20:12","10");
INSERT INTO tmp VALUES("56","1","1","20.00","","2020-11-06 18:16:28","10");
INSERT INTO tmp VALUES("66","10","1","130.00","","2020-11-06 19:38:01","14");
INSERT INTO tmp VALUES("67","4","1","1.00","","2020-11-06 19:38:05","14");
INSERT INTO tmp VALUES("70","8","1","230.00","","2020-11-06 20:19:29","15");
INSERT INTO tmp VALUES("71","1","1","20.00","","2020-11-06 20:36:31","16");
INSERT INTO tmp VALUES("72","4","1","1.00","","2020-11-06 21:11:07","18");
INSERT INTO tmp VALUES("73","10","1","130.00","","2020-11-06 21:11:13","18");
INSERT INTO tmp VALUES("74","10","1","130.00","","2020-11-06 21:35:32","19");
INSERT INTO tmp VALUES("75","1","1","20.00","","2020-11-06 21:56:09","21");
INSERT INTO tmp VALUES("76","1","1","20.00","","2020-11-06 21:58:32","20");
INSERT INTO tmp VALUES("77","2","1","122.00","","2020-11-06 22:00:35","20");
INSERT INTO tmp VALUES("81","4","1","1.00","","2020-11-07 00:58:53","24");
INSERT INTO tmp VALUES("80","1","1","20.00","","2020-11-07 00:57:02","23");
INSERT INTO tmp VALUES("82","2","1","122.00","","2020-11-07 00:58:58","24");
INSERT INTO tmp VALUES("83","10","1","130.00","","2020-11-07 01:00:13","25");
INSERT INTO tmp VALUES("84","10","1","130.00","","2020-11-07 01:00:18","25");



DROP TABLE IF EXISTS transaccion_productos;

CREATE TABLE `transaccion_productos` (
  `codigo_transaccion` varchar(15) NOT NULL,
  `no` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `numero` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo_transaccion` varchar(50) NOT NULL,
  `id_proveedor` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id_barang` (`codigo`),
  KEY `created_user` (`created_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO transaccion_productos VALUES("TM-2017-0000004","4","2017-10-16","B000360","3","0","2017-10-23 14:11:33","Entrada","1","77");
INSERT INTO transaccion_productos VALUES("TM-2020-0000005","5","2020-11-12","B000366","12","0","2020-11-06 00:39:08","Entrada","3","34");
INSERT INTO transaccion_productos VALUES("TM-2020-0000006","6","2020-11-07","B000366","12","0","2020-11-06 15:58:15","Entrada","2","45");
INSERT INTO transaccion_productos VALUES("TM-2020-0000006","7","2020-11-07","B000366","12","0","2020-11-06 15:58:29","Entrada","2","45");
INSERT INTO transaccion_productos VALUES("TM-2020-0000006","8","2020-11-07","B000366","100","0","2020-11-06 15:59:32","Entrada","2","145");
INSERT INTO transaccion_productos VALUES("TM-2020-0000008","11","2020-11-19","B000363","400","0","2020-11-06 22:09:59","Entrada","2","400");


