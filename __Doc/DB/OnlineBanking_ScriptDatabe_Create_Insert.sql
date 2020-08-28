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
    `IDCustomer`      INT AUTO_INCREMENT,

    `CodeCustomer`    NVARCHAR(16)     NOT NULL,

    `User`            NVARCHAR(64)     NOT NULL,
    `Pass`            NVARCHAR(64)     NOT NULL,
    `FirstName`       NVARCHAR(16)     NOT NULL,
    `LastName`        NVARCHAR(16)     NOT NULL,
    `Address`         NVARCHAR(16)     NOT NULL,
    `Dob`             DATETIME         NOT NULL,
    `Workplace`       NVARCHAR(64)     NULL,
    `Position`        NVARCHAR(64)     NULL,
    `Interests`       NVARCHAR(64)     NULL,
    `AverageIncome`   NVARCHAR(64)     NULL,
    `TelephoneNumber` INT(16) UNSIGNED NOT NULL,
    `Email`           NVARCHAR(128)    NULL,


    `created_by`      NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`      DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`      NVARCHAR(32) DEFAULT NULL,
    `updated_at`      DATETIME     DEFAULT NULL,
    `version`         INT          DEFAULT 1,
    `deleted`         BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDCustomer`)
) ENGINE InnoDB;

# Create Table bank
DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank`
(
    `IDBank`     INT AUTO_INCREMENT,

    `CodeBank`   NVARCHAR(16) NOT NULL,

    `Name`       NVARCHAR(64) NOT NULL,
    `Addrees`    NVARCHAR(64) NOT NULL,
    `City`       NVARCHAR(16) NOT NULL,


    `created_by` NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at` DATETIME     DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME     DEFAULT NULL,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDBank`)
) ENGINE InnoDB;

# Create Table trasaction
DROP TABLE IF EXISTS `trasaction`;
CREATE TABLE IF NOT EXISTS `trasaction`
(
    `IDTransaction`          INT AUTO_INCREMENT,

    `IDAccount`              INT UNSIGNED     NOT NULL,
    `IDBeneficiaries`        INT UNSIGNED     NOT NULL,
    `IDBank`                 INT UNSIGNED     NOT NULL,

    `CodeTransaction`        NVARCHAR(16)     NOT NULL,

    `TransactionDate`        DATETIME     DEFAULT CURRENT_TIME,
    `TransactionMoneyNumber` INT(16) UNSIGNED NOT NULL,
    `ContentTransaction`     NVARCHAR(64)     NOT NULL,
    `Payer`                  NVARCHAR(64)     NOT NULL,
    `Free`                   INT(8) UNSIGNED  NOT NULL,
    `CodeOTP`                NVARCHAR(8)      NOT NULL,
    `SendCodeOTP`            NVARCHAR(16)     DEFAULT 'Email',

    `created_by`             NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`             DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`             NVARCHAR(32) DEFAULT NULL,
    `updated_at`             DATETIME     DEFAULT NULL,
    `version`                INT          DEFAULT 1,
    `deleted`                BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDTransaction`)
) ENGINE InnoDB;

# Create Table type_account_customer
DROP TABLE IF EXISTS `type_account`;
CREATE TABLE IF NOT EXISTS type_account
(
    `IDTypeAccountCustomer`   INT AUTO_INCREMENT,

    `CodeTypeAccountCustomer` NVARCHAR(16) NOT NULL,

    `TypeAccount`             NVARCHAR(64) NOT NULL,


    `created_by`              NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`              DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`              NVARCHAR(32) DEFAULT NULL,
    `updated_at`              DATETIME     DEFAULT NULL,
    `version`                 INT          DEFAULT 1,
    `deleted`                 BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDTypeAccountCustomer`)
) ENGINE InnoDB;

