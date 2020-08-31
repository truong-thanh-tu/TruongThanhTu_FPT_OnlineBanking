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
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `IDCustomer`      INT AUTO_INCREMENT,

    `CodeCustomer`    NVARCHAR(16)     NOT NULL,

    `User`            NVARCHAR(64)     NOT NULL,
    `Pass`            NVARCHAR(128)    NOT NULL,
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
    `Turn`            INT          DEFAULT 0,

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
    `Address`    NVARCHAR(64) NOT NULL,
    `City`       NVARCHAR(16) NOT NULL,


    `created_by` NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at` DATETIME     DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME     DEFAULT NULL,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDBank`)
) ENGINE InnoDB;

# Create Table transaction
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction`
(
    `IDTransaction`          INT AUTO_INCREMENT,

    `IDTypeAccountCustomer`              INT UNSIGNED     NOT NULL,
    `IDBank`                 INT UNSIGNED     NOT NULL,

    `CodeTransaction`        NVARCHAR(16)     NOT NULL,
    `Beneficiaries`          NVARCHAR(16)     NOT NULL,
    `NameBeneficiaries`      NVARCHAR(64)     NOT NULL,

    `TransactionDate`        DATETIME     DEFAULT CURRENT_TIME,
    `TransactionMoneyNumber` INT(16) UNSIGNED NOT NULL,
    `ContentTransaction`     NVARCHAR(64)     NOT NULL,
    `Payer`                  INT              NOT NULL,
    `Fee`                    INT(8) UNSIGNED  NOT NULL,
    `CodeOTP`                NVARCHAR(8)      NOT NULL,
    `SendCodeOTP`            NVARCHAR(16) DEFAULT 'Email',


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
    `IDTypeAccount`           INT AUTO_INCREMENT,

    `CodeTypeAccountCustomer` NVARCHAR(16) NOT NULL,

    `TypeAccount`             NVARCHAR(64) NOT NULL,


    `created_by`              NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`              DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`              NVARCHAR(32) DEFAULT NULL,
    `updated_at`              DATETIME     DEFAULT NULL,
    `version`                 INT          DEFAULT 1,
    `deleted`                 BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDTypeAccount`)
) ENGINE InnoDB;

