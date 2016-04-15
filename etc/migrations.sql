ALTER TABLE `hyip_payaccounts` CHANGE `currency` `currency` ENUM( 'USD', 'RUB' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'USD';
CREATE TABLE `money`.`hyip_rate` ( `id` INT NOT NULL AUTO_INCREMENT , `dollar_rate` DOUBLE NOT NULL , `date` TIMESTAMP NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
ALTER TABLE `hyip_cash` CHANGE `created` `created` TIMESTAMP NOT NULL;