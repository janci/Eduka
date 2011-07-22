SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `eduka` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `eduka` ;

-- -----------------------------------------------------
-- Table `eduka`.`gallery`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eduka`.`gallery` ;

CREATE  TABLE IF NOT EXISTS `eduka`.`gallery` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(128) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `eduka`.`photo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eduka`.`photo` ;

CREATE  TABLE IF NOT EXISTS `eduka`.`photo` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `source` VARCHAR(256) NOT NULL ,
  `description` TEXT NOT NULL ,
  `gallery_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_photo_gallery1` (`gallery_id` ASC) ,
  CONSTRAINT `fk_photo_gallery1`
    FOREIGN KEY (`gallery_id` )
    REFERENCES `eduka`.`gallery` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eduka`.`product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eduka`.`product` ;

CREATE  TABLE IF NOT EXISTS `eduka`.`product` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `sku` VARCHAR(32) NOT NULL ,
  `name` VARCHAR(256) NOT NULL ,
  `description` TEXT NOT NULL ,
  `photo_id` INT NULL ,
  `gallery_id` INT NULL ,
  `price` FLOAT(10,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `sku_UNIQUE` (`sku` ASC) ,
  INDEX `fk_product_gallery1` (`gallery_id` ASC) ,
  INDEX `fk_product_photo1` (`photo_id` ASC) ,
  CONSTRAINT `fk_product_gallery1`
    FOREIGN KEY (`gallery_id` )
    REFERENCES `eduka`.`gallery` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_photo1`
    FOREIGN KEY (`photo_id` )
    REFERENCES `eduka`.`photo` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `eduka`.`property`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eduka`.`property` ;

CREATE  TABLE IF NOT EXISTS `eduka`.`property` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(64) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `eduka`.`product_property`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eduka`.`product_property` ;

CREATE  TABLE IF NOT EXISTS `eduka`.`product_property` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `product_id` INT NOT NULL ,
  `property_id` INT NOT NULL ,
  `property_value` VARCHAR(256) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_product_property_product1` (`product_id` ASC) ,
  INDEX `fk_product_property_property1` (`property_id` ASC) ,
  CONSTRAINT `fk_product_property_product1`
    FOREIGN KEY (`product_id` )
    REFERENCES `eduka`.`product` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_property_property1`
    FOREIGN KEY (`property_id` )
    REFERENCES `eduka`.`property` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `eduka`.`configuration`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eduka`.`configuration` ;

CREATE  TABLE IF NOT EXISTS `eduka`.`configuration` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `property` VARCHAR(64) NOT NULL ,
  `value` VARCHAR(256) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `property_UNIQUE` (`property` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `eduka`.`configuration`
-- -----------------------------------------------------
START TRANSACTION;
USE `eduka`;
INSERT INTO `eduka`.`configuration` (`id`, `property`, `value`) VALUES (NULL, 'version', '1.0');

COMMIT;
