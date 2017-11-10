<?php

//lista tasków
//wraz z linkami z GET

$create = "CREATE TABLE `task`.`tasks` ( `id` INT NOT NULL AUTO_INCREMENT , `todo` VARCHAR(200) NOT NULL , `done` BOOLEAN NOT NULL DEFAULT FALSE , `deadline` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