# Create Table beneficiaries
DROP TABLE IF EXISTS `beneficiaries`;
CREATE TABLE IF NOT EXISTS beneficiaries
(
    `IDBeneficiaries`          INT AUTO_INCREMENT,

    `IDBank`                   INT UNSIGNED NOT NULL,

    `AccountBeneficiaries`     NVARCHAR(16) NOT NULL,

    `NameAccountBeneficiaries` NVARCHAR(64) NOT NULL,


    `created_by`               NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`               DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`               NVARCHAR(32) DEFAULT NULL,
    `updated_at`               DATETIME     DEFAULT NULL,
    `version`                  INT          DEFAULT 1,
    `deleted`                  BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDBeneficiaries`)
) ENGINE InnoDB;

# Create Table beneficiaries
DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS account
(
    `IDAccount`             INT AUTO_INCREMENT,

    `IDTypeAccountCustomer` INT UNSIGNED NOT NULL,
    `IDBank`                INT          DEFAULT 1,

    `AccountSourceNumber`   NVARCHAR(16) NOT NULL,

    `BalanceSource`         INT(16)      NOT NULL,
    `DateOpen`              DATETIME     DEFAULT CURRENT_TIME,


    `created_by`            NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`            DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`            NVARCHAR(32) DEFAULT NULL,
    `updated_at`            DATETIME     DEFAULT NULL,
    `version`               INT          DEFAULT 1,
    `deleted`               BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDAccount`)
) ENGINE InnoDB;

# Create Table beneficiaries
DROP TABLE IF EXISTS `beneficiaries`;
CREATE TABLE IF NOT EXISTS beneficiaries
(
    `IDBeneficiaries`          INT AUTO_INCREMENT,

    `IDBank`                   INT UNSIGNED NOT NULL,

    `AccountBeneficiaries`     NVARCHAR(16) NOT NULL,

    `NameAccountBeneficiaries` NVARCHAR(64) NOT NULL,

    `created_by`               NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`               DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`               NVARCHAR(32) DEFAULT NULL,
    `updated_at`               DATETIME     DEFAULT NULL,
    `version`                  INT          DEFAULT 1,
    `deleted`                  BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDBeneficiaries`)
) ENGINE InnoDB;

# Create Table type_account_customer
DROP TABLE IF EXISTS `type_account_customer`;
CREATE TABLE IF NOT EXISTS type_account_customer
(
    `IDTypeAccountCustomer` INT AUTO_INCREMENT,

    `IDTypeAccount`         INT UNSIGNED NOT NULL,
    `IDCustomer`            INT UNSIGNED NOT NULL,


    `created_by`            NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`            DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`            NVARCHAR(32) DEFAULT NULL,
    `updated_at`            DATETIME     DEFAULT NULL,
    `version`               INT          DEFAULT 1,
    `deleted`               BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDTypeAccountCustomer`)
) ENGINE InnoDB;



# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                            Insert Tables                                            #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('OL52', 'OnlineBanking', 'Ton That Thuyet', 'Ha Noi');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('HP32', 'HPBanking', 'Nguyen Chi Thanh', 'Da Nang');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('VB21', 'VBBanking', 'Nguyen Van Cu', 'Ho Chi Minh');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('BD32', 'BDBanking', 'Tran Cao Van', 'Can Tho');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('UI21', 'UIBanking', 'Vu Tong Phan', 'Da Nang');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('TH41', 'THKBanking', 'Pham Hoan Bieu', 'Hue');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('QM21', 'QMBanking', 'Ton That Minh Ngoc', 'Hai Phong');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('UL21', 'ULBanking', 'Doan Thi Diem', 'Ha Noi');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('CV21', 'CVBanking', 'Hoan Minh Cong', 'Ho Chi Minh');
INSERT INTO bank(CodeBank, Name, Addrees, City)
    VALUE ('IK21', 'IKBanking', 'Dinh Lan Minh', 'Da Nang');

#Default password: 123456

INSERT INTO customer(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                     AverageIncome, TelephoneNumber, Email)
    VALUE ('MC4455', 'truongthanhtu', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 'Thanh Tu',
           'Truong', 'Hue', '1998-09-03', 'Student', 'Student', 'Reading Book', 0, 0359077335,
           'truongthanhtu03091998@gmail.com');
INSERT INTO customer(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                     AverageIncome, TelephoneNumber, Email)
    VALUE ('PI2315', 'nguyendinhhieu', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 'Dinh Hieu',
           'Nguye', 'Nghe An', '1996-08-08', 'Student', 'Student', 'Reading Book', 0, 0868663315,
           'DinhHieu8896@gmail.com');
INSERT INTO customer(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                     AverageIncome, TelephoneNumber, Email)
    VALUE ('YU0213', 'vuquanghuy', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 'Quan Huy', 'Vu',
           'Ha Noi', '2000-01-01', 'Student', 'Student', 'Reading Book', 0, 0981159826, 'VuQuangHuyXL1234@gmail.com');
