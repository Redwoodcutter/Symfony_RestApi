<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110110006 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, company_name_id INT NOT NULL, order_code INT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, address LONGTEXT NOT NULL, shipping_date DATETIME NOT NULL, INDEX IDX_E52FFDEE51458601 (company_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, cname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE51458601 FOREIGN KEY (company_name_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_post ADD company_name_id INT NOT NULL, DROP company_name');
        $this->addSql('ALTER TABLE order_post ADD CONSTRAINT FK_177B569A51458601 FOREIGN KEY (company_name_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_177B569A51458601 ON order_post (company_name_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_post DROP FOREIGN KEY FK_177B569A51458601');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE51458601');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_177B569A51458601 ON order_post');
        $this->addSql('ALTER TABLE order_post ADD company_name LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP company_name_id');
    }
}
