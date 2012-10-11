CREATE TABLE `tbl_project` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(128) NULL DEFAULT NULL,
	`description` TEXT NULL,
	`create_time` DATETIME NULL DEFAULT NULL,
	`create_user_id` INT(11) NULL DEFAULT NULL,
	`update_time` DATETIME NULL DEFAULT NULL,
	`update_user_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=9;

CREATE TABLE `tbl_user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(256) NOT NULL,
	`username` VARCHAR(256) NULL DEFAULT NULL,
	`password` VARCHAR(256) NULL DEFAULT NULL,
	`last_login_time` DATETIME NULL DEFAULT NULL,
	`create_time` DATETIME NULL DEFAULT NULL,
	`create_user_id` INT(11) NULL DEFAULT NULL,
	`update_time` DATETIME NULL DEFAULT NULL,
	`update_user_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	INDEX `FK_issue_owner` (`create_user_id`)
);

CREATE TABLE `tbl_project_user_assignment` (
	`project_id` INT(11) NOT NULL,
	`user_id` INT(11) NOT NULL,
	`create_time` DATETIME NULL DEFAULT NULL,
	`create_user_id` INT(11) NULL DEFAULT NULL,
	`update_time` DATETIME NULL DEFAULT NULL,
	`update_user_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`project_id`, `user_id`),
	INDEX `FK_user_
project` (`user_id`),
	CONSTRAINT `FK_user_
project` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
	CONSTRAINT `FK_project_
user` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

CREATE TABLE `tbl_issue` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256) NOT NULL,
	`description` VARCHAR(2000) NULL DEFAULT NULL,
	`project_id` INT(11) NULL DEFAULT NULL,
	`type_id` INT(11) NULL DEFAULT NULL,
	`status_id` INT(11) NULL DEFAULT NULL,
	`owner_id` INT(11) NULL DEFAULT NULL,
	`requester_id` INT(11) NULL DEFAULT NULL,
	`create_time` DATETIME NULL DEFAULT NULL,
	`create_user_id` INT(11) NULL DEFAULT NULL,
	`update_time` DATETIME NULL DEFAULT NULL,
	`update_user_id` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`),
	INDEX `FK_issue_project` (`project_id`),
	INDEX `FK_issue_requester` (`requester_id`),
	INDEX `FK_issue_owner` (`owner_id`),
	CONSTRAINT `FK_issue_owner` FOREIGN KEY (`owner_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE,
	CONSTRAINT `FK_issue_project` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON DELETE CASCADE,
	CONSTRAINT `FK_issue_requester` FOREIGN KEY (`requester_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

ALTER TABLE `tbl_project_user_assignment` ADD CONSTRAINT `FK_project_
user` FOREIGN KEY (`project_id`) REFERENCES `tbl_project` (`id`) ON
DELETE CASCADE ON UPDATE RESTRICT;
ALTER TABLE `tbl_project_user_assignment` ADD CONSTRAINT `FK_user_
project` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON
DELETE CASCADE ON UPDATE RESTRICT;

