USE [rrhh]
GO
ALTER TABLE [dbo].[puesto] DROP CONSTRAINT [FK__puesto__Departam__398D8EEE]
GO
ALTER TABLE [dbo].[empleado] DROP CONSTRAINT [FK__empleado__Usuari__5FB337D6]
GO
ALTER TABLE [dbo].[empleado] DROP CONSTRAINT [FK__empleado__Puesto__5DCAEF64]
GO
ALTER TABLE [dbo].[empleado] DROP CONSTRAINT [FK__empleado__Depart__5CD6CB2B]
GO
ALTER TABLE [dbo].[empleado] DROP CONSTRAINT [FK__empleado__Candid__5EBF139D]
GO
ALTER TABLE [dbo].[capacitaciones] DROP CONSTRAINT [FK__capacitac__Nivel__5629CD9C]
GO
ALTER TABLE [dbo].[candidato_idiomas] DROP CONSTRAINT [FK__candidato__Idiom__5165187F]
GO
ALTER TABLE [dbo].[candidato_idiomas] DROP CONSTRAINT [FK__candidato__Candi__5070F446]
GO
ALTER TABLE [dbo].[candidato_experiencia_laboral] DROP CONSTRAINT [FK__candidato__Exper__47DBAE45]
GO
ALTER TABLE [dbo].[candidato_experiencia_laboral] DROP CONSTRAINT [FK__candidato__Candi__46E78A0C]
GO
ALTER TABLE [dbo].[candidato_competencias] DROP CONSTRAINT [FK__candidato__Compe__4BAC3F29]
GO
ALTER TABLE [dbo].[candidato_competencias] DROP CONSTRAINT [FK__candidato__Candi__4AB81AF0]
GO
ALTER TABLE [dbo].[candidato_capacitaciones] DROP CONSTRAINT [FK__candidato__Capac__59FA5E80]
GO
ALTER TABLE [dbo].[candidato_capacitaciones] DROP CONSTRAINT [FK__candidato__Candi__59063A47]
GO
ALTER TABLE [dbo].[candidato] DROP CONSTRAINT [FK__candidato__Usuar__440B1D61]
GO
ALTER TABLE [dbo].[candidato] DROP CONSTRAINT [FK__candidato__Puest__4316F928]
GO
ALTER TABLE [dbo].[candidato] DROP CONSTRAINT [FK__candidato__Depar__4222D4EF]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[usuario]
GO
/****** Object:  Table [dbo].[puesto]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[puesto]
GO
/****** Object:  Table [dbo].[nivel_capacitacion]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[nivel_capacitacion]
GO
/****** Object:  Table [dbo].[idiomas]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[idiomas]
GO
/****** Object:  Table [dbo].[experiencia_laboral]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[experiencia_laboral]
GO
/****** Object:  Table [dbo].[empleado]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[empleado]
GO
/****** Object:  Table [dbo].[departamento]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[departamento]
GO
/****** Object:  Table [dbo].[competencias]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[competencias]
GO
/****** Object:  Table [dbo].[capacitaciones]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[capacitaciones]
GO
/****** Object:  Table [dbo].[candidato_idiomas]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[candidato_idiomas]
GO
/****** Object:  Table [dbo].[candidato_experiencia_laboral]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[candidato_experiencia_laboral]
GO
/****** Object:  Table [dbo].[candidato_competencias]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[candidato_competencias]
GO
/****** Object:  Table [dbo].[candidato_capacitaciones]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[candidato_capacitaciones]
GO
/****** Object:  Table [dbo].[candidato]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP TABLE [dbo].[candidato]
GO
USE [master]
GO
/****** Object:  Database [rrhh]    Script Date: 24/10/2020 3:29:55 p. m. ******/
DROP DATABASE [rrhh]
GO
/****** Object:  Database [rrhh]    Script Date: 24/10/2020 3:29:55 p. m. ******/
CREATE DATABASE [rrhh]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'rrhh', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.SQLSERVER\MSSQL\DATA\rrhh.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'rrhh_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.SQLSERVER\MSSQL\DATA\rrhh_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [rrhh] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [rrhh].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [rrhh] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [rrhh] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [rrhh] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [rrhh] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [rrhh] SET ARITHABORT OFF 
GO
ALTER DATABASE [rrhh] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [rrhh] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [rrhh] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [rrhh] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [rrhh] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [rrhh] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [rrhh] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [rrhh] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [rrhh] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [rrhh] SET  DISABLE_BROKER 
GO
ALTER DATABASE [rrhh] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [rrhh] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [rrhh] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [rrhh] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [rrhh] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [rrhh] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [rrhh] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [rrhh] SET RECOVERY FULL 
GO
ALTER DATABASE [rrhh] SET  MULTI_USER 
GO
ALTER DATABASE [rrhh] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [rrhh] SET DB_CHAINING OFF 
GO
ALTER DATABASE [rrhh] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [rrhh] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [rrhh] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'rrhh', N'ON'
GO
ALTER DATABASE [rrhh] SET QUERY_STORE = OFF
GO
USE [rrhh]
GO
/****** Object:  Table [dbo].[candidato]    Script Date: 24/10/2020 3:29:55 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[candidato](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[DepartamentoId] [int] NOT NULL,
	[PuestoId] [int] NOT NULL,
	[UsuarioId] [int] NOT NULL,
	[SalarioAspira] [float] NULL,
	[RecomendadoPor] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[candidato_capacitaciones]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[candidato_capacitaciones](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[CandidatoId] [int] NOT NULL,
	[CapacitacionesId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[candidato_competencias]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[candidato_competencias](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[CandidatoId] [int] NOT NULL,
	[CompetenciaId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[candidato_experiencia_laboral]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[candidato_experiencia_laboral](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[CandidatoId] [int] NOT NULL,
	[ExperienciaId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[candidato_idiomas]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[candidato_idiomas](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[CandidatoId] [int] NOT NULL,
	[IdiomaId] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[capacitaciones]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[capacitaciones](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[NivelId] [int] NOT NULL,
	[Descripcion] [varchar](255) NULL,
	[FechaDe] [datetime] NULL,
	[FechaHasta] [datetime] NULL,
	[Institucion] [varchar](50) NULL,
	[Estado] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[competencias]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[competencias](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Descripcion] [varchar](255) NULL,
	[Estado] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[departamento]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[departamento](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Descripcion] [varchar](255) NULL,
	[Estado] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[empleado]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[empleado](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[DepartamentoId] [int] NOT NULL,
	[PuestoId] [int] NOT NULL,
	[CandidatoId] [int] NOT NULL,
	[UsuarioId] [int] NOT NULL,
	[FechaIngreso] [datetime] NOT NULL,
	[Salario] [float] NOT NULL,
	[Estado] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[experiencia_laboral]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[experiencia_laboral](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Empresa] [varchar](50) NULL,
	[PuestoOcupado] [varchar](50) NULL,
	[FechaDesde] [datetime] NULL,
	[FechaHasta] [datetime] NULL,
	[Salario] [float] NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[idiomas]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[idiomas](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Nombre] [varchar](50) NOT NULL,
	[Descripcion] [varchar](255) NULL,
	[Estado] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[nivel_capacitacion]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[nivel_capacitacion](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Descripcion] [varchar](255) NULL,
	[Estado] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[puesto]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[puesto](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[DepartamentoId] [int] NOT NULL,
	[Nombre] [varchar](50) NOT NULL,
	[NivelRiesgo] [varchar](5) NOT NULL,
	[NivelMinimoSalario] [float] NOT NULL,
	[NivelMaximoSalario] [float] NOT NULL,
	[Estado] [varchar](10) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[usuario]    Script Date: 24/10/2020 3:29:56 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[usuario](
	[UsuarioId] [int] IDENTITY(1,1) NOT NULL,
	[Clave] [varchar](50) NOT NULL,
	[Correo] [varchar](50) NOT NULL,
	[Telefono] [varchar](15) NOT NULL,
	[Nombre] [varchar](50) NOT NULL,
	[Apellido] [varchar](50) NOT NULL,
	[Estado] [varchar](10) NOT NULL,
	[Rol] [varchar](15) NOT NULL,
	[FechaCreacionUsuario] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[UsuarioId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[candidato]  WITH CHECK ADD FOREIGN KEY([DepartamentoId])
REFERENCES [dbo].[departamento] ([Id])
GO
ALTER TABLE [dbo].[candidato]  WITH CHECK ADD FOREIGN KEY([PuestoId])
REFERENCES [dbo].[puesto] ([Id])
GO
ALTER TABLE [dbo].[candidato]  WITH CHECK ADD FOREIGN KEY([UsuarioId])
REFERENCES [dbo].[usuario] ([UsuarioId])
GO
ALTER TABLE [dbo].[candidato_capacitaciones]  WITH CHECK ADD FOREIGN KEY([CandidatoId])
REFERENCES [dbo].[candidato] ([Id])
GO
ALTER TABLE [dbo].[candidato_capacitaciones]  WITH CHECK ADD FOREIGN KEY([CapacitacionesId])
REFERENCES [dbo].[capacitaciones] ([Id])
GO
ALTER TABLE [dbo].[candidato_competencias]  WITH CHECK ADD FOREIGN KEY([CandidatoId])
REFERENCES [dbo].[candidato] ([Id])
GO
ALTER TABLE [dbo].[candidato_competencias]  WITH CHECK ADD FOREIGN KEY([CompetenciaId])
REFERENCES [dbo].[competencias] ([Id])
GO
ALTER TABLE [dbo].[candidato_experiencia_laboral]  WITH CHECK ADD FOREIGN KEY([CandidatoId])
REFERENCES [dbo].[candidato] ([Id])
GO
ALTER TABLE [dbo].[candidato_experiencia_laboral]  WITH CHECK ADD FOREIGN KEY([ExperienciaId])
REFERENCES [dbo].[experiencia_laboral] ([Id])
GO
ALTER TABLE [dbo].[candidato_idiomas]  WITH CHECK ADD FOREIGN KEY([CandidatoId])
REFERENCES [dbo].[candidato] ([Id])
GO
ALTER TABLE [dbo].[candidato_idiomas]  WITH CHECK ADD FOREIGN KEY([IdiomaId])
REFERENCES [dbo].[idiomas] ([Id])
GO
ALTER TABLE [dbo].[capacitaciones]  WITH CHECK ADD FOREIGN KEY([NivelId])
REFERENCES [dbo].[nivel_capacitacion] ([Id])
GO
ALTER TABLE [dbo].[empleado]  WITH CHECK ADD FOREIGN KEY([CandidatoId])
REFERENCES [dbo].[candidato] ([Id])
GO
ALTER TABLE [dbo].[empleado]  WITH CHECK ADD FOREIGN KEY([DepartamentoId])
REFERENCES [dbo].[departamento] ([Id])
GO
ALTER TABLE [dbo].[empleado]  WITH CHECK ADD FOREIGN KEY([PuestoId])
REFERENCES [dbo].[puesto] ([Id])
GO
ALTER TABLE [dbo].[empleado]  WITH CHECK ADD FOREIGN KEY([UsuarioId])
REFERENCES [dbo].[usuario] ([UsuarioId])
GO
ALTER TABLE [dbo].[puesto]  WITH CHECK ADD FOREIGN KEY([DepartamentoId])
REFERENCES [dbo].[departamento] ([Id])
GO
USE [master]
GO
ALTER DATABASE [rrhh] SET  READ_WRITE 
GO