# Create Table beneficiaries
DROP TABLE IF EXISTS `beneficiaries`;
CREATE TABLE IF NOT EXISTS beneficiaries
(
    `IDBeneficiaries`          INT AUTO_INCREMENT,

    `IDBank`                   INT UNSIGNED NOT NULL,
    `IDAccount`                INT UNSIGNED NOT NULL,

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

INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('OL52', 'OnlineBanking', 'Ton That Thuyet', 'Ha Noi');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('HP32', 'HPBanking', 'Nguyen Chi Thanh', 'Da Nang');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('VB21', 'VBBanking', 'Nguyen Van Cu', 'Ho Chi Minh');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('BD32', 'BDBanking', 'Tran Cao Van', 'Can Tho');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('UI21', 'UIBanking', 'Vu Tong Phan', 'Da Nang');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('TH41', 'THKBanking', 'Pham Hoan Bieu', 'Hue');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('QM21', 'QMBanking', 'Ton That Minh Ngoc', 'Hai Phong');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('UL21', 'ULBanking', 'Doan Thi Diem', 'Ha Noi');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('CV21', 'CVBanking', 'Hoan Minh Cong', 'Ho Chi Minh');
INSERT INTO bank(CodeBank, Name, Address, City)
    VALUE ('IK21', 'IKBanking', 'Dinh Lan Minh', 'Da Nang');

#Default password: 123456

INSERT INTO users(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                  AverageIncome, TelephoneNumber, Email)
    VALUE ('MC4455', 'truongthanhtu', '$2y$10$3Fn.w0nKubFvRe.NfL.G1uY08jVbyg2OiyNhBaIXbT.Ao8yLS4dh.', 'Thanh Tu',
           'Truong', 'Hue', '1998-09-03', 'Student', 'Student', 'Reading Book', 0, 0359077335,
           'truongthanhtu03091998@gmail.com');
INSERT INTO users(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                  AverageIncome, TelephoneNumber, Email)
    VALUE ('PI2315', 'nguyendinhhieu', '$2y$10$3Fn.w0nKubFvRe.NfL.G1uY08jVbyg2OiyNhBaIXbT.Ao8yLS4dh.', 'Dinh Hieu',
           'Nguye', 'Nghe An', '1996-08-08', 'Student', 'Student', 'Reading Book', 0, 0868663315,
           'DinhHieu8896@gmail.com');
INSERT INTO users(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                  AverageIncome, TelephoneNumber, Email)
    VALUE ('YU0213', 'vuquanghuy', '$2y$10$3Fn.w0nKubFvRe.NfL.G1uY08jVbyg2OiyNhBaIXbT.Ao8yLS4dh.', 'Quan Huy', 'Vu',
           'Ha Noi', '2000-01-01', 'Student', 'Student', 'Reading Book', 0, 0981159826, 'VuQuangHuyXL1234@gmail.com');
INSERT INTO users(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                  AverageIncome, TelephoneNumber, Email)
    VALUE ('YJ4568', 'phamtuan', '$2y$10$3Fn.w0nKubFvRe.NfL.G1uY08jVbyg2OiyNhBaIXbT.Ao8yLS4dh.', 'Tuan', 'Pham',
           'Thai Nguyen', '2000-01-01', 'Student', 'Student', 'Reading Book', 0, 0382548442,
           'PhamTuanCules20@gmail.com');
INSERT INTO users(CodeCustomer, User, Pass, FirstName, LastName, Address, Dob, Workplace, Position, Interests,
                  AverageIncome, TelephoneNumber, Email)
    VALUE ('LI2468', 'nguyendinhtung', '$2y$10$3Fn.w0nKubFvRe.NfL.G1uY08jVbyg2OiyNhBaIXbT.Ao8yLS4dh.', 'Dinh Tung',
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
INSERT INTO type_account_customer(IDTypeAccount, IDCustomer)
    VALUE (1, 2);
INSERT INTO type_account_customer(IDTypeAccount, IDCustomer)
    VALUE (2, 2);
INSERT INTO type_account_customer(IDTypeAccount, IDCustomer)
    VALUE (1, 3);


INSERT INTO account(IDTypeAccountCustomer, AccountSourceNumber, BalanceSource)
    VALUE (1, '12510000586328', 5000000);
INSERT INTO account(IDTypeAccountCustomer, AccountSourceNumber, BalanceSource)
    VALUE (2, '45658791316400', 50000000);
INSERT INTO account(IDTypeAccountCustomer, AccountSourceNumber, BalanceSource)
    VALUE (3, '13151235135123', 4000000);
INSERT INTO account(IDTypeAccountCustomer, AccountSourceNumber, BalanceSource)
    VALUE (4, '96565926565656', 55000000);
INSERT INTO account(IDTypeAccountCustomer, AccountSourceNumber, BalanceSource)
    VALUE (5, '89861632131313', 55000000);


INSERT INTO beneficiaries(IDBank, IDAccount, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (1, 1, '89861632131313', 'Vu Quang Huy');
INSERT INTO beneficiaries(IDBank, IDAccount, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (1, 3, '12510000586328', 'Truong Thanh Tu');

/*
tài khoản của tú  :  12510000586328
  id 1:

tài khoản của hieu:   13151235135123
  id 3:
tài khoản của huy : 89861632131313
  id 5:
  */


INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '4567', '13151235135123','Nguyen Dinh Hieu', 1000000, 'lorem ipsum', 1, 20000, '2135');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '5462', '89861632131313','Vu Quan Huy', 150000, 'lorem ipsum', 1, 3000, '4652');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '5643', '89861632131313','Vu Quan Huy', 200000, 'lorem ipsum', 0, 4000, '5635');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9865', '13151235135123','Nguyen Dinh Hieu', 600000, 'lorem ipsum', 0, 12000, '5165');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '1235', '89861632131313','Vu Quan Huy', 1500000, 'lorem ipsum', 1, 30000, '9526');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9866', '13151235135123','Nguyen Dinh Hieu', 200000, 'lorem ipsum', 1, 4000, '9530');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9868', '13151235135123','Nguyen Dinh Hieu', 250000, 'lorem ipsum', 1, 5000, '9532');

INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9869', '12154610364646','Nguyen Van Nguyen', 300000, 'lorem ipsum', 1, 6000, '9534');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9870', '96581646526265', 'Nguyen Vu',350000, 'lorem ipsum', 1, 70000, '9536');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9871', '12154610364646','Nguyen Van Nguyen', 400000, 'lorem ipsum', 0, 8000, '9538');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9872', '96581646526265','Nguyen Vu', 450000, 'lorem ipsum', 0, 9000, '9540');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9873', '12154610364646','Nguyen Van Nguyen', 500000, 'lorem ipsum', 0, 10000, '9542');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9874', '96581646526265','Nguyen Vu', 550000, 'lorem ipsum', 0, 10000, '9544');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries,NameBeneficiaries, TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9875', '96581646526265','Nguyen Vu', 600000, 'lorem ipsum', 0, 12000, '9546');



# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                            Test                                          #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
/**
  Account test  | in system
   number account:  13151235135123
   name          :  Nguyen Dinh Hieu

 */
