SET IDENTITY_INSERT [dbo].[ISOP_Rol] ON 
INSERT [dbo].[ISOP_Rol] ([id_rol], [descripcion], [activo]) VALUES (1, N'En Espera', 1)
INSERT [dbo].[ISOP_Rol] ([id_rol], [descripcion], [activo]) VALUES (2, N'Usuario', 1)
INSERT [dbo].[ISOP_Rol] ([id_rol], [descripcion], [activo]) VALUES (3, N'Administrador', 1)
SET IDENTITY_INSERT [dbo].[ISOP_Rol] OFF

SET IDENTITY_INSERT [dbo].[ISOP_Pregunta] ON 
INSERT [dbo].[ISOP_Pregunta] ([id_pregunta], [descripcion], [activo]) VALUES (1, N'Lugar de Nacimiento', 1)
INSERT [dbo].[ISOP_Pregunta] ([id_pregunta], [descripcion], [activo]) VALUES (2, N'Segundo nombre de su Padre', 1)
INSERT [dbo].[ISOP_Pregunta] ([id_pregunta], [descripcion], [activo]) VALUES (3, N'Segundo nombre de su Madre', 1)
INSERT [dbo].[ISOP_Pregunta] ([id_pregunta], [descripcion], [activo]) VALUES (4, N'Héroe de infancia', 1)
INSERT [dbo].[ISOP_Pregunta] ([id_pregunta], [descripcion], [activo]) VALUES (5, N'Lugar de Luna de miel', 1)
SET IDENTITY_INSERT [dbo].[ISOP_Pregunta] OFF

SET IDENTITY_INSERT [dbo].[ISOP_Usuario] ON 
INSERT [dbo].[ISOP_Usuario] ([id_usuario], [usuario], [correo], [cedula], [clave], [nombre], [apellido], [sexo], [respuesta_seguridad], [telefono], [activo], [id_rol], [id_pregunta], [CodUbic]) VALUES (1, N'001', N'nada@nada.com', N'123456', N'9df3bb42df815f39041a621f7282a475', N'Innova', N'Administrador', N'M', N'CCS', NULL, 1, 3, 1, N'001')
SET IDENTITY_INSERT [dbo].[ISOP_Usuario] OFF
