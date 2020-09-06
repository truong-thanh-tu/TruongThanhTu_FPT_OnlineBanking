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

    `IDTypeAccountCustomer`  INT UNSIGNED     NOT NULL,
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

# Create Table Introduce
DROP TABLE IF EXISTS `Introduce`;
CREATE TABLE IF NOT EXISTS Introduce
(
    `IDIntroduce`    INT AUTO_INCREMENT,

    `TitleIntroduce` NVARCHAR(128) NOT NULL,
    `Content1`       TEXT          NOT NULL,
    `Content2`       TEXT          NOT NULL,
    `Img`            NVARCHAR(256) NOT NULL,


    `created_by`     NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at`     DATETIME     DEFAULT CURRENT_TIME,
    `updated_by`     NVARCHAR(32) DEFAULT NULL,
    `updated_at`     DATETIME     DEFAULT NULL,
    `version`        INT          DEFAULT 1,
    `deleted`        BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDIntroduce`)
) ENGINE InnoDB;

# Create Table Introduce
DROP TABLE IF EXISTS `Blog`;
CREATE TABLE IF NOT EXISTS Blog
(
    `IDBlog`     INT AUTO_INCREMENT,

    `TitleBlog`  TEXT          NOT NULL,
    `Img`        NVARCHAR(256) NOT NULL,
    `Content1`   TEXT          NOT NULL,
    `Content2`   TEXT          NOT NULL,


    `created_by` NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at` DATETIME     DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME     DEFAULT NULL,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDBlog`)
) ENGINE InnoDB;
# Create Table Introduce
DROP TABLE IF EXISTS `Contact`;
CREATE TABLE IF NOT EXISTS Contact
(
    `IDContact`  INT AUTO_INCREMENT,

    `name`       NVARCHAR(256) NOT NULL,
    `email`      NVARCHAR(256) NOT NULL,
    `subject`    NVARCHAR(256) NOT NULL,
    `message`    TEXT          NOT NULL,


    `created_by` NVARCHAR(32) DEFAULT 'OnlineBanking',
    `created_at` DATETIME     DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME     DEFAULT NULL,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,


    PRIMARY KEY (`IDContact`)
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
INSERT INTO beneficiaries(IDBank, IDAccount, AccountBeneficiaries, NameAccountBeneficiaries)
    VALUE (2, 1, '14468113131128', 'Nguyen Dinh Hung');
/*
tài khoản của tú  :  12510000586328
  id 1:

tài khoản của hieu:   13151235135123
  id 3:
tài khoản của huy : 89861632131313
  id 5:
  */


INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '4567', '13151235135123', 'Nguyen Dinh Hieu', 1000000, 'lorem ipsum', 1, 20000, '2135');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '5462', '89861632131313', 'Vu Quan Huy', 150000, 'lorem ipsum', 1, 3000, '4652');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '5643', '89861632131313', 'Vu Quan Huy', 200000, 'lorem ipsum', 0, 4000, '5635');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9865', '13151235135123', 'Nguyen Dinh Hieu', 600000, 'lorem ipsum', 0, 12000, '5165');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '1235', '89861632131313', 'Vu Quan Huy', 1500000, 'lorem ipsum', 1, 30000, '9526');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9866', '13151235135123', 'Nguyen Dinh Hieu', 200000, 'lorem ipsum', 1, 4000, '9530');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9868', '13151235135123', 'Nguyen Dinh Hieu', 250000, 'lorem ipsum', 1, 5000, '9532');

INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9869', '12154610364646', 'Nguyen Van Nguyen', 300000, 'lorem ipsum', 1, 6000, '9534');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9870', '96581646526265', 'Nguyen Vu', 350000, 'lorem ipsum', 1, 70000, '9536');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9871', '12154610364646', 'Nguyen Van Nguyen', 400000, 'lorem ipsum', 0, 8000, '9538');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9872', '96581646526265', 'Nguyen Vu', 450000, 'lorem ipsum', 0, 9000, '9540');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9873', '12154610364646', 'Nguyen Van Nguyen', 500000, 'lorem ipsum', 0, 10000, '9542');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 1, '9874', '96581646526265', 'Nguyen Vu', 550000, 'lorem ipsum', 0, 10000, '9544');
INSERT INTO transaction(IDTypeAccountCustomer, IDBank, CodeTransaction, Beneficiaries, NameBeneficiaries,
                        TransactionMoneyNumber, ContentTransaction,
                        Payer, Fee, CodeOTP)
    VALUE (1, 2, '9875', '96581646526265', 'Nguyen Vu', 600000, 'lorem ipsum', 0, 12000, '9546');


