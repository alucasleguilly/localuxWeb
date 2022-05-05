<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220504131328 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_piece (ID INT AUTO_INCREMENT NOT NULL, NAME CHAR(32) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE last_password (ID INT AUTO_INCREMENT NOT NULL, PASSWORD CHAR(32) NOT NULL, DATE DATE NOT NULL, ID_USER INT DEFAULT NULL, INDEX FK_LAST_PASSWORD_USER (ID_USER), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lease (ID INT AUTO_INCREMENT NOT NULL, DATE DATETIME NOT NULL, PRICE_PAID NUMERIC(10, 2) NOT NULL, DATE_TIME_START_PLAN DATETIME NOT NULL, DATE_TIME_END_PLAN DATETIME NOT NULL, DATE_TIME_START_REEL DATETIME DEFAULT NULL, DATE_TIME_END_REEL DATETIME DEFAULT NULL, REGISTRATION CHAR(7) DEFAULT NULL, ID_CUSTOMER INT DEFAULT NULL, discr VARCHAR(255) NOT NULL, INDEX FK_LEASE_VEHICLE (REGISTRATION), INDEX FK_LEASE_CUSTOMER (ID_CUSTOMER), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lease_with_driver (ID_OPTION INT DEFAULT NULL, ID INT NOT NULL, INDEX FK_LEASE_WITH_DRIVER_OPTION_WITH_DRIVER (ID_OPTION), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lease_without_driver (NB_KILOMETERS_START CHAR(32) NOT NULL, NB_KILOMETERS_END CHAR(32) DEFAULT NULL, ID_OPTION INT DEFAULT NULL, ID INT NOT NULL, INDEX FK_LEASE_WITHOUT_DRIVER_OPTION_WITHOUT_DRIVER (ID_OPTION), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (ID INT AUTO_INCREMENT NOT NULL, NAME CHAR(32) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (ID INT AUTO_INCREMENT NOT NULL, NAME CHAR(32) NOT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE option_with_driver (TARIFF CHAR(32) NOT NULL, ID_ROUTE INT DEFAULT NULL, ID INT NOT NULL, INDEX FK_OPTION_WITH_DRIVER_ROUTE (ID_ROUTE), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE option_without_driver (TIME CHAR(32) NOT NULL, NB_KILOMETERS CHAR(32) NOT NULL, ID INT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pieces_model (ID INT AUTO_INCREMENT NOT NULL, NOTE CHAR(32) DEFAULT NULL, ID_SHAPE INT DEFAULT NULL, ID_PIECE INT DEFAULT NULL, REGISTRATION CHAR(7) DEFAULT NULL, INDEX FK_PIECES_MODEL_SHAPE (ID_SHAPE), INDEX FK_PIECES_MODEL_CAR_PIECE (ID_PIECE), INDEX FK_PIECES_MODEL_VEHICLE (REGISTRATION), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restitution (ID INT AUTO_INCREMENT NOT NULL, DATE DATETIME NOT NULL, NB_KILOMETERS BIGINT NOT NULL, NOTE CHAR(32) DEFAULT NULL, TARIF NUMERIC(10, 2) NOT NULL, ID_LEASE INT DEFAULT NULL, INDEX FK_RESTITUTION_LEASE (ID_LEASE), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE route (ID INT AUTO_INCREMENT NOT NULL, ADDRESS_START CHAR(32) NOT NULL, ADDRESS_END CHAR(32) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shape (ID INT AUTO_INCREMENT NOT NULL, NAME CHAR(32) NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tariff (ID INT AUTO_INCREMENT NOT NULL, PRICE INT NOT NULL, ID_OPTION INT DEFAULT NULL, ID_MODEL INT DEFAULT NULL, INDEX FK_TARIFF_OPTION (ID_OPTION), INDEX FK_TARIFF_MODEL (ID_MODEL), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (ID INT AUTO_INCREMENT NOT NULL, LAST_NAME CHAR(32) NOT NULL, FIRST_NAME CHAR(32) NOT NULL, LOGIN CHAR(128) NOT NULL, DATE_LAST_CHANGE_PW DATE DEFAULT NULL, PASSWORD CHAR(128) NOT NULL, EMPLOYEE TINYINT(1) NOT NULL, POST VARCHAR(128) DEFAULT NULL, PHONE INT DEFAULT NULL, EMAIL VARCHAR(256) DEFAULT NULL, STREET VARCHAR(256) DEFAULT NULL, POSTCODE INT DEFAULT NULL, CITY VARCHAR(128) DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (REGISTRATION CHAR(7) NOT NULL, ID_MODEL INT DEFAULT NULL, INDEX FK_VEHICLE_MODEL (ID_MODEL), PRIMARY KEY(REGISTRATION)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE verification (ID INT AUTO_INCREMENT NOT NULL, DATE CHAR(32) NOT NULL, ID_RESTITUTION INT DEFAULT NULL, ID_PIECE INT DEFAULT NULL, ID_SHAPE INT DEFAULT NULL, INDEX FK_VERIFICATION_PIECES_MODEL (ID_PIECE), INDEX FK_VERIFICATION_RESTITUTION (ID_RESTITUTION), INDEX FK_VERIFICATION_SHAPE (ID_SHAPE), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE last_password ADD CONSTRAINT FK_4DA3034BF8371B55 FOREIGN KEY (ID_USER) REFERENCES user (ID)');
        $this->addSql('ALTER TABLE lease ADD CONSTRAINT FK_E6C77495F79AEEB7 FOREIGN KEY (REGISTRATION) REFERENCES vehicle (REGISTRATION)');
        $this->addSql('ALTER TABLE lease ADD CONSTRAINT FK_E6C77495DE1072D7 FOREIGN KEY (ID_CUSTOMER) REFERENCES user (ID)');
        $this->addSql('ALTER TABLE lease_with_driver ADD CONSTRAINT FK_7D613FEFF7CE922E FOREIGN KEY (ID_OPTION) REFERENCES option_with_driver (ID)');
        $this->addSql('ALTER TABLE lease_with_driver ADD CONSTRAINT FK_7D613FEF11D3633A FOREIGN KEY (ID) REFERENCES lease (ID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lease_without_driver ADD CONSTRAINT FK_C3BDB69F7CE922E FOREIGN KEY (ID_OPTION) REFERENCES option_without_driver (ID)');
        $this->addSql('ALTER TABLE lease_without_driver ADD CONSTRAINT FK_C3BDB6911D3633A FOREIGN KEY (ID) REFERENCES lease (ID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_with_driver ADD CONSTRAINT FK_6C20ED612DDEF833 FOREIGN KEY (ID_ROUTE) REFERENCES route (ID)');
        $this->addSql('ALTER TABLE option_with_driver ADD CONSTRAINT FK_6C20ED6111D3633A FOREIGN KEY (ID) REFERENCES `option` (ID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE option_without_driver ADD CONSTRAINT FK_55453B6911D3633A FOREIGN KEY (ID) REFERENCES `option` (ID) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pieces_model ADD CONSTRAINT FK_8FC2C6FCF22A2792 FOREIGN KEY (ID_SHAPE) REFERENCES shape (ID)');
        $this->addSql('ALTER TABLE pieces_model ADD CONSTRAINT FK_8FC2C6FC6BD0D369 FOREIGN KEY (ID_PIECE) REFERENCES car_piece (ID)');
        $this->addSql('ALTER TABLE pieces_model ADD CONSTRAINT FK_8FC2C6FCF79AEEB7 FOREIGN KEY (REGISTRATION) REFERENCES vehicle (REGISTRATION)');
        $this->addSql('ALTER TABLE restitution ADD CONSTRAINT FK_4FA8209DC9DDACDF FOREIGN KEY (ID_LEASE) REFERENCES lease (ID)');
        $this->addSql('ALTER TABLE tariff ADD CONSTRAINT FK_9465207DF7CE922E FOREIGN KEY (ID_OPTION) REFERENCES option_without_driver (ID)');
        $this->addSql('ALTER TABLE tariff ADD CONSTRAINT FK_9465207DF88FAA93 FOREIGN KEY (ID_MODEL) REFERENCES model (ID)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E486F88FAA93 FOREIGN KEY (ID_MODEL) REFERENCES model (ID)');
        $this->addSql('ALTER TABLE verification ADD CONSTRAINT FK_5AF1C50BA4A34CAF FOREIGN KEY (ID_RESTITUTION) REFERENCES restitution (ID)');
        $this->addSql('ALTER TABLE verification ADD CONSTRAINT FK_5AF1C50B6BD0D369 FOREIGN KEY (ID_PIECE) REFERENCES pieces_model (ID)');
        $this->addSql('ALTER TABLE verification ADD CONSTRAINT FK_5AF1C50BF22A2792 FOREIGN KEY (ID_SHAPE) REFERENCES shape (ID)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pieces_model DROP FOREIGN KEY FK_8FC2C6FC6BD0D369');
        $this->addSql('ALTER TABLE lease_with_driver DROP FOREIGN KEY FK_7D613FEF11D3633A');
        $this->addSql('ALTER TABLE lease_without_driver DROP FOREIGN KEY FK_C3BDB6911D3633A');
        $this->addSql('ALTER TABLE restitution DROP FOREIGN KEY FK_4FA8209DC9DDACDF');
        $this->addSql('ALTER TABLE tariff DROP FOREIGN KEY FK_9465207DF88FAA93');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E486F88FAA93');
        $this->addSql('ALTER TABLE option_with_driver DROP FOREIGN KEY FK_6C20ED6111D3633A');
        $this->addSql('ALTER TABLE option_without_driver DROP FOREIGN KEY FK_55453B6911D3633A');
        $this->addSql('ALTER TABLE lease_with_driver DROP FOREIGN KEY FK_7D613FEFF7CE922E');
        $this->addSql('ALTER TABLE lease_without_driver DROP FOREIGN KEY FK_C3BDB69F7CE922E');
        $this->addSql('ALTER TABLE tariff DROP FOREIGN KEY FK_9465207DF7CE922E');
        $this->addSql('ALTER TABLE verification DROP FOREIGN KEY FK_5AF1C50B6BD0D369');
        $this->addSql('ALTER TABLE verification DROP FOREIGN KEY FK_5AF1C50BA4A34CAF');
        $this->addSql('ALTER TABLE option_with_driver DROP FOREIGN KEY FK_6C20ED612DDEF833');
        $this->addSql('ALTER TABLE pieces_model DROP FOREIGN KEY FK_8FC2C6FCF22A2792');
        $this->addSql('ALTER TABLE verification DROP FOREIGN KEY FK_5AF1C50BF22A2792');
        $this->addSql('ALTER TABLE last_password DROP FOREIGN KEY FK_4DA3034BF8371B55');
        $this->addSql('ALTER TABLE lease DROP FOREIGN KEY FK_E6C77495DE1072D7');
        $this->addSql('ALTER TABLE lease DROP FOREIGN KEY FK_E6C77495F79AEEB7');
        $this->addSql('ALTER TABLE pieces_model DROP FOREIGN KEY FK_8FC2C6FCF79AEEB7');
        $this->addSql('DROP TABLE car_piece');
        $this->addSql('DROP TABLE last_password');
        $this->addSql('DROP TABLE lease');
        $this->addSql('DROP TABLE lease_with_driver');
        $this->addSql('DROP TABLE lease_without_driver');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE option_with_driver');
        $this->addSql('DROP TABLE option_without_driver');
        $this->addSql('DROP TABLE pieces_model');
        $this->addSql('DROP TABLE restitution');
        $this->addSql('DROP TABLE route');
        $this->addSql('DROP TABLE shape');
        $this->addSql('DROP TABLE tariff');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicle');
        $this->addSql('DROP TABLE verification');
    }
}