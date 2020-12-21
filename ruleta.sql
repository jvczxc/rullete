/*
Navicat SQL Server Data Transfer

Source Server         : Shaiya Server
Source Server Version : 105000
Source Host           : localhost:1433
Source Database       : PS_GameLog
Source Schema         : dbo

Target Server Type    : SQL Server
Target Server Version : 105000
File Encoding         : 65001

Date: 2020-12-21 23:35:51
*/


-- ----------------------------
-- Table structure for ruleta
-- ----------------------------
DROP TABLE [dbo].[ruleta]
GO
CREATE TABLE [dbo].[ruleta] (
[RowID] int NOT NULL IDENTITY(1,1) ,
[ItemID] int NULL ,
[Tipo] varchar(6) NULL 
)


GO
DBCC CHECKIDENT(N'[dbo].[ruleta]', RESEED, 4)
GO

-- ----------------------------
-- Records of ruleta
-- ----------------------------
SET IDENTITY_INSERT [dbo].[ruleta] ON
GO
INSERT INTO [dbo].[ruleta] ([RowID], [ItemID], [Tipo]) VALUES (N'1', N'1001', null)
GO
GO
INSERT INTO [dbo].[ruleta] ([RowID], [ItemID], [Tipo]) VALUES (N'2', N'1002', null)
GO
GO
INSERT INTO [dbo].[ruleta] ([RowID], [ItemID], [Tipo]) VALUES (N'3', N'100001', null)
GO
GO
INSERT INTO [dbo].[ruleta] ([RowID], [ItemID], [Tipo]) VALUES (N'4', N'25005', null)
GO
GO
SET IDENTITY_INSERT [dbo].[ruleta] OFF
GO