INSERT INTO introduce(TitleIntroduce, Content1, Content2, Img)
    VALUE ('Busines Consulting',
           'It is certain that there will come a point when many foreign entrepreneurs in Vietnam wonder if they should hire a business consultant due to the daunting rules and regulations and new business environment that take away their precious time and energy.',
           'Many businesses in Vietnam these days have hired business consultants to develop the most excellent market entry strategies for them, instead of just relying on their internal teams.',
           'img/project/project7.jpg');
INSERT INTO introduce(TitleIntroduce, Content1, Content2, Img)
    VALUE ('Credit Card', 'Receive 50,000 bonus points - a $500 value - after you make at least $3,000 in purchases the first 90 days of account opening.
Earn unlimited 2 points for every $1 spent on travel and dining purchases.
Earn unlimited 1.5 points for every $1 spent on all other purchases.', 'Redeem for cash back as a deposit into Bank of America® checking or savings accounts, for credit to eligible Merrill accounts including 529 accounts, as a statement credit to your credit card, or for gift cards and purchases at the Bank of America Travel Center.
Get up to a $100 Airline Incidental Statement Credit annually for qualifying purchases such as seat upgrades, baggage fees, in-flight services, and airline lounge fees - automatically applied to your card statement.',
           'img/project/project8.jpg');
INSERT INTO introduce(TitleIntroduce, Content1, Content2, Img)
    VALUE ('Income Monitoring',
           'Taking control of your financial future is a process.  And as with any process, it is important to monitor your progress and measure the results.  Doing so will help you understand how well you are doing and to determine if the financial strategies you are using are working.Content', 'When preparing your personal balance sheet, separate your investment assets into stocks, bonds and cash categories.  Understanding your personal “asset allocation” will help you organize your finances and your monitoring of them.  You can also find examples in almost any financial planning book or online.

It also makes sense to track changes from year to year to monitor your progress and determine if you are on track to reach your financial objectives.  Here is a chart that provides a basic format you may want to consider using.',
           'img/project/project9.jpg');
INSERT INTO introduce(TitleIntroduce, Content1, Content2, Img)
    VALUE ('Financial Investment',
           'Have you ever heard someone talking about stocks, bonds, or mutual funds and were a little confused? Does the mention of investments or financial topics seem overwhelming? ',
           'How you invest these dollars can be very different. How much time you have on your side is often a key thing to consider when making a financial investment. The more time you have, the more risk you can usually take. The more risk you take, the more potential for making more money! It is important to note that there is also an economic definition of financial investments that deals with how businesses invest in products, equipment, factories, employees, and inventories. This lesson will focus on the finance definition of financial investment. Let''s look at a few key terms worth knowing when it comes to financial investments.',
           'img/project/project10.jpg');
INSERT INTO introduce(TitleIntroduce, Content1, Content2, Img)
    VALUE ('Insurance Consulting',
           'Amid a digital revolution, insurance companies need to focus on agility and customer-centricity. Bain helps insurers develop and execute strategies that increase profitability and efficiency, leverage digital capabilities, improve customer loyalty and gain competitive advantage from advanced analytics.', 'Our insurance consulting experts work with leading insurance companies, including property and casualty insurers, life insurers, health insurers and reinsurers to develop practical solutions to their most pressing strategic challenges.
We offer a wide range of expertise to help our clients adapt to a changing insurance market and boost their businesses in the short-term while positioning themselves for long-term success',
           'img/project/project11.jpg');
INSERT INTO introduce(TitleIntroduce, Content1, Content2, Img)
    VALUE ('Financial Management',
           'Financial management may be defined as the area or function in an organization which is concerned with profitability, expenses, cash and credit, so that the "organization may have the means to carry out its objective as satisfactorily as possible',
           'Financial management is generally concerned with short term working capital management, focusing on current assets and current liabilities, and managing fluctuations in foreign currency and product cycles, often through hedging. (see Corporate finance #Financial risk management). The function also entails the efficient and effective day-to-day management of funds, and thus overlaps treasury management. It is also involved with long term strategic financial management, focused on i.a. capital structure management, including capital raising, capital budgeting (capital allocation between business units or products), and dividend policy; these latter, in large corporates, being more the domain of "corporate finance."',
           'img/project/project12.jpg');


