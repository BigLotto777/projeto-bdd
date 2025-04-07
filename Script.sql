CREATE database projeto;

use projeto;

CREATE TABLE `projeto`.`aluno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `ra` INT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
  
  INSERT INTO aluno (nome, ra, email) VALUES
('Molina', 12345, 'molina@gmail.com');
INSERT INTO aluno (nome, ra, email) VALUES
('Jose', null, 'jose@gmail.com');
INSERT INTO aluno (nome, ra, email) VALUES
('Markola', 7777, 'markola@gmail.com');
INSERT INTO aluno (nome, ra, email) VALUES
('Juan', 19723, 'juanjuan@gmail.com');

SELECT * FROM aluno;

INSERT INTO aluno (nome, ra, email) VALUES
('Maria J', 12345, 'mariaj@gmail.com');

UPDATE aluno SET ra = 88888
WHERE id = 2;

UPDATE aluno SET ra = 79852
WHERE id = 5;