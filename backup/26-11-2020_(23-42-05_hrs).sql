SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bd_tw;

USE bd_tw;

DROP TABLE IF EXISTS detalle_factura;

CREATE TABLE `detalle_factura` (
  `id_detalle` int NOT NULL AUTO_INCREMENT,
  `numero_factura` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

INSERT INTO detalle_factura VALUES("1","1","14","1","150");
INSERT INTO detalle_factura VALUES("2","1","13","1","150");
INSERT INTO detalle_factura VALUES("56","1","2","1","122");
INSERT INTO detalle_factura VALUES("55","2","11","1","870");
INSERT INTO detalle_factura VALUES("54","2","11","1","870");
INSERT INTO detalle_factura VALUES("53","2","2","1","122");
INSERT INTO detalle_factura VALUES("44","2","11","1","870");
INSERT INTO detalle_factura VALUES("43","2","12","1","110");
INSERT INTO detalle_factura VALUES("42","2","13","1","150");
INSERT INTO detalle_factura VALUES("41","2","1","1","20");
INSERT INTO detalle_factura VALUES("40","2","1","1","20");
INSERT INTO detalle_factura VALUES("39","2","2","1","122");
INSERT INTO detalle_factura VALUES("38","2","15","1","50");
INSERT INTO detalle_factura VALUES("37","2","2","1","122");
INSERT INTO detalle_factura VALUES("36","2","1","1","20");
INSERT INTO detalle_factura VALUES("35","2","11","1","870");
INSERT INTO detalle_factura VALUES("34","2","14","1","150");
INSERT INTO detalle_factura VALUES("33","2","13","1","150");
INSERT INTO detalle_factura VALUES("32","2","13","1","150");
INSERT INTO detalle_factura VALUES("31","2","12","1","110");
INSERT INTO detalle_factura VALUES("30","2","12","1","110");
INSERT INTO detalle_factura VALUES("49","2","13","1","150");
INSERT INTO detalle_factura VALUES("50","2","12","1","110");
INSERT INTO detalle_factura VALUES("51","2","14","1","150");
INSERT INTO detalle_factura VALUES("52","2","2","1","122");
INSERT INTO detalle_factura VALUES("58","1","15","1","50");
INSERT INTO detalle_factura VALUES("59","1","13","1","150");
INSERT INTO detalle_factura VALUES("60","1","13","1","150");
INSERT INTO detalle_factura VALUES("61","1","12","1","110");
INSERT INTO detalle_factura VALUES("76","4","11","1","870");
INSERT INTO detalle_factura VALUES("75","4","12","1","300");
INSERT INTO detalle_factura VALUES("73","4","12","1","110");
INSERT INTO detalle_factura VALUES("72","4","14","1","150");
INSERT INTO detalle_factura VALUES("74","4","2","1","122");
INSERT INTO detalle_factura VALUES("68","1","13","1","150");



DROP TABLE IF EXISTS facturas;

CREATE TABLE `facturas` (
  `id_factura` int NOT NULL AUTO_INCREMENT,
  `numero_factura` int NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int NOT NULL,
  `id_vendedor` int NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  `id_atencion` int DEFAULT NULL,
  PRIMARY KEY (`id_factura`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO facturas VALUES("1","1","2020-11-07 21:56:48","13","1","2","1186.8","2","2");
INSERT INTO facturas VALUES("2","2","2020-11-07 21:57:37","27","1","2","6230.7","2","1");
INSERT INTO facturas VALUES("4","4","2020-11-08 04:24:30","27","1","1","1784.8","1","4");



DROP TABLE IF EXISTS hist_pass;

CREATE TABLE `hist_pass` (
  `id_usuario` int NOT NULL,
  `pass` varchar(299) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO hist_pass VALUES("30","$2y$10$p96HnbWmovfA//Gjgrg8EOTMFFBnSzmeYBui6RFgsuEKblWgIOp0e","2020-10-12 21:55:53");
INSERT INTO hist_pass VALUES("17","$2y$10$9jM2dGsRXPtdCppVpFjSzebXaKwQna38kHANSTa0MirKg0r0weqDu","2020-10-12 22:52:45");
INSERT INTO hist_pass VALUES("31","$2y$10$VscVduiPdnwFFmqPe31keOe.FfnlgtXO3Ta9mlK2NE0zBVRjS/J3i","2020-10-12 23:15:32");
INSERT INTO hist_pass VALUES("28","$2y$10$/eV9SHvwjcMU43tqQf.WMO2WaKnCkOEXSF7sgDxRRVfJ4ZkPelUg.","2020-10-14 21:08:42");
INSERT INTO hist_pass VALUES("32","$2y$10$YNI7SZM2HmmySUEajduIEOrPdyr39F0zWDEHcfEsawSGDDCCJQ.Ia","2020-10-26 03:10:59");
INSERT INTO hist_pass VALUES("32","$2y$10$/jdLLBeHO7WPFFLu/q4V0u5sw2B8XAZS48cehJqcKceWK2pHGeuxy","2020-10-26 03:24:15");
INSERT INTO hist_pass VALUES("32","$2y$10$ljjo/qD84NTDHYf0Ght54.yxXTUwzmi/amQ7K9ksCssOYaRGQU07K","2020-10-26 03:26:32");
INSERT INTO hist_pass VALUES("1","$2y$10$NsLguRmRC8QbRzwEB4vlme5oivIRV.om6YrcQ.3fqswD/LfnR5K9C","2020-10-28 23:19:21");
INSERT INTO hist_pass VALUES("17","$2y$10$H2cqX9/UQzC8/D90l6BQyOhzJVA16A89nhJF.OOvF.0y7SBtvw2Ja","2020-11-16 21:42:18");
INSERT INTO hist_pass VALUES("30","$2y$10$B.iaQqIHzWbLOXpHV/d7O.IjqqUBwNsnY48SQQYIvJPtg.YjJGAym","2020-11-23 23:17:36");
INSERT INTO hist_pass VALUES("17","$2y$10$GsWC.Cj2xHH0UDNkwIeeM.mSuFTryuNsmBAk4Zx9WAsnhZ/USNUFC","2020-11-24 00:12:33");
INSERT INTO hist_pass VALUES("7","$2y$10$xExvOi6DUJS2D8uclrP7DOcQsmvK8oqbMM1Ap8Xa8.WeeTalQ5BbG","2020-11-24 20:24:15");



DROP TABLE IF EXISTS menu;

CREATE TABLE `menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `menu_nombre` varchar(255) NOT NULL,
  `id_padre` int NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `li_class` varchar(50) DEFAULT NULL,
  `ul_class` varchar(50) DEFAULT NULL,
  `ul_cerrar` varchar(50) DEFAULT NULL,
  `estatus` enum('0','1') NOT NULL DEFAULT '1',
  `logo` varchar(200) NOT NULL,
  `pant_nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO menu VALUES("5","usuarios</a>","4","usuarios.php","  ","","","1","","USUARIOS","Catálogo de usuarios.");
INSERT INTO menu VALUES("7","Roles</a>","4","roles.php","  ","","","1","","ROLES","Catálogo de los roles activos en el programa");
INSERT INTO menu VALUES("8","Pantallas</a>","4","pantallas.php","  ","","","1","","PANTALLAS","Catalogo de pantallas");
INSERT INTO menu VALUES("9","Configuracion</a>","4","parametro.php","  ","","","1","","CONFIGURACION","Configuracion de parametros principales.");
INSERT INTO menu VALUES("10","Bitacora</a>","4","bitacora.php","  ","","","1","","BITACORA","Bitacora de acciones.");
INSERT INTO menu VALUES("11","Lista de Espera</a>","1","clientes_pend.php","  ","","","1","","LISTA DE ESPERA","Lista de espera a los clientes.");
INSERT INTO menu VALUES("12","Atenciones</a>","1","atencion_meca.php","  ","","","1","","ATENCIONES","Lista de atenciones que tienen por atender los especialistas.");
INSERT INTO menu VALUES("13","Servicios</a>","1","servicios.php","  ","","","1","","LISTA SERVICIOS","Catálogo de servicios que proporcionamos.");
INSERT INTO menu VALUES("14","Clientes</a>","2","clientes.php","  ","","","1","","CLIENTES","Catálogo de clientes.");
INSERT INTO menu VALUES("15","Vehiculos </a>","2","vehiculos.php","  ","","","1","","VEHICULOS","Catálogo de vehiculos.");
INSERT INTO menu VALUES("16","Proveedores</a>","2","provedores.php","  ","","","1","","PROVEEDORES","Catálogo de Proveedores.");
INSERT INTO menu VALUES("17","Productos </a>","2","productos.php","  ","","","1","","PRODUCTOS","Ingreso de productos al inv.");
INSERT INTO menu VALUES("18","Factura pendiente </a>","3","factura_pendiente.php","  ","","","1","","FACTURA PENDIENTE","Facturas pendientes de atenciones.");
INSERT INTO menu VALUES("19","Facturas </a>","3","facturas.php","  ","","","1","","FACTURAS","Historial de facturas y facturas de caja. ");
INSERT INTO menu VALUES("20","Mov Inventario </a>","3","mov_inventario.php","  ","","","1","","MOV_INVENTARIO","Verificar los movimientos de inventario.");



DROP TABLE IF EXISTS permisos;

CREATE TABLE `permisos` (
  `per_id_permiso` int NOT NULL AUTO_INCREMENT,
  `per_id_rol` int NOT NULL,
  `per_id_pantalla` int NOT NULL,
  `per_consulta` varchar(1) NOT NULL,
  `per_insercion` varchar(1) NOT NULL,
  `per_eliminacion` varchar(1) NOT NULL,
  `per_actualizacion` varchar(1) NOT NULL,
  `per_fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `per_fecha_modificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `per_usu_modi` int NOT NULL,
  PRIMARY KEY (`per_id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO permisos VALUES("2","3","12","0","0","0","1","2020-11-24 19:47:04","2020-11-24 19:47:04","1");
INSERT INTO permisos VALUES("3","3","14","0","1","1","1","2020-11-26 05:48:52","2020-11-26 05:48:52","1");



DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `status_producto` tinyint NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `precio_producto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio_costo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cant` int NOT NULL DEFAULT '0',
  `tipo` tinyint NOT NULL,
  `unidad` varchar(60) DEFAULT 'N/A',
  `categorias` varchar(60) DEFAULT 'N/A',
  `proveedor` varchar(50) DEFAULT 'N/A',
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_producto` (`codigo_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

INSERT INTO products VALUES("1","B000360","Aceite Mineral","1","2017-09-20 20:59:16","20.00","0.00","11","0","bote","N/A","N/A");
INSERT INTO products VALUES("2","B000363","Aceite Comun","1","2017-09-21 16:33:11","122.00","0.00","6","0","bote","N/A","N/A");
INSERT INTO products VALUES("13","S000368","Lavado Completo Turismo","1","2020-11-06 22:37:38","150.00","90.00","11","1","N/A","Limpieza","N/A");
INSERT INTO products VALUES("12","S000367","Lavado Turismo","1","2020-11-06 22:35:49","110.00","80.00","8","1","N/A","N/A","N/A");
INSERT INTO products VALUES("14","S000369","Cambio De Aceite","1","2020-11-06 22:50:13","150.00","100.00","11","1","N/A","Mantenimiento","N/A");
INSERT INTO products VALUES("11","P000367","Llantas Bridgestone","1","2020-11-06 21:56:49","870.00","720.00","8","0","Bolsa","Mantenimiento","Inversiones Multiples");
INSERT INTO products VALUES("15","S000370","Lavado Motor Turismo","1","2020-11-06 23:20:40","50.00","20.00","10","1","N/A","Limpieza","N/A");
INSERT INTO products VALUES("16","S000371","pintado y enderezado","1","2020-11-23 22:44:38","500.00","300.00","0","1","N/A","Reparacion","N/A");
INSERT INTO products VALUES("17","P000372","aceite motor","1","2020-11-23 22:46:55","210.00","150.00","10","0","Botes","Mantenimiento","Inversiones Multiples");



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `rol_id_rol` int NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(50) NOT NULL,
  `rol_descripcion` varchar(100) NOT NULL,
  `rol_fecha_modificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol_fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rol_id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO roles VALUES("1","ADMINISTRADOR","organiza","2018-08-27 15:56:59","2018-08-27 15:56:59");
INSERT INTO roles VALUES("2","DEPENDIENTE","teresita","2018-08-27 15:57:25","2018-08-27 15:57:25");
INSERT INTO roles VALUES("3","MECANICO","persona encargada","2018-10-09 14:11:52","2018-10-09 14:11:52");
INSERT INTO roles VALUES("4","ASISTENTE","marvin","2018-10-15 14:56:16","2018-10-15 14:56:16");
INSERT INTO roles VALUES("5","NUEVO","visitasa","2018-10-16 09:20:05","2018-10-16 09:20:05");
INSERT INTO roles VALUES("6","Vendedor","joss","2020-11-24 00:04:38","2020-11-23 23:58:58");
INSERT INTO roles VALUES("7","","","2020-11-24 21:09:29","2020-11-24 21:09:29");
INSERT INTO roles VALUES("8","","","2020-11-27 05:24:56","2020-11-27 05:24:56");
INSERT INTO roles VALUES("9","Hola","Mundo","2020-11-27 05:26:41","2020-11-27 05:26:41");



DROP TABLE IF EXISTS tbl_atenciones;

CREATE TABLE `tbl_atenciones` (
  `id_atencion` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_usuario` int NOT NULL,
  `status` varchar(11) NOT NULL,
  `fecha_visita` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `observacion` varchar(300) DEFAULT NULL,
  `id_auto` int DEFAULT NULL,
  PRIMARY KEY (`id_atencion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tbl_atenciones VALUES("1","27","1","4","2020-11-07 14:54:50","  Lavado motor y compra de llanta","2");
INSERT INTO tbl_atenciones VALUES("2","13","1","4","2020-11-07 14:54:54","Cambio de aceite y lavado","1");
INSERT INTO tbl_atenciones VALUES("3","20","1","4","2020-11-07 17:10:14","  lavado","5");
INSERT INTO tbl_atenciones VALUES("4","27","1","4","2020-11-07 21:20:44","   lavado completo que costo 300 , cambio de aceite ","4");
INSERT INTO tbl_atenciones VALUES("5","13","1","1","2020-11-12 21:29:40","","0");
INSERT INTO tbl_atenciones VALUES("6","20","1","4","2020-11-12 21:29:43","    ","5");
INSERT INTO tbl_atenciones VALUES("7","13","1","1","2020-11-14 16:23:03","","0");
INSERT INTO tbl_atenciones VALUES("8","13","1","1","2020-11-16 20:24:09","","0");
INSERT INTO tbl_atenciones VALUES("9","13","1","1","2020-11-16 20:25:45","","0");
INSERT INTO tbl_atenciones VALUES("10","13","1","1","2020-11-23 22:41:59","","0");
INSERT INTO tbl_atenciones VALUES("11","13","1","1","2020-11-24 01:11:12","","0");
INSERT INTO tbl_atenciones VALUES("12","13","1","1","2020-11-24 01:11:38","","0");



DROP TABLE IF EXISTS tbl_bitacoras;

CREATE TABLE `tbl_bitacoras` (
  `id_bitacora` bigint NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint DEFAULT NULL,
  `objeto` varchar(100) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=1123 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bitacoras VALUES("1","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'BARAHONA\', usuario=\'JOSS\', id_rol=\'2\', correo_electronico=\'oscarunah_1@hotmail.com\', estado_usuario=\'NUEVO\', activacion= \'0\' WHERE id_usuario=\'17\'","2020-10-12 21:48:18");
INSERT INTO tbl_bitacoras VALUES("2","1","Usuarios","INSERT","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol,activacion,fecha_cambio_contrasena) values(\'MARVIN DOS\', \'MARVINN\',\'$2y$10$p96HnbWmovfA//Gjgrg8EOTMF","2020-10-12 21:55:53");
INSERT INTO tbl_bitacoras VALUES("3","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-10-12 21:56:12");
INSERT INTO tbl_bitacoras VALUES("4","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-10-12 22:03:11");
INSERT INTO tbl_bitacoras VALUES("5","1","tbl_usuario","DELETE","DELETE  FROM tbl_usuario WHERE id_usuario=\'21\'","2020-10-12 22:03:36");
INSERT INTO tbl_bitacoras VALUES("6","1","tbl_usuario","DELETE","DELETE  FROM tbl_usuario WHERE id_usuario=\'13\'","2020-10-12 22:05:54");
INSERT INTO tbl_bitacoras VALUES("7","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-10-12 22:07:10");
INSERT INTO tbl_bitacoras VALUES("8","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-10-12 22:08:58");
INSERT INTO tbl_bitacoras VALUES("9","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-10-12 22:09:54");
INSERT INTO tbl_bitacoras VALUES("628","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-15 11:08:02");
INSERT INTO tbl_bitacoras VALUES("629","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 11:08:07");
INSERT INTO tbl_bitacoras VALUES("630","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 11:16:10");
INSERT INTO tbl_bitacoras VALUES("631","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-15 11:28:01");
INSERT INTO tbl_bitacoras VALUES("632","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 11:28:10");
INSERT INTO tbl_bitacoras VALUES("633","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 11:28:22");
INSERT INTO tbl_bitacoras VALUES("634","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 11:53:07");
INSERT INTO tbl_bitacoras VALUES("635","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 11:53:17");
INSERT INTO tbl_bitacoras VALUES("636","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-15 11:54:48");
INSERT INTO tbl_bitacoras VALUES("637","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-15 11:56:45");
INSERT INTO tbl_bitacoras VALUES("638","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 12:52:01");
INSERT INTO tbl_bitacoras VALUES("639","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 12:52:21");
INSERT INTO tbl_bitacoras VALUES("640","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 12:54:03");
INSERT INTO tbl_bitacoras VALUES("641","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-15 17:02:22");
INSERT INTO tbl_bitacoras VALUES("642","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:02:28");
INSERT INTO tbl_bitacoras VALUES("643","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:05:36");
INSERT INTO tbl_bitacoras VALUES("644","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:06:07");
INSERT INTO tbl_bitacoras VALUES("645","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:06:21");
INSERT INTO tbl_bitacoras VALUES("646","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:06:57");
INSERT INTO tbl_bitacoras VALUES("647","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:07:29");
INSERT INTO tbl_bitacoras VALUES("648","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:08:38");
INSERT INTO tbl_bitacoras VALUES("649","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:17:28");
INSERT INTO tbl_bitacoras VALUES("650","17","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-15 17:21:44");
INSERT INTO tbl_bitacoras VALUES("651","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:21:54");
INSERT INTO tbl_bitacoras VALUES("652","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:22:51");
INSERT INTO tbl_bitacoras VALUES("653","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:23:12");
INSERT INTO tbl_bitacoras VALUES("654","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:24:22");
INSERT INTO tbl_bitacoras VALUES("655","17","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-15 17:26:25");
INSERT INTO tbl_bitacoras VALUES("656","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:26:37");
INSERT INTO tbl_bitacoras VALUES("657","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:28:17");
INSERT INTO tbl_bitacoras VALUES("658","17","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-15 17:28:21");
INSERT INTO tbl_bitacoras VALUES("659","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:28:29");
INSERT INTO tbl_bitacoras VALUES("660","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:28:54");
INSERT INTO tbl_bitacoras VALUES("662","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:29:08");
INSERT INTO tbl_bitacoras VALUES("664","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:30:45");
INSERT INTO tbl_bitacoras VALUES("665","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:31:14");
INSERT INTO tbl_bitacoras VALUES("667","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:31:45");
INSERT INTO tbl_bitacoras VALUES("669","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:32:34");
INSERT INTO tbl_bitacoras VALUES("671","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:32:48");
INSERT INTO tbl_bitacoras VALUES("673","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:33:20");
INSERT INTO tbl_bitacoras VALUES("675","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:35:15");
INSERT INTO tbl_bitacoras VALUES("676","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:35:50");
INSERT INTO tbl_bitacoras VALUES("677","17","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 17:36:24");
INSERT INTO tbl_bitacoras VALUES("678","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:36:34");
INSERT INTO tbl_bitacoras VALUES("679","17","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 17:36:38");
INSERT INTO tbl_bitacoras VALUES("680","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 02:38:46");
INSERT INTO tbl_bitacoras VALUES("681","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 02:39:11");
INSERT INTO tbl_bitacoras VALUES("682","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-16 02:39:17");
INSERT INTO tbl_bitacoras VALUES("683","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-16 02:39:23");
INSERT INTO tbl_bitacoras VALUES("684","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 02:40:11");
INSERT INTO tbl_bitacoras VALUES("685","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 03:24:02");
INSERT INTO tbl_bitacoras VALUES("686","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 03:24:11");
INSERT INTO tbl_bitacoras VALUES("687","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 03:24:24");
INSERT INTO tbl_bitacoras VALUES("688","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-16 03:47:55");
INSERT INTO tbl_bitacoras VALUES("689","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-16 20:23:33");
INSERT INTO tbl_bitacoras VALUES("690","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-16 20:23:45");
INSERT INTO tbl_bitacoras VALUES("691","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 20:25:51");
INSERT INTO tbl_bitacoras VALUES("692","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-16 20:33:56");
INSERT INTO tbl_bitacoras VALUES("693","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 21:17:16");
INSERT INTO tbl_bitacoras VALUES("694","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 21:18:51");
INSERT INTO tbl_bitacoras VALUES("695","17","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-16 21:31:15");
INSERT INTO tbl_bitacoras VALUES("696","17","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-16 21:31:41");
INSERT INTO tbl_bitacoras VALUES("697","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 21:33:23");
INSERT INTO tbl_bitacoras VALUES("698","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'BARAHONA\', usuario=\'JOSS\', id_rol=\'2\', correo_electronico=\'dioxanabarahona14@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuar","2020-11-16 21:34:20");
INSERT INTO tbl_bitacoras VALUES("699","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-16 21:34:22");
INSERT INTO tbl_bitacoras VALUES("700","17","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-16 21:39:38");
INSERT INTO tbl_bitacoras VALUES("701","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-16 21:40:31");
INSERT INTO tbl_bitacoras VALUES("702","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-16 21:40:40");
INSERT INTO tbl_bitacoras VALUES("703","17","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-16 21:41:57");
INSERT INTO tbl_bitacoras VALUES("704","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-16 21:42:17");
INSERT INTO tbl_bitacoras VALUES("705","17","Cambio de Contrasenia","Cambio","Se realizo con exito un cambio de contrasenia mediante correo electronico","2020-11-16 21:42:18");
INSERT INTO tbl_bitacoras VALUES("706","17","Actualizar ","update","UPDATE tbl_usuario SET contrasena = $pass WHERE id_usuario =$id ","2020-11-16 21:42:18");
INSERT INTO tbl_bitacoras VALUES("707","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-16 21:44:52");
INSERT INTO tbl_bitacoras VALUES("708","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-16 21:44:56");
INSERT INTO tbl_bitacoras VALUES("709","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 05:16:55");
INSERT INTO tbl_bitacoras VALUES("710","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 05:17:06");
INSERT INTO tbl_bitacoras VALUES("711","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 05:17:16");
INSERT INTO tbl_bitacoras VALUES("712","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 05:17:36");
INSERT INTO tbl_bitacoras VALUES("713","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 05:17:42");
INSERT INTO tbl_bitacoras VALUES("714","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 05:17:51");
INSERT INTO tbl_bitacoras VALUES("715","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 05:18:01");
INSERT INTO tbl_bitacoras VALUES("716","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 05:18:12");
INSERT INTO tbl_bitacoras VALUES("717","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-23 05:37:51");
INSERT INTO tbl_bitacoras VALUES("718","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-23 07:16:22");
INSERT INTO tbl_bitacoras VALUES("719","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-23 07:16:31");
INSERT INTO tbl_bitacoras VALUES("720","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-23 07:23:20");
INSERT INTO tbl_bitacoras VALUES("721","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-23 07:26:23");
INSERT INTO tbl_bitacoras VALUES("722","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 20:05:38");
INSERT INTO tbl_bitacoras VALUES("723","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 20:06:18");
INSERT INTO tbl_bitacoras VALUES("724","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:07:00");
INSERT INTO tbl_bitacoras VALUES("725","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:08:14");
INSERT INTO tbl_bitacoras VALUES("726","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:08:18");
INSERT INTO tbl_bitacoras VALUES("727","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:08:39");
INSERT INTO tbl_bitacoras VALUES("728","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:08:42");
INSERT INTO tbl_bitacoras VALUES("729","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:08:47");
INSERT INTO tbl_bitacoras VALUES("730","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:08:51");
INSERT INTO tbl_bitacoras VALUES("731","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:09:07");
INSERT INTO tbl_bitacoras VALUES("732","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:09:11");
INSERT INTO tbl_bitacoras VALUES("733","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:35:57");
INSERT INTO tbl_bitacoras VALUES("734","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:38:27");
INSERT INTO tbl_bitacoras VALUES("735","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 20:38:34");
INSERT INTO tbl_bitacoras VALUES("736","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-23 20:39:49");
INSERT INTO tbl_bitacoras VALUES("737","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:41:03");
INSERT INTO tbl_bitacoras VALUES("738","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:42:03");
INSERT INTO tbl_bitacoras VALUES("739","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 20:42:10");
INSERT INTO tbl_bitacoras VALUES("740","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-23 21:36:12");
INSERT INTO tbl_bitacoras VALUES("741","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:36:58");
INSERT INTO tbl_bitacoras VALUES("742","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:37:17");
INSERT INTO tbl_bitacoras VALUES("743","0","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:42:16");
INSERT INTO tbl_bitacoras VALUES("744","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 21:44:09");
INSERT INTO tbl_bitacoras VALUES("745","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:44:36");
INSERT INTO tbl_bitacoras VALUES("746","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 21:44:47");
INSERT INTO tbl_bitacoras VALUES("747","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 21:45:57");
INSERT INTO tbl_bitacoras VALUES("748","0","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:48:15");
INSERT INTO tbl_bitacoras VALUES("749","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:48:59");
INSERT INTO tbl_bitacoras VALUES("750","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 21:49:18");
INSERT INTO tbl_bitacoras VALUES("751","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:49:50");
INSERT INTO tbl_bitacoras VALUES("752","0","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 21:53:46");
INSERT INTO tbl_bitacoras VALUES("753","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 22:02:38");
INSERT INTO tbl_bitacoras VALUES("754","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:12:16");
INSERT INTO tbl_bitacoras VALUES("755","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:25:04");
INSERT INTO tbl_bitacoras VALUES("756","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:29:04");
INSERT INTO tbl_bitacoras VALUES("757","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'BARAHONA\', usuario=\'JOSS\', id_rol=\'4\', correo_electronico=\'dioxanabarahona14@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuar","2020-11-23 22:29:52");
INSERT INTO tbl_bitacoras VALUES("758","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:29:53");
INSERT INTO tbl_bitacoras VALUES("759","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:30:21");
INSERT INTO tbl_bitacoras VALUES("760","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:31:24");
INSERT INTO tbl_bitacoras VALUES("761","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:31:57");
INSERT INTO tbl_bitacoras VALUES("762","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:32:20");
INSERT INTO tbl_bitacoras VALUES("763","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'MARVIN\', usuario=\'MARVINN\', id_rol=\'5\', correo_electronico=\'osunah1910@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuario=\'30","2020-11-23 22:33:10");
INSERT INTO tbl_bitacoras VALUES("764","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:33:12");
INSERT INTO tbl_bitacoras VALUES("765","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 22:33:15");
INSERT INTO tbl_bitacoras VALUES("766","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-23 22:33:59");
INSERT INTO tbl_bitacoras VALUES("767","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:36:00");
INSERT INTO tbl_bitacoras VALUES("768","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:36:00");
INSERT INTO tbl_bitacoras VALUES("769","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'MARVIN\', usuario=\'MARVINN\', id_rol=\'5\', correo_electronico=\'osunah1910@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuario=\'30","2020-11-23 22:36:16");
INSERT INTO tbl_bitacoras VALUES("770","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:36:18");
INSERT INTO tbl_bitacoras VALUES("771","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 22:36:19");
INSERT INTO tbl_bitacoras VALUES("772","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:38:17");
INSERT INTO tbl_bitacoras VALUES("773","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 22:41:27");
INSERT INTO tbl_bitacoras VALUES("774","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:41:49");
INSERT INTO tbl_bitacoras VALUES("775","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:41:56");
INSERT INTO tbl_bitacoras VALUES("776","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:42:36");
INSERT INTO tbl_bitacoras VALUES("777","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:42:45");
INSERT INTO tbl_bitacoras VALUES("778","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:43:53");
INSERT INTO tbl_bitacoras VALUES("779","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:44:52");
INSERT INTO tbl_bitacoras VALUES("780","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 22:45:08");
INSERT INTO tbl_bitacoras VALUES("781","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:45:27");
INSERT INTO tbl_bitacoras VALUES("782","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:47:15");
INSERT INTO tbl_bitacoras VALUES("783","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:47:17");
INSERT INTO tbl_bitacoras VALUES("784","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 22:47:21");
INSERT INTO tbl_bitacoras VALUES("785","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:47:27");
INSERT INTO tbl_bitacoras VALUES("786","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:48:04");
INSERT INTO tbl_bitacoras VALUES("787","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 22:48:17");
INSERT INTO tbl_bitacoras VALUES("788","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-23 22:48:48");
INSERT INTO tbl_bitacoras VALUES("789","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:49:06");
INSERT INTO tbl_bitacoras VALUES("790","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 22:50:32");
INSERT INTO tbl_bitacoras VALUES("791","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 22:50:42");
INSERT INTO tbl_bitacoras VALUES("792","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:50:55");
INSERT INTO tbl_bitacoras VALUES("793","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:52:15");
INSERT INTO tbl_bitacoras VALUES("794","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:52:18");
INSERT INTO tbl_bitacoras VALUES("795","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:52:25");
INSERT INTO tbl_bitacoras VALUES("796","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-23 22:52:37");
INSERT INTO tbl_bitacoras VALUES("797","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:52:45");
INSERT INTO tbl_bitacoras VALUES("798","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-23 22:52:48");
INSERT INTO tbl_bitacoras VALUES("799","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 22:52:53");
INSERT INTO tbl_bitacoras VALUES("800","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:52:56");
INSERT INTO tbl_bitacoras VALUES("801","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:52:59");
INSERT INTO tbl_bitacoras VALUES("802","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:53:04");
INSERT INTO tbl_bitacoras VALUES("803","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:53:22");
INSERT INTO tbl_bitacoras VALUES("804","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:53:28");
INSERT INTO tbl_bitacoras VALUES("805","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:54:05");
INSERT INTO tbl_bitacoras VALUES("806","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:55:04");
INSERT INTO tbl_bitacoras VALUES("807","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:56:57");
INSERT INTO tbl_bitacoras VALUES("808","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:57:16");
INSERT INTO tbl_bitacoras VALUES("809","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 22:59:26");
INSERT INTO tbl_bitacoras VALUES("810","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:12:47");
INSERT INTO tbl_bitacoras VALUES("811","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:12:58");
INSERT INTO tbl_bitacoras VALUES("812","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'MARVIN\', usuario=\'MARVINN\', id_rol=\'5\', correo_electronico=\'osunah1910@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuario=\'30","2020-11-23 23:13:01");
INSERT INTO tbl_bitacoras VALUES("813","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:13:02");
INSERT INTO tbl_bitacoras VALUES("814","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:14:36");
INSERT INTO tbl_bitacoras VALUES("815","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 23:15:23");
INSERT INTO tbl_bitacoras VALUES("816","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:15:30");
INSERT INTO tbl_bitacoras VALUES("817","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:15:49");
INSERT INTO tbl_bitacoras VALUES("818","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:16:09");
INSERT INTO tbl_bitacoras VALUES("819","30","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-23 23:16:13");
INSERT INTO tbl_bitacoras VALUES("820","30","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-23 23:16:33");
INSERT INTO tbl_bitacoras VALUES("821","30","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-23 23:16:37");
INSERT INTO tbl_bitacoras VALUES("822","30","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-23 23:17:36");
INSERT INTO tbl_bitacoras VALUES("823","30","Cambio de Contrasenia","Cambio","Se realizo con exito un cambio de contrasenia mediante correo electronico","2020-11-23 23:17:36");
INSERT INTO tbl_bitacoras VALUES("824","30","Actualizar ","update","UPDATE tbl_usuario SET contrasena = $pass WHERE id_usuario =$id ","2020-11-23 23:17:36");
INSERT INTO tbl_bitacoras VALUES("825","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:19:13");
INSERT INTO tbl_bitacoras VALUES("826","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:19:43");
INSERT INTO tbl_bitacoras VALUES("827","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:19:53");
INSERT INTO tbl_bitacoras VALUES("828","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 23:21:00");
INSERT INTO tbl_bitacoras VALUES("829","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:21:23");
INSERT INTO tbl_bitacoras VALUES("830","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 23:21:28");
INSERT INTO tbl_bitacoras VALUES("831","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:21:36");
INSERT INTO tbl_bitacoras VALUES("832","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:23:09");
INSERT INTO tbl_bitacoras VALUES("833","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 23:24:28");
INSERT INTO tbl_bitacoras VALUES("834","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-23 23:25:07");
INSERT INTO tbl_bitacoras VALUES("835","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-23 23:25:14");
INSERT INTO tbl_bitacoras VALUES("836","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:26:03");
INSERT INTO tbl_bitacoras VALUES("837","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:26:15");
INSERT INTO tbl_bitacoras VALUES("838","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:27:44");
INSERT INTO tbl_bitacoras VALUES("839","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:28:41");
INSERT INTO tbl_bitacoras VALUES("840","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:34:53");
INSERT INTO tbl_bitacoras VALUES("841","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-23 23:35:42");
INSERT INTO tbl_bitacoras VALUES("842","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:35:58");
INSERT INTO tbl_bitacoras VALUES("843","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:36:07");
INSERT INTO tbl_bitacoras VALUES("844","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:37:26");
INSERT INTO tbl_bitacoras VALUES("845","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:37:37");
INSERT INTO tbl_bitacoras VALUES("846","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:37:39");
INSERT INTO tbl_bitacoras VALUES("847","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:37:51");
INSERT INTO tbl_bitacoras VALUES("848","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:38:14");
INSERT INTO tbl_bitacoras VALUES("849","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:38:20");
INSERT INTO tbl_bitacoras VALUES("850","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:39:03");
INSERT INTO tbl_bitacoras VALUES("851","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:41:07");
INSERT INTO tbl_bitacoras VALUES("852","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:41:15");
INSERT INTO tbl_bitacoras VALUES("853","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:41:26");
INSERT INTO tbl_bitacoras VALUES("854","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:41:36");
INSERT INTO tbl_bitacoras VALUES("855","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:41:38");
INSERT INTO tbl_bitacoras VALUES("856","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:41:43");
INSERT INTO tbl_bitacoras VALUES("857","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:41:47");
INSERT INTO tbl_bitacoras VALUES("858","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:42:11");
INSERT INTO tbl_bitacoras VALUES("859","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:42:31");
INSERT INTO tbl_bitacoras VALUES("860","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:42:33");
INSERT INTO tbl_bitacoras VALUES("861","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:42:47");
INSERT INTO tbl_bitacoras VALUES("862","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:42:51");
INSERT INTO tbl_bitacoras VALUES("863","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:43:08");
INSERT INTO tbl_bitacoras VALUES("864","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:43:19");
INSERT INTO tbl_bitacoras VALUES("865","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:43:37");
INSERT INTO tbl_bitacoras VALUES("866","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:43:39");
INSERT INTO tbl_bitacoras VALUES("867","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:43:44");
INSERT INTO tbl_bitacoras VALUES("868","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:43:57");
INSERT INTO tbl_bitacoras VALUES("869","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:44:04");
INSERT INTO tbl_bitacoras VALUES("870","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:44:33");
INSERT INTO tbl_bitacoras VALUES("871","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:45:34");
INSERT INTO tbl_bitacoras VALUES("872","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:45:49");
INSERT INTO tbl_bitacoras VALUES("873","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:46:12");
INSERT INTO tbl_bitacoras VALUES("874","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-23 23:46:26");
INSERT INTO tbl_bitacoras VALUES("875","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:47:32");
INSERT INTO tbl_bitacoras VALUES("876","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:47:48");
INSERT INTO tbl_bitacoras VALUES("877","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:47:52");
INSERT INTO tbl_bitacoras VALUES("878","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:50:51");
INSERT INTO tbl_bitacoras VALUES("879","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:52:46");
INSERT INTO tbl_bitacoras VALUES("880","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:53:52");
INSERT INTO tbl_bitacoras VALUES("881","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:55:22");
INSERT INTO tbl_bitacoras VALUES("882","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:56:13");
INSERT INTO tbl_bitacoras VALUES("883","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:56:24");
INSERT INTO tbl_bitacoras VALUES("884","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:56:40");
INSERT INTO tbl_bitacoras VALUES("885","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:56:48");
INSERT INTO tbl_bitacoras VALUES("886","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-23 23:57:04");
INSERT INTO tbl_bitacoras VALUES("887","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:57:33");
INSERT INTO tbl_bitacoras VALUES("888","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:58:32");
INSERT INTO tbl_bitacoras VALUES("889","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:59:00");
INSERT INTO tbl_bitacoras VALUES("890","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-23 23:59:11");
INSERT INTO tbl_bitacoras VALUES("891","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 00:03:13");
INSERT INTO tbl_bitacoras VALUES("892","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:03:40");
INSERT INTO tbl_bitacoras VALUES("893","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 00:04:05");
INSERT INTO tbl_bitacoras VALUES("894","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 00:04:41");
INSERT INTO tbl_bitacoras VALUES("895","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:04:56");
INSERT INTO tbl_bitacoras VALUES("896","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:05:17");
INSERT INTO tbl_bitacoras VALUES("897","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 00:07:09");
INSERT INTO tbl_bitacoras VALUES("898","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:08:02");
INSERT INTO tbl_bitacoras VALUES("899","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'BARAHONA\', usuario=\'JOSS\', id_rol=\'6\', correo_electronico=\'dioxanabarahona14@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuar","2020-11-24 00:08:52");
INSERT INTO tbl_bitacoras VALUES("900","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:08:54");
INSERT INTO tbl_bitacoras VALUES("901","17","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-24 00:09:15");
INSERT INTO tbl_bitacoras VALUES("902","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 00:11:01");
INSERT INTO tbl_bitacoras VALUES("903","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 00:11:08");
INSERT INTO tbl_bitacoras VALUES("904","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 00:11:57");
INSERT INTO tbl_bitacoras VALUES("905","17","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 00:12:33");
INSERT INTO tbl_bitacoras VALUES("906","17","Cambio de Contrasenia","Cambio","Se realizo con exito un cambio de contrasenia mediante correo electronico","2020-11-24 00:12:33");
INSERT INTO tbl_bitacoras VALUES("907","17","Actualizar ","update","UPDATE tbl_usuario SET contrasena = $pass WHERE id_usuario =$id ","2020-11-24 00:12:33");
INSERT INTO tbl_bitacoras VALUES("908","0","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-24 00:13:11");
INSERT INTO tbl_bitacoras VALUES("909","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:15:40");
INSERT INTO tbl_bitacoras VALUES("910","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:16:01");
INSERT INTO tbl_bitacoras VALUES("911","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 00:16:12");
INSERT INTO tbl_bitacoras VALUES("912","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:16:41");
INSERT INTO tbl_bitacoras VALUES("913","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:17:22");
INSERT INTO tbl_bitacoras VALUES("914","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 00:18:14");
INSERT INTO tbl_bitacoras VALUES("915","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 00:18:22");
INSERT INTO tbl_bitacoras VALUES("916","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-24 00:39:04");
INSERT INTO tbl_bitacoras VALUES("917","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-24 00:44:22");
INSERT INTO tbl_bitacoras VALUES("918","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-24 01:11:02");
INSERT INTO tbl_bitacoras VALUES("919","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-24 01:11:57");
INSERT INTO tbl_bitacoras VALUES("920","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 01:12:04");
INSERT INTO tbl_bitacoras VALUES("921","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 01:12:22");
INSERT INTO tbl_bitacoras VALUES("922","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 01:12:35");
INSERT INTO tbl_bitacoras VALUES("923","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 01:12:47");
INSERT INTO tbl_bitacoras VALUES("924","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 01:13:13");
INSERT INTO tbl_bitacoras VALUES("925","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 01:13:22");
INSERT INTO tbl_bitacoras VALUES("926","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 01:13:29");
INSERT INTO tbl_bitacoras VALUES("927","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 01:13:33");
INSERT INTO tbl_bitacoras VALUES("928","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 01:13:53");
INSERT INTO tbl_bitacoras VALUES("929","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 17:40:32");
INSERT INTO tbl_bitacoras VALUES("930","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 17:48:10");
INSERT INTO tbl_bitacoras VALUES("931","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 17:48:15");
INSERT INTO tbl_bitacoras VALUES("932","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 17:48:49");
INSERT INTO tbl_bitacoras VALUES("933","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 17:49:55");
INSERT INTO tbl_bitacoras VALUES("934","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'IRIAS\', usuario=\'YAS\', id_rol=\'3\', correo_electronico=\'yasielportilloirias@yahoo.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuario","2020-11-24 17:50:23");
INSERT INTO tbl_bitacoras VALUES("935","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 17:50:25");
INSERT INTO tbl_bitacoras VALUES("936","7","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-24 17:51:06");
INSERT INTO tbl_bitacoras VALUES("937","7","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 17:53:16");
INSERT INTO tbl_bitacoras VALUES("938","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:00:26");
INSERT INTO tbl_bitacoras VALUES("939","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 18:00:39");
INSERT INTO tbl_bitacoras VALUES("940","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:01:59");
INSERT INTO tbl_bitacoras VALUES("941","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:02:38");
INSERT INTO tbl_bitacoras VALUES("942","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:02:41");
INSERT INTO tbl_bitacoras VALUES("943","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:18:20");
INSERT INTO tbl_bitacoras VALUES("944","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:18:23");
INSERT INTO tbl_bitacoras VALUES("945","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:24:04");
INSERT INTO tbl_bitacoras VALUES("946","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:38:37");
INSERT INTO tbl_bitacoras VALUES("947","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:38:55");
INSERT INTO tbl_bitacoras VALUES("948","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:38:59");
INSERT INTO tbl_bitacoras VALUES("949","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:39:02");
INSERT INTO tbl_bitacoras VALUES("950","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:39:17");
INSERT INTO tbl_bitacoras VALUES("951","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:40:28");
INSERT INTO tbl_bitacoras VALUES("952","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 18:41:33");
INSERT INTO tbl_bitacoras VALUES("953","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 18:41:45");
INSERT INTO tbl_bitacoras VALUES("954","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 18:42:37");
INSERT INTO tbl_bitacoras VALUES("955","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 18:49:57");
INSERT INTO tbl_bitacoras VALUES("956","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 18:50:37");
INSERT INTO tbl_bitacoras VALUES("957","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 18:53:17");
INSERT INTO tbl_bitacoras VALUES("958","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 19:02:14");
INSERT INTO tbl_bitacoras VALUES("959","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:13:32");
INSERT INTO tbl_bitacoras VALUES("960","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:24:58");
INSERT INTO tbl_bitacoras VALUES("961","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:27:35");
INSERT INTO tbl_bitacoras VALUES("962","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:31:00");
INSERT INTO tbl_bitacoras VALUES("963","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:31:23");
INSERT INTO tbl_bitacoras VALUES("964","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:31:26");
INSERT INTO tbl_bitacoras VALUES("965","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:32:13");
INSERT INTO tbl_bitacoras VALUES("966","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 19:37:14");
INSERT INTO tbl_bitacoras VALUES("967","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:37:23");
INSERT INTO tbl_bitacoras VALUES("968","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:37:32");
INSERT INTO tbl_bitacoras VALUES("969","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:37:44");
INSERT INTO tbl_bitacoras VALUES("971","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 19:47:04");
INSERT INTO tbl_bitacoras VALUES("972","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:54:14");
INSERT INTO tbl_bitacoras VALUES("973","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:55:00");
INSERT INTO tbl_bitacoras VALUES("974","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:55:19");
INSERT INTO tbl_bitacoras VALUES("975","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:55:32");
INSERT INTO tbl_bitacoras VALUES("976","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 19:56:41");
INSERT INTO tbl_bitacoras VALUES("977","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:56:47");
INSERT INTO tbl_bitacoras VALUES("978","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:56:52");
INSERT INTO tbl_bitacoras VALUES("979","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 19:56:54");
INSERT INTO tbl_bitacoras VALUES("980","7","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-24 20:17:30");
INSERT INTO tbl_bitacoras VALUES("981","7","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-24 20:18:25");
INSERT INTO tbl_bitacoras VALUES("982","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:19:04");
INSERT INTO tbl_bitacoras VALUES("983","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:20:27");
INSERT INTO tbl_bitacoras VALUES("984","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:22:08");
INSERT INTO tbl_bitacoras VALUES("985","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:22:17");
INSERT INTO tbl_bitacoras VALUES("986","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'IRIAS\', usuario=\'YAS\', id_rol=\'3\', correo_electronico=\'yasiel.portillo.i@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuario=\'","2020-11-24 20:22:51");
INSERT INTO tbl_bitacoras VALUES("987","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:22:53");
INSERT INTO tbl_bitacoras VALUES("988","7","Recuperacion de Password","Solicitud","Se solicito recuperacion de password mediante correo electronico","2020-11-24 20:23:14");
INSERT INTO tbl_bitacoras VALUES("989","7","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 20:23:33");
INSERT INTO tbl_bitacoras VALUES("990","7","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 20:24:15");
INSERT INTO tbl_bitacoras VALUES("991","7","Cambio de Contrasenia","Cambio","Se realizo con exito un cambio de contrasenia mediante correo electronico","2020-11-24 20:24:15");
INSERT INTO tbl_bitacoras VALUES("992","7","Actualizar ","update","UPDATE tbl_usuario SET contrasena = $pass WHERE id_usuario =$id ","2020-11-24 20:24:15");
INSERT INTO tbl_bitacoras VALUES("993","7","cambia_pass","INGRESO","Esta en la pantalla de cambia password","2020-11-24 20:24:19");
INSERT INTO tbl_bitacoras VALUES("994","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-24 20:34:58");
INSERT INTO tbl_bitacoras VALUES("995","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:35:03");
INSERT INTO tbl_bitacoras VALUES("996","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:35:33");
INSERT INTO tbl_bitacoras VALUES("997","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:35:36");
INSERT INTO tbl_bitacoras VALUES("998","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 20:35:41");
INSERT INTO tbl_bitacoras VALUES("999","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 20:36:19");
INSERT INTO tbl_bitacoras VALUES("1000","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:04:30");
INSERT INTO tbl_bitacoras VALUES("1001","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:04:34");
INSERT INTO tbl_bitacoras VALUES("1002","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:04:36");
INSERT INTO tbl_bitacoras VALUES("1003","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:06:22");
INSERT INTO tbl_bitacoras VALUES("1004","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:08:04");
INSERT INTO tbl_bitacoras VALUES("1005","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-24 21:08:10");
INSERT INTO tbl_bitacoras VALUES("1006","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:12:22");
INSERT INTO tbl_bitacoras VALUES("1007","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:12:31");
INSERT INTO tbl_bitacoras VALUES("1008","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:12:34");
INSERT INTO tbl_bitacoras VALUES("1009","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 21:12:44");
INSERT INTO tbl_bitacoras VALUES("1010","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-24 22:05:26");
INSERT INTO tbl_bitacoras VALUES("1011","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 00:53:34");
INSERT INTO tbl_bitacoras VALUES("1012","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 00:55:52");
INSERT INTO tbl_bitacoras VALUES("1013","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-25 00:56:14");
INSERT INTO tbl_bitacoras VALUES("1014","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-25 00:57:59");
INSERT INTO tbl_bitacoras VALUES("1015","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 00:58:03");
INSERT INTO tbl_bitacoras VALUES("1016","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 00:58:11");
INSERT INTO tbl_bitacoras VALUES("1017","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 00:58:55");
INSERT INTO tbl_bitacoras VALUES("1018","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 00:59:02");
INSERT INTO tbl_bitacoras VALUES("1019","1","tbl_usuario","UPDATE","UPDATE tbl_usuario SET nombre_usuario=\'IRIAS\', usuario=\'YAS\', id_rol=\'1\', correo_electronico=\'yasiel.portillo.i@gmail.com\', estado_usuario=\'ACTIVO\', activacion= \'1\'  ,intentos = \'0\' WHERE id_usuario=\'","2020-11-25 00:59:24");
INSERT INTO tbl_bitacoras VALUES("1020","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 00:59:25");
INSERT INTO tbl_bitacoras VALUES("1021","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 01:00:25");
INSERT INTO tbl_bitacoras VALUES("1022","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 02:05:06");
INSERT INTO tbl_bitacoras VALUES("1023","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 02:05:23");
INSERT INTO tbl_bitacoras VALUES("1024","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 02:05:51");
INSERT INTO tbl_bitacoras VALUES("1025","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 02:06:18");
INSERT INTO tbl_bitacoras VALUES("1026","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 02:06:42");
INSERT INTO tbl_bitacoras VALUES("1027","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 02:06:44");
INSERT INTO tbl_bitacoras VALUES("1028","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:34:10");
INSERT INTO tbl_bitacoras VALUES("1029","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:35:19");
INSERT INTO tbl_bitacoras VALUES("1030","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-25 18:36:26");
INSERT INTO tbl_bitacoras VALUES("1031","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:36:56");
INSERT INTO tbl_bitacoras VALUES("1032","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:37:00");
INSERT INTO tbl_bitacoras VALUES("1033","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:37:43");
INSERT INTO tbl_bitacoras VALUES("1034","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:37:52");
INSERT INTO tbl_bitacoras VALUES("1035","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:37:55");
INSERT INTO tbl_bitacoras VALUES("1036","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:38:04");
INSERT INTO tbl_bitacoras VALUES("1037","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:38:09");
INSERT INTO tbl_bitacoras VALUES("1038","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 18:39:14");
INSERT INTO tbl_bitacoras VALUES("1039","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 18:39:34");
INSERT INTO tbl_bitacoras VALUES("1040","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-25 22:32:49");
INSERT INTO tbl_bitacoras VALUES("1041","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:33:26");
INSERT INTO tbl_bitacoras VALUES("1042","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:33:37");
INSERT INTO tbl_bitacoras VALUES("1043","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:33:46");
INSERT INTO tbl_bitacoras VALUES("1044","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-25 22:36:22");
INSERT INTO tbl_bitacoras VALUES("1045","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:36:56");
INSERT INTO tbl_bitacoras VALUES("1046","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 22:37:30");
INSERT INTO tbl_bitacoras VALUES("1047","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 23:00:52");
INSERT INTO tbl_bitacoras VALUES("1048","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:23:47");
INSERT INTO tbl_bitacoras VALUES("1049","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:27:53");
INSERT INTO tbl_bitacoras VALUES("1050","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:28:15");
INSERT INTO tbl_bitacoras VALUES("1051","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:37:49");
INSERT INTO tbl_bitacoras VALUES("1052","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:37:56");
INSERT INTO tbl_bitacoras VALUES("1053","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:40:05");
INSERT INTO tbl_bitacoras VALUES("1054","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:40:30");
INSERT INTO tbl_bitacoras VALUES("1055","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:41:18");
INSERT INTO tbl_bitacoras VALUES("1056","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:42:28");
INSERT INTO tbl_bitacoras VALUES("1057","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:42:35");
INSERT INTO tbl_bitacoras VALUES("1058","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:43:08");
INSERT INTO tbl_bitacoras VALUES("1059","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:46:51");
INSERT INTO tbl_bitacoras VALUES("1060","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:47:11");
INSERT INTO tbl_bitacoras VALUES("1061","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:47:32");
INSERT INTO tbl_bitacoras VALUES("1062","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:47:58");
INSERT INTO tbl_bitacoras VALUES("1063","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:50:23");
INSERT INTO tbl_bitacoras VALUES("1064","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:05:47");
INSERT INTO tbl_bitacoras VALUES("1065","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:08:08");
INSERT INTO tbl_bitacoras VALUES("1066","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:08:15");
INSERT INTO tbl_bitacoras VALUES("1067","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:29:18");
INSERT INTO tbl_bitacoras VALUES("1068","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:29:56");
INSERT INTO tbl_bitacoras VALUES("1069","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:30:08");
INSERT INTO tbl_bitacoras VALUES("1070","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:40:35");
INSERT INTO tbl_bitacoras VALUES("1071","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:41:13");
INSERT INTO tbl_bitacoras VALUES("1072","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:41:19");
INSERT INTO tbl_bitacoras VALUES("1073","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 02:41:30");
INSERT INTO tbl_bitacoras VALUES("1074","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:41:44");
INSERT INTO tbl_bitacoras VALUES("1075","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-26 02:43:39");
INSERT INTO tbl_bitacoras VALUES("1076","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 02:45:36");
INSERT INTO tbl_bitacoras VALUES("1077","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:45:44");
INSERT INTO tbl_bitacoras VALUES("1078","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-26 02:46:05");
INSERT INTO tbl_bitacoras VALUES("1079","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-26 02:47:43");
INSERT INTO tbl_bitacoras VALUES("1080","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:49:28");
INSERT INTO tbl_bitacoras VALUES("1081","0","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 03:11:16");
INSERT INTO tbl_bitacoras VALUES("1082","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 03:12:08");
INSERT INTO tbl_bitacoras VALUES("1083","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 03:12:44");
INSERT INTO tbl_bitacoras VALUES("1084","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 03:13:03");
INSERT INTO tbl_bitacoras VALUES("1085","0","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 03:51:18");
INSERT INTO tbl_bitacoras VALUES("1086","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 04:09:20");
INSERT INTO tbl_bitacoras VALUES("1087","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 04:09:28");
INSERT INTO tbl_bitacoras VALUES("1088","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 04:09:35");
INSERT INTO tbl_bitacoras VALUES("1089","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 04:09:45");
INSERT INTO tbl_bitacoras VALUES("1090","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 04:13:51");
INSERT INTO tbl_bitacoras VALUES("1091","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 04:14:32");
INSERT INTO tbl_bitacoras VALUES("1092","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 04:17:56");
INSERT INTO tbl_bitacoras VALUES("1093","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 04:19:49");
INSERT INTO tbl_bitacoras VALUES("1094","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 04:20:19");
INSERT INTO tbl_bitacoras VALUES("1095","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 04:21:25");
INSERT INTO tbl_bitacoras VALUES("1096","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 04:21:54");
INSERT INTO tbl_bitacoras VALUES("1097","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 04:24:33");
INSERT INTO tbl_bitacoras VALUES("1098","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 04:24:51");
INSERT INTO tbl_bitacoras VALUES("1099","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 04:24:57");
INSERT INTO tbl_bitacoras VALUES("1100","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 04:25:01");
INSERT INTO tbl_bitacoras VALUES("1101","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 04:25:11");
INSERT INTO tbl_bitacoras VALUES("1102","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 05:04:11");
INSERT INTO tbl_bitacoras VALUES("1103","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 05:05:11");
INSERT INTO tbl_bitacoras VALUES("1104","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 05:07:57");
INSERT INTO tbl_bitacoras VALUES("1105","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 05:19:17");
INSERT INTO tbl_bitacoras VALUES("1106","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 05:37:13");
INSERT INTO tbl_bitacoras VALUES("1107","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 05:38:41");
INSERT INTO tbl_bitacoras VALUES("1108","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 05:38:44");
INSERT INTO tbl_bitacoras VALUES("1109","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 05:38:50");
INSERT INTO tbl_bitacoras VALUES("1110","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 05:39:17");
INSERT INTO tbl_bitacoras VALUES("1111","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-26 05:47:42");
INSERT INTO tbl_bitacoras VALUES("1112","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-26 05:47:54");
INSERT INTO tbl_bitacoras VALUES("1113","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-26 05:48:22");
INSERT INTO tbl_bitacoras VALUES("1114","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 05:48:30");
INSERT INTO tbl_bitacoras VALUES("1115","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 05:48:52");
INSERT INTO tbl_bitacoras VALUES("1116","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-26 05:49:01");
INSERT INTO tbl_bitacoras VALUES("1117","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-26 05:49:12");
INSERT INTO tbl_bitacoras VALUES("1118","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 05:49:16");
INSERT INTO tbl_bitacoras VALUES("1119","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-27 03:07:38");
INSERT INTO tbl_bitacoras VALUES("1120","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-27 03:11:12");
INSERT INTO tbl_bitacoras VALUES("1121","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-27 03:11:14");
INSERT INTO tbl_bitacoras VALUES("1122","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-27 05:24:41");



DROP TABLE IF EXISTS tbl_categorias;

CREATE TABLE `tbl_categorias` (
  `id_categorias` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_categorias`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_categorias VALUES("1","Fuidos","Aceites, Liquidos de frenos etc");
INSERT INTO tbl_categorias VALUES("2","Limpieza","Robins, Cera Etc");
INSERT INTO tbl_categorias VALUES("3","Lujo","Spoilers, Rines");
INSERT INTO tbl_categorias VALUES("4","Mantenimiento","Neumaticos, Bujias");
INSERT INTO tbl_categorias VALUES("5","Reparacion","Pintura y enderezado");



DROP TABLE IF EXISTS tbl_clientes;

CREATE TABLE `tbl_clientes` (
  `id_cliente` bigint NOT NULL AUTO_INCREMENT,
  `identidad` varchar(14) NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `ape_cliente` varchar(50) NOT NULL,
  `genero` varchar(1) DEFAULT NULL COMMENT 'm masculino , f femenino',
  `celular` bigint NOT NULL,
  `telefono` bigint NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `cor_cliente` varchar(50) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO tbl_clientes VALUES("13","081236547","Juan Carlos","Lopez","M","36587596","50433112225","Middle East. Go","juanfilpz@gmail.com","2020-11-04 07:21:52","2020-11-04 07:21:52");
INSERT INTO tbl_clientes VALUES("20","0718","carlos francisco","fernandez","M","33567896","22336578","Los lauereles","cfran@superrito.com","2020-11-03 22:19:40","2020-11-03 22:19:40");
INSERT INTO tbl_clientes VALUES("26","081236547","Josue Alejandro","Izaguirre","M","98574123","22456987","San Ignacio FM","josuale@superrito.com","2020-11-05 02:12:17","2020-11-05 02:12:17");
INSERT INTO tbl_clientes VALUES("27","0854697862","Marvin","Mexi","M","98765432","32654987","El Hato","marvin@superrito.com","2020-11-06 15:08:37","2020-11-06 15:08:37");
INSERT INTO tbl_clientes VALUES("28","9999999999999","Cliente","Final","M","99999999","22222222","local","tecniwash504@gmail.com","2020-11-07 21:31:49","2020-11-07 21:31:49");
INSERT INTO tbl_clientes VALUES("29","0801198519228","Moised i","Irias","M","88248741","22365077","Col san miguel ","yasielportilloirias@yahoo.com","2020-11-25 18:35:16","2020-11-25 18:35:16");



DROP TABLE IF EXISTS tbl_parametros;

CREATE TABLE `tbl_parametros` (
  `id_parametro` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_parametro`),
  KEY `dias_vencimiento_contrasena` (`nombre`)
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
  `id_pregunta` int NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(70) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `creado_por` varchar(15) NOT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO tbl_preguntas VALUES("1","Fecha de Nacimiento?","2017-05-24 15:10:44","1","2017-06-06 14:38:11","1");
INSERT INTO tbl_preguntas VALUES("2","Color Favorito ?","2017-05-24 15:11:28","1","2017-06-06 14:38:21","1");
INSERT INTO tbl_preguntas VALUES("3","Cul sera tu trabajo ideal ?","2017-05-24 15:16:11","1","2020-10-12 23:20:06","");
INSERT INTO tbl_preguntas VALUES("4","Lugar de nacimiento de la madre ?","2017-07-24 15:18:31","1","2017-06-06 14:40:14","");
INSERT INTO tbl_preguntas VALUES("5","Mejor amigo(a) de la infancia ?","2017-07-24 15:18:53","1","2017-06-06 14:40:06","1");
INSERT INTO tbl_preguntas VALUES("6","Nombre de la primera mascota ?","2017-07-24 15:19:13","1","2017-06-06 14:39:58","");
INSERT INTO tbl_preguntas VALUES("7","Ocupacin del abuelo ?","2017-07-24 15:19:27","1","2020-10-12 23:20:06","");
INSERT INTO tbl_preguntas VALUES("8","Personaje histrico favorito ?","2017-07-24 15:19:51","1","2020-10-12 23:20:06","");
INSERT INTO tbl_preguntas VALUES("9","Profesor Favorito ?","2017-07-24 15:20:16","1","2017-06-06 14:39:31","");
INSERT INTO tbl_preguntas VALUES("10","Nombre de su pelcula favorita ?","2017-07-24 15:20:36","1","2020-10-12 23:20:06","");
INSERT INTO tbl_preguntas VALUES("11","Modelo de su primer auto ?","2017-07-24 15:21:31","1","2017-06-06 14:39:17","");
INSERT INTO tbl_preguntas VALUES("12","Evento que marc su vida ?","2017-07-24 15:23:11","1","2020-10-12 23:20:06","");
INSERT INTO tbl_preguntas VALUES("13","Fecha de Nacimiento??","2017-10-21 11:49:26","1","2017-06-06 14:39:12","");



DROP TABLE IF EXISTS tbl_productos;

CREATE TABLE `tbl_productos` (
  `id_productos` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `proveedor` varchar(45) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT '0.00',
  `precio_costo` decimal(10,2) DEFAULT '0.00',
  `categoria` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cant` int DEFAULT '0',
  PRIMARY KEY (`id_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_productos VALUES("26","Aceite","Aceite de tipo mineral 250ml","Chevron","120.00","90.00","Fluidos","2020-11-03 06:00:25","10");
INSERT INTO tbl_productos VALUES("27","Aceite Normal","Aceite de tipo normal 250ml","Fuidos","90.00","70.00","Fluidos","2020-11-03 06:13:15","86");
INSERT INTO tbl_productos VALUES("28","Rines","Rines cromados de 15 pulgadas","Lujo","1800.00","1500.00","Lujo","2020-11-03 06:16:05","87");
INSERT INTO tbl_productos VALUES("29","Vidrio lateral ","Vidrio lateral para vehiculo civic","Reparacion","750.00","700.00","Reparacion","2020-11-03 06:16:57","45");
INSERT INTO tbl_productos VALUES("30","Vidrio lateral ","Vidrio lateral para vehiculo civic","Reparacion","750.00","700.00","Reparacion","2020-11-03 06:18:49","54");
INSERT INTO tbl_productos VALUES("31","Vidrio frontal","Vidrio frontal para frontier","Reparacion","1500.00","1200.00","Reparacion","2020-11-03 06:19:24","45");
INSERT INTO tbl_productos VALUES("32","Puerta chofer","Puerta de chofer para vehiculo nisan sentra","Reparacion","450.00","220.00","Reparacion","2020-11-03 22:24:53","45");
INSERT INTO tbl_productos VALUES("33","juego de Retorvisores","Set completo de retrovisores para vehiculos turismo","Inversiones","450.00","300.00","Mantenimiento","2020-11-03 22:26:27","56");



DROP TABLE IF EXISTS tbl_proveedores;

CREATE TABLE `tbl_proveedores` (
  `id_proveedor` bigint NOT NULL AUTO_INCREMENT,
  `nom_empresa` varchar(50) NOT NULL,
  `num_tel1` bigint NOT NULL,
  `num_tel2` bigint NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `RTN` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `representante` varchar(30) NOT NULL,
  `cor_empresa` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO tbl_proveedores VALUES("5","Texaco","33125487","98562354","Residencial Santa Cruz","08179636548","","Francisco Reyes","fran@superrito.com","2020-10-28 20:01:34","2020-10-28 20:01:34");
INSERT INTO tbl_proveedores VALUES("6","Chevron","98684525","87963645","El Hato","08197564523","","Jose Andrade","jos@superrito.com","2020-11-03 05:33:07","2020-11-03 05:33:07");
INSERT INTO tbl_proveedores VALUES("7","Inversiones Multiples","33125487","87963645","Residencial Leona","07197564523","","Frank Reyes","franka@superrito.com","2020-11-03 06:21:05","2020-11-03 06:21:05");



DROP TABLE IF EXISTS tbl_respuestas;

CREATE TABLE `tbl_respuestas` (
  `id_usuario` bigint NOT NULL,
  `id_pregunta` bigint NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_respuestas VALUES("17","2","rojo","2020-10-02 00:31:07");
INSERT INTO tbl_respuestas VALUES("17","1","05/09/1991","2020-10-02 00:31:18");
INSERT INTO tbl_respuestas VALUES("17","11","Honda","2020-10-02 00:31:31");
INSERT INTO tbl_respuestas VALUES("31","5","perro","2020-10-13 05:21:07");
INSERT INTO tbl_respuestas VALUES("31","1","1991","2020-10-13 05:21:21");
INSERT INTO tbl_respuestas VALUES("31","2","verde","2020-10-13 05:21:44");
INSERT INTO tbl_respuestas VALUES("28","2","azul","2020-10-14 21:09:16");
INSERT INTO tbl_respuestas VALUES("28","8","tesla","2020-10-14 21:09:43");
INSERT INTO tbl_respuestas VALUES("28","10","avatar","2020-10-14 21:09:52");
INSERT INTO tbl_respuestas VALUES("32","2","verde","2020-10-26 03:19:45");
INSERT INTO tbl_respuestas VALUES("32","13","09/07/1992","2020-10-26 03:20:11");
INSERT INTO tbl_respuestas VALUES("32","6","floky","2020-10-26 03:20:45");



DROP TABLE IF EXISTS tbl_servicios;

CREATE TABLE `tbl_servicios` (
  `id_servicios` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




DROP TABLE IF EXISTS tbl_usuario;

CREATE TABLE `tbl_usuario` (
  `id_usuario` bigint NOT NULL AUTO_INCREMENT,
  `id_rol` bigint DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `nombre_usuario` varchar(70) NOT NULL,
  `estado_usuario` varchar(100) NOT NULL,
  `activacion` int DEFAULT NULL,
  `contrasena` varchar(200) NOT NULL,
  `intentos` varchar(60) DEFAULT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int DEFAULT NULL,
  `ultima_conexion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `correo_electronico` varchar(80) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` varchar(15) DEFAULT NULL,
  `dias_expirado` int DEFAULT NULL,
  `fecha_expira` date DEFAULT NULL,
  `fecha_cambio_contrasena` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

INSERT INTO tbl_usuario VALUES("1","1","ADMINISTRADOR","Marvin","ACTIVO","1","$2y$10$NsLguRmRC8QbRzwEB4vlme5oivIRV.om6YrcQ.3fqswD/LfnR5K9C","0","VVLQLEISBZHLZIKU","1","2017-06-28 13:04:28","2015-07-24 14:40:46","marvingomezhn1@gmail.com","2020-09-25 21:49:29","","0","0000-00-00","2020-10-28 23:05:28");
INSERT INTO tbl_usuario VALUES("7","1","YAS","IRIAS","ACTIVO","1","$2y$10$xExvOi6DUJS2D8uclrP7DOcQsmvK8oqbMM1Ap8Xa8.WeeTalQ5BbG","0","KEDFWKCRBDTYPKFB","1","0000-00-00 00:00:00","2017-05-31 00:00:00","yasiel.portillo.i@gmail.com","2020-09-29 11:50:27","","0","2017-06-30","2020-11-24 20:23:15");
INSERT INTO tbl_usuario VALUES("17","6","JOSS","BARAHONA","ACTIVO","1","$2y$10$GsWC.Cj2xHH0UDNkwIeeM.mSuFTryuNsmBAk4Zx9WAsnhZ/USNUFC","0","VWYBRVWTXDDVDEOP","1","2017-06-10 01:00:23","2017-06-05 00:00:00","dioxanabarahona14@gmail.com","2020-09-29 11:43:20","","0","0000-00-00","2020-11-24 00:09:16");
INSERT INTO tbl_usuario VALUES("27","3","OSCAR","ARIELYN","INACTIVO","0","$2y$10$Byog8aJbDTnRD9x6Lh7uI.2NFrSVOWpJJHEZU2UbXBcfQwgcLqZdu","","OHAKHLMWMQEJNYFR","1","0000-00-00 00:00:00","2017-06-21 16:25:44","oscarunah_1@hotmail.com","2017-10-23 18:12:36","","0","0000-00-00","2020-10-12 23:55:31");
INSERT INTO tbl_usuario VALUES("30","5","MARVINN","MARVIN","ACTIVO","1","$2y$10$B.iaQqIHzWbLOXpHV/d7O.IjqqUBwNsnY48SQQYIvJPtg.YjJGAym","0","FXKYGBOBVMHBENCH","1","0000-00-00 00:00:00","2020-10-12 21:55:51","osunah1910@gmail.com","2020-10-12 21:55:51","","0","0000-00-00","2020-11-23 23:16:15");
INSERT INTO tbl_usuario VALUES("32","5","JUNIOR","JUNIOR","ACTIVO","1","$2y$10$ljjo/qD84NTDHYf0Ght54.yxXTUwzmi/amQ7K9ksCssOYaRGQU07K","0","TIVCXTPUGNSXDVHS","1","0000-00-00 00:00:00","2020-10-26 03:10:58","jrmurilloramos@gmail.com","2020-10-26 03:10:58","","0","0000-00-00","2020-10-26 03:22:32");



DROP TABLE IF EXISTS tbl_vehiculos;

CREATE TABLE `tbl_vehiculos` (
  `id_vehiculo` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `cliente_id` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `usr_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO tbl_vehiculos VALUES("1","Nissan","Frontier","13","blanco","PBX5674","2020-11-04 19:22:50","2020-11-04 19:22:50");
INSERT INTO tbl_vehiculos VALUES("2","Volkswaguen","Amarok","27","Verde","PEE7645","2020-11-04 19:22:50","2020-11-04 19:22:50");
INSERT INTO tbl_vehiculos VALUES("4","Toyota","Corolla","27","Rojo","PBX6784","2020-11-06 15:09:23","2020-11-06 15:09:23");
INSERT INTO tbl_vehiculos VALUES("5","Nissan","Frontier","20","Naranja","PCH7896","2020-11-07 14:36:42","2020-11-07 14:36:42");



DROP TABLE IF EXISTS tmp;

CREATE TABLE `tmp` (
  `id_tmp` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `cantidad_tmp` int NOT NULL,
  `precio_tmp` double(8,2) DEFAULT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `num` int NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tmp VALUES("1","14","1","150.00","","2020-11-07 14:56:22","2");
INSERT INTO tmp VALUES("2","13","1","150.00","","2020-11-07 14:56:27","2");
INSERT INTO tmp VALUES("3","2","4","122.00","","2020-11-07 14:56:37","2");
INSERT INTO tmp VALUES("4","15","1","50.00","","2020-11-07 14:57:20","1");
INSERT INTO tmp VALUES("5","11","1","870.00","","2020-11-07 14:57:33","1");
INSERT INTO tmp VALUES("43","14","1","150.00","","2020-11-14 16:26:19","7");
INSERT INTO tmp VALUES("28","14","1","150.00","","2020-11-07 21:25:10","4");
INSERT INTO tmp VALUES("27","12","1","110.00","","2020-11-07 21:23:48","4");
INSERT INTO tmp VALUES("23","13","1","150.00","","2020-11-07 17:10:29","3");
INSERT INTO tmp VALUES("26","2","1","122.00","","2020-11-07 21:23:17","4");
INSERT INTO tmp VALUES("44","1","1","20.00","upla10uaj0tbn609nor6i2fr5159f8r2","2020-11-25 18:40:28","0");
INSERT INTO tmp VALUES("45","1","1","20.00","upla10uaj0tbn609nor6i2fr5159f8r2","2020-11-25 18:40:52","0");



DROP TABLE IF EXISTS transaccion_productos;

CREATE TABLE `transaccion_productos` (
  `codigo_transaccion` varchar(15) NOT NULL,
  `no` bigint NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `numero` int NOT NULL,
  `created_user` int NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_transaccion` varchar(50) NOT NULL,
  `id_proveedor` bigint NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id_barang` (`codigo`),
  KEY `created_user` (`created_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO transaccion_productos VALUES("TM-2020-0000001","1","2020-11-02","P000367","100","0","2020-11-07 21:08:07","Entrada","6","101");
INSERT INTO transaccion_productos VALUES("TM-2020-0000002","2","2020-11-06","B000363","5","0","2020-11-07 21:08:53","Salida","6","20");
INSERT INTO transaccion_productos VALUES("TM-2020-0000003","3","2020-11-07","B000363","21","0","2020-11-07 21:09:33","Salida","6","-1");



SET FOREIGN_KEY_CHECKS=1;