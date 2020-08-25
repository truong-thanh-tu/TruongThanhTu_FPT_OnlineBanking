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

# Create Table customer
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer`
(
    `customer_id`    INT AUTO_INCREMENT,


    `first_name`     VARCHAR(64)  NOT NULL,
    `last_name`      VARCHAR(64)  NOT NULL,
    `dob`            DATETIME,
    `street_address` VARCHAR(64)  NOT NULL,
    `city`           VARCHAR(64)  NOT NULL,
    `state`          VARCHAR(64)  NOT NULL,
    `zipcode`        INT(8)       NOT NULL,
    `email`          VARCHAR(128) NOT NULL,

    `created_by`     NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`     DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`     NVARCHAR(32) DEFAULT NULL,
    `updated_at`     DATETIME     DEFAULT NULL,
    `version`        INT          DEFAULT 1,
    `deleted`        BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`customer_id`)
) ENGINE InnoDB;

# Create Table users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `user_id`     INT AUTO_INCREMENT,

    `account_id`  INT UNSIGNED NOT NULL,
    `customer_id` INT UNSIGNED NOT NULL,

    `user`        VARCHAR(64)  NOT NULL,
    `pass`        VARCHAR(64)  NOT NULL,
    `level`       INT UNSIGNED DEFAULT 2,
    `active`      BOOLEAN      DEFAULT TRUE,

    `created_by`  NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`  DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`  NVARCHAR(32) DEFAULT NULL,
    `updated_at`  DATETIME     DEFAULT NULL,
    `version`     INT          DEFAULT 1,
    `deleted`     BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`user_id`)
) ENGINE InnoDB;

# Create Table account_type
DROP TABLE IF EXISTS `account_type`;
CREATE TABLE IF NOT EXISTS `account_type`
(
    `account_type_id`   INT AUTO_INCREMENT,

    `name_type_account` VARCHAR(128) NOT NULL,

    `created_by`        NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`        DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`        NVARCHAR(32) DEFAULT NULL,
    `updated_at`        DATETIME     DEFAULT NULL,
    `version`           INT          DEFAULT 1,
    `deleted`           BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`account_type_id`)
) ENGINE InnoDB;

# Create Table branchs
DROP TABLE IF EXISTS `branchs`;
CREATE TABLE IF NOT EXISTS `branchs`
(
    `branch_id`      INT AUTO_INCREMENT,

    `branch_name`    VARCHAR(128)    NOT NULL,
    `street_address` VARCHAR(128)    NOT NULL,
    `city`           VARCHAR(128)    NOT NULL,
    `state`          VARCHAR(2)      NOT NULL,
    `zipcode`        INT(8) UNSIGNED NOT NULL,
    `phone_number`   VARCHAR(128)    NOT NULL,


    `created_by`     NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`     DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`     NVARCHAR(32) DEFAULT NULL,
    `updated_at`     DATETIME     DEFAULT NULL,
    `version`        INT          DEFAULT 1,
    `deleted`        BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`branch_id`)
) ENGINE InnoDB;

# Create Table accounts
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts`
(
    `account_id`      INT AUTO_INCREMENT,

    `branch_id`       INT UNSIGNED NOT NULL,
    `account_type_id` INT UNSIGNED NOT NULL,


    `account_balance` INT(16)      NOT NULL,
    `date_opened`     DATETIME     NOT NULL,


    `created_by`      NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`      DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`      NVARCHAR(32) DEFAULT NULL,
    `updated_at`      DATETIME     DEFAULT NULL,
    `version`         INT          DEFAULT 1,
    `deleted`         BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`account_id`)
) ENGINE InnoDB;


# Create Table cc_transactions
DROP TABLE IF EXISTS `cc_transactions`;
CREATE TABLE IF NOT EXISTS `cc_transactions`
(
    `transaction_id`     INT AUTO_INCREMENT,

    `account_id`         INT UNSIGNED NOT NULL,

    `number_beneficiary` INT(16)      NOT NULL,

    `amount_transaction` INT(16)      NOT NULL,
    `transaction_date`   DATETIME     DEFAULT CURRENT_TIME,
    `free`               INT(16)      NOT NULL,
    `content`            VARCHAR(64)  NOT NULL,
    `name_banking`       NVARCHAR(64) DEFAULT 'OnlineBanking',

    `created_by`         NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`         DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`         NVARCHAR(32) DEFAULT NULL,
    `updated_at`         DATETIME     DEFAULT NULL,
    `version`            INT          DEFAULT 1,
    `deleted`            BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`transaction_id`)
) ENGINE InnoDB;


