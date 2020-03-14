DELIMITER $$

CREATE TRIGGER atualiza_cadastro
    AFTER INSERT
    ON relatorios FOR EACH ROW 

BEGIN

IF(SELECT * FROM relatorios where id_reg = NEW.id_reg) THEN
    UPDATE relatorios SET
        nome = NEW.nome,
        data_nasc = NEW.data_nasc,
        email = NEW.email,
        estado = NEW.estado,
        cidade = NEW.cidade,
        endereco = NEW.endereco,
        data_cadastro = NEW.data_cadastro
    WHERE id_reg = NEW.id_reg;
END$$

DELIMITER ;