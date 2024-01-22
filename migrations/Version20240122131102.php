<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240122131102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ruta_item (ruta_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_837FEAD6ABBC4845 (ruta_id), INDEX IDX_837FEAD6126F525E (item_id), PRIMARY KEY(ruta_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ruta_item ADD CONSTRAINT FK_837FEAD6ABBC4845 FOREIGN KEY (ruta_id) REFERENCES ruta (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ruta_item ADD CONSTRAINT FK_837FEAD6126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE informe ADD tour_id INT NOT NULL, ADD idtour INT NOT NULL');
        $this->addSql('ALTER TABLE informe ADD CONSTRAINT FK_7E75E1D915ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7E75E1D915ED8D43 ON informe (tour_id)');
        $this->addSql('ALTER TABLE localidad ADD provincia_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE localidad ADD CONSTRAINT FK_4F68E0104E7121AF FOREIGN KEY (provincia_id) REFERENCES provincia (id)');
        $this->addSql('CREATE INDEX IDX_4F68E0104E7121AF ON localidad (provincia_id)');
        $this->addSql('ALTER TABLE reserva ADD tour_id INT NOT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3B15ED8D43 FOREIGN KEY (tour_id) REFERENCES tour (id)');
        $this->addSql('ALTER TABLE reserva ADD CONSTRAINT FK_188D2E3BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_188D2E3B15ED8D43 ON reserva (tour_id)');
        $this->addSql('CREATE INDEX IDX_188D2E3BA76ED395 ON reserva (user_id)');
        $this->addSql('ALTER TABLE ruta ADD localidad_id INT NOT NULL');
        $this->addSql('ALTER TABLE ruta ADD CONSTRAINT FK_C3AEF08C67707C89 FOREIGN KEY (localidad_id) REFERENCES localidad (id)');
        $this->addSql('CREATE INDEX IDX_C3AEF08C67707C89 ON ruta (localidad_id)');
        $this->addSql('ALTER TABLE tour ADD ruta_id INT DEFAULT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F969ABBC4845 FOREIGN KEY (ruta_id) REFERENCES ruta (id)');
        $this->addSql('ALTER TABLE tour ADD CONSTRAINT FK_6AD1F969A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6AD1F969ABBC4845 ON tour (ruta_id)');
        $this->addSql('CREATE INDEX IDX_6AD1F969A76ED395 ON tour (user_id)');
        $this->addSql('ALTER TABLE user ADD rol VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE valoraciones ADD reserva_id INT NOT NULL');
        $this->addSql('ALTER TABLE valoraciones ADD CONSTRAINT FK_40850667D67139E8 FOREIGN KEY (reserva_id) REFERENCES reserva (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40850667D67139E8 ON valoraciones (reserva_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ruta_item DROP FOREIGN KEY FK_837FEAD6ABBC4845');
        $this->addSql('ALTER TABLE ruta_item DROP FOREIGN KEY FK_837FEAD6126F525E');
        $this->addSql('DROP TABLE ruta_item');
        $this->addSql('ALTER TABLE informe DROP FOREIGN KEY FK_7E75E1D915ED8D43');
        $this->addSql('DROP INDEX UNIQ_7E75E1D915ED8D43 ON informe');
        $this->addSql('ALTER TABLE informe DROP tour_id, DROP idtour');
        $this->addSql('ALTER TABLE localidad DROP FOREIGN KEY FK_4F68E0104E7121AF');
        $this->addSql('DROP INDEX IDX_4F68E0104E7121AF ON localidad');
        $this->addSql('ALTER TABLE localidad DROP provincia_id');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3B15ED8D43');
        $this->addSql('ALTER TABLE reserva DROP FOREIGN KEY FK_188D2E3BA76ED395');
        $this->addSql('DROP INDEX IDX_188D2E3B15ED8D43 ON reserva');
        $this->addSql('DROP INDEX IDX_188D2E3BA76ED395 ON reserva');
        $this->addSql('ALTER TABLE reserva DROP tour_id, DROP user_id');
        $this->addSql('ALTER TABLE ruta DROP FOREIGN KEY FK_C3AEF08C67707C89');
        $this->addSql('DROP INDEX IDX_C3AEF08C67707C89 ON ruta');
        $this->addSql('ALTER TABLE ruta DROP localidad_id');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F969ABBC4845');
        $this->addSql('ALTER TABLE tour DROP FOREIGN KEY FK_6AD1F969A76ED395');
        $this->addSql('DROP INDEX IDX_6AD1F969ABBC4845 ON tour');
        $this->addSql('DROP INDEX IDX_6AD1F969A76ED395 ON tour');
        $this->addSql('ALTER TABLE tour DROP ruta_id, DROP user_id');
        $this->addSql('ALTER TABLE user DROP rol');
        $this->addSql('ALTER TABLE valoraciones DROP FOREIGN KEY FK_40850667D67139E8');
        $this->addSql('DROP INDEX UNIQ_40850667D67139E8 ON valoraciones');
        $this->addSql('ALTER TABLE valoraciones DROP reserva_id');
    }
}
