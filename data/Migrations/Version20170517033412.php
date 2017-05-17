<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170517033412 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actor (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, thumb_location VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actors_movies (actor_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', movie_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_B3012DC010DAF24A (actor_id), INDEX IDX_B3012DC08F93B6FC (movie_id), PRIMARY KEY(actor_id, movie_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actors_shows (actor_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', show_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_19589D8610DAF24A (actor_id), INDEX IDX_19589D86D0C1FC64 (show_id), PRIMARY KEY(actor_id, show_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shows_genres (genre_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', show_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_9853586F4296D31F (genre_id), INDEX IDX_9853586FD0C1FC64 (show_id), PRIMARY KEY(genre_id, show_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movies_genres (genre_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', movie_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', INDEX IDX_DF9737A24296D31F (genre_id), INDEX IDX_DF9737A28F93B6FC (movie_id), PRIMARY KEY(genre_id, movie_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', rating_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, thumb_location VARCHAR(255) DEFAULT NULL, release_date DATETIME NOT NULL, INDEX IDX_1D5EF26FA32EFC6 (rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `show` (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', rating_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, thumb_location VARCHAR(255) DEFAULT NULL, release_date DATETIME NOT NULL, INDEX IDX_320ED901A32EFC6 (rating_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actors_movies ADD CONSTRAINT FK_B3012DC010DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actors_movies ADD CONSTRAINT FK_B3012DC08F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actors_shows ADD CONSTRAINT FK_19589D8610DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE actors_shows ADD CONSTRAINT FK_19589D86D0C1FC64 FOREIGN KEY (show_id) REFERENCES `show` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shows_genres ADD CONSTRAINT FK_9853586F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shows_genres ADD CONSTRAINT FK_9853586FD0C1FC64 FOREIGN KEY (show_id) REFERENCES `show` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movies_genres ADD CONSTRAINT FK_DF9737A24296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movies_genres ADD CONSTRAINT FK_DF9737A28F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FA32EFC6 FOREIGN KEY (rating_id) REFERENCES rating (id)');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED901A32EFC6 FOREIGN KEY (rating_id) REFERENCES rating (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actors_movies DROP FOREIGN KEY FK_B3012DC010DAF24A');
        $this->addSql('ALTER TABLE actors_shows DROP FOREIGN KEY FK_19589D8610DAF24A');
        $this->addSql('ALTER TABLE shows_genres DROP FOREIGN KEY FK_9853586F4296D31F');
        $this->addSql('ALTER TABLE movies_genres DROP FOREIGN KEY FK_DF9737A24296D31F');
        $this->addSql('ALTER TABLE actors_movies DROP FOREIGN KEY FK_B3012DC08F93B6FC');
        $this->addSql('ALTER TABLE movies_genres DROP FOREIGN KEY FK_DF9737A28F93B6FC');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FA32EFC6');
        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED901A32EFC6');
        $this->addSql('ALTER TABLE actors_shows DROP FOREIGN KEY FK_19589D86D0C1FC64');
        $this->addSql('ALTER TABLE shows_genres DROP FOREIGN KEY FK_9853586FD0C1FC64');
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE actors_movies');
        $this->addSql('DROP TABLE actors_shows');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE shows_genres');
        $this->addSql('DROP TABLE movies_genres');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE `show`');
    }
}
