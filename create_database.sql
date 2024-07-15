-- Crear base de datos
CREATE SCHEMA IF NOT EXISTS artesanos DEFAULT CHARACTER SET utf8 ;
	
-- Seleccionar base de datos
USE artesanos;
	
-- Creación de tabla departamento en MySQL
CREATE TABLE departamento (
   dept_id VARCHAR(2) PRIMARY KEY,
   dept_nombre VARCHAR(50) NOT NULL
);

-- Creación de tabla municipio en MySQL
CREATE TABLE municipio (
   mun_id VARCHAR(5) PRIMARY KEY,
   mun_dept_id VARCHAR(2) NOT NULL,
   mun_nombre VARCHAR(50) NOT NULL,
   CONSTRAINT fk_municipio_depto FOREIGN KEY (mun_dept_id) REFERENCES departamento (dept_id)
);

-- Creación de tabla artesano en MySQL
CREATE TABLE artesano (
   art_id INT AUTO_INCREMENT PRIMARY KEY,
   art_mun_id VARCHAR(5) NOT NULL,
   art_nombres VARCHAR(50) NOT NULL,
   art_apellidos VARCHAR(50) NOT NULL,
   art_razon_social VARCHAR(150) NOT NULL,
   art_descripccion TEXT,
   art_email VARCHAR(50) NOT NULL,
   art_celular VARCHAR(10) NOT NULL,
   CONSTRAINT fk_artesano_municipio FOREIGN KEY (art_mun_id) REFERENCES municipio (mun_id)
);