-- Seed sample partners and collaborations
SET @now = NOW();

INSERT INTO `partner` (`type`,`name`,`registration_number`,`phone`,`email`,`website`,`street`,`city`,`postal_code`,`country`,`is_active`,`created_at`,`updated_at`) VALUES
('pharmacy','Pharmacie Centrale','PHARMCENT001','+33123456789','contact@pharmacie.example','https://pharmacie.example','1 Rue Centrale','Paris','75001','France',1,@now,@now),
('radiology','Radiologie Sud','RADISUD001','+33111222333','info@radisud.example','https://radisud.example','12 Av. Sud','Marseille','13001','France',1,@now,@now);

INSERT INTO `collaboration` (`partner_id`,`organization_id`,`contract_start`,`contract_end`,`status`,`terms`,`created_at`,`updated_at`) VALUES
((SELECT id FROM partner WHERE name='Pharmacie Centrale' LIMIT 1), NULL, CURDATE(), NULL, 'active', 'Standard partnership for prescriptions delivery.', @now, @now),
((SELECT id FROM partner WHERE name='Radiologie Sud' LIMIT 1), NULL, CURDATE(), NULL, 'active', 'Imaging referrals and urgent exams.', @now, @now);
