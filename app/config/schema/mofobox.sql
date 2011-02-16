SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mofocake` DEFAULT CHARACTER SET latin1 ;
USE `mofocake` ;

-- -----------------------------------------------------
-- Table `mofocake`.`artists`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mofocake`.`artists` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) NOT NULL ,
  `genre` VARCHAR(100) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `comment` TEXT NULL DEFAULT NULL ,
  `begin_date` DATE NULL DEFAULT NULL ,
  `end_date` DATE NULL DEFAULT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mofocake`.`albums`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mofocake`.`albums` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `artist_id` INT(11) NOT NULL ,
  `amazon_asin` VARCHAR(255) NULL DEFAULT NULL ,
  `amazon_detail_page_url` VARCHAR(255) NULL DEFAULT NULL ,
  `amazon_average_rating` DOUBLE NULL DEFAULT NULL ,
  `small_image` VARCHAR(255) ,
  `medium_image` VARCHAR(255) ,
  `large_image` VARCHAR(255) ,
  `genre` VARCHAR(100) NULL DEFAULT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `year` INT(11) NULL DEFAULT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `artist_id_idx` (`artist_id` ASC) ,
  CONSTRAINT `album_artist_id_artist_id`
    FOREIGN KEY (`artist_id` )
    REFERENCES `mofocake`.`artists` (`id` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mofocake`.`tracks`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mofocake`.`tracks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `track_number` INT(11) NULL DEFAULT NULL ,
  `title` VARCHAR(150) NOT NULL ,
  `genre` VARCHAR(100) NULL DEFAULT NULL ,
  `year` INT(11) NULL DEFAULT NULL ,
  `duration` DOUBLE NULL DEFAULT NULL ,
  `filename` VARCHAR(150) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mofocake`.`albums_tracks`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mofocake`.`albums_tracks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `album_id` INT(11) NOT NULL ,
  `track_id` INT(11) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `album_id_idx` (`album_id` ASC) ,
  INDEX `track_id_idx` (`track_id` ASC) ,
  CONSTRAINT `album_track_album_id_album_id`
    FOREIGN KEY (`album_id` )
    REFERENCES `mofocake`.`albums` (`id` ),
  CONSTRAINT `album_track_track_id_track_id`
    FOREIGN KEY (`track_id` )
    REFERENCES `mofocake`.`tracks` (`id` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mofocake`.`artists_tracks`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mofocake`.`artists_tracks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `artist_id` INT(11) NOT NULL ,
  `track_id` INT(11) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `artist_id_idx` (`artist_id` ASC) ,
  INDEX `track_id_idx` (`track_id` ASC) ,
  CONSTRAINT `artist_track_artist_id_artist_id`
    FOREIGN KEY (`artist_id` )
    REFERENCES `mofocake`.`artists` (`id` ),
  CONSTRAINT `artist_track_track_id_track_id`
    FOREIGN KEY (`track_id` )
    REFERENCES `mofocake`.`tracks` (`id` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mofocake`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mofocake`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(15) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `role` VARCHAR(100) NOT NULL ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `username` (`username` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mofocake`.`playlists`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mofocake`.`playlists` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `track_id` INT(11) NOT NULL ,
  `user_id` INT(11) NOT NULL ,
  `played` TINYINT(1) NULL DEFAULT '0' ,
  `created` DATETIME NULL ,
  `modified` DATETIME NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `track_id_idx` (`track_id` ASC) ,
  INDEX `user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `playlist_track_id_track_id`
    FOREIGN KEY (`track_id` )
    REFERENCES `mofocake`.`tracks` (`id` ),
  CONSTRAINT `playlist_user_id_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `mofocake`.`users` (`id` ))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
