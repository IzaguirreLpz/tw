SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS bd_tw;

USE bd_tw;

DROP TABLE IF EXISTS detalle_factura;

CREATE TABLE `detalle_factura` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

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
INSERT INTO detalle_factura VALUES("78","5","1","1","20");
INSERT INTO detalle_factura VALUES("79","5","2","1","122");



DROP TABLE IF EXISTS facturas;

CREATE TABLE `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  `id_atencion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `FK_fac` (`id_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO facturas VALUES("1","1","2020-11-07 21:56:48","13","1","2","1186.8","2","2");
INSERT INTO facturas VALUES("2","2","2020-11-07 21:57:37","27","1","2","6230.7","2","1");
INSERT INTO facturas VALUES("4","4","2020-11-08 04:24:30","27","1","1","1784.8","1","4");
INSERT INTO facturas VALUES("5","5","2020-11-26 07:50:08","27","1","2","142","2","9");



DROP TABLE IF EXISTS hist_pass;

CREATE TABLE `hist_pass` (
  `id_usuario` int(11) NOT NULL,
  `pass` varchar(299) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO hist_pass VALUES("30","$2y$10$p96HnbWmovfA//Gjgrg8EOTMFFBnSzmeYBui6RFgsuEKblWgIOp0e","2020-10-12 21:55:53");
INSERT INTO hist_pass VALUES("17","$2y$10$9jM2dGsRXPtdCppVpFjSzebXaKwQna38kHANSTa0MirKg0r0weqDu","2020-10-12 22:52:45");
INSERT INTO hist_pass VALUES("31","$2y$10$VscVduiPdnwFFmqPe31keOe.FfnlgtXO3Ta9mlK2NE0zBVRjS/J3i","2020-10-12 23:15:32");
INSERT INTO hist_pass VALUES("28","$2y$10$/eV9SHvwjcMU43tqQf.WMO2WaKnCkOEXSF7sgDxRRVfJ4ZkPelUg.","2020-10-14 21:08:42");
INSERT INTO hist_pass VALUES("32","$2y$10$YNI7SZM2HmmySUEajduIEOrPdyr39F0zWDEHcfEsawSGDDCCJQ.Ia","2020-10-26 03:10:59");
INSERT INTO hist_pass VALUES("32","$2y$10$/jdLLBeHO7WPFFLu/q4V0u5sw2B8XAZS48cehJqcKceWK2pHGeuxy","2020-10-26 03:24:15");
INSERT INTO hist_pass VALUES("32","$2y$10$ljjo/qD84NTDHYf0Ght54.yxXTUwzmi/amQ7K9ksCssOYaRGQU07K","2020-10-26 03:26:32");
INSERT INTO hist_pass VALUES("1","$2y$10$NsLguRmRC8QbRzwEB4vlme5oivIRV.om6YrcQ.3fqswD/LfnR5K9C","2020-10-28 23:19:21");
INSERT INTO hist_pass VALUES("33","$2y$10$hKBTC.lfxbuFjzooAI3dMOkrz3685WQDrY9RsMR4Ht8JQjlLyknCy","2020-11-25 23:23:39");



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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO menu VALUES("1","<span>Atenciónes</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-cogs","");
INSERT INTO menu VALUES("2","<span>Administracion</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-users","");
INSERT INTO menu VALUES("3","<span>Transacciones</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-university","");
INSERT INTO menu VALUES("4","<span>Seguridad</span></a>","0","javascript:;","class=\'sub-menu\'","<ul class=\'sub\'>","</ul>","1","fa fa-lock ","");
INSERT INTO menu VALUES("5","usuarios</a>","4","usuarios.php","  ","","","1","","Usuarios");
INSERT INTO menu VALUES("6","Permisos </a>","4","permisos.php","  ","","","1","","Permisos Pantalla");
INSERT INTO menu VALUES("7","Roles</a>","4","roles.php","  ","","","1","","Roles");
INSERT INTO menu VALUES("8","Pantallas</a>","4","pantallas.php","  ","","","1","","Pantallas");
INSERT INTO menu VALUES("9","Configuracion</a>","4","parametro.php","  ","","","1","","Configuracion");
INSERT INTO menu VALUES("10","Bitacora</a>","4","bitacoras.php","  ","","","1","","Bitacora");
INSERT INTO menu VALUES("11","Clientes</a>","2","clientes.php","  ","","","1","","clientes");
INSERT INTO menu VALUES("12","Vehiculos </a>","2","vehiculos.php","  ","","","1","","Vehiculos");
INSERT INTO menu VALUES("13","Tickets</a>","1","clientes_pend.php","  ","","","1","","lista de espera");
INSERT INTO menu VALUES("14","Atenciones</a>","1","atencion_meca.php","  ","","","1","","atenciones");
INSERT INTO menu VALUES("15","Lista servicios</a>","1","mantenimiento.php","  ","","","1","","Lista servicios");
INSERT INTO menu VALUES("16","Proveedores</a>","2","proveedores.php","  ","","","1","","proveedores");
INSERT INTO menu VALUES("17","Productos </a>","2","productos.php","  ","","","1","","Productos");
INSERT INTO menu VALUES("18","Factura pendiente </a>","3","factura_pendiente.php","  ","","","1","","factura_pendiente");
INSERT INTO menu VALUES("19","Facturas </a>","3","facturas.php","  ","","","1","","Facturas");
INSERT INTO menu VALUES("20","Mov Inventario </a>","3","mov_inventario.php.php","  ","","","1","","mov_inventario");



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
  PRIMARY KEY (`per_id_permiso`),
  KEY `FK_perrol` (`per_id_rol`),
  KEY `FK_permenu` (`per_id_pantalla`),
  CONSTRAINT `FK_permenu` FOREIGN KEY (`per_id_pantalla`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_perrol` FOREIGN KEY (`per_id_rol`) REFERENCES `roles` (`rol_id_rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO permisos VALUES("1","3","12","0","0","0","0","2020-11-15 20:41:40","2020-11-15 20:41:40","1");
INSERT INTO permisos VALUES("2","3","14","0","0","0","1","2020-11-15 20:42:14","2020-11-15 20:42:14","1");
INSERT INTO permisos VALUES("3","3","19","0","0","1","1","2020-11-15 20:43:15","2020-11-15 20:43:15","1");
INSERT INTO permisos VALUES("4","3","13","0","1","0","0","2020-11-15 20:43:34","2020-11-15 20:43:34","1");



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
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_producto` (`codigo_producto`),
  KEY `FK_proprud` (`proveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

INSERT INTO products VALUES("1","B000360","Aceite Mineral","1","2017-09-20 20:59:16","20.00","0.00","13","0","bote","N/A","N/A");
INSERT INTO products VALUES("2","B000363","Aceite Comun","1","2017-09-21 16:33:11","122.00","0.00","6","0","bote","N/A","N/A");
INSERT INTO products VALUES("13","S000368","Lavado Completo Turismo","1","2020-11-06 22:37:38","150.00","90.00","11","1","N/A","Limpieza","N/A");
INSERT INTO products VALUES("12","S000367","Lavado Turismo","1","2020-11-06 22:35:49","110.00","80.00","8","1","N/A","N/A","N/A");
INSERT INTO products VALUES("14","S000369","Cambio De Aceite","1","2020-11-06 22:50:13","150.00","100.00","11","1","N/A","Mantenimiento","N/A");
INSERT INTO products VALUES("11","P000367","Llantas Bridgestone","1","2020-11-06 21:56:49","870.00","720.00","8","0","Bolsa","Mantenimiento","Inversiones Multiples");
INSERT INTO products VALUES("15","S000370","Lavado Motor Turismo","1","2020-11-06 23:20:40","50.00","20.00","10","1","N/A","Limpieza","N/A");



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `rol_id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(50) NOT NULL,
  `rol_descripcion` varchar(100) NOT NULL,
  `rol_fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
  `rol_fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`rol_id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO roles VALUES("1","ADMINISTRADOR","organiza","2018-08-27 15:56:59","2018-08-27 15:56:59");
INSERT INTO roles VALUES("2","DEPENDIENTE","teresita","2018-08-27 15:57:25","2018-08-27 15:57:25");
INSERT INTO roles VALUES("3","MECANICO","persona encargada","2018-10-09 14:11:52","2018-10-09 14:11:52");
INSERT INTO roles VALUES("5","NUEVO","visitasa","2018-10-16 09:20:05","2018-10-16 09:20:05");



DROP TABLE IF EXISTS tbl_atenciones;

CREATE TABLE `tbl_atenciones` (
  `id_atencion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `fecha_visita` datetime NOT NULL DEFAULT current_timestamp(),
  `observacion` varchar(300) DEFAULT NULL,
  `id_auto` int(11) DEFAULT NULL,
  `id_meca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_atencion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tbl_atenciones VALUES("1","27","1","4","2020-11-07 14:54:50","  Lavado motor y compra de llanta","2","");
INSERT INTO tbl_atenciones VALUES("2","13","1","4","2020-11-07 14:54:54","Cambio de aceite y lavado","1","");
INSERT INTO tbl_atenciones VALUES("3","20","1","4","2020-11-07 17:10:14","  lavado","5","");
INSERT INTO tbl_atenciones VALUES("4","27","1","4","2020-11-07 21:20:44","   lavado completo que costo 300 , cambio de aceite ","4","");
INSERT INTO tbl_atenciones VALUES("5","13","1","1","2020-11-12 21:29:40","","0","");
INSERT INTO tbl_atenciones VALUES("6","20","1","4","2020-11-12 21:29:43","    ","5","");
INSERT INTO tbl_atenciones VALUES("7","13","1","1","2020-11-14 16:23:03","","0","");
INSERT INTO tbl_atenciones VALUES("8","20","1","1","2020-11-24 19:27:48","","","");
INSERT INTO tbl_atenciones VALUES("9","27","1","4","2020-11-24 19:28:54","  test","4","27");
INSERT INTO tbl_atenciones VALUES("10","26","1","1","2020-11-26 00:54:59","","","");
INSERT INTO tbl_atenciones VALUES("11","27","1","4","2020-11-26 00:56:54","  aa","2","27");
INSERT INTO tbl_atenciones VALUES("12","27","1","2","2020-11-26 00:57:20","  aaaa","2","27");



DROP TABLE IF EXISTS tbl_bitacoras;

CREATE TABLE `tbl_bitacoras` (
  `id_bitacora` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) DEFAULT NULL,
  `objeto` varchar(100) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=856 DEFAULT CHARSET=latin1;

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
INSERT INTO tbl_bitacoras VALUES("680","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:31:14");
INSERT INTO tbl_bitacoras VALUES("681","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:34:02");
INSERT INTO tbl_bitacoras VALUES("682","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:34:05");
INSERT INTO tbl_bitacoras VALUES("683","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:34:10");
INSERT INTO tbl_bitacoras VALUES("684","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:34:48");
INSERT INTO tbl_bitacoras VALUES("685","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:34:55");
INSERT INTO tbl_bitacoras VALUES("686","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-15 20:35:04");
INSERT INTO tbl_bitacoras VALUES("687","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-15 20:35:42");
INSERT INTO tbl_bitacoras VALUES("688","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-15 20:35:53");
INSERT INTO tbl_bitacoras VALUES("689","1","pantallas","INGRESO","ingreso a pantalla de pantallas","2020-11-15 20:36:51");
INSERT INTO tbl_bitacoras VALUES("690","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-15 20:40:39");
INSERT INTO tbl_bitacoras VALUES("691","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:40:54");
INSERT INTO tbl_bitacoras VALUES("692","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:41:40");
INSERT INTO tbl_bitacoras VALUES("693","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:42:14");
INSERT INTO tbl_bitacoras VALUES("694","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:43:00");
INSERT INTO tbl_bitacoras VALUES("695","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:43:15");
INSERT INTO tbl_bitacoras VALUES("696","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:43:34");
INSERT INTO tbl_bitacoras VALUES("697","0","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:43:54");
INSERT INTO tbl_bitacoras VALUES("698","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:45:19");
INSERT INTO tbl_bitacoras VALUES("699","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:46:29");
INSERT INTO tbl_bitacoras VALUES("700","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:46:30");
INSERT INTO tbl_bitacoras VALUES("701","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:47:03");
INSERT INTO tbl_bitacoras VALUES("702","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:47:04");
INSERT INTO tbl_bitacoras VALUES("703","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:47:05");
INSERT INTO tbl_bitacoras VALUES("704","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:47:06");
INSERT INTO tbl_bitacoras VALUES("705","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:47:06");
INSERT INTO tbl_bitacoras VALUES("706","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:48:26");
INSERT INTO tbl_bitacoras VALUES("707","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 20:48:40");
INSERT INTO tbl_bitacoras VALUES("708","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 20:51:17");
INSERT INTO tbl_bitacoras VALUES("709","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 20:51:51");
INSERT INTO tbl_bitacoras VALUES("710","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 20:52:26");
INSERT INTO tbl_bitacoras VALUES("711","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 20:52:40");
INSERT INTO tbl_bitacoras VALUES("712","7","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 20:54:08");
INSERT INTO tbl_bitacoras VALUES("713","7","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 20:55:05");
INSERT INTO tbl_bitacoras VALUES("714","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 21:21:08");
INSERT INTO tbl_bitacoras VALUES("715","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 21:22:21");
INSERT INTO tbl_bitacoras VALUES("716","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 21:22:25");
INSERT INTO tbl_bitacoras VALUES("717","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-15 21:28:17");
INSERT INTO tbl_bitacoras VALUES("718","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-15 21:28:24");
INSERT INTO tbl_bitacoras VALUES("719","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 21:28:34");
INSERT INTO tbl_bitacoras VALUES("720","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-15 21:56:31");
INSERT INTO tbl_bitacoras VALUES("721","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 19:27:37");
INSERT INTO tbl_bitacoras VALUES("722","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-24 19:27:43");
INSERT INTO tbl_bitacoras VALUES("723","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 19:27:52");
INSERT INTO tbl_bitacoras VALUES("724","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-24 19:28:48");
INSERT INTO tbl_bitacoras VALUES("725","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-24 19:28:57");
INSERT INTO tbl_bitacoras VALUES("726","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 20:24:38");
INSERT INTO tbl_bitacoras VALUES("727","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-25 20:24:47");
INSERT INTO tbl_bitacoras VALUES("728","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 20:37:53");
INSERT INTO tbl_bitacoras VALUES("729","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 20:42:32");
INSERT INTO tbl_bitacoras VALUES("730","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 20:42:53");
INSERT INTO tbl_bitacoras VALUES("731","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 20:46:00");
INSERT INTO tbl_bitacoras VALUES("732","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-25 20:46:12");
INSERT INTO tbl_bitacoras VALUES("733","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-25 20:47:09");
INSERT INTO tbl_bitacoras VALUES("734","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-25 20:48:01");
INSERT INTO tbl_bitacoras VALUES("735","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-25 20:49:41");
INSERT INTO tbl_bitacoras VALUES("736","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 21:00:35");
INSERT INTO tbl_bitacoras VALUES("737","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-25 21:35:31");
INSERT INTO tbl_bitacoras VALUES("738","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 21:35:38");
INSERT INTO tbl_bitacoras VALUES("739","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 21:36:15");
INSERT INTO tbl_bitacoras VALUES("740","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 21:36:20");
INSERT INTO tbl_bitacoras VALUES("741","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 21:36:23");
INSERT INTO tbl_bitacoras VALUES("742","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 21:36:27");
INSERT INTO tbl_bitacoras VALUES("743","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-25 21:36:41");
INSERT INTO tbl_bitacoras VALUES("744","1","pantalla usuario","INGRESO","ingreso a pantalla Mov Inventario.","2020-11-25 21:36:58");
INSERT INTO tbl_bitacoras VALUES("745","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 21:37:18");
INSERT INTO tbl_bitacoras VALUES("746","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 21:37:22");
INSERT INTO tbl_bitacoras VALUES("747","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 21:37:33");
INSERT INTO tbl_bitacoras VALUES("748","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 21:38:06");
INSERT INTO tbl_bitacoras VALUES("749","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 21:41:07");
INSERT INTO tbl_bitacoras VALUES("750","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 21:54:44");
INSERT INTO tbl_bitacoras VALUES("751","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 21:54:47");
INSERT INTO tbl_bitacoras VALUES("752","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 21:56:15");
INSERT INTO tbl_bitacoras VALUES("753","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:30:56");
INSERT INTO tbl_bitacoras VALUES("754","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:35:50");
INSERT INTO tbl_bitacoras VALUES("755","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:38:45");
INSERT INTO tbl_bitacoras VALUES("756","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:39:41");
INSERT INTO tbl_bitacoras VALUES("757","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:41:44");
INSERT INTO tbl_bitacoras VALUES("758","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 22:44:49");
INSERT INTO tbl_bitacoras VALUES("759","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 22:44:55");
INSERT INTO tbl_bitacoras VALUES("760","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 22:46:01");
INSERT INTO tbl_bitacoras VALUES("761","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 22:48:52");
INSERT INTO tbl_bitacoras VALUES("762","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-25 23:04:08");
INSERT INTO tbl_bitacoras VALUES("763","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-25 23:10:34");
INSERT INTO tbl_bitacoras VALUES("764","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 23:10:36");
INSERT INTO tbl_bitacoras VALUES("765","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 23:12:30");
INSERT INTO tbl_bitacoras VALUES("766","1","Usuarios","INSERT","insert into tbl_usuario (nombre_usuario,usuario,contrasena,correo_electronico,estado_usuario,id_rol,activacion,fecha_cambio_contrasena) values(\'GENERAL\', \'GEN\',\'$2y$10$hKBTC.lfxbuFjzooAI3dMOkrz3685WQD","2020-11-25 23:23:39");
INSERT INTO tbl_bitacoras VALUES("767","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-25 23:23:41");
INSERT INTO tbl_bitacoras VALUES("768","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-25 23:26:17");
INSERT INTO tbl_bitacoras VALUES("769","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 23:26:21");
INSERT INTO tbl_bitacoras VALUES("770","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-25 23:37:31");
INSERT INTO tbl_bitacoras VALUES("771","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:49:25");
INSERT INTO tbl_bitacoras VALUES("772","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:52:30");
INSERT INTO tbl_bitacoras VALUES("773","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:52:50");
INSERT INTO tbl_bitacoras VALUES("774","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 00:54:54");
INSERT INTO tbl_bitacoras VALUES("775","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:55:03");
INSERT INTO tbl_bitacoras VALUES("776","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:56:42");
INSERT INTO tbl_bitacoras VALUES("777","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:56:47");
INSERT INTO tbl_bitacoras VALUES("778","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 00:56:50");
INSERT INTO tbl_bitacoras VALUES("779","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:56:57");
INSERT INTO tbl_bitacoras VALUES("780","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 00:57:15");
INSERT INTO tbl_bitacoras VALUES("781","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:57:23");
INSERT INTO tbl_bitacoras VALUES("782","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:57:42");
INSERT INTO tbl_bitacoras VALUES("783","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 00:57:51");
INSERT INTO tbl_bitacoras VALUES("784","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:02:10");
INSERT INTO tbl_bitacoras VALUES("785","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:03:02");
INSERT INTO tbl_bitacoras VALUES("786","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:04:22");
INSERT INTO tbl_bitacoras VALUES("787","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:05:07");
INSERT INTO tbl_bitacoras VALUES("788","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:05:33");
INSERT INTO tbl_bitacoras VALUES("789","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:06:56");
INSERT INTO tbl_bitacoras VALUES("790","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:06:57");
INSERT INTO tbl_bitacoras VALUES("791","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:06:58");
INSERT INTO tbl_bitacoras VALUES("792","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:06:59");
INSERT INTO tbl_bitacoras VALUES("793","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:07:33");
INSERT INTO tbl_bitacoras VALUES("794","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:07:34");
INSERT INTO tbl_bitacoras VALUES("795","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:07:34");
INSERT INTO tbl_bitacoras VALUES("796","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:07:34");
INSERT INTO tbl_bitacoras VALUES("797","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:07:35");
INSERT INTO tbl_bitacoras VALUES("798","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:08:22");
INSERT INTO tbl_bitacoras VALUES("799","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:09:12");
INSERT INTO tbl_bitacoras VALUES("800","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:10:16");
INSERT INTO tbl_bitacoras VALUES("801","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:10:39");
INSERT INTO tbl_bitacoras VALUES("802","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:11:44");
INSERT INTO tbl_bitacoras VALUES("803","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:06");
INSERT INTO tbl_bitacoras VALUES("804","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:07");
INSERT INTO tbl_bitacoras VALUES("805","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:07");
INSERT INTO tbl_bitacoras VALUES("806","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:08");
INSERT INTO tbl_bitacoras VALUES("807","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:08");
INSERT INTO tbl_bitacoras VALUES("808","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:08");
INSERT INTO tbl_bitacoras VALUES("809","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:12");
INSERT INTO tbl_bitacoras VALUES("810","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 01:12:15");
INSERT INTO tbl_bitacoras VALUES("811","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:17");
INSERT INTO tbl_bitacoras VALUES("812","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:47");
INSERT INTO tbl_bitacoras VALUES("813","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:12:48");
INSERT INTO tbl_bitacoras VALUES("814","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:15:02");
INSERT INTO tbl_bitacoras VALUES("815","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:15:23");
INSERT INTO tbl_bitacoras VALUES("816","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:16:14");
INSERT INTO tbl_bitacoras VALUES("817","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:16:15");
INSERT INTO tbl_bitacoras VALUES("818","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:16:16");
INSERT INTO tbl_bitacoras VALUES("819","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:17:14");
INSERT INTO tbl_bitacoras VALUES("820","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:19:10");
INSERT INTO tbl_bitacoras VALUES("821","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:49:52");
INSERT INTO tbl_bitacoras VALUES("822","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:50:14");
INSERT INTO tbl_bitacoras VALUES("823","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:51:50");
INSERT INTO tbl_bitacoras VALUES("824","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:55:32");
INSERT INTO tbl_bitacoras VALUES("825","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:55:33");
INSERT INTO tbl_bitacoras VALUES("826","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:55:34");
INSERT INTO tbl_bitacoras VALUES("827","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 01:56:55");
INSERT INTO tbl_bitacoras VALUES("828","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:00:46");
INSERT INTO tbl_bitacoras VALUES("829","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:00:48");
INSERT INTO tbl_bitacoras VALUES("830","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:01:10");
INSERT INTO tbl_bitacoras VALUES("831","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:02:50");
INSERT INTO tbl_bitacoras VALUES("832","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:03:47");
INSERT INTO tbl_bitacoras VALUES("833","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:04:35");
INSERT INTO tbl_bitacoras VALUES("834","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:06:28");
INSERT INTO tbl_bitacoras VALUES("835","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:09:37");
INSERT INTO tbl_bitacoras VALUES("836","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:10:56");
INSERT INTO tbl_bitacoras VALUES("837","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:11:27");
INSERT INTO tbl_bitacoras VALUES("838","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:12:10");
INSERT INTO tbl_bitacoras VALUES("839","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:12:32");
INSERT INTO tbl_bitacoras VALUES("840","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:13:13");
INSERT INTO tbl_bitacoras VALUES("841","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:14:15");
INSERT INTO tbl_bitacoras VALUES("842","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:16:10");
INSERT INTO tbl_bitacoras VALUES("843","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:21:31");
INSERT INTO tbl_bitacoras VALUES("844","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:22:41");
INSERT INTO tbl_bitacoras VALUES("845","1","pantalla bitacora","INGRESO","ingreso a pantalla bitacora","2020-11-26 02:24:14");
INSERT INTO tbl_bitacoras VALUES("846","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 02:24:18");
INSERT INTO tbl_bitacoras VALUES("847","1","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 02:31:23");
INSERT INTO tbl_bitacoras VALUES("848","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 02:33:38");
INSERT INTO tbl_bitacoras VALUES("849","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 21:16:01");
INSERT INTO tbl_bitacoras VALUES("850","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-26 21:22:31");
INSERT INTO tbl_bitacoras VALUES("851","7","pantalla usuario","INGRESO","ingreso a pantalla lista pendiente","2020-11-26 21:22:50");
INSERT INTO tbl_bitacoras VALUES("852","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-29 21:04:42");
INSERT INTO tbl_bitacoras VALUES("853","1","pantalla usuario","INGRESO","ingreso a pantalla usuario","2020-11-29 21:08:22");
INSERT INTO tbl_bitacoras VALUES("854","1","tbl_productos","DELETE","DELETE  FROM products WHERE id_producto=\'16\'","2020-11-29 21:08:31");
INSERT INTO tbl_bitacoras VALUES("855","1","pantalla usuario","INGRESO","ingreso a pantalla roles","2020-11-29 21:16:41");



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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

INSERT INTO tbl_clientes VALUES("20","0718","carlos francisco","fernandez","M","33567896","22336578","Los lauereles","cfran@superrito.com","2020-11-03 22:19:40","2020-11-03 22:19:40");
INSERT INTO tbl_clientes VALUES("26","081236547","Josue Alejandro","Izaguirre","M","98574123","22456987","San Ignacio FM","josuale@superrito.com","2020-11-05 02:12:17","2020-11-05 02:12:17");
INSERT INTO tbl_clientes VALUES("27","0854697862","Marvin","Mexi","M","98765432","32654987","El Hato","marvin@superrito.com","2020-11-06 15:08:37","2020-11-06 15:08:37");
INSERT INTO tbl_clientes VALUES("28","9999999999999","Cliente","Final","M","99999999","22222222","local","tecniwash504@gmail.com","2020-11-07 21:31:49","2020-11-07 21:31:49");



DROP TABLE IF EXISTS tbl_parametros;

CREATE TABLE `tbl_parametros` (
  `id_parametro` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
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
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(70) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `creado_por` varchar(15) NOT NULL,
  `fecha_modificacion` datetime NOT NULL DEFAULT current_timestamp(),
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
  `id_productos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `proveedor` varchar(45) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT 0.00,
  `precio_costo` decimal(10,2) DEFAULT 0.00,
  `categoria` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `cant` int(11) DEFAULT 0,
  PRIMARY KEY (`id_productos`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO tbl_proveedores VALUES("5","Texaco","33125487","98562354","Residencial Santa Cruz","08179636548","","Francisco Reyes","fran@superrito.com","2020-10-28 20:01:34","2020-10-28 20:01:34");
INSERT INTO tbl_proveedores VALUES("6","Chevron","98684525","87963645","El Hato","08197564523","","Jose Andrade","jos@superrito.com","2020-11-03 05:33:07","2020-11-03 05:33:07");



DROP TABLE IF EXISTS tbl_respuestas;

CREATE TABLE `tbl_respuestas` (
  `id_usuario` bigint(20) NOT NULL,
  `id_pregunta` bigint(20) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tbl_servicios;

CREATE TABLE `tbl_servicios` (
  `id_servicios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_servicios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS tbl_usuario;

CREATE TABLE `tbl_usuario` (
  `id_usuario` bigint(20) NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `meca` int(1) DEFAULT NULL,
  `nombre_usuario` varchar(70) NOT NULL,
  `estado_usuario` varchar(100) NOT NULL,
  `activacion` int(11) DEFAULT NULL,
  `contrasena` varchar(200) NOT NULL,
  `intentos` varchar(60) DEFAULT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT NULL,
  `ultima_conexion` datetime DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `correo_electronico` varchar(80) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT current_timestamp(),
  `modificado_por` varchar(15) DEFAULT NULL,
  `dias_expirado` int(11) DEFAULT NULL,
  `fecha_expira` date DEFAULT NULL,
  `fecha_cambio_contrasena` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`rol_id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO tbl_usuario VALUES("1","1","ADMINISTRADOR","","Marvin","ACTIVO","1","$2y$10$NsLguRmRC8QbRzwEB4vlme5oivIRV.om6YrcQ.3fqswD/LfnR5K9C","0","VVLQLEISBZHLZIKU","1","2017-06-28 13:04:28","2015-07-24 14:40:46","marvingomezhn1@gmail.com","2020-09-25 21:49:29","","0","0000-00-00","2020-10-28 23:05:28");
INSERT INTO tbl_usuario VALUES("7","3","YAS","","irias","ACTIVO","1","$2y$10$NsLguRmRC8QbRzwEB4vlme5oivIRV.om6YrcQ.3fqswD/LfnR5K9C","0","0f28cde5211b2d9c4fcfbcaf76c9e3b4","1","0000-00-00 00:00:00","2017-05-31 00:00:00","ruiz1988@gmail.com","2020-09-29 11:50:27","","0","2017-06-30","0000-00-00 00:00:00");
INSERT INTO tbl_usuario VALUES("17","2","JOSS","","BARAHONA","ACTIVO","1","$2y$10$NsLguRmRC8QbRzwEB4vlme5oivIRV.om6YrcQ.3fqswD/LfnR5K9C","0","WMFAGHTXKORCFZBJ","1","2017-06-10 01:00:23","2017-06-05 00:00:00","oscarunah_1@hotmail.com","2020-09-29 11:43:20","","0","0000-00-00","2020-10-26 02:58:55");
INSERT INTO tbl_usuario VALUES("27","3","OSCAR","","ARIELYN","INACTIVO","0","$2y$10$Byog8aJbDTnRD9x6Lh7uI.2NFrSVOWpJJHEZU2UbXBcfQwgcLqZdu","","OHAKHLMWMQEJNYFR","1","0000-00-00 00:00:00","2017-06-21 16:25:44","kirby1823@gmail.com","2017-10-23 18:12:36","","0","0000-00-00","2020-10-12 23:55:31");
INSERT INTO tbl_usuario VALUES("30","5","MARVINN","","MARVIN DOS","NUEVO","1","$2y$10$p96HnbWmovfA//Gjgrg8EOTMFFBnSzmeYBui6RFgsuEKblWgIOp0e","","","0","0000-00-00 00:00:00","2020-10-12 21:55:51","osunah1910@gmail.com","2020-10-12 21:55:51","","0","0000-00-00","2020-10-12 00:00:00");
INSERT INTO tbl_usuario VALUES("32","5","JUNIOR","","JUNIOR","ACTIVO","1","$2y$10$ljjo/qD84NTDHYf0Ght54.yxXTUwzmi/amQ7K9ksCssOYaRGQU07K","0","TIVCXTPUGNSXDVHS","1","0000-00-00 00:00:00","2020-10-26 03:10:58","jrmurilloramos@gmail.com","2020-10-26 03:10:58","","0","0000-00-00","2020-10-26 03:22:32");
INSERT INTO tbl_usuario VALUES("33","2","GEN","","GENERAL","NUEVO","1","$2y$10$hKBTC.lfxbuFjzooAI3dMOkrz3685WQDrY9RsMR4Ht8JQjlLyknCy","","","","","2020-11-25 23:23:37","ansluisa@hotmail.com","2020-11-25 23:23:37","","","","2020-11-25 23:23:37");



DROP TABLE IF EXISTS tbl_vehiculos;

CREATE TABLE `tbl_vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `cliente_id` bigint(20) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `usr_registro` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_vehiculo`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `tbl_vehiculos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `tbl_clientes` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO tmp VALUES("44","2","1","122.00","","2020-11-24 19:28:38","8");
INSERT INTO tmp VALUES("45","1","1","20.00","","2020-11-24 19:29:38","9");
INSERT INTO tmp VALUES("46","2","1","122.00","","2020-11-26 00:49:56","9");



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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO transaccion_productos VALUES("TM-2020-0000001","1","2020-11-02","P000367","100","0","2020-11-07 15:08:07","Entrada","6","101");
INSERT INTO transaccion_productos VALUES("TM-2020-0000002","2","2020-11-06","B000363","5","0","2020-11-07 15:08:53","Salida","6","20");
INSERT INTO transaccion_productos VALUES("TM-2020-0000003","3","2020-11-07","B000363","21","0","2020-11-07 15:09:33","Salida","6","-1");



SET FOREIGN_KEY_CHECKS=1;