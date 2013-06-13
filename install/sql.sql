-- ------------------------------------------------------------
-- ------------------------------------------------------------
-- Estrutura de Instalação do CMS MINISTRAR
-- Versão do sistema:
-- 2.0.0
-- ------------------------------------------------------------
-- ------------------------------------------------------------

-- Estrutura da tabela `sysAdminGroups`
--

CREATE TABLE IF NOT EXISTS `sysAdminGroups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Grupo de Segurança do Administrator' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `sysAdminGroups`
--

INSERT INTO `sysAdminGroups` (`ID`, `Name`, `LastUpdate`, `LastUserName`) VALUES
(1, 'Administradores', '2011-10-06 15:28:51', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(2, 'Redatores', '2011-10-06 21:29:37', 'Tiago Gonçalves (tiago@novabrazil.art.br)');

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysAdminUsers`
--

CREATE TABLE IF NOT EXISTS `sysAdminUsers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `Mail` varchar(30) DEFAULT NULL,
  `Password` char(32) DEFAULT NULL,
  `Group` int(11) DEFAULT NULL,
  `LastAccess` datetime DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(100) DEFAULT NULL,
  `Developer` char(1) DEFAULT NULL,
  `Actived` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_sysadminusers_group` (`Group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Usuários do Administrator' AUTO_INCREMENT=2 ;

INSERT INTO `sysAdminUsers` (`ID`, `Name`, `Mail`, `Password`, `Group`, `LastAccess`, `LastUpdate`, `LastUserName`, `Developer`, `Actived`) VALUES
(1, 'Admin', 'teste@teste.com.br', '698dc19d489c4e4db73e28a713eab07b', 1, '2013-06-13 10:19:05', '2012-12-13 08:17:03', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 'Y', 'Y');

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysAdminUsersGroups`
--

CREATE TABLE IF NOT EXISTS `sysAdminUsersGroups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  `User` int(11) DEFAULT NULL,
  `Group` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_sysadminusersgroups_user` (`User`),
  KEY `fk_sysadminusersgroups_group` (`Group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela de Ligação de sysAdminUsers e sysAdminGroups' AUTO_INCREMENT=7 ;

INSERT INTO `sysAdminUsersGroups` (`ID`, `LastUpdate`, `LastUserName`, `User`, `Group`) VALUES
(5, '2012-12-13 08:17:03', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 1, 1),
(6, '2012-12-13 08:17:03', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 1, 2);

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysLogs`
--

CREATE TABLE IF NOT EXISTS `sysLogs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `UserMail` varchar(50) DEFAULT NULL,
  `Action` char(3) DEFAULT NULL,
  `DateTime` datetime DEFAULT NULL,
  `Description` text,
  `IP` varchar(15) DEFAULT NULL,
  `Browser` char(3) DEFAULT NULL,
  `OS` char(3) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Histórico de Ações no CMS' AUTO_INCREMENT=1;

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysModuleFolders`
--

CREATE TABLE IF NOT EXISTS `sysModuleFolders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Module` int(11) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Order` int(11) DEFAULT NULL,
  `File` varchar(50) DEFAULT NULL,
  `Grouper` varchar(50) DEFAULT NULL,
  `Actived` char(1) DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_sysmodulefolders_module` (`Module`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Gerencia Pastas de determinado Módulo do Sistema' AUTO_INCREMENT=6;

INSERT INTO `sysModuleFolders` (`ID`, `Module`, `Name`, `Order`, `File`, `Grouper`, `Actived`, `LastUpdate`, `LastUserName`) VALUES
(1, 1, 'Tabelas', 10, 'admin.tables.grid.php', 'Banco de Dados', 'Y', '2010-11-05 14:33:43', 'Tiago Gonçalves(tiago@novabrazil.art.br)'),
(2, 1, 'Módulos', 20, 'admin.modules.grid.php', 'Organização', 'Y', '2010-11-05 14:33:43', 'Tiago Gonçalves(tiago@novabrazil.art.br)'),
(3, 1, 'Usuários', 30, 'admin.security.users.grid.php', 'Segurança', 'Y', '2010-11-05 14:33:43', 'Tiago Gonçalves(tiago@novabrazil.art.br)'),
(4, 1, 'Grupos', 40, 'admin.security.groups.grid.php', 'Segurança', 'Y', '2010-11-05 14:33:43', 'Tiago Gonçalves(tiago@novabrazil.art.br)'),
(5, 1, 'Ações de Usuários', 50, 'admin.security.logs.grid.php', 'Segurança', 'Y', '2010-11-05 14:33:43', 'Tiago Gonçalves(tiago@novabrazil.art.br)');

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysModuleReports`
--

CREATE TABLE IF NOT EXISTS `sysModuleReports` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  `File` varchar(50) DEFAULT NULL,
  `Module` int(11) DEFAULT NULL,
  `Published` char(1) DEFAULT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Type` char(3) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_sysmodulereports_module` (`Module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relatórios dos Módulos' AUTO_INCREMENT=1 ;

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysModules`
--

CREATE TABLE IF NOT EXISTS `sysModules` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) DEFAULT NULL,
  `Path` varchar(30) DEFAULT NULL,
  `Actived` char(1) DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Developer` char(1) DEFAULT NULL,
  `Icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Gerencia Módulos do Sistema' AUTO_INCREMENT=1 ;

INSERT INTO `sysModules` (`ID`, `Name`, `Path`, `Actived`, `LastUpdate`, `LastUserName`, `Description`, `Developer`, `Icon`) VALUES
(1, 'Aplicação', 'aplicacoes', 'Y', '2013-06-11 10:15:15', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 'Módulo responsável pela configuração do Sistema', 'Y', 'nbrazil.png');

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysModuleSecurityGroups`
--

CREATE TABLE IF NOT EXISTS `sysModuleSecurityGroups` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  `Module` int(11) DEFAULT NULL,
  `Group` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_sysmodulesecuritygroups_module` (`Module`),
  KEY `fk_sysmodulesecuritygroups_group` (`Group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Grupos de Segurança do Módulo' AUTO_INCREMENT=2 ;


INSERT INTO `sysModuleSecurityGroups` (`ID`, `LastUpdate`, `LastUserName`, `Module`, `Group`) VALUES
(10, '2013-06-11 10:15:14', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 1, 1);

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysTableConstrains`
--

CREATE TABLE IF NOT EXISTS `sysTableConstrains` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `FromTable` int(11) NOT NULL,
  `FromField` int(11) NOT NULL,
  `ToTable` int(11) NOT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_systablecontrains_fromtable` (`FromTable`),
  KEY `fk_systablecontrains_fromfield` (`FromField`),
  KEY `fk_systablecontrains_totable` (`ToTable`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Grupos de Segurança do Módulo' AUTO_INCREMENT=11 ;

INSERT INTO `sysTableConstrains` (`ID`, `Name`, `FromTable`, `FromField`, `ToTable`, `LastUpdate`, `LastUserName`) VALUES
(1, 'fk_systablefields_tablelink', 2, 16, 1, NULL, NULL),
(2, 'fk_systablecontrains_fromtable', 3, 17, 1, NULL, NULL),
(3, 'fk_systablecontrains_fromfield', 3, 18, 2, NULL, NULL),
(4, 'fk_systablecontrains_totable', 3, 19, 1, NULL, NULL),
(5, 'fk_sysmodulefolders_module', 9, 58, 8, NULL, NULL),
(6, 'fk_sysadminusersgroups_user', 34, 337, 24, NULL, NULL),
(7, 'fk_sysadminusersgroups_group', 34, 338, 6, NULL, NULL),
(8, 'fk_sysmodulesecuritygroups_module', 36, 339, 8, NULL, NULL),
(9, 'fk_sysmodulesecuritygroups_group', 36, 340, 6, NULL, NULL),
(10, 'fk_sysmodulereports_module', 41, 396, 8, NULL, NULL);

-- ------------------------------------------------------------

--
-- Estrutura da tabela `sysTableFields`
--

CREATE TABLE IF NOT EXISTS `sysTableFields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Table` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` char(3) NOT NULL,
  `Length` int(11) DEFAULT NULL,
  `TableLink` int(11) DEFAULT NULL,
  `ListValues` varchar(500) DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  `Order` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Table` (`Table`),
  KEY `fk_systablefields_tablelink` (`TableLink`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela que gerencia Campos de determinada tabela' AUTO_INCREMENT=612;

INSERT INTO `sysTableFields` (`ID`, `Table`, `Name`, `Type`, `Length`, `TableLink`, `ListValues`, `LastUpdate`, `LastUserName`, `Order`) VALUES
(11, 1, 'Name', 'STR', 50, NULL, NULL, NULL, NULL, 9999),
(12, 1, 'IsSystem', 'BOL', 1, NULL, NULL, NULL, NULL, 9999),
(13, 2, 'Name', 'STR', 50, NULL, NULL, NULL, NULL, 9999),
(14, 2, 'Type', 'LST', 3, NULL, 'STR=String|INT=Inteiro|NUM=Numero Decimal|BOL=Lógico|TAB=Tabela|LST=Lista|DTA=Data|DTT=Data e Hora|TXT=Texto|IMG=Imagem|FIL=Arquivo', '2010-09-21 10:55:28', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(15, 2, 'Length', 'INT', 11, NULL, NULL, NULL, NULL, 9999),
(16, 2, 'TableLink', 'TAB', 11, 1, NULL, NULL, NULL, 9999),
(17, 3, 'FromTable', 'TAB', 11, 1, NULL, NULL, NULL, 9999),
(18, 3, 'FromField', 'TAB', 11, 2, NULL, NULL, NULL, 9999),
(19, 3, 'ToTable', 'TAB', 11, 1, NULL, NULL, NULL, 9999),
(37, 3, 'Name', 'STR', 50, NULL, NULL, NULL, NULL, 9999),
(48, 6, 'Name', 'STR', 100, NULL, NULL, NULL, NULL, 9999),
(55, 8, 'Name', 'STR', 30, NULL, NULL, '2010-07-26 16:13:28', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(56, 8, 'Path', 'STR', 30, NULL, NULL, NULL, NULL, 9999),
(57, 8, 'Actived', 'BOL', 1, NULL, NULL, NULL, NULL, 9999),
(58, 9, 'Module', 'TAB', 11, 8, NULL, NULL, NULL, 9999),
(59, 9, 'Name', 'STR', 100, NULL, NULL, NULL, NULL, 9999),
(60, 9, 'Order', 'INT', 0, NULL, NULL, NULL, NULL, 9999),
(61, 9, 'Actived', 'BOL', 1, NULL, NULL, NULL, NULL, 9999),
(62, 9, 'File', 'STR', 50, NULL, NULL, NULL, NULL, 9999),
(63, 9, 'Grouper', 'STR', 50, NULL, NULL, NULL, NULL, 9999),
(64, 1, 'Comment', 'STR', 60, NULL, NULL, '2010-07-26 15:17:36', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(65, 8, 'Description', 'STR', 50, NULL, NULL, '2010-07-22 11:50:42', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(137, 24, 'Name', 'STR', 100, NULL, NULL, NULL, NULL, 9999),
(138, 24, 'Mail', 'STR', 30, NULL, NULL, NULL, NULL, 9999),
(139, 24, 'Password', 'PSW', 10, NULL, NULL, NULL, NULL, 9999),
(140, 24, 'Group', 'TAB', NULL, 6, NULL, NULL, NULL, 9999),
(142, 24, 'Developer', 'BOL', NULL, NULL, NULL, NULL, NULL, 9999),
(229, 2, 'ListValues', 'STR', 500, NULL, NULL, '2010-10-06 10:07:00', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(305, 24, 'Actived', 'BOL', NULL, NULL, NULL, '2010-10-25 16:39:58', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(337, 34, 'User', 'TAB', NULL, 24, NULL, '2010-11-03 16:17:14', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(338, 34, 'Group', 'TAB', NULL, 6, NULL, '2010-11-03 16:17:28', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(339, 36, 'Module', 'TAB', NULL, 8, NULL, '2010-11-04 14:51:23', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(340, 36, 'Group', 'TAB', NULL, 6, NULL, '2010-11-04 14:51:41', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(341, 37, 'UserName', 'STR', 100, NULL, NULL, '2010-11-05 10:43:58', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(342, 37, 'UserMail', 'STR', 50, NULL, NULL, '2010-11-05 10:44:10', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(343, 37, 'Action', 'LST', NULL, NULL, 'LOG=Login|NEW=Inseriu novo Registro|EDT=Editou um Registro|DEL=Excluiu um Registro', '2010-11-05 14:32:45', 'Tiago Gonçalves (Tiago Gonçalves)', 9999),
(344, 37, 'DateTime', 'DTT', NULL, NULL, NULL, '2010-11-05 10:47:07', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(345, 37, 'Description', 'TXT', NULL, NULL, NULL, '2010-11-05 10:58:49', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(346, 37, 'IP', 'STR', 15, NULL, NULL, '2010-11-05 11:05:00', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(347, 37, 'Browser', 'LST', NULL, NULL, 'IE6=Internet Explorer 6|IE7=Internet Explorer 7|IE8=Internet Explorer 8|CHR=Chrome|FFX=Firefox|OPR=Opera|SAF=Safari|000=Não Identificado', '2010-11-05 11:50:49', 'Tiago Gonçalves (Tiago Gonçalves)', 9999),
(348, 37, 'OS', 'LST', NULL, NULL, 'ADN=Andróid|BKB=BlackBerry|IPH=iPhone|PLM=Palm|LNX=linux|MCT=Macintosh|WIN=Windows|000=Brower não identificado', '2010-11-05 11:52:24', 'Tiago Gonçalves (Tiago Gonçalves)', 9999),
(361, 2, 'Order', 'INT', NULL, NULL, NULL, '2010-11-17 14:04:23', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999),
(395, 41, 'File', 'STR', 50, NULL, NULL, '2010-12-06 18:12:09', 'Tiago Gonçalves (tiago@novabrazil.art.br)', NULL),
(396, 41, 'Module', 'TAB', NULL, 8, NULL, '2010-12-06 18:12:22', 'Tiago Gonçalves (tiago@novabrazil.art.br)', NULL),
(397, 41, 'Published', 'BOL', NULL, NULL, NULL, '2010-12-06 18:12:33', 'Tiago Gonçalves (tiago@novabrazil.art.br)', NULL),
(398, 41, 'Title', 'STR', 50, NULL, NULL, '2010-12-06 18:12:48', 'Tiago Gonçalves (tiago@novabrazil.art.br)', NULL),
(399, 41, 'Type', 'LST', NULL, NULL, 'PDF=Documento em PDF|XLS=Planilha Excel', '2010-12-06 18:13:15', 'Tiago Gonçalves (tiago@novabrazil.art.br)', NULL),
(611, 8, 'Icon', 'STR', 50, NULL, NULL, '2013-06-07 00:16:00', 'Tiago Gonçalves (tiago@novabrazil.art.br)', 9999);

-- ------------------------------------------------------------
--
-- Estrutura da tabela `sysTables`
--

CREATE TABLE IF NOT EXISTS `sysTables` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `IsSystem` char(1) NOT NULL,
  `Comment` varchar(60) DEFAULT NULL,
  `LastUpdate` datetime DEFAULT NULL,
  `LastUserName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabela que gerencia tabelas do Sistema' AUTO_INCREMENT=42 ;

INSERT INTO `sysTables` (`ID`, `Name`, `IsSystem`, `Comment`, `LastUpdate`, `LastUserName`) VALUES
(1, 'sysTables', 'Y', 'Gerencia Tabelas do Framework', '2010-07-21 09:37:37', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(2, 'sysTableFields', 'Y', 'Gerencia Campos de Tabela', '2010-07-21 09:36:20', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(3, 'sysTableConstrains', 'Y', 'Gerencia links entre as tabelas (Constrains)', '2010-07-19 18:00:41', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(6, 'sysAdminGroups', 'Y', 'Grupo de Segurança do Administrator', '2010-07-21 14:24:59', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(8, 'sysModules', 'Y', 'Gerencia Módulos do Sistema', '2010-07-21 14:24:59', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(9, 'sysModuleFolders', 'Y', 'Gerencia Pastas de determinado Módulo do Sistema', '2010-07-21 14:24:59', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(24, 'sysAdminUsers', 'Y', 'Gerencia Usuários do Sistema', '2010-07-30 14:53:30', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(34, 'sysAdminUsersGroups', 'Y', 'Tabela de Ligação de sysAdminUsers e sysAdminGroups', '2010-11-03 16:16:53', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(36, 'sysModuleSecurityGroups', 'Y', 'Grupos de Segurança do Módulo', '2010-11-04 14:51:08', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(37, 'sysLogs', 'Y', 'Histórico de Ações no CMS', '2010-11-05 10:35:18', 'Tiago Gonçalves (tiago@novabrazil.art.br)'),
(41, 'sysModuleReports', 'Y', 'Relatórios dos Módulos', '2010-12-06 18:11:51', 'Tiago Gonçalves (tiago@novabrazil.art.br)');

-- ------------------------------------------------------------
-- ------------------------------------------------------------
-- Adiciona CONSTRAINS
-- ------------------------------------------------------------
-- ------------------------------------------------------------

ALTER TABLE `sysAdminUsers`
  ADD CONSTRAINT `fk_sysadminusers_group` FOREIGN KEY (`Group`) REFERENCES `sysAdminGroups` (`ID`);

ALTER TABLE `sysAdminUsersGroups`
  ADD CONSTRAINT `fk_sysadminusersgroups_group` FOREIGN KEY (`Group`) REFERENCES `sysAdminGroups` (`ID`),
  ADD CONSTRAINT `fk_sysadminusersgroups_user` FOREIGN KEY (`User`) REFERENCES `sysAdminUsers` (`ID`);

ALTER TABLE `sysModuleFolders`
  ADD CONSTRAINT `fk_sysmodulefolders_module` FOREIGN KEY (`Module`) REFERENCES `sysModules` (`ID`);

ALTER TABLE `sysModuleReports`
  ADD CONSTRAINT `fk_sysmodulereports_module` FOREIGN KEY (`Module`) REFERENCES `sysModules` (`ID`);

ALTER TABLE `sysModuleSecurityGroups`
  ADD CONSTRAINT `fk_sysmodulesecuritygroups_group` FOREIGN KEY (`Group`) REFERENCES `sysAdminGroups` (`ID`),
  ADD CONSTRAINT `fk_sysmodulesecuritygroups_module` FOREIGN KEY (`Module`) REFERENCES `sysModules` (`ID`);

ALTER TABLE `sysTableConstrains`
  ADD CONSTRAINT `fk_systablecontrains_fromfield` FOREIGN KEY (`FromField`) REFERENCES `sysTableFields` (`ID`),
  ADD CONSTRAINT `fk_systablecontrains_fromtable` FOREIGN KEY (`FromTable`) REFERENCES `sysTables` (`ID`),
  ADD CONSTRAINT `fk_systablecontrains_totable` FOREIGN KEY (`ToTable`) REFERENCES `sysTables` (`ID`);

ALTER TABLE `sysTableFields`
  ADD CONSTRAINT `fk_systablefields_tablelink` FOREIGN KEY (`TableLink`) REFERENCES `sysTables` (`ID`);