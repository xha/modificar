/****** Object:  Table [dbo].[ISOP_Accion]    Script Date: 27/03/2018 16:12:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ISOP_Accion](
	[id_accion] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](100) NOT NULL,
	[alias] [varchar](100) NOT NULL,
	[activo] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_accion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ISOP_Pregunta]    Script Date: 27/03/2018 16:12:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ISOP_Pregunta](
	[id_pregunta] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](100) NOT NULL,
	[activo] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_pregunta] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ISOP_Rol]    Script Date: 27/03/2018 16:12:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ISOP_Rol](
	[id_rol] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](100) NOT NULL,
	[activo] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_rol] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ISOP_RolAccion]    Script Date: 27/03/2018 16:12:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ISOP_RolAccion](
	[id_rol] [int] NOT NULL,
	[id_accion] [int] NOT NULL,
	[modifica] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_rol] ASC,
	[id_accion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[ISOP_Usuario]    Script Date: 27/03/2018 16:12:16 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ISOP_Usuario](
	[id_usuario] [int] IDENTITY(1,1) NOT NULL,
	[usuario] [varchar](20) NOT NULL,
	[correo] [varchar](100) NOT NULL,
	[cedula] [varchar](15) NOT NULL,
	[clave] [varchar](100) NOT NULL,
	[nombre] [nvarchar](100) NOT NULL,
	[apellido] [varchar](100) NOT NULL,
	[sexo] [char](1) NOT NULL,
	[respuesta_seguridad] [varchar](1000) NULL,
	[fecha_registro] [datetime] NOT NULL,
	[telefono] [varchar](20) NULL,
	[activo] [bit] NOT NULL,
	[id_rol] [int] NOT NULL,
	[id_pregunta] [int] NULL,
	[CodUbic] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id_usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY],
UNIQUE NONCLUSTERED 
(
	[usuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[ISOP_Accion] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[ISOP_Pregunta] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[ISOP_Rol] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[ISOP_RolAccion] ADD  DEFAULT ((1)) FOR [modifica]
GO
ALTER TABLE [dbo].[ISOP_Usuario] ADD  DEFAULT ('M') FOR [sexo]
GO
ALTER TABLE [dbo].[ISOP_Usuario] ADD  DEFAULT (getdate()) FOR [fecha_registro]
GO
ALTER TABLE [dbo].[ISOP_Usuario] ADD  DEFAULT ((1)) FOR [activo]
GO
ALTER TABLE [dbo].[ISOP_RolAccion]  WITH CHECK ADD  CONSTRAINT [fk_oprol_accion01] FOREIGN KEY([id_rol])
REFERENCES [dbo].[ISOP_Rol] ([id_rol])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[ISOP_RolAccion] CHECK CONSTRAINT [fk_oprol_accion01]
GO
ALTER TABLE [dbo].[ISOP_RolAccion]  WITH CHECK ADD  CONSTRAINT [fk_oprol_accion02] FOREIGN KEY([id_accion])
REFERENCES [dbo].[ISOP_Accion] ([id_accion])
ON DELETE CASCADE
GO
ALTER TABLE [dbo].[ISOP_RolAccion] CHECK CONSTRAINT [fk_oprol_accion02]
GO
ALTER TABLE [dbo].[ISOP_Usuario]  WITH CHECK ADD  CONSTRAINT [fk_opusuario_pregunta] FOREIGN KEY([id_pregunta])
REFERENCES [dbo].[ISOP_Pregunta] ([id_pregunta])
GO
ALTER TABLE [dbo].[ISOP_Usuario] CHECK CONSTRAINT [fk_opusuario_pregunta]
GO
ALTER TABLE [dbo].[ISOP_Usuario]  WITH CHECK ADD  CONSTRAINT [fk_opusuario_rol] FOREIGN KEY([id_rol])
REFERENCES [dbo].[ISOP_Rol] ([id_rol])
GO
ALTER TABLE [dbo].[ISOP_Usuario] CHECK CONSTRAINT [fk_opusuario_rol]
GO
