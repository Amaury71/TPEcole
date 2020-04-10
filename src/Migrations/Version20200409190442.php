<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409190442 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE photo_class CHANGE file_name file_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE article CHANGE content content VARCHAR(255) DEFAULT NULL, CHANGE file_name file_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE child ADD photo_class_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B35429793C149A FOREIGN KEY (photo_class_id) REFERENCES photo_class (id)');
        $this->addSql('CREATE INDEX IDX_22B35429793C149A ON child (photo_class_id)');
        $this->addSql('ALTER TABLE message CHANGE receive_msg_id receive_msg_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school CHANGE tel tel VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article CHANGE content content VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE file_name file_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B35429793C149A');
        $this->addSql('DROP INDEX IDX_22B35429793C149A ON child');
        $this->addSql('ALTER TABLE child DROP photo_class_id');
        $this->addSql('ALTER TABLE message CHANGE receive_msg_id receive_msg_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo_class CHANGE file_name file_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE school CHANGE tel tel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