INSERT INTO Blog(TitleBlog, Img, Content1, Content2)
    VALUE ('Astronomy Binoculars A Great Alternative', 'img/blog/feature-img1.jpg', ' MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction.', '    <div class="col-lg-12 col-md-12 blog_details">
                            <h2>Astronomy Binoculars A Great Alternative</h2>
                            <p class="excert">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction.
                            </p>
                            <p>
                                Boot camps have its supporters and its detractors. Some people do not understand why you
                                should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a fraction of the camp price. However, who has the willpower to actually sit
                                through a self-imposed MCSE training. who has the willpower to actually sit through a
                                self-imposed
                            </p>
                            <p>
                                Boot camps have its supporters and its detractors. Some people do not understand why you
                                should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a fraction of the camp price. However, who has the willpower to actually sit
                                through a self-imposed MCSE training. who has the willpower to actually sit through a
                                self-imposed
                            </p>
                        </div>');
INSERT INTO Blog(TitleBlog, Img, Content1, Content2)
    VALUE ('Customer trust that improves sales.', 'img/blog/Blog1.png', ' MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction.', '  <div class="col-lg-12">
                            <div class="quotes">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction of the camp price. However, who has the willpower to
                                actually sit through a self-imposed MCSE training.
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <img class="img-fluid" src="{{ asset(''img/blog/post-img1.jpg'') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="{{ asset(''img/blog/post-img2.jpg'') }}" alt="">
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <h3 style="color: black!important;">Astronomy Binoculars A Great Alternative</h3>

                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not
                                        understand why you should have to spend money on boot camp when you can get the
                                        MCSE study materials yourself at a fraction of the camp price. However, who has
                                        the willpower.
                                    </p>
                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not
                                        understand why you should have to spend money on boot camp when you can get the
                                        MCSE study materials yourself at a fraction of the camp price. However, who has
                                        the willpower.
                                    </p>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently with desktop publishing software like Aldus PageMaker including
                                        versions of Lorem Ipsum.</p>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                                        Virginia, looked up one of the more obscure Latin words, consectetur, from a
                                        Lorem Ipsum passage, and going through the cites of the word in classical
                                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                                        1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
                                        ethics, very popular during the Renaissance.</p>
                                </div>
                            </div>
                        </div>')
INSERT INTO Blog(TitleBlog, Img, Content1, Content2)
    VALUE ('Astronomy Binoculars A Great Alternative', 'img/blog/feature-img1.jpg', ' MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction.', '    <div class="col-lg-12 col-md-12 blog_details">
                            <h2>Astronomy Binoculars A Great Alternative</h2>
                            <p class="excert">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction.
                            </p>
                            <p>
                                Boot camps have its supporters and its detractors. Some people do not understand why you
                                should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a fraction of the camp price. However, who has the willpower to actually sit
                                through a self-imposed MCSE training. who has the willpower to actually sit through a
                                self-imposed
                            </p>
                            <p>
                                Boot camps have its supporters and its detractors. Some people do not understand why you
                                should have to spend money on boot camp when you can get the MCSE study materials
                                yourself at a fraction of the camp price. However, who has the willpower to actually sit
                                through a self-imposed MCSE training. who has the willpower to actually sit through a
                                self-imposed
                            </p>
                        </div>');
INSERT INTO Blog(TitleBlog, Img, Content1, Content2)
    VALUE ('Customer trust that improves sales.', 'img/blog/Blog1.png', ' MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction.', '  <div class="col-lg-12">
                            <div class="quotes">
                                MCSE boot camps have its supporters and its detractors. Some people do not understand
                                why you should have to spend money on boot camp when you can get the MCSE study
                                materials yourself at a fraction of the camp price. However, who has the willpower to
                                actually sit through a self-imposed MCSE training.
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <img class="img-fluid" src="{{ asset(''img/blog/post-img1.jpg'') }}" alt="">
                                </div>
                                <div class="col-6">
                                    <img class="img-fluid" src="{{ asset(''img/blog/post-img2.jpg'') }}" alt="">
                                </div>
                                <div class="col-lg-12 mt-25">
                                    <h3 style="color: black!important;">Astronomy Binoculars A Great Alternative</h3>

                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not
                                        understand why you should have to spend money on boot camp when you can get the
                                        MCSE study materials yourself at a fraction of the camp price. However, who has
                                        the willpower.
                                    </p>
                                    <p>
                                        MCSE boot camps have its supporters and its detractors. Some people do not
                                        understand why you should have to spend money on boot camp when you can get the
                                        MCSE study materials yourself at a fraction of the camp price. However, who has
                                        the willpower.
                                    </p>
                                    <p>It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently with desktop publishing software like Aldus PageMaker including
                                        versions of Lorem Ipsum.</p>
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                                        Virginia, looked up one of the more obscure Latin words, consectetur, from a
                                        Lorem Ipsum passage, and going through the cites of the word in classical
                                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                                        1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
                                        ethics, very popular during the Renaissance.</p>
                                </div>
                            </div>
                        </div>')

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                            Test                                          #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
/**
  Account test  | in system
   number account:  13151235135123
   name          :  Nguyen Dinh Hieu

 */