# Create Table beneficiary
DROP TABLE IF EXISTS `beneficiary`;
CREATE TABLE IF NOT EXISTS `beneficiary`
(
    `beneficiary_id`   INT AUTO_INCREMENT,


    `name_beneficiary` VARCHAR(64) NOT NULL,
    `account_id`       INT(16)     NOT NULL,


    `created_by`       NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`       DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`       NVARCHAR(32) DEFAULT NULL,
    `updated_at`       DATETIME     DEFAULT NULL,
    `version`          INT          DEFAULT 1,
    `deleted`          BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`beneficiary_id`)
) ENGINE InnoDB;


# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                             Insert Data                                             #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

INSERT INTO customer(first_name, last_name, dob, street_address, city, state, zipcode, email)
    VALUE ('Thanh Tu', 'Truong', '1998-09-03', 'Ngo Ha', 'Hue', 'MD', 03091998, 'truongthanhtu03091998@gmail.com');
INSERT INTO customer(first_name, last_name, dob, street_address, city, state, zipcode, email)
    VALUE ('Van A', 'Nguyen ', '2020-02-02', 'Le Quan Dao', 'Ha Noi', 'PhD', 02022020, 'nguyenvana@gmail.com');
INSERT INTO customer(first_name, last_name, dob, street_address, city, state, zipcode, email)
    VALUE ('Tuan', 'Pham', '2020-02-03', 'Ton That Thuy', 'Ha Noi', 'MSc', 03022020, 'phamtuan@gmail.com');
INSERT INTO customer(first_name, last_name, dob, street_address, city, state, zipcode, email)
    VALUE ('Quang Huy', 'Nguyen', '2020-02-04', 'Tran Phu', 'Ha Noi', 'MD', 04022020, 'nguyenquanghuy@gmail.com');

INSERT INTO users(account_id, customer_id, user, pass, level)
    VALUE (24082020, 1, 'truongthanhtu', '03091998', 1);
INSERT INTO users(account_id, customer_id, user, pass, level)
    VALUE (25082020, 2, 'nguyenvana', '03091998', 1);
INSERT INTO users(account_id, customer_id, user, pass, level)
    VALUE (26082020, 3, 'phamtuan', '03091998', 1);
INSERT INTO users(account_id, customer_id, user, pass, level)
    VALUE (27082020, 4, 'nguyenquanghuy', '03091998', 1);

INSERT INTO account_type(name_type_account) VALUE ('Multi-function Account');
INSERT INTO account_type(name_type_account) VALUE ('Payment deposit Account');
INSERT INTO account_type(name_type_account) VALUE ('Savings deposit Account');

INSERT INTO branchs(branch_name, street_address, city, state, zipcode, phone_number)
    VALUE ('OnlineBanking - Ha Noi', 'Ton That Thuyet', 'Ha Noi', 'MD', 20201231, '8402030405');
INSERT INTO branchs(branch_name, street_address, city, state, zipcode, phone_number)
    VALUE ('OnlineBanking - Da Nang', 'Nguyen Chi Thanh', 'Da Nang', 'MD', 20201230, '8402030406');
INSERT INTO branchs(branch_name, street_address, city, state, zipcode, phone_number)
    VALUE ('OnlineBanking - Ho Chi Minh', 'Nguyen Van Cu', 'Ho Chi Minh', 'MD', 20201229, '8402030407');

INSERT INTO accounts(branch_id, account_type_id, account_balance, date_opened)
    VALUE (1, 1, 10000000, '2020-08-02');
INSERT INTO accounts(branch_id, account_type_id, account_balance, date_opened)
    VALUE (2, 2, 10000000, '2020-08-02');
INSERT INTO accounts(branch_id, account_type_id, account_balance, date_opened)
    VALUE (3, 3, 10000000, '2020-08-02');

INSERT INTO cc_transactions(account_id, number_beneficiary, amount_transaction, free, content)
    VALUE (24082020, 25082020, 1000000, 15000, 'Chuyen tien nhanh test 1');
INSERT INTO cc_transactions(account_id, number_beneficiary, amount_transaction, free, content)
    VALUE (24082020, 25082020, 1000000, 15000, 'Chuyen tien nhanh test 1');
INSERT INTO cc_transactions(account_id, number_beneficiary, amount_transaction, free, content)
    VALUE (24082020, 25082020, 1000000, 15000, 'Chuyen tien nhanh test 1');
INSERT INTO cc_transactions(account_id, number_beneficiary, amount_transaction, free, content)
    VALUE (24082020, 25082020, 1000000, 15000, 'Chuyen tien nhanh test 1');

INSERT INTO beneficiary (name_beneficiary, account_id)
    VALUE ('Pham Tuan', 26082020);
INSERT INTO beneficiary (name_beneficiary, account_id)
    VALUE ('Nguyen Van A', 25082020);
INSERT INTO beneficiary (name_beneficiary, account_id)
    VALUE ('Nguyen Quang Huy', 27082020);
