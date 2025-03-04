CREATE TABLE `country` (
                            `id` int NOT NULL AUTO_INCREMENT,
                            `name` varchar(32) NOT NULL,
                            PRIMARY KEY (`id`)
);

CREATE TABLE `constructor` (
                               `id` int NOT NULL AUTO_INCREMENT,
                               `country_id` int NOT NULL,
                               `type` varchar(255) NOT NULL,
                               `name` varchar(255) NOT NULL,
                               PRIMARY KEY (`id`),
                               KEY `IDX_COUNTRY_ID` (`country_id`),
                               CONSTRAINT `FK_CONFERENCE_ID` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
);





INSERT INTO `country` (`id`, `name`) VALUES
                                          (1, 'France'),
                                          (2, 'USA'),
                                          (3, 'Japan'),
                                          (4, 'Italy'),
                                          (5, 'Korea'),
                                          (6, 'Germany');

INSERT INTO `constructor` (`id`, `country_id`, `type`, `name`) VALUES
                                                                             (1, 1, 'car', 'Peugeot'),
                                                                             (2, 2, 'motocycle', 'Harley Davidson'),
                                                                             (3, 4, 'car', 'Ferrari'),
                                                                             (4, 3, 'car', 'Mitsubishi'),
                                                                             (5, 5, 'car', 'Hyundai'),
                                                                             (6, 6, 'car', 'Mercedes'),
                                                                             (7, 3, 'motocycle', 'Suzuki'),
                                                                             (8, 4, 'motocycle', 'Ducati');

