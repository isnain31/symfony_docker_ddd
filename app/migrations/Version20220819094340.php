<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220819094340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bread (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_9CC34D4B8CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE doner_kebab (id VARCHAR(255) NOT NULL, meat INT DEFAULT NULL, salad INT DEFAULT NULL, bread INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_57F080D38D9A16CA (meat), INDEX IDX_57F080D38C3E3087 (salad), INDEX IDX_57F080D39CC34D4B (bread), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meat (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_8D9A16CA8CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salad (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_8C3E30878CDE5729 (type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE doner_kebab ADD CONSTRAINT FK_57F080D38D9A16CA FOREIGN KEY (meat) REFERENCES meat (id)');
        $this->addSql('ALTER TABLE doner_kebab ADD CONSTRAINT FK_57F080D38C3E3087 FOREIGN KEY (salad) REFERENCES salad (id)');
        $this->addSql('ALTER TABLE doner_kebab ADD CONSTRAINT FK_57F080D39CC34D4B FOREIGN KEY (bread) REFERENCES bread (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE doner_kebab DROP FOREIGN KEY FK_57F080D38D9A16CA');
        $this->addSql('ALTER TABLE doner_kebab DROP FOREIGN KEY FK_57F080D38C3E3087');
        $this->addSql('ALTER TABLE doner_kebab DROP FOREIGN KEY FK_57F080D39CC34D4B');
        $this->addSql('DROP TABLE bread');
        $this->addSql('DROP TABLE doner_kebab');
        $this->addSql('DROP TABLE meat');
        $this->addSql('DROP TABLE salad');
    }
}
