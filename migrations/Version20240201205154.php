<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240201205154 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_post (player_id INT NOT NULL, post_id INT NOT NULL, INDEX IDX_F8903CBE99E6F5DF (player_id), INDEX IDX_F8903CBE4B89032C (post_id), PRIMARY KEY(player_id, post_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_post ADD CONSTRAINT FK_F8903CBE99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_post ADD CONSTRAINT FK_F8903CBE4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player_post DROP FOREIGN KEY FK_F8903CBE99E6F5DF');
        $this->addSql('ALTER TABLE player_post DROP FOREIGN KEY FK_F8903CBE4B89032C');
        $this->addSql('DROP TABLE player_post');
    }
}
