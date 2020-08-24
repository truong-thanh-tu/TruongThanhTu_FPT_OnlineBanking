# Created_by: Truong Thanh Tu
# Created_at: 21:30 2020-08-24


# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                           Create DataBase                                           #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# Create DataBase
DROP DATABASE IF EXISTS `ONLINEBANKING`;
CREATE DATABASE IF NOT EXISTS `ONLINEBANKING` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `ONLINEBANKING`;
SET time_zone = '+7:00';

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                            Create Tables                                            #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# Create Table user
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer`
(
    `id_customer`      INT AUTO_INCREMENT,

    `id_user`          INT UNSIGNED NOT NULL,

    `name`             VARCHAR(64)  NOT NULL,
    `dob`              DATETIME,
    `address`          VARCHAR(64)  NOT NULL,
    `passport`         INT(20)      NOT NULL,
    `email`            VARCHAR(128) NOT NULL,
    `occupation_field` VARCHAR(128) NOT NULL,
    `workplace`        VARCHAR(128) NOT NULL,
    `position`         VARCHAR(128) NOT NULL,
    `earnings`         INT(12)      NOT NULL,
    `interests`        VARCHAR(128) NOT NULL,

    `created_by`       NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`       DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`       NVARCHAR(32) DEFAULT NULL,
    `updated_at`       DATETIME     DEFAULT NULL,
    `version`          INT          DEFAULT 1,
    `deleted`          BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id_customer`)
) ENGINE InnoDB;

# Create Table user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `id_user`    INT AUTO_INCREMENT,

    `id_account` INT UNSIGNED NOT NULL,

    `user`       VARCHAR(64)  NOT NULL,
    `pass`       VARCHAR(64)  NOT NULL,
    `level`      INT UNSIGNED DEFAULT 2,

    `created_by` NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at` DATETIME     DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME     DEFAULT NULL,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id_user`)
) ENGINE InnoDB;

# Create Table type_account
DROP TABLE IF EXISTS `type_account`;
CREATE TABLE IF NOT EXISTS `type_account`
(
    `id_type_account`   INT AUTO_INCREMENT,

    `name_type_account` VARCHAR(128) NOT NULL,

    `created_by`        NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`        DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`        NVARCHAR(32) DEFAULT NULL,
    `updated_at`        DATETIME     DEFAULT NULL,
    `version`           INT          DEFAULT 1,
    `deleted`           BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id_type_account`)
) ENGINE InnoDB;

# Create Table account
DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account`
(
    `id_account`      INT AUTO_INCREMENT,

    `id_user`         INT UNSIGNED NOT NULL,
    `id_type_account` INT UNSIGNED NOT NULL,
    `id_otp`          INT UNSIGNED NOT NULL,

    `number_account`  INT(16)      NOT NULL,
    `balance`         INT(16)      NOT NULL,


    `created_by`      NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`      DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`      NVARCHAR(32) DEFAULT NULL,
    `updated_at`      DATETIME     DEFAULT NULL,
    `version`         INT          DEFAULT 1,
    `deleted`         BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id_account`)
) ENGINE InnoDB;

# Create Table OTP
DROP TABLE IF EXISTS `otp`;
CREATE TABLE IF NOT EXISTS `otp`
(
    `id_otp`     INT AUTO_INCREMENT,

    `id_account` INT UNSIGNED NOT NULL,

    `email`      VARCHAR(128) NOT NULL,


    `created_by` NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at` DATETIME     DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME     DEFAULT NULL,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id_otp`)
) ENGINE InnoDB;


# Create Table transfer
DROP TABLE IF EXISTS `transfer`;
CREATE TABLE IF NOT EXISTS `transfer`
(
    `id_transfer`    INT AUTO_INCREMENT,

    `id_account`     INT UNSIGNED  NOT NULL,
    `id_beneficiary` INT UNSIGNED  NOT NULL,


    `code`           NVARCHAR(128) NULL,
    `date`           DATETIME      DEFAULT CURRENT_TIME,
    `money`          INT(16)       NOT NULL,
    `free`           INT(16)       NOT NULL,
    `content`        NVARCHAR(128) DEFAULT NULL,
    `free_payers`    NVARCHAR(128) NOT NULL,


    `created_by`     NVARCHAR(32)  DEFAULT 'OnlineBanking',
    `created_at`     DATETIME      DEFAULT CURRENT_TIME,
    `updated_by`     NVARCHAR(32)  DEFAULT NULL,
    `updated_at`     DATETIME      DEFAULT NULL,
    `version`        INT           DEFAULT 1,
    `deleted`        BOOLEAN       DEFAULT FALSE,

    PRIMARY KEY (`id_transfer`)
) ENGINE InnoDB;


# Create Table beneficiary
DROP TABLE IF EXISTS `beneficiary`;
CREATE TABLE IF NOT EXISTS `beneficiary`
(
    `id_beneficiary` INT AUTO_INCREMENT,


    `user`           VARCHAR(64) NOT NULL,
    `number_account` INT(16)     NOT NULL,
    `name_bank`      VARCHAR(64) NOT NULL,


    `created_by`     NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`     DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`     NVARCHAR(32) DEFAULT NULL,
    `updated_at`     DATETIME     DEFAULT NULL,
    `version`        INT          DEFAULT 1,
    `deleted`        BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id_beneficiary`)
) ENGINE InnoDB;
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                             Insert Data                                             #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
INSERT INTO customer (id_user, name, dob, address, passport, email, occupation_field, workplace, position, earnings,
                      interests)
    VALUE (1, 'Nguyen Van A', '2000-08-09', 'Ha Noi', 123456789, 'nguyenvana@gmail.com', 'lap trinh', 'Ha Noi',
           'nhan vien', 100000, 'doc sach');