INSERT INTO customer(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                     AverageIncome, TelephoneNumber, Email)
    VALUE ('YJ4568', 'phamtuan', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 'Tuan', 'Pham',
           'Thai Nguyen', '2000-01-01', 'Student', 'Student', 'Reading Book', 0, 0382548442,
           'PhamTuanCules20@gmail.com');
INSERT INTO customer(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                     AverageIncome, TelephoneNumber, Email)
    VALUE ('LI2468', 'nguyendinhtung', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 'Dinh Tung',
           'Nguyen', 'Ha Noi', '1998-09-03', 'Student', 'Student', 'Reading Book', 0, 0905423125,
           'nguyendinhtung03091998@gmail.com');



INSERT INTO type_account(CodeTypeAccountCustomer, TypeAccount)
    VALUE ('HS56', 'Multi-function Account');
INSERT INTO type_account(CodeTypeAccountCustomer, TypeAccount)
    VALUE ('UT56', 'Saving account');

INSERT INTO type_account_customer(IDTypeAccount, IDCustomer)
    VALUE (1, 1);
INSERT INTO type_account_customer(IDTypeAccount, IDCustomer)
    VALUE (2, 1);

INSERT INTO account(IDTypeAccountCustomer, AccountSourceNumber, BalanceSource)
    VALUE (1, '12510000586328', 5000000);
INSERT INTO account(IDTypeAccountCustomer, AccountSourceNumber, BalanceSource)
    VALUE (2, '45658791316400', 50000000);

INSERT INTO beneficiaries(IDBank, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (1, '89861632131313', 'Nguyen Van A');
INSERT INTO beneficiaries(IDBank, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (2, '45698798956231', 'Huynh Van Tien Si');
INSERT INTO beneficiaries(IDBank, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (3, '64614146431313', 'Kim Hoan');
INSERT INTO beneficiaries(IDBank, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (4, '13106166466613', 'Dinh Phuong');
INSERT INTO beneficiaries(IDBank, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (5, '79716491313132', 'Trong Hung');
INSERT INTO beneficiaries(IDBank, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (6, '78523213131313', 'Minh Hue');
INSERT INTO beneficiaries(IDBank, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (7, '13103164031640', 'Ly Cong Nhat');

INSERT INTO trasaction(IDAccount, IDBeneficiaries, IDBank, CodeTransaction, TransactionMoneyNumber, ContentTransaction, Payer, Free, CodeOTP, SendCodeOTP)
VALUE (1, 3, 1, '8946561', 500000, 'Transfer money to the youngest', 'Transfer person', 10000, 'jsKSUI', 'Email') ;
INSERT INTO trasaction(IDAccount, IDBeneficiaries, IDBank, CodeTransaction, TransactionMoneyNumber, ContentTransaction, Payer, Free, CodeOTP, SendCodeOTP)
VALUE (1, 1, 1, '8946561', 1500000, 'Pay the bill', 'Transfer person', 30000, 'HJSjsd', 'Email') ;
INSERT INTO trasaction(IDAccount, IDBeneficiaries, IDBank, CodeTransaction, TransactionMoneyNumber, ContentTransaction, Payer, Free, CodeOTP, SendCodeOTP)
VALUE (1, 2, 1, '8946561', 2500000, 'Pile of electricity bills', 'Transfer person', 50000, 'laksJY', 'Email') ;
INSERT INTO trasaction(IDAccount, IDBeneficiaries, IDBank, CodeTransaction, TransactionMoneyNumber, ContentTransaction, Payer, Free, CodeOTP, SendCodeOTP)
VALUE (1, 4, 1, '8946561', 100000, 'Pay for coffee', 'Transfer person', 2000, 'TyskJM', 'Email') ;
INSERT INTO trasaction(IDAccount, IDBeneficiaries, IDBank, CodeTransaction, TransactionMoneyNumber, ContentTransaction, Payer, Free, CodeOTP, SendCodeOTP)
VALUE (1, 5, 1, '8946561', 400000, 'Pay for taxi', 'Transfer person', 8000, 'MSKsia', 'Email') ;
INSERT INTO trasaction(IDAccount, IDBeneficiaries, IDBank, CodeTransaction, TransactionMoneyNumber, ContentTransaction, Payer, Free, CodeOTP, SendCodeOTP)
VALUE (1, 6, 1, '8946561', 700000, 'Pay for booking', 'Transfer person', 14000, 'IMKsql', 'Email') ;