INSERT INTO customer (id_user, name, dob, address, passport, email, occupation_field, workplace, position, earnings,
                      interests)
    VALUE (2, 'Nguyen Dinh Hieu', '2000-08-19', 'Ha Noi', 123456749, 'nguyendinhhieu@gmail.com', 'lap trinh', 'Ha Noi',
           'nhan vien', 100000, 'doc sach');
INSERT INTO customer (id_user, name, dob, address, passport, email, occupation_field, workplace, position, earnings,
                      interests)
    VALUE (3, 'Pham Tuan', '2000-08-29', 'Ha Noi', 123456759, 'phamtuan@gmail.com', 'lap trinh', 'Ha Noi', 'nhan vien',
           100000, 'doc sach');
INSERT INTO customer (id_user, name, dob, address, passport, email, occupation_field, workplace, position, earnings,
                      interests)
    VALUE (4, 'Truong Thanh Tu', '2000-08-14', 'Ha Noi', 123456719, 'truongthanhtu@gmail.com', 'lap trinh', 'Ha Noi',
           'nhan vien', 100000, 'doc sach');
INSERT INTO customer (id_user, name, dob, address, passport, email, occupation_field, workplace, position, earnings,
                      interests)
    VALUE (5, 'Nguyen Dinh Tung', '2000-08-15', 'Ha Noi', 123456799, 'nguyendinhtung@gmail.com', 'lap trinh', 'Ha Noi',
           'nhan vien', 100000, 'doc sach');
INSERT INTO customer (id_user, name, dob, address, passport, email, occupation_field, workplace, position, earnings,
                      interests)
    VALUE (6, 'Nguyen Quan Huy', '2000-08-06', 'Ha Noi', 123456779, 'nguyenquanhuy@gmail.com', 'lap trinh', 'Ha Noi',
           'nhan vien', 100000, 'doc sach');


INSERT INTO user (id_account, user, pass)
VALUES (1, 'nguyenvana', 123456);
INSERT INTO user (id_account, user, pass)
VALUES (2, 'nguyendinhhieu', 123456);
INSERT INTO user (id_account, user, pass)
VALUES (3, 'phamtuan', 123456);
INSERT INTO user (id_account, user, pass)
VALUES (4, 'truongthanhtu', 123456);
INSERT INTO user (id_account, user, pass)
VALUES (5, 'nguyendinhtung', 123456);
INSERT INTO user (id_account, user, pass)
VALUES (7, 'nguyenquanhuy', 123456);
INSERT INTO user (id_account, user, pass, level)
VALUES (6, 'tranvancan', 123456, 1);

INSERT INTO type_account (name_type_account)
VALUES ('TIEN TIET KIEM');
INSERT INTO type_account (name_type_account)
VALUES ('THANH TOAN');

INSERT INTO account(id_user, id_type_account, id_otp, number_account, balance)
VALUES (1, 2, 1, 123456, 1000000);
INSERT INTO account(id_user, id_type_account, id_otp, number_account, balance)
VALUES (1, 1, 1, 123456, 1000000);
INSERT INTO account(id_user, id_type_account, id_otp, number_account, balance)
VALUES (2, 2, 1, 123456, 1000000);
INSERT INTO account(id_user, id_type_account, id_otp, number_account, balance)
VALUES (2, 1, 1, 123456, 1000000);

INSERT INTO otp (id_account, email)
VALUES (1, 'nguyenvana');
INSERT INTO otp (id_account, email)
VALUES (2, 'nguyendinhhieu');
INSERT INTO otp (id_account, email)
VALUES (3, 'phamtuan');
INSERT INTO otp (id_account, email)
VALUES (4, 'truongthanhtu');

INSERT INTO beneficiary (user, number_account, name_bank)
VALUES ('Nguyen Van A', 123456789, 'OnlineBanK');
INSERT INTO beneficiary (user, number_account, name_bank)
VALUES ('Nguyen Dinh Hieu', 123456789, 'OnlineBank');
INSERT INTO beneficiary (user, number_account, name_bank)
VALUES ('Pham Tuan', 123456789, 'OnlineBank');
INSERT INTO beneficiary (user, number_account, name_bank)
VALUES ('Truong Thanh Tu', 123456789, 'OnlineBank');

INSERT INTO transfer (id_account, id_beneficiary, code, money, free, free_payers)
VALUES (1, 2, 'HTML', 500000, 15000, 'nguoi gui');
